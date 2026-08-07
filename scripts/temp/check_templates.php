<?php
// Script kiem tra template cua trang All Products
$wpLoad = dirname(__FILE__) . '/wp-load.php';
require_once($wpLoad);

global $wpdb;

$results = $wpdb->get_results("
    SELECT p.ID, p.post_title, p.post_name, pm.meta_value as template 
    FROM {$wpdb->posts} p 
    LEFT JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id AND pm.meta_key = '_wp_page_template' 
    WHERE p.post_type = 'page' AND p.post_status = 'publish' 
    ORDER BY p.ID
");

foreach ($results as $row) {
    echo "ID: {$row->ID} | Title: {$row->post_title} | Slug: {$row->post_name} | Template: {$row->template}\n";
}
