<?php
require_once __DIR__ . '/wp-load.php';
$data = json_decode(file_get_contents('scratch_save_data.json'), true);
if ($data && isset($data['ID'])) {
    wp_update_post([
        'ID'           => $data['ID'],
        'post_title'   => $data['post_title'],
        'post_content' => $data['post_content']
    ]);
    echo "SUCCESS";
}
