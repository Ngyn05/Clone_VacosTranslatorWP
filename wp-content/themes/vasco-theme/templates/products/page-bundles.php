<?php
/**
 * Template Name: Clean Page page-bundles.php
 *
 * @package VascoTheme
 */

get_header();

vasco_theme_render_catalog_page(
	array(
		'active_tab'    => 'bundles',
		'heading'       => 'Bộ sản phẩm',
		'category_slug' => 'bundles',
		'show_compare'  => true,
	)
);

get_footer();
