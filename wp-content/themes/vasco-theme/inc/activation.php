<?php
/**
 * Auto-create Pages and Slugs in WordPress DB upon Theme Activation
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vasco_theme_after_switch() {
	$json_file = get_template_directory() . '/inc/pages-data.json';
	if ( ! file_exists( $json_file ) ) {
		return;
	}

	$pages_data = json_decode( file_get_contents( $json_file ), true );
	if ( ! is_array( $pages_data ) ) {
		return;
	}

	// Step 1: Create top-level pages first
	$created_ids = array();
	foreach ( $pages_data as $page ) {
		if ( empty( $page['parent'] ) ) {
			$slug  = $page['slug'];
			$title = $page['title'];

			$page_check = get_page_by_path( $slug );
			if ( ! isset( $page_check->ID ) ) {
				$new_page_id = wp_insert_post(
					array(
						'post_title'   => $title,
						'post_name'    => $slug,
						'post_status'  => 'publish',
						'post_type'    => 'page',
						'post_content' => '',
					)
				);
				if ( $new_page_id && ! is_wp_error( $new_page_id ) ) {
					$created_ids[ $slug ] = $new_page_id;
				}
			} else {
				$created_ids[ $slug ] = $page_check->ID;
			}
		}
	}

	// Step 2: Create child pages
	foreach ( $pages_data as $page ) {
		if ( ! empty( $page['parent'] ) ) {
			$slug        = $page['slug'];
			$title       = $page['title'];
			$parent_slug = $page['parent'];

			// Find parent ID
			$parent_id = 0;
			if ( isset( $created_ids[ $parent_slug ] ) ) {
				$parent_id = $created_ids[ $parent_slug ];
			} else {
				$parent_check = get_page_by_path( $parent_slug );
				if ( isset( $parent_check->ID ) ) {
					$parent_id = $parent_check->ID;
				}
			}

			$page_check = get_page_by_path( $slug );
			if ( ! isset( $page_check->ID ) ) {
				wp_insert_post(
					array(
						'post_title'   => $title,
						'post_name'    => $slug,
						'post_status'  => 'publish',
						'post_type'    => 'page',
						'post_content' => '',
						'post_parent'  => $parent_id,
					)
				);
			}
		}
	}

	// Set static front page if not set
	$front_page = get_page_by_path( 'home' );
	if ( $front_page ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page->ID );
	}

	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'vasco_theme_after_switch' );
