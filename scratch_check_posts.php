<?php
require_once __DIR__ . '/wp-load.php';

$posts = get_posts([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'any'
]);

echo "Total WordPress posts in DB: " . count($posts) . "\n";
foreach ($posts as $p) {
    echo "ID: {$p->ID} | Slug: {$p->post_name} | Title: {$p->post_title} | Status: {$p->post_status}\n";
}
