<?php
/**
 * Auto-create Pages and Slugs in WordPress DB upon Theme Activation
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vasco_theme_sync_pages( $clean_old = false ) {
	$json_file = get_template_directory() . '/inc/pages-data.json';
	$pages_data = file_exists( $json_file ) ? json_decode( file_get_contents( $json_file ), true ) : array();
	$pages_data = is_array( $pages_data ) ? $pages_data : array();

	// Tự động quét tất cả file page-*.php trong thư mục theme để không bỏ sót bất kỳ trang nào
	$existing_slugs = array_column( $pages_data, 'slug' );
	$theme_files = glob( get_template_directory() . '/page-*.php' );
	if ( $theme_files ) {
		foreach ( $theme_files as $file ) {
			$filename = basename( $file );
			// Bỏ qua page.php
			if ( 'page.php' === $filename ) {
				continue;
			}
			$slug = preg_replace( '/^page-|\.php$/', '', $filename );
			if ( ! in_array( $slug, $existing_slugs, true ) ) {
				// Tạo tiêu đề hiển thị đẹp từ slug
				$title = ucwords( str_replace( array( '-', '_' ), ' ', $slug ) );
				$pages_data[] = array(
					'title'    => $title,
					'slug'     => $slug,
					'template' => $filename,
				);
			}
		}
	}

	$valid_slugs = array();
	foreach ( $pages_data as $page ) {
		if ( ! empty( $page['slug'] ) ) {
			$valid_slugs[] = $page['slug'];
		}
	}

	// Step 1: Create top-level pages first
	$created_ids = array();
	foreach ( $pages_data as $page ) {
		if ( empty( $page['parent'] ) ) {
			$slug  = $page['slug'];
			$title = $page['title'];

			$existing = get_posts(
				array(
					'name'        => $slug,
					'post_type'   => 'page',
					'post_status' => 'any',
					'numberposts' => 1,
				)
			);
			$page_check_id = ! empty( $existing[0] ) ? $existing[0]->ID : 0;

			if ( ! $page_check_id ) {
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
					$template = ! empty( $page['template'] ) ? $page['template'] : 'page-' . $slug . '.php';
					if ( file_exists( get_template_directory() . '/' . $template ) ) {
						update_post_meta( $new_page_id, '_wp_page_template', $template );
					}
				}
			} else {
				$created_ids[ $slug ] = $page_check_id;
				$template = ! empty( $page['template'] ) ? $page['template'] : 'page-' . $slug . '.php';
				if ( file_exists( get_template_directory() . '/' . $template ) ) {
					update_post_meta( $page_check_id, '_wp_page_template', $template );
				}
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
				$parent_existing = get_posts(
					array(
						'name'        => $parent_slug,
						'post_type'   => 'page',
						'post_status' => 'any',
						'numberposts' => 1,
					)
				);
				if ( ! empty( $parent_existing[0] ) ) {
					$parent_id = $parent_existing[0]->ID;
				}
			}

			$child_existing = get_posts(
				array(
					'name'        => $slug,
					'post_type'   => 'page',
					'post_status' => 'any',
					'numberposts' => 1,
				)
			);
			$child_check_id = ! empty( $child_existing[0] ) ? $child_existing[0]->ID : 0;

			if ( ! $child_check_id ) {
				$child_id = wp_insert_post(
					array(
						'post_title'   => $title,
						'post_name'    => $slug,
						'post_status'  => 'publish',
						'post_type'    => 'page',
						'post_content' => '',
						'post_parent'  => $parent_id,
					)
				);
				if ( $child_id && ! is_wp_error( $child_id ) ) {
					$template = ! empty( $page['template'] ) ? $page['template'] : 'page-' . $slug . '.php';
					if ( file_exists( get_template_directory() . '/' . $template ) ) {
						update_post_meta( $child_id, '_wp_page_template', $template );
					}
				}
			} else {
				$template = ! empty( $page['template'] ) ? $page['template'] : 'page-' . $slug . '.php';
				if ( file_exists( get_template_directory() . '/' . $template ) ) {
					update_post_meta( $child_check_id, '_wp_page_template', $template );
				}
			}
		}
	}

	// Optional Step 3: Delete old pages not present in pages-data.json
	if ( $clean_old ) {
		$all_wp_pages = get_posts(
			array(
				'post_type'      => 'page',
				'post_status'    => 'any',
				'posts_per_page' => -1,
			)
		);
		foreach ( $all_wp_pages as $wp_page ) {
			if ( ! in_array( $wp_page->post_name, $valid_slugs, true ) ) {
				wp_delete_post( $wp_page->ID, true );
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
	vasco_theme_sync_products();
}
add_action( 'after_switch_theme', 'vasco_theme_after_switch' );

/**
 * Auto sync on Admin Load if not synced yet
 */
function vasco_theme_auto_sync_on_admin() {
	// Disable WooCommerce Coming Soon mode to show real products
	update_option( 'woocommerce_coming_soon', 'no' );
	update_option( 'woocommerce_store_pages_only', 'no' );

	if ( get_option( 'vasco_products_vnd_synced_v5' ) ) {
		return;
	}
	vasco_theme_sync_pages( true );
	if ( function_exists( 'vasco_theme_sync_products' ) ) {
		vasco_theme_sync_products();
	}
	update_option( 'vasco_products_vnd_synced_v5', 1 );
}
add_action( 'admin_init', 'vasco_theme_auto_sync_on_admin' );

/**
 * Add WP Admin Page for Syncing Vasco Pages manually
 */
function vasco_theme_add_admin_menu() {
	// Add under Appearance -> Đồng bộ Trang Vasco
	add_theme_page(
		'Đồng bộ Trang Vasco',
		'Đồng bộ Trang Vasco',
		'manage_options',
		'vasco-sync-pages',
		'vasco_theme_admin_sync_page_html'
	);

	// Also add under Pages (edit.php) -> Đồng bộ Trang Vasco
	add_submenu_page(
		'edit.php',
		'Đồng bộ Trang Vasco',
		'⚡ Đồng bộ Trang Vasco',
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
		$clean_old = ! empty( $_POST['vasco_clean_old'] );
		if ( vasco_theme_sync_pages( $clean_old ) ) {
			$message = '<div class="notice notice-success is-dismissible"><p><strong>Thành công!</strong> Đã khởi tạo và đồng bộ tất cả trang Vasco vào cơ sở dữ liệu WordPress.' . ( $clean_old ? ' (Đã dọn dẹp các trang cũ/thừa)' : '' ) . '</p></div>';
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
			<p style="margin: 15px 0;">
				<label>
					<input type="checkbox" name="vasco_clean_old" value="1" />
					<strong>🗑️ Xóa các trang cũ/trang rác không thuộc Vasco Theme trong WordPress</strong>
				</label>
			</p>
			<p>
				<input type="submit" name="vasco_do_sync" class="button button-primary button-hero" value="⚡ Đồng bộ trang & Dọn dẹp ngay" />
			</p>
		</form>
	</div>
	<?php
}

