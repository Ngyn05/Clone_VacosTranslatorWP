<?php
require_once __DIR__ . '/wp-load.php';
$posts = get_posts([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'any'
]);
$data = [];
foreach ($posts as $p) {
    $data[] = [
        'ID' => $p->ID,
        'post_title' => $p->post_title,
        'post_content' => $p->post_content,
        'post_name' => $p->post_name
    ];
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
