<?php
require_once __DIR__ . '/../wp-load.php';

$attachments = get_posts([
    'post_type'      => 'attachment',
    'posts_per_page' => 20,
    'post_status'    => 'inherit'
]);

echo "Danh sách Attachment ID khả dụng:\n";
$attachment_ids = [];
foreach ($attachments as $att) {
    echo "Attachment ID: {$att->ID} | Title: {$att->post_title} | URL: " . wp_get_attachment_url($att->ID) . "\n";
    $attachment_ids[] = $att->ID;
}

$posts_missing = get_posts([
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'post_status'    => 'any'
]);

$fixed = 0;
foreach ($posts_missing as $idx => $p) {
    if (!has_post_thumbnail($p->ID)) {
        // Gán attachment ID hợp lệ từ danh sách Media Library
        $assigned_att_id = $attachment_ids[$idx % count($attachment_ids)];
        set_post_thumbnail($p->ID, $assigned_att_id);
        echo "[✓] Đã gán Attachment ID $assigned_att_id cho Bài viết ID {$p->ID} ({$p->post_title})\n";
        $fixed++;
    }
}

echo "\nHOÀN THÀNH: Đã gán Featured Image cho $fixed bài viết thiếu.\n";
