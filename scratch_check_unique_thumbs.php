<?php
require_once __DIR__ . '/wp-load.php';

$posts = get_posts([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'any'
]);

echo "Kiểm tra trùng lặp Featured Image giữa các bài viết:\n";
$used_thumbs = [];
foreach ($posts as $p) {
    $thumb_id = get_post_thumbnail_id($p->ID);
    $thumb_url = wp_get_attachment_url($thumb_id);
    echo "ID: {$p->ID} | Slug: {$p->post_name} | Thumb ID: {$thumb_id} | URL: {$thumb_url}\n";
    $used_thumbs[$thumb_id][] = $p->ID;
}

echo "\nCác Thumb ID bị trùng:\n";
foreach ($used_thumbs as $tid => $pids) {
    if (count($pids) > 1) {
        echo "Thumb ID $tid được dùng chung cho các bài ID: " . implode(', ', $pids) . "\n";
    }
}
