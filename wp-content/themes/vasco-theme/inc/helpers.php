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

	$context      = wp_parse_args( $context, array( 'show_description' => true, 'card_style' => 'horizontal' ) );
	$product_id   = $product->get_id();
	$title        = $product->get_name();
	$permalink    = get_permalink( $product_id );
	$image_url    = vasco_theme_get_wc_product_image_url( $product, 'woocommerce_single' );
	$short_desc   = $product->get_short_description();
	$description  = $product->get_description();
	$price_html   = $product->get_price_html();
	$is_in_stock  = $product->is_in_stock();
	$is_grid_card = ( 'grid' === $context['card_style'] );
	$badge_raw    = get_post_meta( $product_id, '_vasco_product_badge', true );
	if ( 'new' === $badge_raw || 'Mới' === $badge_raw ) {
		$flag_html = '<div class="product-flag-wrapper promotion-theme-orange"><div aria-label="Mới" class="body-base product-flag">Mới</div></div>';
	} elseif ( 'bestseller' === $badge_raw || 'Bán chạy nhất' === $badge_raw ) {
		$flag_html = '<div class="product-flag-wrapper promotion-theme-blue" style="background:#0066cc;"><div aria-label="Bán chạy nhất" class="body-base product-flag" style="background:#0066cc;">Bán chạy nhất</div></div>';
	} else {
		$flag_html = '';
	}

	// Lấy danh sách màu sắc biến thể động từ WooCommerce Database
	$colors_html = '';
	if ( $product->is_type( 'variable' ) ) {
		$attributes = $product->get_variation_attributes();
		if ( isset( $attributes['pa_color'] ) || isset( $attributes['pa_mau-sac'] ) || isset( $attributes['color'] ) ) {
			$color_terms = reset( $attributes );
			if ( ! empty( $color_terms ) ) {
				$colors_html .= '<div class="product-variants-items combination-variants-item">' . ( $is_grid_card ? '' : '<p id="legend-color">Màu sắc:</p>' ) . '<div class="product-variants-list" role="radiogroup">';
				foreach ( $color_terms as $idx => $term_slug ) {
					$term = get_term_by( 'slug', $term_slug, 'pa_color' );
					if ( ! $term ) {
						$term = get_term_by( 'slug', $term_slug, 'pa_mau-sac' );
					}
					$color_name = $term ? $term->name : ucwords( str_replace( array( '-', '_' ), ' ', $term_slug ) );
					$active_class = ( 0 === $idx ) ? ' active' : '';
					if ( $is_grid_card ) {
						$colors_html .= '<label class="input-container product-variants-item' . $active_class . '" title="' . esc_attr( $color_name ) . '"><div class="circle ' . esc_attr( $term_slug ) . '"></div></label>';
					} else {
						$colors_html .= '<label class="input-container product-variants-item' . $active_class . '" role="radio"><div class="circle ' . esc_attr( $term_slug ) . '"></div><span class="radio-label">' . esc_html( $color_name ) . '</span></label>';
					}
				}
				$colors_html .= '</div></div>';
			}
		}
	}

	if ( $is_grid_card ) {
		// GIAO DIỆN GRID CARD (Dành cho Phụ kiện & Gói sản phẩm)
		echo '<article class="product-miniature js-product-miniature product-grid-card" tabindex="0">';
		echo '<div class="listing-product-head"><div class="product-thumb-wrapper js-variant-spinner-wrapper"><div class="product-flags js-product-flags">' . $flag_html . '</div><a class="product-link" href="' . esc_url( $permalink ) . '" title="' . esc_attr( $title ) . '"><img alt="' . esc_attr( $title ) . '" height="300" loading="lazy" src="' . esc_url( $image_url ) . '" width="300"/></a></div></div>';
		echo '<div class="listing-product-body">';
		echo '<div class="product-title-wrapper"><h3 class="product-title"><a class="product-link product-title-link" href="' . esc_url( $permalink ) . '" title="' . esc_attr( $title ) . '">' . esc_html( $title ) . '</a></h3></div>';
		echo '<div class="trustpilot-mini"><img alt="Trustpilot" class="trustpilot-logo-img" src="' . esc_url( VASCO_THEME_URI . '/assets/img/trustpilot.svg' ) . '"/></div>';
		echo $colors_html;
		echo '<div class="product-price-and-actions">';
		echo '<div class="product-price">' . wp_kses_post( $price_html ) . '</div>';
		echo '<div class="product-description-button-wrapper"><a class="btn btn-pill-desc" href="' . esc_url( $permalink ) . '">MÔ TẢ</a></div>';
		echo '<div class="product-add-to-cart js-product-add-to-cart">';
		if ( $is_in_stock ) {
			echo '<button type="button" class="btn add-to-cart-btn-full btn-add-to-cart" data-product-id="' . esc_attr( (string) $product_id ) . '" data-product-name="' . esc_attr( $title ) . '" data-product-price="' . esc_attr( (string) $product->get_price() ) . '" data-product-image="' . esc_url( $image_url ) . '"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> THÊM VÀO GIỎ HÀNG</button>';
		} else {
			echo '<a class="btn btn-notify-me-full" href="' . esc_url( $permalink ) . '">THÔNG BÁO CHO TÔI</a>';
		}
		echo '</div></div></div></article>';
	} else {
		// GIAO DIỆN HORIZONTAL CARD (Dành cho Máy dịch & Bộ sản phẩm)
		echo '<article class="product-miniature js-product-miniature product-horizontal-card" tabindex="0">';
		echo '<div class="listing-product-head"><div class="product-thumb-wrapper js-variant-spinner-wrapper"><div class="product-flags js-product-flags">' . $flag_html . '</div><a class="product-link" href="' . esc_url( $permalink ) . '" title="' . esc_attr( $title ) . '"><img alt="' . esc_attr( $title ) . '" height="380" loading="lazy" src="' . esc_url( $image_url ) . '" width="380"/></a></div></div>';
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
		echo '<a class="btn-circle-desc" href="' . esc_url( $permalink ) . '">MÔ<br/>TẢ</a>';
		echo '<div class="product-price">' . wp_kses_post( $price_html ) . '</div>';
		echo '<div class="product-add-to-cart js-product-add-to-cart">';
		if ( $is_in_stock ) {
			echo '<button type="button" class="btn add-to-cart-btn-primary btn-add-to-cart" data-product-id="' . esc_attr( (string) $product_id ) . '" data-product-name="' . esc_attr( $title ) . '" data-product-price="' . esc_attr( (string) $product->get_price() ) . '" data-product-image="' . esc_url( $image_url ) . '"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> THÊM VÀO GIỎ HÀNG</button>';
		} else {
			echo '<a class="btn btn-notify-me" href="' . esc_url( $permalink ) . '">THÔNG BÁO CHO TÔI</a>';
		}
		echo '</div>';
		echo '</div></div></article>';
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

	$is_grid_cat = in_array( $args['active_tab'], array( 'all-products', 'accessories', 'packages' ), true );
	$wrapper_class = $is_grid_cat ? 'products products-grid-listing' : 'products products-horizontal-listing';
	$card_style    = $is_grid_cat ? 'grid' : 'horizontal';

	echo '<section class="relative" id="wrapper"><aside id="notifications"><div class="container"></div></aside><div><div class="breadcrumb-container"><div class="container"><nav aria-label="Đường dẫn điều hướng" class="breadcrumb" data-depth="2"><ol><li><a href="' . esc_url( home_url( '/' ) ) . '"><span class="breadcrumb-link">Trang chủ</span></a><span class="breadcrumb-divider">&gt;</span></li><li><span aria-current="page" class="breadcrumb-current">' . esc_html( $args['heading'] ) . '</span></li></ol></nav></div></div><div class="js-content-wrapper" id="content-wrapper"><section id="main">';
	vasco_theme_render_catalog_tabs( $args['active_tab'] );
	echo '<section class="products-catalog-wrapper" id="products"><div class="number-one"><img alt="số một" class="nr-one" src="' . esc_url( VASCO_THEME_URI . '/assets/img/icons/no1-badge.svg' ) . '"/></div><div class="category-header"><div class="container"><h1 class="h1">' . esc_html( $args['heading'] ) . '</h1></div></div><hr/>';
	if ( ! empty( $args['show_compare'] ) ) {
		echo '<div class="container"><div class="comparison-page-link"><a class="comparison-page-link-anchor view-compare-button" href="' . esc_url( home_url( '/comparison-engine/' ) ) . '"><svg fill="none" height="20" viewbox="0 0 12 20" width="12" xmlns="http://www.w3.org/2000/svg"><path d="M2 18L10 10L2 2" stroke="#4966FF" stroke-linecap="square" stroke-width="2"></path></svg><p>So sánh các máy dịch</p></a></div></div>';
	}
	echo '<div id="js-product-list"><div class="container"><div class="' . esc_attr( $wrapper_class ) . '">';
	if ( empty( $products ) ) {
		echo '<p>Chưa có sản phẩm nào trong danh mục này.</p>';
	} else {
		foreach ( $products as $product ) {
			vasco_theme_render_product_card( $product, array( 'show_description' => ! $is_grid_cat, 'card_style' => $card_style ) );
		}
	}
	echo '</div></div></div><div id="js-product-list-bottom"></div></section></section></div></div></section>';
}

function vasco_theme_render_product_detail_page( $slug = '' ) {
	$current_slug = sanitize_title( (string) $slug );
	if ( '' === $current_slug ) {
		$queried_object = get_queried_object();
		if ( $queried_object && ! empty( $queried_object->post_name ) ) {
			$current_slug = sanitize_title( $queried_object->post_name );
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
	// Variable color pills logic
	$colors_html = '';
	if ( $product->is_type( 'variable' ) ) {
		$attributes = $product->get_variation_attributes();
		if ( isset( $attributes['pa_color'] ) || isset( $attributes['pa_mau-sac'] ) || isset( $attributes['color'] ) ) {
			$color_terms = reset( $attributes );
			if ( ! empty( $color_terms ) ) {
				$colors_html .= '<div class="product-variants-items combination-variants-item"><p id="legend-color">Màu sắc:</p><div class="product-variants-list" role="radiogroup">';
				foreach ( $color_terms as $idx => $term_slug ) {
					$term = get_term_by( 'slug', $term_slug, 'pa_color' );
					if ( ! $term ) {
						$term = get_term_by( 'slug', $term_slug, 'pa_mau-sac' );
					}
					$color_name = $term ? $term->name : ucwords( str_replace( array( '-', '_' ), ' ', $term_slug ) );
					$active_class = ( 0 === $idx ) ? ' active' : '';
					$colors_html .= '<label class="input-container product-variants-item' . $active_class . '" role="radio"><div class="circle ' . esc_attr( $term_slug ) . '"></div><span class="radio-label">' . esc_html( $color_name ) . '</span></label>';
				}
				$colors_html .= '</div></div>';
			}
		}
	}

	echo '<div class="product-action-info-wrapper"><div class="product-extended-description">';
	echo '<div class="extended-description-icon"><img alt="Miễn phí giao hàng" loading="lazy" src="' . esc_url( VASCO_THEME_URI . '/assets/img/description-icons/free-shipping.svg' ) . '"/><p>Miễn phí giao hàng</p></div>';
	echo '<div class="extended-description-icon"><img alt="30-day return policy" loading="lazy" src="' . esc_url( VASCO_THEME_URI . '/assets/img/description-icons/return-icon.svg' ) . '"/><p>Chính sách đổi trả trong 30 ngày</p></div>';
	echo '<div class="extended-description-icon"><img alt="24-hour delivery" loading="lazy" src="' . esc_url( VASCO_THEME_URI . '/assets/img/description-icons/delivery-icon.svg' ) . '"/><p>Giao hàng trong 24 giờ</p></div>';
	echo '</div>';
	echo $colors_html;
	echo '<div class="product-actions js-product-actions">';
	echo '<div class="product-prices-section"><div class="product-prices js-product-prices"><div class="product-price"><div class="current-price"><p class="current-price-value product-price">' . wp_kses_post( $product->get_price_html() ) . '</p></div></div></div></div>';
	echo '<p class="afterpay-text">hoặc 4 kỳ thanh toán không lãi suất với <strong>Afterpay ⓘ</strong></p>';
	$single_img_id = $product->get_image_id();
	$single_img_url = $single_img_id ? wp_get_attachment_image_url( $single_img_id, 'woocommerce_single' ) : wc_placeholder_img_src( 'woocommerce_single' );
	echo '<div class="product-add-to-cart js-product-add-to-cart"><div class="add"><button aria-label="' . esc_attr( 'Thêm vào giỏ hàng: ' . $product->get_name() ) . '" class="btn btn-primary btn-lg add-to-cart btn-add-to-cart" data-button-action="add-to-cart" data-product-id="' . esc_attr( (string) $product->get_id() ) . '" data-product-name="' . esc_attr( $product->get_name() ) . '" data-product-price="' . esc_attr( (string) $product->get_price() ) . '" data-product-image="' . esc_url( $single_img_url ) . '" type="button"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> THÊM VÀO GIỎ HÀNG</button></div></div>';
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
	if ( ! empty( $languages ) ) {
		echo '<a class="product-tab-btn" href="#languages">Ngôn ngữ hỗ trợ</a>';
	}
	if ( ! empty( $vasco_faq ) ) {
		echo '<a class="product-tab-btn" href="#faq">FAQ</a>';
	}
	echo '</div></div>';

	echo '<div class="product-description container py-3">';
	echo '<div id="about" class="tab-content-block">' . wp_kses_post( wpautop( $description ) ) . '</div>';
	
	// Khối Đánh giá sản phẩm (Reviews Block 100% Tiếng Việt)
	echo '<div id="reviews" class="tab-content-block py-4">';
	echo '<div class="product-reviews-container">';
	echo '<h3 class="reviews-title">Đánh giá từ khách hàng (' . esc_html( (string) $review_count ) . ')</h3>';
	if ( $review_count > 0 ) {
		echo '<div class="rating-summary-box"><div class="rating-score">' . esc_html( number_format( (float) $average_rating, 1 ) ) . ' <span class="star-icon">★</span></div><p class="rating-count">Dựa trên ' . esc_html( (string) $review_count ) . ' đánh giá thực tế từ người mua hàng.</p></div>';
	} else {
		echo '<div class="no-reviews-box"><p class="text-muted">Chưa có đánh giá nào cho sản phẩm này. Hãy là người đầu tiên gửi đánh giá trải nghiệm của bạn!</p></div>';
	}
	if ( ! empty( $comments ) ) {
		echo '<div class="wc-reviews-list-wrapper mt-4 mb-4">';
		echo '<ul class="vasco-comments-list" style="list-style:none;padding:0;margin:0;">';
		foreach ( $comments as $comm ) {
			$rating_val = get_comment_meta( $comm->comment_ID, 'rating', true );
			$stars_str  = str_repeat( '★', (int) $rating_val ) . str_repeat( '☆', 5 - (int) $rating_val );
			echo '<li class="vasco-comment-item p-3 mb-3" style="background:#f8f9fa;border-radius:8px;border:1px solid #e9ecef;">';
			echo '<div class="d-flex justify-content-between align-items-center mb-2">';
			echo '<div><strong style="font-size:15px;color:#212529;">' . esc_html( $comm->comment_author ) . '</strong> <span style="color:#ffb800;font-size:16px;margin-left:8px;">' . esc_html( $stars_str ) . '</span></div>';
			echo '<small class="text-muted">' . esc_html( date_i18n( 'd/m/Y H:i', strtotime( $comm->comment_date ) ) ) . '</small>';
			echo '</div>';
			echo '<div class="comment-text" style="color:#495057;font-size:14px;line-height:1.5;">' . wp_kses_post( wpautop( $comm->comment_content ) ) . '</div>';
			echo '</li>';
		}
		echo '</ul></div>';
	}

	// 2. Form viết đánh giá tiếng Việt
	echo '<div class="custom-review-form-box mt-4">';
	echo '<h4 class="form-title mb-3 font-weight-bold">Viết đánh giá của bạn</h4>';
	echo '<form action="' . esc_url( home_url( '/wp-comments-post.php' ) ) . '" method="post" id="commentform" class="comment-form">';
	echo '<div class="rating-select-wrapper mb-3"><label class="d-block mb-1 font-weight-bold">Đánh giá của bạn *</label>';
	echo '<div class="vasco-star-rating" id="vasco-star-rating">';
	echo '<span class="star" data-value="1">★</span>';
	echo '<span class="star" data-value="2">★</span>';
	echo '<span class="star" data-value="3">★</span>';
	echo '<span class="star" data-value="4">★</span>';
	echo '<span class="star" data-value="5">★</span>';
	echo '</div>';
	echo '<input type="hidden" name="rating" id="rating" value="5" required />';
	echo '</div>';
	echo '<div class="form-group mb-3"><label for="comment">Nội dung đánh giá *</label><textarea id="comment" name="comment" cols="45" rows="4" placeholder="Chia sẻ trải nghiệm sử dụng sản phẩm này với người mua khác..." required></textarea></div>';
	echo '<div class="row"><div class="col-md-6 form-group mb-3"><label for="author">Họ và tên *</label><input id="author" name="author" type="text" placeholder="Nhập tên của bạn" required /></div>';
	echo '<div class="col-md-6 form-group mb-3"><label for="email">Địa chỉ Email *</label><input id="email" name="email" type="email" placeholder="Nhập email của bạn" required /></div></div>';
	echo '<input type="hidden" name="comment_post_ID" value="' . esc_attr( (string) $product->get_id() ) . '" id="comment_post_ID" />';
	echo '<input type="hidden" name="comment_parent" id="comment_parent" value="0" />';
	echo '<button name="submit" type="submit" id="submit" class="submit btn-submit-review">GỬI ĐÁNH GIÁ NGAY</button>';
	echo '</form></div>';
	echo '</div></div>';

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


