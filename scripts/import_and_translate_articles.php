<?php
/**
 * Script Cào, Dịch Tiếng Việt theo Batch và Import Bài Viết từ vasco-translator.com vào WordPress Local
 */

set_time_limit(0);
ini_set('memory_limit', '512M');

require_once __DIR__ . '/../wp-load.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/taxonomy.php';

echo "=== BẮT ĐẦU CÀO, DỊCH TIẾNG VIỆT SIÊU TỐC VÀ IMPORT BÀI VIẾT ===\n\n";

/**
 * Hàm dịch danh sách văn bản sang Tiếng Việt theo Batch
 */
function translate_batch_php($texts, $target_lang = 'vi') {
    if (empty($texts)) return [];
    
    $clean_texts = array_map('trim', $texts);
    $valid_texts = array_values(array_filter($clean_texts, function($t) {
        return !empty($t) && strlen($t) > 1 && !is_numeric($t) && strpos($t, 'http') !== 0;
    }));

    if (empty($valid_texts)) return $texts;

    // Google Translate giới hạn độ dài URL, tách thành các chunk tối đa 2500 ký tự
    $chunks = [];
    $current_chunk = [];
    $current_len = 0;
    $delimiter = "\n---DIV---\n";

    foreach ($valid_texts as $t) {
        if ($current_len + strlen($t) + strlen($delimiter) > 2200) {
            $chunks[] = $current_chunk;
            $current_chunk = [$t];
            $current_len = strlen($t);
        } else {
            $current_chunk[] = $t;
            $current_len += strlen($t) + strlen($delimiter);
        }
    }
    if (!empty($current_chunk)) {
        $chunks[] = $current_chunk;
    }

    $map = [];
    $opts = [
        'http' => [
            'method'  => 'GET',
            'header'  => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36\r\n",
            'timeout' => 15
        ],
        'ssl' => ['verify_peer' => false, 'verify_peer_name' => false]
    ];

    foreach ($chunks as $chunk) {
        $joined = implode($delimiter, $chunk);
        $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=auto&tl=" . $target_lang . "&dt=t&q=" . urlencode($joined);
        
        $res = @file_get_contents($url, false, stream_context_create($opts));
        if ($res) {
            $json = json_decode($res, true);
            if (isset($json[0]) && is_array($json[0])) {
                $translated_str = '';
                foreach ($json[0] as $sentence) {
                    if (isset($sentence[0])) {
                        $translated_str .= $sentence[0];
                    }
                }
                $translated_parts = explode("---DIV---", $translated_str);
                foreach ($chunk as $idx => $orig) {
                    $map[$orig] = isset($translated_parts[$idx]) ? trim($translated_parts[$idx]) : $orig;
                }
            }
        }
    }

    $result = [];
    foreach ($texts as $t) {
        $trimmed = trim($t);
        $result[] = isset($map[$trimmed]) ? $map[$trimmed] : $t;
    }
    return $result;
}

/**
 * Hàm tải ảnh về WordPress Media Library
 */
function download_image_to_media($image_url, $post_id = 0, $desc = null) {
    if (empty($image_url) || strpos($image_url, 'data:image') === 0) {
        return false;
    }

    if (strpos($image_url, '//') === 0) {
        $image_url = 'https:' . $image_url;
    }

    $filename = basename(parse_url($image_url, PHP_URL_PATH));
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

    $file_array = [];
    $file_array['name'] = $clean_filename;

    $raw_data = false;
    if (function_exists('curl_init')) {
        $ch = curl_init($image_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        $raw_data = curl_exec($ch);
        curl_close($ch);
    }
    if (!$raw_data) {
        $opts = [
            'http' => ['header' => "User-Agent: Mozilla/5.0\r\n", 'timeout' => 15],
            'ssl'  => ['verify_peer' => false, 'verify_peer_name' => false]
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

// 1. Đọc Sitemap lấy danh sách URL bài viết
$sitemap_url = 'https://vasco-translator.com/articles/post-sitemap.xml';
$context = stream_context_create([
    'http' => [
        'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n",
        'timeout' => 15
    ],
    'ssl' => ['verify_peer' => false, 'verify_peer_name' => false]
]);

$sitemap_xml = @file_get_contents($sitemap_url, false, $context);
$urls = [];

if ($sitemap_xml) {
    preg_match_all('/<loc>(https:\/\/[^<]+)<\/loc>/i', $sitemap_xml, $matches);
    if (!empty($matches[1])) {
        $urls = array_unique($matches[1]);
    }
}

if (empty($urls)) {
    echo "[!] Không tải được sitemap, dùng danh sách bài chính...\n";
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

$count_success = 0;

foreach ($urls as $index => $article_url) {
    $num = $index + 1;
    echo "[$num/" . count($urls) . "] Đang xử lý bài viết: $article_url ...\n";

    // 2. Fetch HTML bài viết
    $html = '';
    for ($attempt = 1; $attempt <= 3; $attempt++) {
        $html = @file_get_contents($article_url, false, $context);
        if ($html) break;
        sleep(1);
    }

    if (!$html) {
        echo "   [X] Không tải được HTML của bài viết.\n";
        continue;
    }

    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
    $xpath = new DOMXPath($dom);

    // Tiêu đề
    $title_nodes = $xpath->query('//h1[contains(@class, "entry-title")] | //h1');
    $title_en = '';
    if ($title_nodes->length > 0) {
        $title_en = trim($title_nodes->item(0)->nodeValue);
    }

    if (empty($title_en)) {
        echo "   [X] Không bóc tách được tiêu đề.\n";
        continue;
    }

    // Dịch tiêu đề
    $title_vi = translate_batch_php([$title_en])[0];
    echo "   [✓] Tiêu đề Tiếng Việt: $title_vi\n";

    // Slug & Category
    $url_path = trim(parse_url($article_url, PHP_URL_PATH), '/');
    $path_parts = explode('/', $url_path);
    $slug = end($path_parts);

    $category_name = 'Blog';
    if (count($path_parts) >= 2) {
        $cat_slug = $path_parts[count($path_parts) - 2];
        if ($cat_slug !== 'articles') {
            $category_name = ucfirst($cat_slug);
        }
    }

    // Ngày đăng & Tác giả
    $date_nodes = $xpath->query('//meta[@property="article:published_time"]/@content');
    $post_date = date('Y-m-d H:i:s');
    if ($date_nodes->length > 0) {
        $raw_date = $date_nodes->item(0)->nodeValue;
        if ($raw_date) {
            $post_date = date('Y-m-d H:i:s', strtotime($raw_date));
        }
    }

    $author_nodes = $xpath->query('//meta[@property="article:author"]/@content | //meta[@name="author"]/@content');
    $author_name = 'Vasco Team';
    if ($author_nodes->length > 0) {
        $author_val = trim($author_nodes->item(0)->nodeValue);
        if ($author_val) {
            $author_name = $author_val;
        }
    }

    // Featured Image
    $og_img_nodes = $xpath->query('//meta[@property="og:image"]/@content');
    $featured_img_url = '';
    if ($og_img_nodes->length > 0) {
        $featured_img_url = $og_img_nodes->item(0)->nodeValue;
    }

    // Content HTML
    $content_nodes = $xpath->query('//div[contains(@class, "entry-content")] | //article[contains(@class, "post")]');
    $content_html = '';
    if ($content_nodes->length > 0) {
        $content_elem = $content_nodes->item(0);
        $content_html = $dom->saveHTML($content_elem);
    } else {
        $body_nodes = $xpath->query('//body');
        if ($body_nodes->length > 0) {
            $content_html = $dom->saveHTML($body_nodes->item(0));
        }
    }

    if (empty($content_html)) {
        echo "   [X] Không bóc tách được nội dung.\n";
        continue;
    }

    // Xử lý DOM nội dung bài viết
    $content_dom = new DOMDocument();
    @$content_dom->loadHTML(mb_convert_encoding($content_html, 'HTML-ENTITIES', 'UTF-8'));
    $content_xpath = new DOMXPath($content_dom);

    // Clean scripts, styles
    $unwanted = $content_xpath->query('//script | //style | //iframe | //header | //footer');
    foreach ($unwanted as $u) {
        $u->parentNode->removeChild($u);
    }

    // Sửa đường dẫn ảnh lazy load
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
            $img->removeAttribute('srcset');
            $img->removeAttribute('sizes');
            $img->removeAttribute('data-src');
            $img->removeAttribute('data-rocket-src');
            $img->setAttribute('src', $real_src);
        }
    }

    // Thu thập tất cả thẻ chứa văn bản để dịch theo Batch
    $text_nodes = $content_xpath->query('//p | //h2 | //h3 | //h4 | //h5 | //h6 | //li | //td | //th | //blockquote | //figcaption');
    $nodes_to_translate = [];
    $orig_texts_list = [];

    foreach ($text_nodes as $node) {
        $orig_text = trim($node->nodeValue);
        if (!empty($orig_text) && strlen($orig_text) > 1 && !is_numeric($orig_text)) {
            $nodes_to_translate[] = $node;
            $orig_texts_list[] = $orig_text;
        }
    }

    if (!empty($orig_texts_list)) {
        $translated_texts = translate_batch_php($orig_texts_list);
        foreach ($nodes_to_translate as $i => $node) {
            if (isset($translated_texts[$i]) && !empty($translated_texts[$i])) {
                $node->nodeValue = htmlspecialchars($translated_texts[$i], ENT_QUOTES, 'UTF-8');
            }
        }
    }

    $clean_content = $content_dom->saveHTML();
    $clean_content = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace(['<html>', '</html>', '<body>', '</body>'], '', $clean_content));

    // 3. Tạo/Cập nhật Bài viết vào CSDL WordPress
    $existing_post = get_page_by_path($slug, OBJECT, 'post');
    $post_data = [
        'post_title'    => $title_vi,
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
        echo "   [✓] Đã cập nhật bài viết Tiếng Việt ID: $post_id ($slug)\n";
    } else {
        $post_id = wp_insert_post($post_data);
        echo "   [+] Đã chèn bài viết Tiếng Việt mới ID: $post_id ($slug)\n";
    }

    if (is_wp_error($post_id)) {
        echo "   [X] Lỗi lưu WP: " . $post_id->get_error_message() . "\n";
        continue;
    }

    // Category
    if ($category_name) {
        $cat_id = wp_create_category($category_name);
        if ($cat_id) {
            wp_set_post_categories($post_id, [$cat_id]);
        }
    }

    update_post_meta($post_id, '_vasco_author_name', $author_name);
    update_post_meta($post_id, '_vasco_original_url', $article_url);

    // Featured Image
    if ($featured_img_url) {
        echo "   [i] Đang tải ảnh đại diện...";
        $img_result = download_image_to_media($featured_img_url, $post_id, "Featured Image - $title_vi");
        if ($img_result && isset($img_result['id'])) {
            set_post_thumbnail($post_id, $img_result['id']);
            echo " Thành công (ID: {$img_result['id']})\n";
        } else {
            echo " Thất bại / Bỏ qua.\n";
        }
    }

    // Tải hình ảnh trong bài viết
    $post_updated_content = get_post_field('post_content', $post_id);
    preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $post_updated_content, $matches);

    if (!empty($matches[1])) {
        $replaced = false;
        foreach (array_unique($matches[1]) as $img_src) {
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
            echo "   [i] Đã lưu hình ảnh bài viết vào thư mục uploads local.\n";
        }
    }

    $count_success++;
    echo "\n";
}

echo "=== HOÀN THÀNH DỊCH VÀ IMPORT $count_success BÀI VIẾT TIẾNG VIỆT ===\n";
