<?php
/**
 * Template Name: Clean Page page-translators.php
 *
 * @package VascoTheme
 */

get_header();

vasco_theme_render_catalog_page(
	array(
		'active_tab'    => 'translators',
		'heading'       => 'Máy dịch điện tử',
		'category_slug' => 'translators',
		'show_compare'  => true,
	)
);

get_footer();
