<?php
/**
 * Helper Functions & Form Handlers
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handle Contact Form Submission
 */
function vasco_theme_handle_contact_form() {
	if ( isset( $_POST['vasco_contact_nonce'] ) && wp_verify_nonce( $_POST['vasco_contact_nonce'], 'vasco_contact_action' ) ) {
		$name    = sanitize_text_field( $_POST['name'] ?? '' );
		$email   = sanitize_email( $_POST['email'] ?? '' );
		$message = sanitize_textarea_field( $_POST['message'] ?? '' );

		if ( ! empty( $email ) && ! empty( $message ) ) {
			// Success notice
			set_transient( 'vasco_contact_success', __( 'Cảm ơn bạn đã gửi liên hệ! Chúng tôi sẽ phản hồi sớm nhất.', 'vasco-theme' ), 60 );
			wp_safe_redirect( home_url( '/contact/?success=1' ) );
			exit;
		}
	}
}
add_action( 'admin_post_nopriv_vasco_contact_submit', 'vasco_theme_handle_contact_form' );
add_action( 'admin_post_vasco_contact_submit', 'vasco_theme_handle_contact_form' );

/**
 * Format Currency VND/USD
 */
function vasco_theme_format_price( $amount, $currency = 'VND' ) {
	if ( 'VND' === $currency ) {
		return number_format( $amount, 0, ',', '.' ) . ' ₫';
	}
	return '$' . number_format( $amount, 2 );
}

function vasco_theme_get_wc_product_by_slug( $slug ) {
	if ( ! function_exists( 'wc_get_product' ) ) {
		return null;
	}

	$slug = sanitize_title( (string) $slug );
	if ( '' !== $slug ) {
		$product_post = get_page_by_path( $slug, OBJECT, 'product' );
		if ( $product_post && ! empty( $product_post->ID ) ) {
			$product = wc_get_product( $product_post->ID );
			if ( $product ) {
				return $product;
			}
		}

		$product_id = (int) wc_get_product_id_by_sku( $slug );
		if ( $product_id ) {
			$product = wc_get_product( $product_id );
			if ( $product ) {
				return $product;
			}
		}
	}

	global $post;
	if ( $post && 'product' === $post->post_type ) {
		return wc_get_product( $post->ID );
	}

	return null;
}

function vasco_theme_get_wc_products_for_category( $category_slug = '', $limit = -1 ) {
	if ( ! function_exists( 'wc_get_products' ) ) {
		return array();
	}

	$args = array(
		'status'  => 'publish',
		'limit'   => (int) $limit,
		'orderby' => 'menu_order',
		'order'   => 'ASC',
		'return'  => 'objects',
	);

	$category_slug = sanitize_title( (string) $category_slug );
	if ( '' !== $category_slug ) {
		$args['category'] = array( $category_slug );
	}

	$products = wc_get_products( $args );
	return is_array( $products ) ? $products : array();
}

function vasco_theme_get_wc_product_image_url( $product, $size = 'woocommerce_thumbnail' ) {
	if ( ! $product instanceof WC_Product ) {
		return wc_placeholder_img_src( $size );
	}

	$image_id = $product->get_image_id();
	if ( ! $image_id ) {
		return wc_placeholder_img_src( $size );
	}

	$image_url = wp_get_attachment_image_url( $image_id, $size );
	return $image_url ? $image_url : wc_placeholder_img_src( $size );
}

function vasco_theme_get_wc_product_excerpt( $product, $words = 22 ) {
	if ( ! $product instanceof WC_Product ) {
		return '';
	}

	$text = $product->get_short_description();
	if ( '' === trim( (string) $text ) ) {
		$text = $product->get_description();
	}

	$text = wp_strip_all_tags( (string) $text );
	return trim( wp_trim_words( $text, (int) $words ) );
}

function vasco_theme_render_catalog_tabs( $active_tab ) {
	$tabs = array(
		'translators'  => array( 'label' => 'Máy dịch', 'url' => home_url( '/translators/' ) ),
		'bundles'      => array( 'label' => 'Bộ sản phẩm', 'url' => home_url( '/bundles/' ) ),
		'accessories'  => array( 'label' => 'Phụ kiện', 'url' => home_url( '/accessories/' ) ),
		'all-products' => array( 'label' => 'Tất cả sản phẩm', 'url' => home_url( '/all-products/' ) ),
		'packages'     => array( 'label' => 'Gói sản phẩm', 'url' => home_url( '/packages/' ) ),
	);

	echo '<div class="menu-container"><div class="container"><nav class="tab-menu">';
	foreach ( $tabs as $tab_key => $tab ) {
		$class = $tab_key === $active_tab ? 'menu-link current' : 'menu-link';
		echo '<a aria-label="' . esc_attr( $tab['label'] ) . '" class="' . esc_attr( $class ) . '" href="' . esc_url( $tab['url'] ) . '">' . esc_html( $tab['label'] ) . '</a>';
	}
	echo '</nav></div></div>';
}

function vasco_theme_render_product_card( $product, $context = array() ) {
	if ( ! $product instanceof WC_Product ) {
		return;
	}

	$context       = wp_parse_args( $context, array( 'show_description' => true, 'card_style' => 'horizontal', 'is_first_item' => false ) );
	$product_id    = $product->get_id();
	$title         = $product->get_name();
	$permalink     = get_permalink( $product_id );
	$image_url     = vasco_theme_get_wc_product_image_url( $product, 'woocommerce_single' );
	$short_desc    = $product->get_short_description();
	$description   = $product->get_description();
	$price_html    = $product->get_price_html();
	$is_in_stock   = $product->is_in_stock();
	$is_grid_card  = ( 'grid' === $context['card_style'] );
	$img_attr      = $context['is_first_item'] ? 'fetchpriority="high" decoding="async"' : 'loading="lazy" decoding="async"';
	$badge_raw     = get_post_meta( $product_id, '_vasco_product_badge', true );
	if ( 'new' === $badge_raw || 'Mới' === $badge_raw ) {
		$flag_html = '<div class="product-flag-wrapper promotion-theme-orange"><div aria-label="Mới" class="body-base product-flag">Mới</div></div>';
	} elseif ( 'bestseller' === $badge_raw || 'Bán chạy nhất' === $badge_raw ) {
		$flag_html = '<div class="product-flag-wrapper promotion-theme-blue" style="background:#0066cc;"><div aria-label="Bán chạy nhất" class="body-base product-flag" style="background:#0066cc;">Bán chạy nhất</div></div>';
	} else {
		$flag_html = '';
	}

	// Lấy danh sách màu sắc biến thể từ WooCommerce hoặc cài đặt mặc định cho các dòng sản phẩm Vasco
	$colors_html = '';
	$uploads_url = content_url( '/uploads/2026/08/' );
	$colors_map  = array(
		'vasco-translator-q1' => array(
			array( 'slug' => 'phantom-black', 'name' => 'Phantom Black', 'image' => 'https://vasco-translator.com/385-medium_default/vasco-translator-q1.jpg' ),
			array( 'slug' => 'slate-blue', 'name' => 'Slate Blue', 'image' => $uploads_url . 'vasco-translator-q1.jpg' ),
			array( 'slug' => 'mystic-plum', 'name' => 'Mystic Plum', 'image' => $uploads_url . 'vasco-translator-q1 (1).jpg' ),
			array( 'slug' => 'scarlet-pulse', 'name' => 'Scarlet Pulse', 'image' => $uploads_url . 'vasco-translator-q1 (2).jpg' ),
		),

		'vasco-translator-m4' => array(
			array( 'slug' => 'matte-black', 'name' => 'Matte Black', 'image' => 'https://vasco-translator.com/488-medium_default/vasco-translator-m4.jpg' ),
			array( 'slug' => 'frosty-turquoise', 'name' => 'Frosty Turquoise', 'image' => $uploads_url . 'vasco-translator-m4.jpg' ),
			array( 'slug' => 'misty-purple', 'name' => 'Misty Purple', 'image' => $uploads_url . 'vasco-translator-m4 (1).jpg' ),
		),
		'vasco-translator-v4' => array(
			array( 'slug' => 'black-onyx', 'name' => 'Black Onyx', 'image' => 'https://vasco-translator.com/343-medium_default/vasco-translator-v4.jpg' ),
			array( 'slug' => 'stone-gray', 'name' => 'Stone Gray', 'image' => $uploads_url . 'vasco-translator-v4.jpg' ),
			array( 'slug' => 'cobalt-blue', 'name' => 'Cobalt Blue', 'image' => $uploads_url . 'vasco-translator-v4 (1).jpg' ),
			array( 'slug' => 'ruby-red', 'name' => 'Ruby Red', 'image' => $uploads_url . 'vasco-translator-v4 (2).jpg' ),
			array( 'slug' => 'pearl-white', 'name' => 'Pearl White', 'image' => $uploads_url . 'vasco-translator-v4 (3).jpg' ),
		),
		'q1-phantomblack-e1' => array(
			array( 'slug' => 'phantom-black', 'name' => 'Phantom Black', 'image' => $uploads_url . 'q1-phantomblack-e1.webp' ),
			array( 'slug' => 'slate-blue', 'name' => 'Slate Blue', 'image' => $uploads_url . 'q1-slateblue-e1.jpg' ),
			array( 'slug' => 'mystic-plum', 'name' => 'Mystic Plum', 'image' => $uploads_url . 'q1-mysticplum-e1.jpg' ),
			array( 'slug' => 'scarlet-pulse', 'name' => 'Scarlet Pulse', 'image' => $uploads_url . 'q1-scarletpulse-e1.jpg' ),
		),
		'v4-blackonyx-e1' => array(
			array( 'slug' => 'black-onyx', 'name' => 'Black Onyx', 'image' => $uploads_url . 'v4-blackonyx-e1.webp' ),
			array( 'slug' => 'stone-gray', 'name' => 'Stone Gray', 'image' => $uploads_url . 'v4-stonegray-e1.jpg' ),
			array( 'slug' => 'cobalt-blue', 'name' => 'Cobalt Blue', 'image' => $uploads_url . 'v4-cobaltblue-e1.jpg' ),
			array( 'slug' => 'ruby-red', 'name' => 'Ruby Red', 'image' => $uploads_url . 'v4-rubyred-e1.jpg' ),
			array( 'slug' => 'pearl-white', 'name' => 'Pearl White', 'image' => $uploads_url . 'v4-pearlwhite-e1.jpg' ),
		),
	);



	$product_slug = $product->get_slug();
	$colors = array();

	if ( $product->is_type( 'variable' ) ) {
		$attributes = $product->get_variation_attributes();
		if ( isset( $attributes['pa_color'] ) || isset( $attributes['pa_mau-sac'] ) || isset( $attributes['color'] ) ) {
			$color_terms = reset( $attributes );
			if ( ! empty( $color_terms ) ) {
				foreach ( $color_terms as $term_slug ) {
					$term = get_term_by( 'slug', $term_slug, 'pa_color' );
					if ( ! $term ) {
						$term = get_term_by( 'slug', $term_slug, 'pa_mau-sac' );
					}
					$color_name = $term ? $term->name : ucwords( str_replace( array( '-', '_' ), ' ', $term_slug ) );
					$colors[]   = array( 'slug' => $term_slug, 'name' => $color_name, 'image' => '' );
				}
			}
		}
	}

	if ( empty( $colors ) && isset( $colors_map[ $product_slug ] ) ) {
		$colors = $colors_map[ $product_slug ];
	}

	if ( ! empty( $colors ) ) {
		$colors_html .= '<div class="product-variants-items combination-variants-item">' . ( $is_grid_card ? '' : '<p id="legend-color">Màu sắc:</p>' ) . '<div class="product-variants-list" role="radiogroup">';
		foreach ( $colors as $idx => $c ) {
			$active_class = ( 0 === $idx ) ? ' active' : '';
			$img_attr     = ! empty( $c['image'] ) ? ' data-image="' . esc_url( $c['image'] ) . '"' : '';
			if ( $is_grid_card ) {
				$colors_html .= '<label class="input-container product-variants-item' . $active_class . '"' . $img_attr . ' title="' . esc_attr( $c['name'] ) . '"><div class="circle ' . esc_attr( $c['slug'] ) . '"' . $img_attr . '></div></label>';
			} else {
				$colors_html .= '<label class="input-container product-variants-item' . $active_class . '"' . $img_attr . ' role="radio"><div class="circle ' . esc_attr( $c['slug'] ) . '"' . $img_attr . '></div><span class="radio-label">' . esc_html( $c['name'] ) . '</span></label>';
			}
		}
		$colors_html .= '</div></div>';
	}



	if ( $is_grid_card ) {
		// GIAO DIỆN GRID CARD (Dành cho Phụ kiện & Gói sản phẩm)
		echo '<article class="product-miniature js-product-miniature product-grid-card" tabindex="0">';
		echo '<div class="listing-product-head"><div class="product-thumb-wrapper js-variant-spinner-wrapper"><div class="product-flags js-product-flags">' . $flag_html . '</div><a class="product-link" href="' . esc_url( $permalink ) . '" title="' . esc_attr( $title ) . '"><img alt="' . esc_attr( $title ) . '" height="300" ' . $img_attr . ' src="' . esc_url( $image_url ) . '" width="300"/></a></div></div>';
		echo '<div class="listing-product-body">';
		echo '<div class="product-title-wrapper"><h3 class="product-title"><a class="product-link product-title-link" href="' . esc_url( $permalink ) . '" title="' . esc_attr( $title ) . '">' . esc_html( $title ) . '</a></h3></div>';
		echo '<div class="trustpilot-mini"><img alt="Trustpilot" class="trustpilot-logo-img" src="' . esc_url( VASCO_THEME_URI . '/assets/img/trustpilot.svg' ) . '"/></div>';
		echo $colors_html;
		echo '<div class="product-price-and-actions">';
		echo '<div class="product-price">' . wp_kses_post( $price_html ) . '</div>';
		echo '<div class="product-description-button-wrapper"><a class="btn btn-pill-desc" href="' . esc_url( $permalink ) . '">MÔ TẢ</a></div>';
		echo '<div class="product-add-to-cart js-product-add-to-cart">';
		if ( $is_in_stock ) {
			echo '<button type="button" class="btn add-to-cart-btn-full btn-add-to-cart" data-product-id="' . esc_attr( (string) $product_id ) . '" data-product-name="' . esc_attr( $title ) . '" data-product-price="' . esc_attr( (string) $product->get_price() ) . '" data-product-image="' . esc_url( $image_url ) . '"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> MUA NGAY</button>';
		} else {
			echo '<a class="btn btn-notify-me-full" href="' . esc_url( $permalink ) . '">THÔNG BÁO CHO TÔI</a>';
		}
		echo '</div></div></div></article>';
	} else {
		// GIAO DIỆN HORIZONTAL CARD (Dành cho Máy dịch & Bộ sản phẩm)
		echo '<article class="product-miniature js-product-miniature product-horizontal-card" tabindex="0">';
		echo '<div class="listing-product-head"><div class="product-thumb-wrapper js-variant-spinner-wrapper"><div class="product-flags js-product-flags">' . $flag_html . '</div><a class="product-link" href="' . esc_url( $permalink ) . '" title="' . esc_attr( $title ) . '"><img alt="' . esc_attr( $title ) . '" height="380" ' . $img_attr . ' src="' . esc_url( $image_url ) . '" width="380"/></a></div></div>';
		echo '<div class="listing-product-body">';
		echo '<div class="product-description-head">';
		echo '<h2 class="product-title"><a class="product-link product-title-link" href="' . esc_url( $permalink ) . '" title="' . esc_attr( $title ) . '">' . esc_html( $title ) . '</a></h2>';
		if ( '' !== trim( (string) $short_desc ) ) {
			echo '<h3 class="product-subtitle">' . esc_html( wp_strip_all_tags( $short_desc ) ) . '</h3>';
		}
		echo '<div class="trustpilot-mini"><img alt="Trustpilot" class="trustpilot-logo-img" src="' . esc_url( VASCO_THEME_URI . '/assets/img/trustpilot.svg' ) . '"/></div>';
		echo '</div>';
		if ( $context['show_description'] && '' !== $description ) {
			echo '<div class="product-long-description">' . wp_kses_post( wpautop( $description ) ) . '</div>';
		}
		echo $colors_html;
		echo '<div class="product-description-body">';
		echo '<a class="btn-circle-desc" href="' . esc_url( $permalink ) . '">MÔ TẢ</a>';
		echo '<div class="price-and-buy-wrapper">';
		echo '<div class="product-price">' . wp_kses_post( $price_html ) . '</div>';
		echo '<div class="product-add-to-cart js-product-add-to-cart">';
		if ( $is_in_stock ) {
			echo '<button type="button" class="btn add-to-cart-btn-primary btn-add-to-cart" data-product-id="' . esc_attr( (string) $product_id ) . '" data-product-name="' . esc_attr( $title ) . '" data-product-price="' . esc_attr( (string) $product->get_price() ) . '" data-product-image="' . esc_url( $image_url ) . '"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> MUA NGAY</button>';
		} else {
			echo '<a class="btn btn-notify-me" href="' . esc_url( $permalink ) . '">THÔNG BÁO CHO TÔI</a>';
		}
		echo '</div>';
		echo '</div></div></div></article>';
	}
}

function vasco_theme_render_catalog_page( $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'active_tab'    => 'all-products',
			'heading'       => '',
			'category_slug' => '',
			'show_compare'  => false,
		)
	);

	$products = vasco_theme_get_wc_products_for_category( $args['category_slug'] );
	if ( 'all-products' === $args['active_tab'] ) {
		$products = vasco_theme_get_wc_products_for_category( '', -1 );
	}

	$is_grid_cat   = ( 'translators' !== $args['active_tab'] && 'bundles' !== $args['active_tab'] );
	$wrapper_class = $is_grid_cat ? 'products products-grid-listing' : 'products products-horizontal-listing';
	$card_style    = $is_grid_cat ? 'grid' : 'horizontal';

	echo '<section class="relative" id="wrapper"><aside id="notifications"><div class="container"></div></aside><div><div class="breadcrumb-container"><div class="container"><nav aria-label="Đường dẫn điều hướng" class="breadcrumb" data-depth="2"><ol><li><a href="' . esc_url( home_url( '/' ) ) . '"><span class="breadcrumb-link">Trang chủ</span></a><span class="breadcrumb-divider">&gt;</span></li><li><span aria-current="page" class="breadcrumb-current">' . esc_html( $args['heading'] ) . '</span></li></ol></nav></div></div><div class="js-content-wrapper" id="content-wrapper"><section id="main">';
	vasco_theme_render_catalog_tabs( $args['active_tab'] );
	echo '<section class="products-catalog-wrapper" id="products"><div class="category-header"><div class="container"><h1 class="h1">' . esc_html( $args['heading'] ) . '</h1></div></div><hr/>';
	if ( ! empty( $args['show_compare'] ) ) {
		echo '<div class="container"><div class="comparison-page-link"><a class="comparison-page-link-anchor view-compare-button" href="' . esc_url( home_url( '/comparison-engine/' ) ) . '"><svg fill="none" height="20" viewbox="0 0 12 20" width="12" xmlns="http://www.w3.org/2000/svg"><path d="M2 18L10 10L2 2" stroke="#4966FF" stroke-linecap="square" stroke-width="2"></path></svg><p>So sánh các máy dịch</p></a></div></div>';
	}
	echo '<div id="js-product-list"><div class="container"><div class="' . esc_attr( $wrapper_class ) . '">';
	if ( empty( $products ) ) {
		echo '<p>Chưa có sản phẩm nào trong danh mục này.</p>';
	} else {
		foreach ( $products as $idx => $product ) {
			vasco_theme_render_product_card( $product, array( 'show_description' => ! $is_grid_cat, 'card_style' => $card_style, 'is_first_item' => ( 0 === $idx ) ) );
		}
	}
	echo '</div></div></div><div id="js-product-list-bottom"></div></section></section></div></div></section>';
}

function vasco_theme_render_product_detail_page( $slug = '' ) {
	$current_slug = sanitize_title( (string) $slug );
	if ( '' === $current_slug ) {
		// Uu tien slug duoc set boi template_include router
		if ( ! empty( $GLOBALS['vasco_current_product_slug'] ) ) {
			$current_slug = sanitize_title( (string) $GLOBALS['vasco_current_product_slug'] );
		} else {
			$queried_object = get_queried_object();
			if ( $queried_object && ! empty( $queried_object->post_name ) ) {
				$current_slug = sanitize_title( $queried_object->post_name );
			}
		}
	}

	$product = vasco_theme_get_wc_product_by_slug( $current_slug );
	if ( ! $product ) {
		echo '<section class="container py-5"><h1>Sản phẩm không tồn tại</h1><p>Không tìm thấy sản phẩm tương ứng trong WooCommerce.</p></section>';
		return;
	}

	global $post;
	$post = get_post( $product->get_id() );
	setup_postdata( $post );

	$categories = wp_get_post_terms( $product->get_id(), 'product_cat' );
	$category_label = '';
	if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
		$category_label = ! empty( $categories[0]->name ) ? $categories[0]->name : '';
	}

	$gallery_ids   = $product->get_gallery_image_ids();
	$featured_id   = $product->get_image_id();
	$image_ids     = array_filter( array_unique( array_merge( array( $featured_id ), $gallery_ids ) ) );
	$image_ids     = ! empty( $image_ids ) ? $image_ids : array( 0 );
	$short_desc    = $product->get_short_description();
	$description   = $product->get_description();

	// URL ảnh chính để dùng trong nút MUA NGAY (data-product-image)
	$featured_img_id = $product->get_image_id();
	$single_img_url  = $featured_img_id
		? (string) wp_get_attachment_image_url( $featured_img_id, 'woocommerce_single' )
		: (string) wc_placeholder_img_src( 'woocommerce_single' );

	echo '<section class="relative" id="wrapper"><aside id="notifications"><div class="container"></div></aside><div><div class="breadcrumb-container"><div class="container"><nav aria-label="Đường dẫn điều hướng" class="breadcrumb" data-depth="3"><ol><li><a href="' . esc_url( home_url( '/' ) ) . '"><span class="breadcrumb-link">Trang chủ</span></a><span class="breadcrumb-divider">&gt;</span></li>';
	if ( $category_label ) {
		echo '<li><a href="' . esc_url( home_url( '/' . ( ! empty( $categories[0]->slug ) ? $categories[0]->slug : 'products' ) . '/' ) ) . '"><span class="breadcrumb-link">' . esc_html( $category_label ) . '</span></a><span class="breadcrumb-divider">&gt;</span></li>';
	}
	echo '<li><span aria-current="page" class="breadcrumb-current">' . esc_html( $product->get_name() ) . '</span></li></ol></nav></div></div><div class="js-content-wrapper" id="content-wrapper"><section id="main"><div class="product-container js-product-container"><div class="product-header-wrapper"><div class="product-header container"><div class="product-cover-thumbnail-section"><div class="js-product-images"><div class="swiper-thumbs-container"><div class="swiper swiper-thumbs"><div class="swiper-wrapper">';
	foreach ( $image_ids as $image_id ) {
		$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'woocommerce_thumbnail' ) : wc_placeholder_img_src( 'woocommerce_thumbnail' );
		echo '<div class="swiper-slide"><img alt="' . esc_attr( $product->get_name() ) . '" class="thumb js-thumb" height="90" loading="lazy" src="' . esc_url( $image_url ) . '" width="90"/></div>';
	}
	echo '</div></div></div><div class="product-cover"><div class="swiper swiper-cover"><div class="swiper-wrapper">';
	foreach ( $image_ids as $index => $image_id ) {
		$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'large' ) : wc_placeholder_img_src( 'large' );
		echo '<div class="swiper-slide"><img alt="' . esc_attr( $product->get_name() ) . '" data-index="' . esc_attr( (string) $index ) . '" height="400" itemprop="image" loading="' . ( 0 === $index ? 'eager' : 'lazy' ) . '" src="' . esc_url( $image_url ) . '" width="400"/></div>';
	}
	echo '</div></div></div></div></div><div class="product-header-section"><h1 class="product-name" id="product-name">' . esc_html( $product->get_name() ) . '</h1>';
	if ( '' !== trim( (string) $short_desc ) ) {
		echo '<h2 class="product-subtitle">' . esc_html( wp_strip_all_tags( $short_desc ) ) . '</h2>';
	}
	echo '<div class="product-review-wrapper"><div class="trustpilot-top trustpilot-top--product"><img alt="Trustpilot" class="trustpilot-logo-img" src="' . esc_url( VASCO_THEME_URI . '/assets/img/trustpilot.svg' ) . '"/></div></div>';
	// Color pills logic (works for both simple and variable WooCommerce products)
	$colors_html = '';
	$uploads_url = content_url( '/uploads/2026/08/' );
	$colors_map  = array(
		'vasco-translator-q1' => array(
			'phantom-black'  => 'https://vasco-translator.com/385-medium_default/vasco-translator-q1.jpg',
			'slate-blue'     => $uploads_url . 'vasco-translator-q1.jpg',
			'mystic-plum'    => $uploads_url . 'vasco-translator-q1 (1).jpg',
			'scarlet-pulse'  => $uploads_url . 'vasco-translator-q1 (2).jpg',
		),
		'vasco-translator-m4' => array(
			'matte-black'       => 'https://vasco-translator.com/488-medium_default/vasco-translator-m4.jpg',
			'frosty-turquoise'  => $uploads_url . 'vasco-translator-m4.jpg',
			'misty-purple'      => $uploads_url . 'vasco-translator-m4 (1).jpg',
		),
		'vasco-translator-v4' => array(
			'black-onyx'   => 'https://vasco-translator.com/343-medium_default/vasco-translator-v4.jpg',
			'stone-gray'   => $uploads_url . 'vasco-translator-v4.jpg',
			'cobalt-blue'  => $uploads_url . 'vasco-translator-v4 (1).jpg',
			'ruby-red'     => $uploads_url . 'vasco-translator-v4 (2).jpg',
			'pearl-white'  => $uploads_url . 'vasco-translator-v4 (3).jpg',
		),
		'q1-phantomblack-e1' => array(
			'phantom-black'  => $uploads_url . 'q1-phantomblack-e1.webp',
			'slate-blue'     => $uploads_url . 'q1-slateblue-e1.jpg',
			'mystic-plum'    => $uploads_url . 'q1-mysticplum-e1.jpg',
			'scarlet-pulse'  => $uploads_url . 'q1-scarletpulse-e1.jpg',
		),
		'v4-blackonyx-e1' => array(
			'black-onyx'   => $uploads_url . 'v4-blackonyx-e1.webp',
			'stone-gray'   => $uploads_url . 'v4-stonegray-e1.jpg',
			'cobalt-blue'  => $uploads_url . 'v4-cobaltblue-e1.jpg',
			'ruby-red'     => $uploads_url . 'v4-rubyred-e1.jpg',
			'pearl-white'  => $uploads_url . 'v4-pearlwhite-e1.jpg',
		),
	);
	$prod_slug = $product->get_slug();

	$terms = get_the_terms( $product->get_id(), 'pa_color' );
	if ( ! $terms || is_wp_error( $terms ) ) {
		$terms = get_the_terms( $product->get_id(), 'pa_mau-sac' );
	}
	if ( $terms && ! is_wp_error( $terms ) ) {
		$colors_html .= '<div class="product-variants-items combination-variants-item" style="margin: 16px 0;"><p id="legend-color" style="font-weight:600; font-size:15px; color:#1e293b; margin-bottom:8px;">Màu sắc:</p><div class="product-variants-list" role="radiogroup">';
		foreach ( $terms as $idx => $term ) {
			$active_class = ( 0 === $idx ) ? ' active' : '';
			$img_src      = isset( $colors_map[ $prod_slug ][ $term->slug ] ) ? $colors_map[ $prod_slug ][ $term->slug ] : '';
			$img_attr     = $img_src ? ' data-image="' . esc_url( $img_src ) . '"' : '';
			$colors_html .= '<label class="input-container product-variants-item' . $active_class . '"' . $img_attr . ' role="radio"><div class="circle ' . esc_attr( $term->slug ) . '"' . $img_attr . '></div><span class="radio-label body-16">' . esc_html( $term->name ) . '</span></label>';
		}
		$colors_html .= '</div></div>';
	}

	echo $colors_html;

	echo '<div class="product-extended-description" style="margin-bottom: 20px;">';
	echo '<div class="extended-description-icon"><img alt="Miễn phí giao hàng" loading="lazy" src="' . esc_url( VASCO_THEME_URI . '/assets/img/description-icons/free-shipping.svg' ) . '"/><p>Miễn phí giao hàng</p></div>';
	echo '<div class="extended-description-icon"><img alt="30-day return policy" loading="lazy" src="' . esc_url( VASCO_THEME_URI . '/assets/img/description-icons/return-icon.svg' ) . '"/><p>Chính sách đổi trả trong 30 ngày</p></div>';
	echo '<div class="extended-description-icon"><img alt="24-hour delivery" loading="lazy" src="' . esc_url( VASCO_THEME_URI . '/assets/img/description-icons/delivery-icon.svg' ) . '"/><p>Giao hàng trong 24 giờ</p></div>';
	echo '</div>';
	echo '<div class="product-actions js-product-actions">';
	echo '<div class="product-prices-section"><div class="product-prices js-product-prices"><div class="product-price"><div class="current-price"><p class="current-price-value product-price">' . wp_kses_post( $product->get_price_html() ) . '</p></div></div></div></div>';

	// Badge: Được dùng thử trước khi thanh toán
	echo '<p class="vasco-try-before-pay"><span class="vasco-check-icon">✅</span> <span>(Được dùng thử trước khi thanh toán)</span></p>';

	echo '<div class="product-add-to-cart js-product-add-to-cart"><div class="add">';
	echo '<div class="vasco-buttons-row">';
	echo '<a class="btn btn-tu-van-zalo" href="https://zalo.me/0917834532" target="_blank" title="Tư vấn Zalo"><svg width="22" height="22" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16 3C8.8 3 3 8.4 3 15c0 3.7 1.8 6.9 4.6 9.2L6 29l5.3-2.6c1.5.4 3.1.6 4.7.6 7.2 0 13-5.4 13-12S23.2 3 16 3z" fill="#FFFFFF"/><text x="16" y="18.5" font-family="-apple-system, BlinkMacSystemFont, Arial, sans-serif" font-size="8.5" font-weight="900" fill="#0068FF" text-anchor="middle" letter-spacing="-0.3px">Zalo</text></svg> TƯ VẤN NGAY</a>';
	echo '<button aria-label="' . esc_attr( 'MUA NGAY: ' . $product->get_name() ) . '" class="btn btn-primary btn-lg add-to-cart btn-add-to-cart btn-mua-ngay-orange" data-button-action="add-to-cart" data-product-id="' . esc_attr( (string) $product->get_id() ) . '" data-product-name="' . esc_attr( $product->get_name() ) . '" data-product-price="' . esc_attr( (string) $product->get_price() ) . '" data-product-image="' . esc_url( $single_img_url ) . '" type="button"><span class="txt-main">MUA NGAY</span></button>';
	echo '</div></div></div>';

	// Form tư vấn số điện thoại
	echo '<div class="vasco-phone-consult-box">';
	echo '<p class="vasco-phone-consult-text">📞 Hãy để lại <strong class="highlight-orange">số điện thoại</strong>, chúng tôi sẽ gọi ngay cho bạn <strong class="highlight-yellow">tư vấn miễn phí!</strong></p>';
	echo '<div class="vasco-phone-consult-form">';
	echo '<input type="tel" class="vasco-phone-input" id="vasco-phone-input-' . esc_attr( (string) $product->get_id() ) . '" placeholder="Nhập sđt tư vấn miễn phí..." maxlength="12" />';
	echo '<button type="button" class="vasco-phone-submit" onclick="vascoSendPhoneConsult(this, (document.querySelector(\'h1#product-name, .product-name\') ? document.querySelector(\'h1#product-name, .product-name\').innerText.trim() : \'' . esc_js( $product->get_name() ) . '\'))">GỬI ĐI</button>';
	echo '</div>';
	echo '<div class="vasco-phone-consult-msg" style="display:none; margin-top:8px; font-size:13px; font-weight:600; color:#fff;"></div>';
	echo '</div>';
	echo '<script>
function vascoSendPhoneConsult(btn, productName) {
	var box = btn.closest(".vasco-phone-consult-box");
	var input = btn.previousElementSibling;
	var msgDiv = box.querySelector(".vasco-phone-consult-msg");
	var phone = input ? input.value.trim() : "";
	
	var cleanPhone = phone.replace(/[^0-9]/g, "");
	if (!cleanPhone || cleanPhone.length < 9 || cleanPhone.length > 12) {
		if (msgDiv) {
			msgDiv.style.display = "block";
			msgDiv.style.color = "#FFD54F";
			msgDiv.innerText = "Vui lòng nhập số điện thoại hợp lệ (9-12 chữ số).";
		}
		input && input.focus();
		return;
	}

	btn.disabled = true;
	var origText = btn.innerText;
	btn.innerText = "ĐANG GỬI...";

	var formData = new FormData();
	formData.append("action", "vasco_wc_save_consultation");
	formData.append("phone", phone);
	formData.append("product", productName || "Sản phẩm Vasco");

	fetch("' . esc_url( admin_url( 'admin-ajax.php' ) ) . '", {
		method: "POST",
		body: formData
	})
	.then(function(res){ return res.json(); })
	.then(function(data){
		btn.disabled = false;
		btn.innerText = origText;
		if(msgDiv) {
			msgDiv.style.display = "block";
			if(data.success) {
				msgDiv.style.color = "#81C784";
				msgDiv.innerText = "✅ " + (data.data && data.data.message ? data.data.message : "Đã gửi yêu cầu thành công! Chúng tôi sẽ liên hệ lại sớm.");
				input.value = "";
			} else {
				msgDiv.style.color = "#FFD54F";
				msgDiv.innerText = "⚠️ " + (data.data && data.data.message ? data.data.message : "Gửi thất bại, vui lòng thử lại.");
			}
		}
	})
	.catch(function(){
		btn.disabled = false;
		btn.innerText = origText;
		if(msgDiv) {
			msgDiv.style.display = "block";
			msgDiv.style.color = "#FFD54F";
			msgDiv.innerText = "⚠️ Có lỗi xảy ra, vui lòng thử lại.";
		}
	});
}
</script>';

	echo '</div>';
	echo '</div>';
	echo '</div></div></div>';
	// Đọc Thông Số Kỹ Thuật và FAQ từ meta key chuẩn của vasco-theme
	$vasco_specs = get_post_meta( $product->get_id(), '_vasco_specs', true );
	$vasco_faq   = get_post_meta( $product->get_id(), '_vasco_faq', true );
	// Fallback: nếu chưa có dữ liệu thật, dùng mặc định để luôn hiển thị tab
	if ( empty( $vasco_specs ) || ! is_array( $vasco_specs ) ) {
		$vasco_specs = function_exists( 'vasco_get_default_specs' ) ? vasco_get_default_specs() : array();
	}
	if ( empty( $vasco_faq ) || ! is_array( $vasco_faq ) ) {
		$vasco_faq = function_exists( 'vasco_get_default_faqs' ) ? vasco_get_default_faqs() : array();
	}
	$languages  = get_post_meta( $product->get_id(), '_product_supported_languages', true );

	// Truy vấn các nhận xét / đánh giá thực tế từ Database WooCommerce trước khi render Tab
	$comments = get_comments( array(
		'post_id' => $product->get_id(),
		'status'  => 'approve',
	) );
	$review_count   = ! empty( $comments ) ? count( $comments ) : $product->get_review_count();
	$average_rating = $product->get_average_rating();

	if ( ! empty( $comments ) ) {
		$total_stars = 0;
		foreach ( $comments as $c_item ) {
			$c_rating     = (int) get_comment_meta( $c_item->comment_ID, 'rating', true );
			$total_stars += ( $c_rating > 0 ) ? $c_rating : 5;
		}
		$average_rating = $review_count > 0 ? ( $total_stars / $review_count ) : 5;
	}

	echo '<div class="container"><div class="product-tabs-nav">';
	echo '<a class="product-tab-btn active" href="#about">Về sản phẩm</a>';
	echo '<a class="product-tab-btn" href="#reviews">Đánh giá sản phẩm (' . esc_html( (string) $review_count ) . ')</a>';
	if ( ! empty( $vasco_specs ) ) {
		echo '<a class="product-tab-btn" href="#specs">Thông Số Kỹ Thuật</a>';
	}
	if ( ! empty( $vasco_faq ) ) {
		echo '<a class="product-tab-btn" href="#faq">FAQ</a>';
	}
	echo '</div></div>';

	echo '<div class="product-description container py-3">';
	echo '<div id="about" class="tab-content-block">' . wp_kses_post( wpautop( $description ) ) . '</div>';
	
	// Khối Đánh giá sản phẩm (Modular Template Part)
	get_template_part( 'template-parts/product/reviews', null, array( 'product' => $product ) );

	if ( ! empty( $vasco_specs ) && is_array( $vasco_specs ) ) {
		echo '<div id="specs" class="tab-content-block py-4">';
		echo '<div class="vasco-specs-table-wrapper"><table class="vasco-specs-table-frontend"><tbody>';
		foreach ( $vasco_specs as $spec ) {
			if ( empty( $spec['name'] ) ) continue;
			$val_class = empty( $spec['value'] ) ? 'vasco-spec-value--empty' : 'vasco-spec-value--filled';
			$val_html  = ! empty( $spec['value'] )
				? esc_html( $spec['value'] )
				: '<span class="vasco-spec-placeholder">&mdash;</span>';
			echo '<tr class="vasco-spec-row-frontend">';
			echo '<td class="vasco-spec-name">' . esc_html( $spec['name'] ) . '</td>';
			echo '<td class="vasco-spec-value ' . esc_attr( $val_class ) . '">' . $val_html . '</td>';
			echo '</tr>';
		}
		echo '</tbody></table></div>';
		echo '</div>';
	}
	if ( ! empty( $languages ) ) {
		echo '<div id="languages" class="tab-content-block py-4"><h3>Ngôn ngữ hỗ trợ</h3>' . wp_kses_post( wpautop( $languages ) ) . '</div>';
	}
	if ( ! empty( $vasco_faq ) && is_array( $vasco_faq ) ) {
		echo '<div id="faq" class="tab-content-block py-4">';
		echo '<div class="vasco-faq-accordion">';
		foreach ( $vasco_faq as $i => $faq_item ) {
			if ( empty( $faq_item['question'] ) ) continue;
			$ans_id = 'vasco-faq-ans-' . esc_attr( (string) $i );
			echo '<div class="vasco-faq-item">';
			echo '<button class="vasco-faq-question" aria-expanded="false" aria-controls="' . $ans_id . '">';
			echo '<span class="vasco-faq-question-text">' . esc_html( $faq_item['question'] ) . '</span>';
			echo '<span class="vasco-faq-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>';
			echo '</button>';
			echo '<div class="vasco-faq-answer" id="' . $ans_id . '" hidden>';
			echo '<div class="vasco-faq-answer-inner">' . wp_kses_post( nl2br( esc_html( $faq_item['answer'] ?? '' ) ) ) . '</div>';
			echo '</div></div>';
		}
		echo '</div></div>';
	}
	echo '</div>';
	echo '<script>
	document.addEventListener("DOMContentLoaded", function() {
		var tabBtns = document.querySelectorAll(".product-tab-btn");
		var tabBlocks = document.querySelectorAll(".tab-content-block");
		
		function showTab(targetId) {
			tabBlocks.forEach(function(block) {
				if ("#" + block.id === targetId || block.id === targetId.replace("#", "")) {
					block.style.display = "block";
				} else {
					block.style.display = "none";
				}
			});
			tabBtns.forEach(function(btn) {
				if (btn.getAttribute("href") === targetId) {
					btn.classList.add("active");
				} else {
					btn.classList.remove("active");
				}
			});
		}
		
		// Mặc định hiện tab đầu tiên (Về sản phẩm)
		showTab("#about");
		
		tabBtns.forEach(function(btn) {
			btn.addEventListener("click", function(e) {
				e.preventDefault();
				var target = this.getAttribute("href");
				showTab(target);
			});
		});

	});
	</script>';
	echo '</div></section></div></div></section>';

	wp_reset_postdata();
}

/**
 * Tự động duyệt (auto-approve) các Đánh giá sản phẩm (Reviews) ngay khi gửi
 */
function vasco_auto_approve_product_reviews( $approved, $commentdata ) {
	if ( isset( $commentdata['comment_post_ID'] ) ) {
		$post_type = get_post_type( $commentdata['comment_post_ID'] );
		if ( 'product' === $post_type ) {
			return 1; // 1 = Approved ngay lập tức
		}
	}
	return $approved;
}
add_filter( 'pre_comment_approved', 'vasco_auto_approve_product_reviews', 10, 2 );


