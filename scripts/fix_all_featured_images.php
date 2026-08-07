<?php
/**
 * Script gán Featured Image đầy đủ cho tất cả bài viết trong WordPress DB
 */

require_once __DIR__ . '/../wp-load.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

echo "=== SỬA VÀ BỔ SUNG FEATURED IMAGE CHO TẤT CẢ BÀI VIẾT ===\n\n";

$posts = get_posts([
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'post_status'    => 'any'
]);

// Danh sách ảnh fallback Vasco chất lượng cao nếu bài không có ảnh gốc
$fallback_images = [
    'http://vacos.local/wp-content/uploads/2023/07/2026_07-Blog-Travel_1200x750_01.jpg',
    'http://vacos.local/wp-content/uploads/2022/07/All-Vasco-V4-2.jpg',
    'http://vacos.local/wp-content/uploads/2023/07/blog-etiq-01.jpg',
    'http://vacos.local/wp-content/uploads/2023/05/news-4.jpeg',
];

function download_image_to_media_fix($image_url, $post_id = 0) {
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
        "SELECT ID FROM {$wpdb->posts} WHERE post_type = 'attachment' AND (guid LIKE %s OR post_name LIKE %s) LIMIT 1",
        '%' . $wpdb->esc_like($clean_filename) . '%',
        '%' . $wpdb->esc_like(pathinfo($clean_filename, PATHINFO_FILENAME)) . '%'
    ));

    if ($existing_id) {
        return $existing_id;
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
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $raw_data = curl_exec($ch);
        curl_close($ch);
    }
    if (!$raw_data) {
        $opts = [
            'http' => ['header' => "User-Agent: Mozilla/5.0\r\n", 'timeout' => 5],
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

    $id = media_handle_sideload($file_array, $post_id);
    @unlink($file_array['tmp_name']);

    return is_wp_error($id) ? false : $id;
}

$fixed_count = 0;

foreach ($posts as $idx => $p) {
    $has_thumb = has_post_thumbnail($p->ID);
    if ($has_thumb) {
        $thumb_id = get_post_thumbnail_id($p->ID);
        echo "✓ ID {$p->ID} ({$p->post_title}): Đã có Featured Image (ID: $thumb_id)\n";
        continue;
    }

    echo "[!] ID {$p->ID} ({$p->post_title}): Đang tìm/gán Featured Image...\n";

    $thumb_id = false;

    // 1. Tìm ảnh <img> đầu tiên trong post_content
    preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $p->post_content, $matches);
    if (!empty($matches[1])) {
        foreach ($matches[1] as $img_src) {
            if (empty($img_src) || strpos($img_src, 'data:image') === 0) continue;
            
            // Tìm attachment ID nếu ảnh đã có trong media library local
            $filename = basename(parse_url($img_src, PHP_URL_PATH));
            global $wpdb;
            $existing_id = $wpdb->get_var($wpdb->prepare(
                "SELECT ID FROM {$wpdb->posts} WHERE post_type = 'attachment' AND guid LIKE %s LIMIT 1",
                '%' . $wpdb->esc_like($filename) . '%'
            ));

            if ($existing_id) {
                $thumb_id = $existing_id;
                echo "   -> Tìm thấy ảnh trong bài viết: Attachment ID $existing_id\n";
                break;
            } else {
                // Tải ảnh từ URL ngoài
                $downloaded_id = download_image_to_media_fix($img_src, $p->ID);
                if ($downloaded_id) {
                    $thumb_id = $downloaded_id;
                    echo "   -> Tải và đính kèm ảnh bài viết: Attachment ID $downloaded_id\n";
                    break;
                }
            }
        }
    }

    // 2. Nếu không tìm được ảnh từ bài viết, chọn ảnh fallback
    if (!$thumb_id) {
        $fallback_url = $fallback_images[$idx % count($fallback_images)];
        $thumb_id = download_image_to_media_fix($fallback_url, $p->ID);
        echo "   -> Gán ảnh fallback Vasco: Attachment ID $thumb_id\n";
    }

    if ($thumb_id) {
        set_post_thumbnail($p->ID, $thumb_id);
        $fixed_count++;
        echo "   [✓] Đã thiết lập Featured Image thành công cho ID {$p->ID}\n";
    }
}

echo "\n=== HOÀN THÀNH: Đã gán thành công Featured Image cho $fixed_count bài viết thiếu ===\n";
