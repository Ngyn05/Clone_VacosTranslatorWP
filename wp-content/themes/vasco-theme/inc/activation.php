<?php
/**
 * Auto-create Pages and Slugs in WordPress DB upon Theme Activation
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vasco_theme_sync_pages() {
	$json_file = get_template_directory() . '/inc/pages-data.json';
	if ( ! file_exists( $json_file ) ) {
		return false;
	}

	$pages_data = json_decode( file_get_contents( $json_file ), true );
	if ( ! is_array( $pages_data ) ) {
		return false;
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
	return true;
}

function vasco_theme_after_switch() {
	vasco_theme_sync_pages();
}
add_action( 'after_switch_theme', 'vasco_theme_after_switch' );

/**
 * Add WP Admin Page for Syncing Vasco Pages manually
 */
function vasco_theme_add_admin_menu() {
	add_theme_page(
		'Đồng bộ Trang Vasco',
		'Đồng bộ Trang Vasco',
		'manage_options',
		'vasco-sync-pages',
		'vasco_theme_admin_sync_page_html'
	);
}
add_action( 'admin_menu', 'vasco_theme_add_admin_menu' );

function vasco_theme_admin_sync_page_html() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$message = '';
	if ( isset( $_POST['vasco_do_sync'] ) && check_admin_referer( 'vasco_sync_action', 'vasco_sync_nonce' ) ) {
		if ( vasco_theme_sync_pages() ) {
			$message = '<div class="notice notice-success is-dismissible"><p><strong>Thành công!</strong> Đã khởi tạo và đồng bộ tất cả trang Vasco vào cơ sở dữ liệu WordPress.</p></div>';
		} else {
			$message = '<div class="notice notice-error is-dismissible"><p>Có lỗi xảy ra khi đọc file pages-data.json.</p></div>';
		}
	}
	?>
	<div class="wrap">
		<h1>Đồng bộ Trang Vasco Theme</h1>
		<?php echo $message; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<p>Công cụ này giúp bạn khởi tạo tự động toàn bộ danh sách trang (URL & Slugs) của Vasco Theme vào Cơ sở dữ liệu WordPress sau khi upload theme lên Server mà không cần tạo trang thủ công.</p>
		<form method="post" action="">
			<?php wp_nonce_field( 'vasco_sync_action', 'vasco_sync_nonce' ); ?>
			<p>
				<input type="submit" name="vasco_do_sync" class="button button-primary button-hero" value="⚡ Tạo / Đồng bộ tất cả trang Vasco ngay" />
			</p>
		</form>
	</div>
	<?php
}

