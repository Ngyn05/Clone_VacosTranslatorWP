<?php
/**
 * Script Đảm Bảo MỖI BLOG CÓ 1 ÁNH ĐẠI DIỆN ĐỘC QUYỀN VÀ DUY NHẤT (Không Trùng Lặp 100%)
 */

require_once __DIR__ . '/../wp-load.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

echo "=== GÁN MỖI BLOG 1 ÁNH ĐẠI DIỆN ĐỘC QUYỀN ===\n\n";

$posts = get_posts([
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'post_status'    => 'any',
    'orderby'        => 'ID',
    'order'          => 'ASC'
]);

// Lấy danh sách tất cả attachment có trong Media Library
$attachments = get_posts([
    'post_type'      => 'attachment',
    'posts_per_page' => -1,
    'post_status'    => 'inherit'
]);

$all_att_ids = [];
foreach ($attachments as $att) {
    // Chỉ lấy ảnh có định dạng jpeg, jpg, png, webp, svg
    $url = wp_get_attachment_url($att->ID);
    if ($url && preg_match('/\.(jpe?g|png|webp|svg)$/i', $url)) {
        $all_att_ids[] = $att->ID;
    }
}
$all_att_ids = array_unique($all_att_ids);

echo "Tổng số ảnh khả dụng trong Media Library: " . count($all_att_ids) . "\n";
echo "Tổng số bài viết: " . count($posts) . "\n\n";

$used_att_ids = [];

foreach ($posts as $idx => $p) {
    echo "Xử lý Bài viết ID {$p->ID} ({$p->post_title})...\n";

    // 1. Kiểm tra xem bài có <img> riêng trong nội dung không
    $custom_att_id = false;
    preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $p->post_content, $matches);
    if (!empty($matches[1])) {
        foreach ($matches[1] as $img_src) {
            $filename = basename(parse_url($img_src, PHP_URL_PATH));
            global $wpdb;
            $found_id = $wpdb->get_var($wpdb->prepare(
                "SELECT ID FROM {$wpdb->posts} WHERE post_type = 'attachment' AND guid LIKE %s LIMIT 1",
                '%' . $wpdb->esc_like($filename) . '%'
            ));
            if ($found_id && !in_array($found_id, $used_att_ids)) {
                $custom_att_id = $found_id;
                break;
            }
        }
    }

    // 2. Nếu chưa có ảnh độc nhất từ nội dung, chọn ảnh khác chưa được sử dụng trong $all_att_ids
    if (!$custom_att_id) {
        foreach ($all_att_ids as $att_id) {
            if (!in_array($att_id, $used_att_ids)) {
                $custom_att_id = $att_id;
                break;
            }
        }
    }

    // 3. Nếu vẫn hết ảnh độc nhất, tạo 1 file ảnh PNG độc quyền cho bài viết đó bằng GD library
    if (!$custom_att_id) {
        $img = imagecreatetruecolor(800, 500);
        $colors = [
            [227, 6, 19],    // Red
            [44, 62, 80],    // Dark Blue
            [41, 128, 185],  // Blue
            [39, 174, 96],   // Green
            [142, 68, 173],  // Purple
            [211, 84, 0]     // Orange
        ];
        $c = $colors[$idx % count($colors)];
        $bg = imagecolorallocate($img, $c[0], $c[1], $c[2]);
        $txt_color = imagecolorallocate($img, 255, 255, 255);
        imagefill($img, 0, 0, $bg);

        // Tạo tên tệp độc nhất
        $tmp_png = wp_tempnam("vasco_blog_{$p->ID}.png");
        imagepng($img, $tmp_png);
        imagedestroy($img);

        $file_array = [
            'name'     => "vasco-blog-thumb-{$p->ID}.png",
            'tmp_name' => $tmp_png
        ];
        $new_att_id = media_handle_sideload($file_array, $p->ID, "Featured Image - " . $p->post_title);
        @unlink($tmp_png);

        if (!is_wp_error($new_att_id)) {
            $custom_att_id = $new_att_id;
        }
    }

    if ($custom_att_id) {
        set_post_thumbnail($p->ID, $custom_att_id);
        $used_att_ids[] = $custom_att_id;
        $url = wp_get_attachment_url($custom_att_id);
        echo "   [✓] Đã gán Featured Image ĐỘC QUYỀN ID $custom_att_id ($url)\n\n";
    }
}

echo "=== HOÀN THÀNH: GÁN 1 ÁNH ĐẠI DIỆN ĐỘC QUYỀN CHO 100% BÀI VIẾT ===\n";
