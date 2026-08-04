<?php
/**
 * Custom Post Types Registration
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vasco_theme_register_post_types() {
	// Register Custom Post Type: Features (Tính năng nổi bật)
	register_post_type( 'vasco_feature', array(
		'labels' => array(
			'name'               => __( 'Tính năng nổi bật', 'vasco-theme' ),
			'singular_name'      => __( 'Tính năng', 'vasco-theme' ),
		),
		'public'              => true,
		'has_archive'          => false,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'menu_icon'           => 'dashicons-star-filled',
	) );
}
add_action( 'init', 'vasco_theme_register_post_types' );
