<?php
/**
 * Single Product Template (WooCommerce / Custom Product Detail)
 *
 * @package VascoTheme
 */

global $post;
$slug = $post ? $post->post_name : '';

$custom_template = VASCO_THEME_DIR . '/page-' . $slug . '.php';

if ( file_exists( $custom_template ) ) {
	include $custom_template;
} else {
	get_header();
	// Standard product detail render using Vasco theme layout
	vasco_theme_render_product_detail_page( $slug );
	get_footer();
}

