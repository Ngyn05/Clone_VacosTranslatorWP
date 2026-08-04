<?php
/**
 * Theme Setup & Custom Template Resolver
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vasco_theme_setup() {
	// Add title tag support
	add_theme_support( 'title-tag' );

	// Add post thumbnails support
	add_theme_support( 'post-thumbnails' );

	// Add custom logo support
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// Add HTML5 markup support
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add WooCommerce Support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Register Navigation Menus
	register_nav_menus(
		array(
			'primary' => __( 'Primary Desktop Menu', 'vasco-theme' ),
			'mobile'  => __( 'Mobile Menu', 'vasco-theme' ),
			'footer'  => __( 'Footer Menu', 'vasco-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'vasco_theme_setup' );

// Turn off WooCommerce Coming Soon mode automatically
add_action( 'init', function () {
	if ( 'yes' === get_option( 'woocommerce_coming_soon' ) ) {
		update_option( 'woocommerce_coming_soon', 'no' );
	}
} );

/**
 * Locate custom page templates in subdirectories under templates/
 */
function vasco_theme_custom_page_template( $template ) {
	if ( is_page() ) {
		$page = get_queried_object();
		if ( $page && ! empty( $page->post_name ) ) {
			$slug           = $page->post_name;
			$possible_files = array(
				"templates/pages/page-{$slug}.php",
				"templates/products/page-{$slug}.php",
				"templates/articles/page-{$slug}.php",
				"templates/page-{$slug}.php",
			);
			foreach ( $possible_files as $file ) {
				$located = locate_template( $file );
				if ( $located ) {
					return $located;
				}
			}
		}
	}
	return $template;
}
add_filter( 'page_template', 'vasco_theme_custom_page_template' );
