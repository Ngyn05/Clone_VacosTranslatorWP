<?php
/**
 * Force clear and rebuild WooCommerce product variations cache
 */
require_once dirname(__FILE__) . '/wp-load.php';

$product = vasco_theme_get_wc_product_by_slug('vasco-translator-q1');
if (!$product) {
	die("Không tìm thấy sản phẩm Q1");
}

$product_id = $product->get_id();
echo "ID sản phẩm cha: " . $product_id . "<br>";

// 1. Xóa cache transients qua WooCommerce chuẩn
if ( function_exists( 'wc_delete_product_transients' ) ) {
	wc_delete_product_transients( $product_id );
}
// Tăng phiên bản cache của WooCommerce
if ( class_exists( 'WC_Cache_Helper' ) ) {
	WC_Cache_Helper::get_transient_version( 'product', true );
}

// 2. Force sản phẩm reload từ DB
$product_variable = new WC_Product_Variable( $product_id );
$variations = $product_variable->get_available_variations();

echo "Tổng số variations sau khi force reload: " . count($variations) . "<br><ul>";
foreach ($variations as $var) {
	echo "<li>ID: " . $var['variation_id'] . " | Attrs: " . json_encode($var['attributes']) . " | Image URL: " . ($var['image']['src'] ?? 'Không có') . "</li>";
}
echo "</ul>";
