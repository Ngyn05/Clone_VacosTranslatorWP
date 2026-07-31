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
	// 1. Register Custom Post Type: Products (Sản phẩm phiên dịch)
	register_post_type( 'vasco_product', array(
		'labels' => array(
			'name'               => __( 'Máy phiên dịch & Phụ kiện', 'vasco-theme' ),
			'singular_name'      => __( 'Sản phẩm', 'vasco-theme' ),
			'add_new_item'       => __( 'Thêm sản phẩm mới', 'vasco-theme' ),
			'edit_item'          => __( 'Sửa sản phẩm', 'vasco-theme' ),
		),
		'public'              => true,
		'has_archive'          => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => array( 'slug' => 'san-pham' ),
		'capability_type'     => 'post',
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'menu_icon'           => 'dashicons-products',
	) );

	// 2. Register Custom Post Type: Features (Tính năng nổi bật)
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
