<?php
/**
 * Product Sync Tools
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'vasco_theme_product_category_map' ) ) {
	function vasco_theme_product_category_map() {
		return array(
			'translators' => 'Máy phiên dịch',
			'accessories' => 'Phụ kiện',
			'bundles'     => 'Bộ sản phẩm',
			'packages'    => 'Gói sản phẩm',
		);
	}
}

function vasco_theme_get_products_data() {
	$json_file = get_template_directory() . '/inc/products-data.json';
	if ( ! file_exists( $json_file ) ) {
		return array();
	}

	$products = json_decode( file_get_contents( $json_file ), true );
	return is_array( $products ) ? $products : array();
}

function vasco_theme_ensure_product_cat_term( $category_slug ) {
	$categories = vasco_theme_product_category_map();
	if ( empty( $categories[ $category_slug ] ) ) {
		return 0;
	}

	$term = term_exists( $category_slug, 'product_cat' );
	if ( ! $term ) {
		$term = wp_insert_term(
			$categories[ $category_slug ],
			'product_cat',
			array(
				'slug' => $category_slug,
			)
		);
	}

	if ( is_wp_error( $term ) ) {
		return 0;
	}

	return is_array( $term ) && ! empty( $term['term_id'] ) ? (int) $term['term_id'] : (int) $term;
}

function vasco_theme_import_product_image( $relative_image_path, $product_title ) {
	if ( empty( $relative_image_path ) ) {
		return 0;
	}

	$source_path = trailingslashit( VASCO_THEME_DIR ) . ltrim( $relative_image_path, '/' );
	if ( ! file_exists( $source_path ) ) {
		return 0;
	}

	$existing_attachment = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'meta_key'       => '_vasco_source_image_path',
			'meta_value'     => $relative_image_path,
		)
	);

	if ( ! empty( $existing_attachment[0] ) ) {
		return (int) $existing_attachment[0];
	}

	$upload = wp_upload_bits( basename( $source_path ), null, file_get_contents( $source_path ) );
	if ( ! empty( $upload['error'] ) || empty( $upload['file'] ) ) {
		return 0;
	}

	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';

	$attachment_id = wp_insert_attachment(
		array(
			'post_mime_type' => wp_check_filetype( $upload['file'] )['type'],
			'post_title'     => sanitize_text_field( $product_title ),
			'post_content'   => '',
			'post_status'    => 'inherit',
		),
		$upload['file']
	);

	if ( is_wp_error( $attachment_id ) || ! $attachment_id ) {
		return 0;
	}

	$metadata = wp_generate_attachment_metadata( $attachment_id, $upload['file'] );
	wp_update_attachment_metadata( $attachment_id, $metadata );
	update_post_meta( $attachment_id, '_vasco_source_image_path', $relative_image_path );

	return (int) $attachment_id;
}

function vasco_theme_sync_products() {
	if ( ! function_exists( 'wc_get_product' ) ) {
		return false;
	}

	// Tự động cấu hình đơn vị tiền tệ WooCommerce thành VNĐ (VND)
	update_option( 'woocommerce_currency', 'VND' );
	update_option( 'woocommerce_currency_pos', 'right_space' );
	update_option( 'woocommerce_price_thousand_sep', '.' );
	update_option( 'woocommerce_price_decimal_sep', ',' );
	update_option( 'woocommerce_price_num_decimals', 0 );

	$products = vasco_theme_get_products_data();
	if ( empty( $products ) ) {
		return false;
	}

	foreach ( $products as $product ) {
		$slug = ! empty( $product['slug'] ) ? sanitize_title( $product['slug'] ) : '';
		if ( '' === $slug ) {
			continue;
		}

		$product_id = 0;
		if ( ! empty( $product['sku'] ) ) {
			$product_id = (int) wc_get_product_id_by_sku( $product['sku'] );
		}

		if ( ! $product_id ) {
			$existing = get_posts(
				array(
					'name'        => $slug,
					'post_type'   => 'product',
					'post_status' => 'any',
					'numberposts' => 1,
				)
			);
			if ( ! empty( $existing[0]->ID ) ) {
				$product_id = (int) $existing[0]->ID;
			}
		}

		$wc_product = $product_id ? wc_get_product( $product_id ) : new WC_Product_Simple();
		if ( ! $wc_product ) {
			continue;
		}

		$title = ! empty( $product['title'] ) ? sanitize_text_field( $product['title'] ) : $slug;
		$raw_price = ! empty( $product['price'] ) ? (float) $product['price'] : 0;

		// Tự động chuyển đổi giá từ USD sang VND nếu giá < 1000 (Ví dụ 549 USD -> 13.990.000 VND)
		if ( $raw_price > 0 && $raw_price < 10000 ) {
			$vnd_map = array(
				'549' => 13990000,
				'449' => 11490000,
				'429' => 10990000,
				'389' => 9990000,
				'799' => 19990000,
				'715' => 17990000,
				'19'  => 490000,
				'29'  => 750000,
				'9'   => 250000,
				'7'   => 180000,
			);
			$price_key = (string) (int) $raw_price;
			$price = isset( $vnd_map[ $price_key ] ) ? (string) $vnd_map[ $price_key ] : (string) round( $raw_price * 25000 );
		} else {
			$price = (string) round( $raw_price );
		}

		$wc_product->set_name( $title );
		$wc_product->set_slug( $slug );
		$wc_product->set_status( 'publish' );
		$wc_product->set_catalog_visibility( 'visible' );
		$wc_product->set_description( ! empty( $product['description'] ) ? wp_kses_post( $product['description'] ) : '' );
		$wc_product->set_short_description( ! empty( $product['excerpt'] ) ? sanitize_textarea_field( $product['excerpt'] ) : '' );
		$wc_product->set_regular_price( $price );
		$wc_product->set_price( $price );
		$wc_product->set_manage_stock( false );
		$wc_product->set_virtual( false );
		$wc_product->set_sold_individually( false );

		if ( ! empty( $product['sku'] ) ) {
			$wc_product->set_sku( sanitize_text_field( $product['sku'] ) );
		}

		$product_id = $wc_product->save();
		if ( ! $product_id ) {
			continue;
		}

		$category_term_id = ! empty( $product['category'] ) ? vasco_theme_ensure_product_cat_term( sanitize_title( $product['category'] ) ) : 0;
		if ( $category_term_id ) {
			wp_set_object_terms( $product_id, array( $category_term_id ), 'product_cat', false );
		}

		if ( ! empty( $product['image'] ) ) {
			$image_id = vasco_theme_import_product_image( $product['image'], $title );
			if ( $image_id ) {
				set_post_thumbnail( $product_id, $image_id );
			}
		}

		if ( ! empty( $product['source_url'] ) ) {
			update_post_meta( $product_id, '_vasco_wc_source_url', esc_url_raw( $product['source_url'] ) );
		}

		update_post_meta( $product_id, '_vasco_wc_seeded', '1' );
		update_post_meta( $product_id, '_vasco_wc_source_slug', $slug );
		update_post_meta( $product_id, '_manage_stock', 'no' );
		update_post_meta( $product_id, '_stock_status', 'instock' );

		// ── Đồng bộ Badge (Huy hiệu sản phẩm) ─────────────────────
		if ( isset( $product['badge'] ) ) {
			update_post_meta( $product_id, '_vasco_product_badge', sanitize_text_field( $product['badge'] ) );
		}

		// ── Đồng bộ Thông Số Kỹ Thuật ────────────────────────────
		if ( ! empty( $product['specs'] ) && is_array( $product['specs'] ) ) {
			$clean_specs = array();
			foreach ( $product['specs'] as $spec ) {
				$name  = sanitize_text_field( $spec['name'] ?? '' );
				$value = sanitize_text_field( $spec['value'] ?? '' );
				if ( ! empty( $name ) ) {
					$clean_specs[] = array( 'name' => $name, 'value' => $value );
				}
			}
			// Chỉ ghi đè nếu trong JSON có dữ liệu thật (không ghi đè nếu admin đã tự nhập)
			$existing_specs = get_post_meta( $product_id, '_vasco_specs', true );
			if ( empty( $existing_specs ) || ! is_array( $existing_specs ) ) {
				update_post_meta( $product_id, '_vasco_specs', $clean_specs );
			}
		}

		// ── Đồng bộ FAQ / Hỏi Đáp ────────────────────────────────
		if ( ! empty( $product['faq'] ) && is_array( $product['faq'] ) ) {
			$clean_faqs = array();
			foreach ( $product['faq'] as $faq ) {
				$question = sanitize_text_field( $faq['question'] ?? '' );
				$answer   = sanitize_textarea_field( $faq['answer'] ?? '' );
				if ( ! empty( $question ) ) {
					$clean_faqs[] = array( 'question' => $question, 'answer' => $answer );
				}
			}
			$existing_faqs = get_post_meta( $product_id, '_vasco_faq', true );
			if ( empty( $existing_faqs ) || ! is_array( $existing_faqs ) ) {
				update_post_meta( $product_id, '_vasco_faq', $clean_faqs );
			}
		}
	} // end foreach $products

	flush_rewrite_rules();
	return true;
}