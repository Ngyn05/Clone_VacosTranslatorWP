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
	$json_file = get_template_directory() . '/inc/data/pages-data.json';
	$pages_data = file_exists( $json_file ) ? json_decode( file_get_contents( $json_file ), true ) : array();
	$pages_data = is_array( $pages_data ) ? $pages_data : array();

	// Tự động quét tất cả file page-*.php trong thư mục theme và templates/ để không bỏ sót bất kỳ trang nào
	$existing_slugs = array_column( $pages_data, 'slug' );
	$theme_files    = array_merge(
		glob( get_template_directory() . '/page-*.php' ) ?: array(),
		glob( get_template_directory() . '/templates/*/*.php' ) ?: array(),
		glob( get_template_directory() . '/templates/*/*/*.php' ) ?: array()
	);
	if ( $theme_files ) {
		// Danh sách các template bài viết sẽ tạo dưới dạng Post, không tạo dưới dạng Page
		$article_templates_to_skip = array(
			'page-articles-languages-least-spoken-language-in-the-world.php',
			'page-articles-languages-oldest-known-language.php',
			'page-articles-languages-how-many-people-speak-more-than-one-language.php',
			'page-articles-languages-spanish-speaking-countries.php',
		);

		foreach ( $theme_files as $file ) {
			$filename = basename( $file );
			if ( 'page.php' === $filename || in_array( $filename, $article_templates_to_skip, true ) ) {
				continue;
			}
			$slug = preg_replace( '/^page-|\.php$/', '', $filename );
			if ( ! in_array( $slug, $existing_slugs, true ) ) {
				$title        = ucwords( str_replace( array( '-', '_' ), ' ', $slug ) );
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
				if ( ! empty( $parent_id ) ) {
					wp_update_post(
						array(
							'ID'          => $child_check_id,
							'post_parent' => $parent_id,
						)
					);
				}
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

	// Set static front page and posts page if not set
	$front_page = get_page_by_path( 'home' );
	if ( $front_page ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page->ID );
	}

	$posts_page = get_page_by_path( 'tin-tuc' );
	if ( ! $posts_page ) {
		$posts_page = get_page_by_path( 'articles' );
	}
	if ( $posts_page ) {
		update_option( 'page_for_posts', $posts_page->ID );
	}

	// ── Cấu hình Permalinks Chuẩn SEO (Post Name) ──
	update_option( 'permalink_structure', '/%postname%/' );

	// ── Cấu hình Writing Mặc định ──
	update_option( 'default_post_edit_rows', 20 );
	update_option( 'default_content_type', 'html' );

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

	if ( get_option( 'vasco_pages_checkout_synced_v10' ) ) {
		return;
	}
	vasco_theme_sync_pages( true );
	if ( function_exists( 'vasco_theme_sync_products' ) ) {
		vasco_theme_sync_products();
	}

	// ── Đồng bộ 4 Bài Viết Mẫu (Posts) ──
	vasco_sync_sample_posts();

	// ── Setup WooCommerce Payment Gateways (COD + BACS) ──
	$cod_settings = get_option( 'woocommerce_cod_settings', array() );
	$cod_settings['enabled'] = 'yes';
	$cod_settings['title']   = 'Thanh toán khi nhận hàng (COD)';
	update_option( 'woocommerce_cod_settings', $cod_settings );

	$bacs_settings = get_option( 'woocommerce_bacs_settings', array() );
	$bacs_settings['enabled'] = 'yes';
	$bacs_settings['title']   = 'Chuyển khoản ngân hàng';
	update_option( 'woocommerce_bacs_settings', $bacs_settings );

	// ── WooCommerce Currency VND ──
	update_option( 'woocommerce_currency', 'VND' );
	update_option( 'woocommerce_currency_pos', 'right_space' );
	update_option( 'woocommerce_price_decimals', '0' );
	update_option( 'woocommerce_price_thousand_sep', '.' );
	update_option( 'woocommerce_price_decimal_sep', ',' );

	// ── Tạo trang order-received nếu chưa có ──
	$or_page = get_posts( array(
		'name'        => 'order-received',
		'post_type'   => 'page',
		'post_status' => 'any',
		'numberposts' => 1,
	) );
	if ( empty( $or_page ) ) {
		$or_id = wp_insert_post( array(
			'post_title'   => 'Xác nhận đơn hàng',
			'post_name'    => 'order-received',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '',
		) );
		if ( $or_id && ! is_wp_error( $or_id ) ) {
			update_post_meta( $or_id, '_wp_page_template', 'page-order-received.php' );
		}
	} else {
		update_post_meta( $or_page[0]->ID, '_wp_page_template', 'page-order-received.php' );
	}

	update_option( 'vasco_pages_checkout_synced_v10', 1 );
}
add_action( 'admin_init', 'vasco_theme_auto_sync_on_admin' );
add_action( 'init', function() {
	if ( current_user_can( 'manage_options' ) ) {
		vasco_theme_auto_sync_on_admin();
	}
} );

/**
 * Add WP Admin Page for Syncing Vasco Pages & Data manually
 */
function vasco_theme_add_admin_menu() {
	// Top-level Admin Menu duy nhất trên thanh bên trái WP Admin
	add_menu_page(
		'Đồng bộ Vasco',
		'Đồng bộ Vasco',
		'manage_options',
		'vasco-sync-main',
		'vasco_theme_admin_sync_page_html',
		'dashicons-update',
		59
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

	if ( isset( $_POST['vasco_do_product_sync'] ) && check_admin_referer( 'vasco_sync_products_action', 'vasco_sync_products_nonce' ) ) {
		if ( function_exists( 'vasco_theme_sync_products' ) && vasco_theme_sync_products() ) {
			$message .= '<div class="notice notice-success is-dismissible"><p><strong>Thành công!</strong> Đã đồng bộ tất cả sản phẩm Vasco WooCommerce vào CSDL thành công.</p></div>';
		}
	}

	if ( isset( $_POST['vasco_do_post_sync'] ) && check_admin_referer( 'vasco_sync_posts_action', 'vasco_sync_posts_nonce' ) ) {
		if ( function_exists( 'vasco_sync_sample_posts' ) ) {
			vasco_sync_sample_posts();
			$message .= '<div class="notice notice-success is-dismissible"><p><strong>Thành công!</strong> Đã đồng bộ 4 bài viết mẫu vào danh sách Bài viết (Posts) thành công.</p></div>';
		}
	}
	?>
	<div class="wrap">
		<h1>⚡ Trung Tâm Đồng Bộ Vasco Theme</h1>
		<?php echo $message; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<p style="font-size:14px;color:#555;">Công cụ này giúp bạn tự động khởi tạo danh sách trang, sản phẩm WooCommerce và các bài viết (Posts) blog của Vasco Theme vào Cơ sở dữ liệu WordPress.</p>
		
		<div style="display:flex;gap:20px;margin-top:20px;flex-wrap:wrap;">
			<div style="background:#fff;border:1px solid #ccc;border-radius:8px;padding:20px;flex:1;min-width:280px;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
				<h2 style="margin-top:0;">📄 1. Đồng bộ Trang (Pages)</h2>
				<p>Khởi tạo tự động tất cả các đường dẫn trang (About Us, Contact, Sản phẩm, Tin tức, Chính sách...).</p>
				<form method="post" action="">
					<?php wp_nonce_field( 'vasco_sync_action', 'vasco_sync_nonce' ); ?>
					<p style="margin: 15px 0;">
						<label>
							<input type="checkbox" name="vasco_clean_old" value="1" />
							<strong>🗑️ Xóa các trang cũ/trang rác không thuộc Vasco Theme</strong>
						</label>
					</p>
					<p>
						<input type="submit" name="vasco_do_sync" class="button button-primary button-hero" value="⚡ Đồng bộ Tất Cả Trang Ngay" />
					</p>
				</form>
			</div>

			<div style="background:#fff;border:1px solid #ccc;border-radius:8px;padding:20px;flex:1;min-width:280px;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
				<h2 style="margin-top:0;">🛍️ 2. Đồng bộ Sản phẩm WooCommerce</h2>
				<p>Tạo hoặc cập nhật tự động toàn bộ Sản phẩm WooCommerce (Giá bán, Ảnh đại diện, Danh mục, Biến thể màu sắc, Thông số kỹ thuật & FAQ).</p>
				<form method="post" action="">
					<?php wp_nonce_field( 'vasco_sync_products_action', 'vasco_sync_products_nonce' ); ?>
					<p style="margin-top:40px;">
						<input type="submit" name="vasco_do_product_sync" class="button button-secondary button-hero" value="🛍️ Đồng bộ Sản Phẩm WooCommerce" />
					</p>
				</form>
			</div>

			<div style="background:#fff;border:1px solid #ccc;border-radius:8px;padding:20px;flex:1;min-width:280px;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
				<h2 style="margin-top:0;">📝 3. Đồng bộ Bài Viết (Posts)</h2>
				<p>Tạo hoặc cập nhật tự động 4 Bài viết mẫu (Blog Posts) chuẩn SEO Geo với ảnh đại diện, nội dung HTML phong phú vào mục Posts.</p>
				<form method="post" action="">
					<?php wp_nonce_field( 'vasco_sync_posts_action', 'vasco_sync_posts_nonce' ); ?>
					<p style="margin-top:40px;">
						<input type="submit" name="vasco_do_post_sync" class="button button-primary button-hero" style="background:#0085ba;border-color:#0073aa;" value="📝 Đồng bộ Bài Viết (Posts)" />
					</p>
				</form>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Synchronize 4 sample blog posts into WordPress Database
 */
function vasco_sync_sample_posts() {
	$posts_data = array(
		array(
			'slug'          => 'ngon-ngu-it-nguoi-noi-nhat-tren-the-gioi-la-gi',
			'title'         => 'Ngôn ngữ ít người nói nhất trên thế giới là gì?',
			'excerpt'       => 'Trong một thế giới mà giao tiếp là chìa khóa, ngôn ngữ đóng vai trò thiết yếu trong việc kết nối con người từ các nền văn hóa và hoàn cảnh khác nhau.',
			'template_file' => 'page-articles-languages-least-spoken-language-in-the-world.php',
			'thumb_url'     => VASCO_THEME_URI . '/assets/articles/wp-content/uploads/2024/07/least_spoken_language.webp',
			'author_name'   => 'Mateusz Lewandowski',
			'read_time'     => '13 phút đọc',
			'focus_kw'      => 'Ngôn ngữ ít người nói nhất',
			'yoast_title'   => 'Ngôn ngữ ít người nói nhất trên thế giới là gì? | Vasco Translator',
			'yoast_desc'    => 'Khám phá những ngôn ngữ hiếm nhất trên thế giới, từ tiếng Lemerig đến tiếng Ainu và Pirahã, và lý do tại sao việc bảo tồn ngôn ngữ lại quan trọng.',
		),
		array(
			'slug'          => 'ngon-ngu-co-nhat-duoc-biet-den-la-gi',
			'title'         => 'Ngôn ngữ cổ nhất được biết đến là gì?',
			'excerpt'       => 'Ngôn ngữ là nền tảng của sự tương tác và văn minh nhân loại. Nó cho phép chúng ta thể hiện suy nghĩ, cảm xúc và chia sẻ thông tin.',
			'template_file' => 'page-articles-languages-oldest-known-language.php',
			'thumb_url'     => 'https://vasco-translator.com/articles/wp-content/uploads/2026/03/d2b6d218-e526-4862-aeca-d12ecdc4c9cc.jpeg',
			'author_name'   => 'Weronika Górecka',
			'read_time'     => '15 phút đọc',
			'focus_kw'      => 'Ngôn ngữ cổ nhất',
			'yoast_title'   => 'Ngôn ngữ cổ nhất được biết đến là gì? Lịch sử ngôn ngữ học | Vasco',
			'yoast_desc'    => 'Tìm hiểu về các ngôn ngữ cổ nhất lịch sử nhân loại như tiếng Sumeria, tiếng Ai Cập cổ đại và tiếng Phạn.',
		),
		array(
			'slug'          => 'co-bao-nhieu-nguoi-noi-duoc-nhieu-hon-mot-ngon-ngu',
			'title'         => 'Có bao nhiêu người nói được nhiều hơn một ngôn ngữ?',
			'excerpt'       => 'Có bao nhiêu người nói nhiều hơn một ngôn ngữ? Đó là một câu hỏi tò mò mà nhiều người đặt ra mà chưa có câu trả lời duy nhất.',
			'template_file' => 'page-articles-languages-how-many-people-speak-more-than-one-language.php',
			'thumb_url'     => VASCO_THEME_URI . '/assets/img/happy-people.webp',
			'author_name'   => 'Weronika Górecka',
			'read_time'     => '10 phút đọc',
			'focus_kw'      => 'Nói nhiều ngôn ngữ',
			'yoast_title'   => 'Có bao nhiêu người nói được nhiều hơn một ngôn ngữ trên thế giới?',
			'yoast_desc'    => 'Thống kê tỷ lệ người song ngữ và đa ngôn ngữ trên toàn cầu và lợi ích của việc giao tiếp đa ngôn ngữ.',
		),
		array(
			'slug'          => 'nhung-quoc-gia-nao-su-dung-tieng-tay-ban-nha-la-ngon-ngu-chinh-thuc',
			'title'         => 'Những quốc gia nào sử dụng tiếng Tây Ban Nha là ngôn ngữ chính thức?',
			'excerpt'       => 'Tiếng Tây Ban Nha, với âm điệu du dương và lịch sử phong phú, giữ vị trí nổi bật trong số các ngôn ngữ được nói nhiều nhất trên thế giới.',
			'template_file' => 'page-articles-languages-spanish-speaking-countries.php',
			'thumb_url'     => 'https://vasco-translator.com/articles/wp-content/uploads/2026/01/da3844b1-96d4-4e46-a1a3-6ae7a9b676bc.jpeg',
			'author_name'   => 'Mateusz Lewandowski',
			'read_time'     => '18 phút đọc',
			'focus_kw'      => 'Quốc gia sử dụng tiếng Tây Ban Nha',
			'yoast_title'   => 'Danh sách các quốc gia sử dụng tiếng Tây Ban Nha là ngôn ngữ chính thức',
			'yoast_desc'    => 'Tổng hợp 21 quốc gia dùng tiếng Tây Ban Nha làm ngôn ngữ chính thức tại Châu Âu, Châu Mỹ và Châu Phi.',
		),
	);

	foreach ( $posts_data as $p ) {
		$existing = get_posts( array(
			'name'        => $p['slug'],
			'post_type'   => 'post',
			'post_status' => 'any',
			'numberposts' => 1,
		) );

		// Đọc nội dung bài viết từ template file
		$file_path = get_template_directory() . '/templates/articles/' . $p['template_file'];
		$content   = '';
		if ( file_exists( $file_path ) ) {
			$raw = file_get_contents( $file_path );
			// Lấy phần content chính trong et_pb_post_content_0_tb_body hoặc toàn bộ khối nội dung
			if ( preg_match( '/<div class="et_pb_module et_pb_post_content et_pb_post_content_0_tb_body">(.*?)<\/div>\s*<\/div>\s*<\/div>\s*<\/div>/s', $raw, $matches ) ) {
				$content = trim( $matches[1] );
			} else {
				$content = $raw;
			}
		}

		$post_id = 0;
		if ( empty( $existing ) ) {
			$post_id = wp_insert_post( array(
				'post_title'   => $p['title'],
				'post_name'    => $p['slug'],
				'post_excerpt' => $p['excerpt'],
				'post_content' => $content,
				'post_status'  => 'publish',
				'post_type'    => 'post',
			) );
		} else {
			$post_id = $existing[0]->ID;
			wp_update_post( array(
				'ID'           => $post_id,
				'post_title'   => $p['title'],
				'post_excerpt' => $p['excerpt'],
				'post_content' => $content,
			) );
		}

		if ( $post_id && ! is_wp_error( $post_id ) ) {
			update_post_meta( $post_id, '_vasco_author_name', $p['author_name'] );
			update_post_meta( $post_id, '_vasco_read_time', $p['read_time'] );
			update_post_meta( $post_id, '_vasco_thumb_url', $p['thumb_url'] );

			// Tự động gắn WP Featured Image (thumbnail) nếu chưa có
			if ( ! has_post_thumbnail( $post_id ) && ! empty( $p['thumb_url'] ) && function_exists( 'vasco_theme_import_product_image' ) ) {
				$attach_id = vasco_theme_import_product_image( $p['thumb_url'], $p['title'] );
				if ( $attach_id ) {
					set_post_thumbnail( $post_id, $attach_id );
				}
			}

			// ── Yoast SEO Meta Keys Integration ──
			if ( ! empty( $p['focus_kw'] ) ) {
				update_post_meta( $post_id, '_yoast_wpseo_focuskw', $p['focus_kw'] );
			}
			if ( ! empty( $p['yoast_title'] ) ) {
				update_post_meta( $post_id, '_yoast_wpseo_title', $p['yoast_title'] );
				update_post_meta( $post_id, '_yoast_wpseo_opengraph-title', $p['yoast_title'] );
			}
			if ( ! empty( $p['yoast_desc'] ) ) {
				update_post_meta( $post_id, '_yoast_wpseo_metadesc', $p['yoast_desc'] );
				update_post_meta( $post_id, '_yoast_wpseo_opengraph-description', $p['yoast_desc'] );
			}
			if ( ! empty( $p['thumb_url'] ) ) {
				update_post_meta( $post_id, '_yoast_wpseo_opengraph-image', $p['thumb_url'] );
			}
		}
	}
}



