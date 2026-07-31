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
	$pages = array(
		'translators'          => 'Máy phiên dịch',
		'accessories'          => 'Phụ kiện',
		'bundles'              => 'Combo',
		'all-products'         => 'Tất cả sản phẩm',
		'about-us'             => 'Về chúng tôi',
		'how-it-works'         => 'Cách hoạt động',
		'meet-vasco'           => 'Gặp gỡ Vasco',
		'call-translator'      => 'Dịch cuộc gọi',
		'newsroom'             => 'Tin tức',
		'contact'              => 'Liên hệ',
		'privacy-policy'       => 'Chính sách bảo mật',
		'terms-and-conditions' => 'Điều khoản sử dụng',
		'returns'              => 'Chính sách đổi trả',
		'shipping'             => 'Vận chuyển',
		'sitemap'              => 'Sơ đồ trang',
		'vasco-ces-2026'       => 'Vasco CES 2026',
		'vasco-innovations'    => 'Vasco Innovations',
	);

	foreach ( $pages as $slug => $title ) {
		$page_check = get_page_by_path( $slug );
		if ( ! isset( $page_check->ID ) ) {
			wp_insert_post(
				array(
					'post_title'   => $title,
					'post_name'    => $slug,
					'post_status'  => 'publish',
					'post_type'    => 'page',
					'post_content' => '',
				)
			);
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
