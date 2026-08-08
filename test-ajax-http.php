<?php
/**
 * Run Product Sync to update variation status to publish
 */
require_once dirname(__FILE__) . '/wp-load.php';

if ( ! function_exists( 'vasco_theme_sync_products' ) ) {
	die( 'Hàm đồng bộ sản phẩm không tồn tại.' );
}

echo "=== ĐANG CHẠY ĐỒNG BỘ CẬP NHẬT TRẠNG THÁI VARIATIONS SANG PUBLISH ===<br>";
$result = vasco_theme_sync_products();

if ( $result ) {
	echo "ĐỒNG BỘ THÀNH CÔNG!<br>";
} else {
	echo "ĐỒNG BỘ THẤT BẠI!<br>";
}

// In trạng thái thực tế của các variation trong DB
$products = wc_get_products( array(
	'type'   => 'variable',
	'limit'  => 5,
	'status' => 'publish',
) );

echo "<h3>Trạng thái các variations sau khi đồng bộ:</h3>";
foreach ( $products as $product ) {
	echo "<b>Sản phẩm: " . $product->get_name() . "</b><br><ul>";
	$variations = $product->get_available_variations();
	foreach ( $variations as $var ) {
		$var_obj = wc_get_product($var['variation_id']);
		$status = $var_obj ? $var_obj->get_status() : 'Không rõ';
		echo "<li>ID: " . $var['variation_id'] . " | Màu: " . json_encode($var['attributes']) . " | Status: " . $status . "</li>";
	}
	echo "</ul>";
}
