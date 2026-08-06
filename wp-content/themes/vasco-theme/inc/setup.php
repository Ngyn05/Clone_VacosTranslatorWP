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
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
		'gallery', 'caption', 'style', 'script',
	) );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	register_nav_menus( array(
		'primary' => __( 'Primary Desktop Menu', 'vasco-theme' ),
		'mobile'  => __( 'Mobile Menu', 'vasco-theme' ),
		'footer'  => __( 'Footer Menu', 'vasco-theme' ),
	) );
	add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'vasco_theme_setup' );

add_filter( 'use_block_editor_for_post', '__return_false', 10 );

// Rewrite rule cho product slugs
add_action( 'init', function () {
	add_rewrite_rule( '^product/([^/]+)/?', 'index.php?vasco_product_slug=$matches[1]', 'top' );
	add_rewrite_rule( '^translators/([^/]+)/?', 'index.php?vasco_product_slug=$matches[1]', 'top' );
	add_rewrite_rule( '^accessories/([^/]+)/?', 'index.php?vasco_product_slug=$matches[1]', 'top' );
	add_rewrite_rule( '^packages/([^/]+)/?', 'index.php?vasco_product_slug=$matches[1]', 'top' );
} );

add_filter( 'query_vars', function ( $vars ) {
	$vars[] = 'vasco_product_slug';
	return $vars;
} );

/**
 * Slug alias map dung chung
 */
function vasco_get_product_slug_aliases() {
	return array(
		'q1'                                                         => 'vasco-translator-q1',
		'v4'                                                         => 'vasco-translator-v4',
		'm4'                                                         => 'vasco-translator-m4',
		'e1'                                                         => 'vasco-translator-e1',
		'vasco-q1'                                                   => 'vasco-translator-q1',
		'vasco-v4'                                                   => 'vasco-translator-v4',
		'vasco-m4'                                                   => 'vasco-translator-m4',
		'vasco-e1'                                                   => 'vasco-translator-e1',
		'q1-slateblue-e1'                                           => 'q1-phantomblack-e1',
		'q1-mysticplum-e1'                                          => 'q1-phantomblack-e1',
		'q1-scarletpulse-e1'                                         => 'q1-phantomblack-e1',
		'v4-stonegray-e1'                                           => 'v4-blackonyx-e1',
		'v4-cobaltblue-e1'                                          => 'v4-blackonyx-e1',
		'v4-rubyred-e1'                                             => 'v4-blackonyx-e1',
		'v4-pearlwhite-e1'                                          => 'v4-blackonyx-e1',
		'zipped-case-for-vasco-translator-q1'                        => 'case-for-vasco-translator-q1',
		'case-q1'                                                    => 'case-for-vasco-translator-q1',
		'zipped-case-for-vasco-translator-v4'                        => 'case-for-vasco-translator-v4',
		'case-v4'                                                    => 'case-for-vasco-translator-v4',
		'zipped-case-for-vasco-translator-m4'                        => 'case-for-vasco-translator-m4',
		'case-m4'                                                    => 'case-for-vasco-translator-m4',
		'light-case-q1'                                              => 'light-case-for-vasco-translator-q1',
		'light-case-m4'                                              => 'light-case-for-vasco-translator-m4',
		'tempered-glass-screen-protector-for-vasco-translator-q1'    => 'tempered-glass-q1',
		'screen-protector-for-vasco-translator-q1'                  => 'tempered-glass-q1',
		'tempered-glass-screen-protector-for-vasco-translator-v4'    => 'tempered-glass-v4',
		'screen-protector-for-vasco-translator-v4'                  => 'tempered-glass-v4',
		'tempered-glass-screen-protector-for-vasco-translator-m4'    => 'tempered-glass-m4',
		'screen-protector-for-vasco-translator-m4'                  => 'tempered-glass-m4',
		'power-adapter-us-plug'                                      => 'power-adapter-us',
		'power-adapter-us-plug-name'                                 => 'power-adapter-us',
		'phone-call-translator-top-up'                               => 'call-translator',
		'phone-call-translator'                                      => 'call-translator',
	);
}

add_action( 'template_redirect', function () {
	$slug = get_query_var( 'vasco_product_slug' );
	if ( ! empty( $slug ) ) {
		$slug = preg_replace( '/\.html$/', '', $slug );

		$request_uri = $_SERVER['REQUEST_URI'] ?? '';
		if ( strpos( $request_uri, '/translators/' ) !== false || strpos( $request_uri, '/accessories/' ) !== false || strpos( $request_uri, '/packages/' ) !== false ) {
			wp_redirect( home_url( '/product/' . $slug . '/' ), 301 );
			exit;
		}

		$aliases = vasco_get_product_slug_aliases();
		if ( isset( $aliases[ $slug ] ) ) {
			$slug = $aliases[ $slug ];
		}

		$template_file = get_template_directory() . '/templates/products/page-' . sanitize_file_name( $slug ) . '.php';
		if ( file_exists( $template_file ) ) {
			$GLOBALS['vasco_current_product_slug'] = $slug;
			include $template_file;
			exit;
		}

		$fallback_file = get_template_directory() . '/templates/products/page-vasco-translator-q1.php';
		if ( file_exists( $fallback_file ) ) {
			$GLOBALS['vasco_current_product_slug'] = $slug;
			include $fallback_file;
			exit;
		}
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
				"templates/pages/business/page-{$slug}.php",
				"templates/pages/features/page-{$slug}.php",
				"templates/pages/shop/page-{$slug}.php",
				"templates/pages/initiatives/page-{$slug}.php",
				"templates/pages/general/page-{$slug}.php",
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

/**
 * Document Title Parts - Tieng Viet
 */
function vasco_theme_document_title_parts( $title_parts ) {
	$vietnamese_map = array(
		'bundles'                => 'Bo San Pham',
		'packages'               => 'Goi San Pham',
		'accessories'            => 'Phu Kien',
		'translators'            => 'May Dich',
		'all-products'           => 'Tat Ca San Pham',
		'comparison-engine'      => 'So Sanh May Dich',
		'call-translator'        => 'Dich Cuoc Goi',
		'newsroom'               => 'Phong Bao Chi & Tin Tuc',
		'tin-tuc'                => 'Bai Viet Tin Tuc',
		'privacy-policy'         => 'Chinh Sach Bao Mat',
		'terms-and-conditions'   => 'Dieu Khoan Su Dung',
		'returns'                => 'Chinh Sach Doi Tra',
		'shipping'               => 'Chinh Sach Van Chuyen',
		'checkout'               => 'Thanh Toan',
		'cart'                   => 'Gio Hang',
		'sitemap'                => 'So Do Trang',
		'downloads'              => 'Tai Ve',
		'coverage-map'           => 'Ban Do Phu Song',
		'business-hospitality'   => 'Khach San & Du Lich',
		'business-education'     => 'Giao Duc',
		'business-healthcare'    => 'Y Te',
		'business-law-enforcement' => 'Bao Ve & Phap Luat',
		'business-local-government' => 'Chinh Quyen Phuong Xa',
		'business-manufacturing' => 'San Xuat',
		'business-ngo'           => 'To Chuc Phi Loi Nhuan',
		'business-vasco-audience' => 'Doi Tuong Su Dung',
		'initiatives'            => 'Tac Dong Xa Hoi',
		'features'               => 'Tinh Nang',
		'how-it-works'           => 'Cach Hoat Dong',
		'meet-vasco'             => 'Gioi Thieu Vasco',
		'about-us'               => 'Ve Chung Toi',
		'contact'                => 'Lien He',
		'media-about-us'         => 'Truyen Thong',
	);

	if ( is_page() ) {
		$page = get_queried_object();
		if ( $page && isset( $page->post_name ) && isset( $vietnamese_map[ $page->post_name ] ) ) {
			$title_parts['title'] = $vietnamese_map[ $page->post_name ];
		}
	}

	return $title_parts;
}
add_filter( 'document_title_parts', 'vasco_theme_document_title_parts', 999 );

/**
 * Universal Template Include Resolver
 * Chi ap dung cho URL chi tiet san pham, KHONG ap dung cho trang danh sach.
 */
function vasco_theme_universal_template_include( $template ) {
	$request_uri = $_SERVER['REQUEST_URI'] ?? '';
	$path        = trim( parse_url( $request_uri, PHP_URL_PATH ), '/' );
	$parts       = array_values( array_filter( explode( '/', $path ) ) );

	// Cac trang listing (1 segment) -> bo qua, de WordPress xu ly binh thuong
	$listing_pages = array(
		'translators', 'accessories', 'packages', 'bundles',
		'all-products', 'product', 'products',
	);
	$last = ! empty( $parts ) ? end( $parts ) : '';
	if ( count( $parts ) <= 1 && in_array( $last, $listing_pages, true ) ) {
		return $template;
	}

	$slug = $last;
	$slug = preg_replace( '/\.html$/', '', (string) $slug );
	$slug = sanitize_title( $slug );

	// Slug la ten trang listing -> bo qua
	if ( empty( $slug ) || in_array( $slug, $listing_pages, true ) ) {
		return $template;
	}

	$aliases = vasco_get_product_slug_aliases();
	if ( isset( $aliases[ $slug ] ) ) {
		$slug = $aliases[ $slug ];
	}

	$product_file = VASCO_THEME_DIR . '/templates/products/page-' . $slug . '.php';
	if ( file_exists( $product_file ) ) {
		$GLOBALS['vasco_current_product_slug'] = $slug;
		return $product_file;
	}

	// Fallback Q1 chi khi URL ro rang la trang san pham chi tiet (co it nhat 2 segment)
	$is_detail_url = (
		( strpos( $request_uri, '/product/' ) !== false && count( $parts ) >= 2 ) ||
		( strpos( $request_uri, '/translators/' ) !== false && count( $parts ) >= 2 ) ||
		( strpos( $request_uri, '/accessories/' ) !== false && count( $parts ) >= 2 )
	);
	if ( $is_detail_url ) {
		$fallback = VASCO_THEME_DIR . '/templates/products/page-vasco-translator-q1.php';
		if ( file_exists( $fallback ) ) {
			$GLOBALS['vasco_current_product_slug'] = $slug;
			return $fallback;
		}
	}

	return $template;
}
add_filter( 'template_include', 'vasco_theme_universal_template_include', 99 );
