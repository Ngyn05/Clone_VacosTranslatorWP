<?php
/**
 * Script gán MỖI BLOG 1 FEATURED IMAGE ĐỘC QUYỀN VÀ DUY NHẤT
 */

set_time_limit(0);
require_once __DIR__ . '/../wp-load.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

echo "=== GÁN MỖI BLOG 1 ÁNH ĐẠI DIỆN DUY NHẤT ===\n\n";

// Map slug bài viết với URL ảnh gốc độc quyền từ vasco-translator.com
$unique_images_map = [
    'vasco-expert-how-hotels-overcome-world-cup-language-barriers' => 'https://vasco-translator.com/articles/wp-content/uploads/2026/06/Aleksanderalski-crop.jpeg',
    'how-do-translation-earbuds-work'                              => 'https://vasco-translator.com/articles/wp-content/uploads/2026/03/9f7ede54-5052-4e6f-b446-837a6b834a3f.jpg',
    'best-time-to-visit-japan'                                     => 'https://vasco-translator.com/articles/wp-content/uploads/2026/03/d2b6d218-e526-4862-aeca-d12ecdc4c9cc.jpeg',
    'exploring-the-celtic-languages-from-the-irish-language-to-the-manx-gaelic' => 'https://vasco-translator.com/articles/wp-content/uploads/2026/02/2c3e4a23-822c-475e-bb34-dc6da32fb8e7.jpeg',
    'thank-you-in-different-languages'                             => 'https://vasco-translator.com/articles/wp-content/uploads/2026/01/da3844b1-96d4-4e46-a1a3-6ae7a9b676bc.jpeg',
    'top-10-best-christmas-markets-in-europe'                      => 'https://vasco-translator.com/articles/wp-content/uploads/2025/11/blogpost-christmas_markets-2025-01-okladka.jpg',
    'spooky-travel-destinations'                                   => 'https://vasco-translator.com/articles/wp-content/uploads/2025/10/e4141f2e-db60-4674-ad69-02a1bbb2f593.jpeg',
    'fall-travel-ideas-hoa-hoa-season'                             => 'https://vasco-translator.com/articles/wp-content/uploads/2025/10/blogpost-hoa_hoa-2025-01-okladka.jpg',
    'languages-of-star-trek-klingon-vs-vulcan'                     => 'https://vasco-translator.com/articles/wp-content/uploads/2025/10/Blog_2026_Klingon_01.jpg',
    'ngon-ngu-it-nguoi-noi-nhat-tren-the-gioi-la-gi'               => 'http://vacos.local/wp-content/uploads/2026/08/ngongu3-1690256889.jpg',
    'ngon-ngu-co-nhat-duoc-biet-den-la-gi'                        => 'http://vacos.local/wp-content/uploads/2026/08/OIP.webp',
    'co-bao-nhieu-nguoi-noi-duoc-nhieu-hon-mot-ngon-ngu'          => 'http://vacos.local/wp-content/uploads/2026/08/OIP-1-e1785934040649.webp',
    'nhung-quoc-gia-nao-su-dung-tieng-tay-ban-nha-la-ngon-ngu-chinh-thuc' => 'http://vacos.local/wp-content/uploads/2026/08/quoc-gia-su-dung-tieng-tay-.jpg',
    'pmm-trains-iraqi-medics'                                      => 'http://vacos.local/wp-content/uploads/2023/07/News-3.jpg',
    'good-manners-while-traveling'                                 => 'http://vacos.local/wp-content/uploads/2023/07/blog-etiq-01.jpg',
    'new-visual-identity-for-vasco'                                => 'http://vacos.local/wp-content/uploads/2023/05/news-4.jpeg',
    'pmm-vasco-visit-to-jordan'                                    => 'http://vacos.local/wp-content/uploads/2022/11/News-8.jpg',
    'vasco-supports-minority-rights-group'                         => 'http://vacos.local/wp-content/uploads/2022/09/pobrane.png',
    'design-oscar-for-vasco-translator-v4'                         => 'http://vacos.local/wp-content/uploads/2022/08/news_8493_02.jpg',
    'vasco-translator-v4-enters-the-market'                        => 'http://vacos.local/wp-content/uploads/2022/07/All-Vasco-V4-2.jpg',
    'vasco-with-the-polish-medical-mission'                        => 'http://vacos.local/wp-content/uploads/2022/03/News-13.jpg.webp',
];

function download_unique_image($image_url, $post_id, $post_slug) {
    if (empty($image_url)) return false;

    // Tạo filename độc nhất gắn slug bài viết
    $ext = pathinfo(parse_url($image_url, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
    $unique_filename = "featured-" . $post_slug . "." . $ext;

    global $wpdb;
    $existing_id = $wpdb->get_var($wpdb->prepare(
        "SELECT ID FROM {$wpdb->posts} WHERE post_type = 'attachment' AND post_name = %s LIMIT 1",
        "featured-" . $post_slug
    ));

    if ($existing_id) {
        return $existing_id;
    }

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

    $tmp_file = wp_tempnam($unique_filename);
    file_put_contents($tmp_file, $raw_data);

    $file_array = [
        'name'     => $unique_filename,
        'tmp_name' => $tmp_file
    ];

    $id = media_handle_sideload($file_array, $post_id, "Featured Image - " . $post_slug);
    @unlink($tmp_file);

    return is_wp_error($id) ? false : $id;
}

$posts = get_posts([
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'post_status'    => 'any'
]);

$success_count = 0;

foreach ($posts as $p) {
    $slug = $p->post_name;
    echo "Processing Post ID {$p->ID} ($slug)...\n";

    $image_url = isset($unique_images_map[$slug]) ? $unique_images_map[$slug] : '';

    if (!$image_url) {
        // Fallback: Lấy URL từ <img> trong nội dung bài nếu chưa có trong map
        preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $p->post_content, $matches);
        if (!empty($matches[1][0])) {
            $image_url = $matches[1][0];
        }
    }

    if ($image_url) {
        $att_id = download_unique_image($image_url, $p->ID, $slug);
        if ($att_id) {
            set_post_thumbnail($p->ID, $att_id);
            echo "   [✓] Đã gán Featured Image độc quyền ID $att_id cho bài $slug\n";
            $success_count++;
        } else {
            echo "   [X] Thất bại tải ảnh từ $image_url\n";
        }
    }
}

echo "\n=== HOÀN THÀNH: Đã gán 1 Featured Image ĐỘC QUYỀN & DUY NHẤT cho $success_count bài viết ===\n";
