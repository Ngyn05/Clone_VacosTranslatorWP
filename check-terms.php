<?php
/**
 * Check taxonomies and terms of Q1
 */
require_once dirname(__FILE__) . '/wp-load.php';

$product = vasco_theme_get_wc_product_by_slug('vasco-translator-q1');
if (!$product) {
	die("Không tìm thấy sản phẩm Q1");
}

$product_id = $product->get_id();
echo "ID sản phẩm: " . $product_id . "<br>";

$taxonomies = get_object_taxonomies( 'product' );
echo "Các taxonomies của product:<br><ul>";
foreach ($taxonomies as $tax) {
	$terms = get_the_terms($product_id, $tax);
	if ($terms && !is_wp_error($terms)) {
		echo "<li>Taxonomy: <b>$tax</b> | Số terms: " . count($terms) . " | Terms: ";
		$t_names = array();
		foreach ($terms as $t) {
			$t_names[] = $t->name . " (" . $t->slug . ")";
		}
		echo implode(', ', $t_names) . "</li>";
	}
}
echo "</ul>";
