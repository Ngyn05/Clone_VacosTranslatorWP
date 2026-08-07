<?php
/**
 * Template Name: Clean Page page-all-products.php
 *
 * @package VascoTheme
 */

get_header();

vasco_theme_render_catalog_page(
	array(
		'active_tab'    => 'all-products',
		'heading'       => 'Tất cả sản phẩm',
		'category_slug' => '',
		'show_compare'  => true,
	)
);

get_footer();
