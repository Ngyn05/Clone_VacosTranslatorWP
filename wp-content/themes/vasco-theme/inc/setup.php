<?php
/**
 * Theme Setup
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
			'primary'   => __( 'Primary Desktop Menu', 'vasco-theme' ),
			'mobile'    => __( 'Mobile Menu', 'vasco-theme' ),
			'footer'    => __( 'Footer Menu', 'vasco-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'vasco_theme_setup' );
