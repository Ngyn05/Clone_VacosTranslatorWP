<?php
require_once __DIR__ . '/wp-load.php';

$posts = get_posts([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'any'
]);

echo "Tổng số bài viết: " . count($posts) . "\n";
foreach ($posts as $p) {
    $has_thumb = has_post_thumbnail($p->ID);
    $thumb_id = get_post_thumbnail_id($p->ID);
    $thumb_url = $has_thumb ? wp_get_attachment_url($thumb_id) : 'KHÔNG CÓ ÁNH';
    echo "ID: {$p->ID} | Slug: {$p->post_name} | Featured Image: {$thumb_url}\n";
}
