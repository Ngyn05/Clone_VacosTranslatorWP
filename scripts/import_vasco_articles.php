<?php
/**
 * Script import bài viết từ vasco-translator.com/articles/ vào WordPress Local
 */

// Tăng thời gian thực thi và bộ nhớ cho kịch bản cào dữ liệu lớn
set_time_limit(0);
ini_set('memory_limit', '512M');

require_once __DIR__ . '/../wp-load.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/taxonomy.php';

echo "=== BẮT ĐẦU IMPORT BÀI VIẾT TỪ VASCO-TRANSLATOR.COM ===\n\n";

// 1. Lấy danh sách URL bài viết từ sitemap
$sitemap_url = 'https://vasco-translator.com/articles/post-sitemap.xml';
$context = stream_context_create([
    'http' => [
        'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36\r\n"
    ]
]);

$sitemap_xml = @file_get_contents($sitemap_url, false, $context);
$urls = [];

if ($sitemap_xml) {
    $xml = @simplexml_load_string($sitemap_xml);
    if ($xml && isset($xml->url)) {
        foreach ($xml->url as $url_elem) {
            $loc = (string)$url_elem->loc;
            if ($loc) {
                $urls[] = $loc;
            }
        }
    }
}

// Nếu không đọc được sitemap, fallback danh sách thủ công bài chính
if (empty($urls)) {
    echo "[!] Không đọc được sitemap, chuyển sang danh sách mặc định...\n";
    $urls = [
        'https://vasco-translator.com/articles/news/vasco-expert-how-hotels-overcome-world-cup-language-barriers/',
        'https://vasco-translator.com/articles/vasco/how-do-translation-earbuds-work/',
        'https://vasco-translator.com/articles/travel/best-time-to-visit-japan/',
        'https://vasco-translator.com/articles/languages/exploring-the-celtic-languages-from-the-irish-language-to-the-manx-gaelic/',
        'https://vasco-translator.com/articles/languages/thank-you-in-different-languages/',
        'https://vasco-translator.com/articles/travel/top-10-best-christmas-markets-in-europe/',
        'https://vasco-translator.com/articles/travel/spooky-travel-destinations/',
        'https://vasco-translator.com/articles/travel/fall-travel-ideas-hoa-hoa-season/',
        'https://vasco-translator.com/articles/languages/languages-of-star-trek-klingon-vs-vulcan/'
    ];
}

echo "Tổng số bài viết cần xử lý: " . count($urls) . "\n\n";

/**
 * Hàm tải ảnh về WordPress Media Library và trả về Attachment ID & URL
 */
function download_image_to_media($image_url, $post_id = 0, $desc = null) {
    if (empty($image_url) || strpos($image_url, 'data:image') === 0) {
        return false;
    }

    // Đảm bảo URL ảnh đầy đủ
    if (strpos($image_url, '//') === 0) {
        $image_url = 'https:' . $image_url;
    }

    // Kiểm tra xem ảnh đã tồn tại trong Media Library chưa (theo tên file)
    $filename = basename(parse_url($image_url, PHP_URL_PATH));
    // Bỏ kích thước crop như -400x250.jpg nếu có để tìm ảnh gốc
    $clean_filename = preg_replace('/-\d+x\d+(\.[a-z]{3,4})$/i', '$1', $filename);

    global $wpdb;
    $existing_id = $wpdb->get_var($wpdb->prepare(
        "SELECT ID FROM {$wpdb->posts} WHERE post_type = 'attachment' AND guid LIKE %s LIMIT 1",
        '%' . $wpdb->esc_like($clean_filename) . '%'
    ));

    if ($existing_id) {
        return [
            'id'  => $existing_id,
            'url' => wp_get_attachment_url($existing_id)
        ];
    }

    // Tải ảnh về
    tmpfile(); // Khởi tạo tmp
    $file_array = [];
    $file_array['name'] = $clean_filename;

    // Tải nội dung file bằng cURL hoặc file_get_contents
    $raw_data = false;
    if (function_exists('curl_init')) {
        $ch = curl_init($image_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $raw_data = curl_exec($ch);
        curl_close($ch);
    }
    if (!$raw_data) {
        $opts = [
            'http' => ['header' => "User-Agent: Mozilla/5.0\r\n"],
            'ssl' => ['verify_peer' => false, 'verify_peer_name' => false]
        ];
        $raw_data = @file_get_contents($image_url, false, stream_context_create($opts));
    }

    if (!$raw_data) {
        return false;
    }

    $tmp_file = wp_tempnam($clean_filename);
    file_put_contents($tmp_file, $raw_data);
    $file_array['tmp_name'] = $tmp_file;

    if (is_wp_error($tmp_file)) {
        return false;
    }

    // Thêm vào Media Library
    $id = media_handle_sideload($file_array, $post_id, $desc);
    @unlink($file_array['tmp_name']);

    if (is_wp_error($id)) {
        return false;
    }

    return [
        'id'  => $id,
        'url' => wp_get_attachment_url($id)
    ];
}

$count_success = 0;
$count_skip = 0;

foreach ($urls as $index => $article_url) {
    $num = $index + 1;
    echo "[$num/" . count($urls) . "] Đang xử lý: $article_url ...\n";

    // 2. Fetch HTML bài viết với retry logic
    $html = '';
    $attempts = 0;
    while ($attempts < 3 && empty($html)) {
        $attempts++;
        if ($attempts > 1) {
            sleep(1);
        }
        if (function_exists('curl_init')) {
            $ch = curl_init($article_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_TIMEOUT, 15);
            $html = curl_exec($ch);
            curl_close($ch);
        }
        
        if (!$html) {
            $opts = [
                'http' => [
                    'method' => 'GET',
                    'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36\r\n",
                    'timeout' => 15
                ],
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false
                ]
            ];
            $context = stream_context_create($opts);
            $html = @file_get_contents($article_url, false, $context);
        }
    }
    
    usleep(300000); // Tạm dừng 0.3s tránh rate limit

    if (!$html) {
        echo "   [X] Không tải được HTML của bài viết.\n";
        continue;
    }

    // Suppress libxml errors
    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
    $xpath = new DOMXPath($dom);

    // Bóc tách tiêu đề
    $title_nodes = $xpath->query('//h1[contains(@class, "entry-title")] | //h1');
    $title = '';
    if ($title_nodes->length > 0) {
        $title = trim($title_nodes->item(0)->nodeValue);
    }

    if (empty($title)) {
        echo "   [X] Không tìm thấy tiêu đề bài viết.\n";
        continue;
    }

    // Lấy slug từ URL
    $url_path = trim(parse_url($article_url, PHP_URL_PATH), '/');
    $path_parts = explode('/', $url_path);
    $slug = end($path_parts);

    // Kiểm tra category từ URL path (ví dụ: /articles/travel/best-time... -> category: travel)
    $category_name = 'Blog';
    if (count($path_parts) >= 2) {
        $cat_slug = $path_parts[count($path_parts) - 2];
        if ($cat_slug !== 'articles') {
            $category_name = ucfirst($cat_slug);
        }
    }

    // Bóc tách Ngày đăng & Tác giả nếu có
    $date_nodes = $xpath->query('//meta[@property="article:published_time"]/@content | //span[contains(@class, "published")]');
    $post_date = date('Y-m-d H:i:s');
    if ($date_nodes->length > 0) {
        $raw_date = $date_nodes->item(0)->nodeValue;
        if ($raw_date) {
            $post_date = date('Y-m-d H:i:s', strtotime($raw_date));
        }
    }

    $author_nodes = $xpath->query('//meta[@property="article:author"]/@content | //span[contains(@class, "author")] | //meta[@name="author"]/@content');
    $author_name = 'Vasco Team';
    if ($author_nodes->length > 0) {
        $author_val = trim($author_nodes->item(0)->nodeValue);
        if ($author_val) {
            $author_name = $author_val;
        }
    }

    // Bóc tách Ảnh đại diện (Featured Image)
    $og_img_nodes = $xpath->query('//meta[@property="og:image"]/@content');
    $featured_img_url = '';
    if ($og_img_nodes->length > 0) {
        $featured_img_url = $og_img_nodes->item(0)->nodeValue;
    }

    // Bóc tách Nội dung chính bài viết (div.entry-content hoặc article)
    $content_nodes = $xpath->query('//div[contains(@class, "entry-content")] | //article[contains(@class, "post")]');
    $content_html = '';
    if ($content_nodes->length > 0) {
        $content_elem = $content_nodes->item(0);
        $content_html = $dom->saveHTML($content_elem);
    } else {
        // Fallback
        $body_nodes = $xpath->query('//body');
        if ($body_nodes->length > 0) {
            $content_html = $dom->saveHTML($body_nodes->item(0));
        }
    }

    if (empty($content_html)) {
        echo "   [X] Không bóc tách được nội dung.\n";
        continue;
    }

    // Lọc và làm sạch HTML nội dung
    // 1. Thay thế lazy-load images (data-src, data-rocket-src, srcset...)
    $content_dom = new DOMDocument();
    @$content_dom->loadHTML(mb_convert_encoding($content_html, 'HTML-ENTITIES', 'UTF-8'));
    $content_xpath = new DOMXPath($content_dom);

    $imgs = $content_xpath->query('//img');
    foreach ($imgs as $img) {
        $real_src = '';
        foreach (['data-src', 'data-rocket-src', 'data-lazy-src', 'src'] as $attr) {
            if ($img->hasAttribute($attr)) {
                $val = $img->getAttribute($attr);
                if ($val && strpos($val, 'data:image') === false) {
                    $real_src = $val;
                    break;
                }
            }
        }

        if ($real_src) {
            // Loại bỏ srcset và các attribute thừa
            $img->removeAttribute('srcset');
            $img->removeAttribute('sizes');
            $img->removeAttribute('data-src');
            $img->removeAttribute('data-rocket-src');
            $img->setAttribute('src', $real_src);
        }
    }

    // Xóa các phần thừa của Divi / WP Rocket script nếu có
    $scripts = $content_xpath->query('//script | //style | //iframe');
    foreach ($scripts as $s) {
        $s->parentNode->removeChild($s);
    }

    $clean_content = $content_dom->saveHTML();
    // Bỏ wrapper html/body do DOMDocument thêm vào
    $clean_content = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace(['<html>', '</html>', '<body>', '</body>'], '', $clean_content));

    // 3. Đã có đủ thông tin, tiến hành chèn/cập nhật Bài viết vào Database WordPress
    $existing_post = get_page_by_path($slug, OBJECT, 'post');
    $post_data = [
        'post_title'    => $title,
        'post_content'  => $clean_content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => $slug,
        'post_type'     => 'post',
        'post_date'     => $post_date,
        'post_date_gmt' => get_gmt_from_date($post_date),
    ];

    if ($existing_post) {
        $post_data['ID'] = $existing_post->ID;
        $post_id = wp_update_post($post_data);
        echo "   [✓] Đã cập nhật bài viết ID: $post_id ($title)\n";
    } else {
        $post_id = wp_insert_post($post_data);
        echo "   [+] Đã tạo bài viết mới ID: $post_id ($title)\n";
    }

    if (is_wp_error($post_id)) {
        echo "   [X] Lỗi lưu bài viết: " . $post_id->get_error_message() . "\n";
        continue;
    }

    // Thêm Category
    if ($category_name) {
        $cat_id = wp_create_category($category_name);
        if ($cat_id) {
            wp_set_post_categories($post_id, [$cat_id]);
        }
    }

    // Lưu custom meta nếu có
    update_post_meta($post_id, '_vasco_author_name', $author_name);
    update_post_meta($post_id, '_vasco_original_url', $article_url);

    // 4. Tải và thiết lập Featured Image
    if ($featured_img_url) {
        echo "   [i] Đang tải ảnh đại diện...";
        $img_result = download_image_to_media($featured_img_url, $post_id, "Featured Image - $title");
        if ($img_result && isset($img_result['id'])) {
            set_post_thumbnail($post_id, $img_result['id']);
            echo " Thành công (ID: {$img_result['id']})\n";
        } else {
            echo " Bỏ qua / Thất bại.\n";
        }
    }

    // 5. Tải các ảnh trong bài viết về Media Library và thay URL trong content
    $post_updated_content = get_post_field('post_content', $post_id);
    preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $post_updated_content, $matches);

    if (!empty($matches[1])) {
        $replaced = false;
        foreach (array_unique($matches[1]) as $img_src) {
            // Nếu ảnh chưa nằm trong uploads local thì tải về
            if (strpos($img_src, 'vasco-translator.com') !== false || strpos($img_src, 'http') === 0) {
                $sub_img = download_image_to_media($img_src, $post_id);
                if ($sub_img && isset($sub_img['url'])) {
                    $post_updated_content = str_replace($img_src, $sub_img['url'], $post_updated_content);
                    $replaced = true;
                }
            }
        }

        if ($replaced) {
            wp_update_post([
                'ID'           => $post_id,
                'post_content' => $post_updated_content
            ]);
            echo "   [i] Đã tải và cập nhật ảnh trong nội dung bài viết.\n";
        }
    }

    $count_success++;
    echo "\n";
}

echo "=== HOÀN THÀNH IMPORT ===\n";
echo "Thành công: $count_success bài viết.\n";
