<?php
require_once __DIR__ . '/wp-load.php';

$posts = get_posts([
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'post_status'    => 'any'
]);

echo "Danh sách bài viết và ngôn ngữ hiện tại:\n";
foreach ($posts as $p) {
    echo "ID: {$p->ID} | Slug: {$p->post_name}\n";
    echo "   Title: {$p->post_title}\n";
    $sample_content = mb_substr(strip_tags($p->post_content), 0, 100);
    echo "   Content Sample: {$sample_content}...\n\n";
}
