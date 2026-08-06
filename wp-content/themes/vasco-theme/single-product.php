<?php
/**
 * Single Product Template (WooCommerce / Custom Product Detail)
 *
 * @package VascoTheme
 */

global $post;
$slug = $post ? $post->post_name : '';

$template_in_dir  = VASCO_THEME_DIR . '/templates/products/page-' . $slug . '.php';
$template_in_root = VASCO_THEME_DIR . '/page-' . $slug . '.php';

if ( file_exists( $template_in_dir ) ) {
	include $template_in_dir;
} elseif ( file_exists( $template_in_root ) ) {
	include $template_in_root;
} else {
	get_header();
	// Standard product detail render using Vasco theme layout
	if ( function_exists( 'vasco_theme_render_product_detail_page' ) ) {
		vasco_theme_render_product_detail_page( $slug );
	}
	get_footer();
}

