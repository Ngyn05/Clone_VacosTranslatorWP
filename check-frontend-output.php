<?php
/**
 * Test output of get_available_variations to check if the correct image is returned
 */
require_once dirname(__FILE__) . '/wp-load.php';

$product = vasco_theme_get_wc_product_by_slug('vasco-translator-q1');
if (!$product) {
	die("Không tìm thấy sản phẩm Q1");
}

$variations = $product->get_available_variations();
echo "<h3>Dữ liệu variations trả về từ get_available_variations():</h3>";
foreach ($variations as $var) {
	echo "Variation ID: " . $var['variation_id'] . "<br>";
	echo "Attributes: " . json_encode($var['attributes']) . "<br>";
	echo "Image SRC: " . ($var['image']['src'] ?? 'Không có') . "<br><hr>";
}
