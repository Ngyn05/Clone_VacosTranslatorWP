<?php
/**
 * Product Sync Tools
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'vasco_get_attachment_id_by_filename' ) ) {
	function vasco_get_attachment_id_by_filename( $filename ) {
		global $wpdb;
		$filename = sanitize_file_name( basename( $filename ) );
		if ( empty( $filename ) ) {
			return 0;
		}
		$attachment_id = $wpdb->get_var( $wpdb->prepare(
			"SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_wp_attached_file' AND meta_value LIKE %s LIMIT 1",
			'%' . $wpdb->esc_like( $filename )
		) );
		return $attachment_id ? (int) $attachment_id : 0;
	}
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
	$json_file = get_template_directory() . '/inc/data/products-data.json';
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
	return false; // Disabled sync products
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

		$is_variable = ! empty( $product['colors'] ) && is_array( $product['colors'] );

		if ( $product_id ) {
			$wc_product = wc_get_product( $product_id );
			if ( $is_variable && ! $wc_product->is_type( 'variable' ) ) {
				wp_set_object_terms( $product_id, 'variable', 'product_type' );
				$wc_product = new WC_Product_Variable( $product_id );
			} elseif ( ! $is_variable && ! $wc_product->is_type( 'simple' ) ) {
				wp_set_object_terms( $product_id, 'simple', 'product_type' );
				$wc_product = new WC_Product_Simple( $product_id );
			}
		} else {
			$wc_product = $is_variable ? new WC_Product_Variable() : new WC_Product_Simple();
		}

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

		// ── Đồng bộ Thuộc tính Màu sắc (pa_color) vào WooCommerce Database ──
		if ( ! empty( $product['colors'] ) && is_array( $product['colors'] ) ) {
			$taxonomy = 'pa_color';
			if ( ! taxonomy_exists( $taxonomy ) ) {
				register_taxonomy( $taxonomy, array( 'product' ), array(
					'label'        => 'Color',
					'public'       => false,
					'hierarchical' => false,
					'show_ui'      => false,
				) );
			}

			$term_slugs = array();
			foreach ( $product['colors'] as $c ) {
				$c_slug = sanitize_title( $c['slug'] ?? '' );
				$c_name = sanitize_text_field( $c['name'] ?? '' );
				if ( ! empty( $c_slug ) && ! empty( $c_name ) ) {
					$term = get_term_by( 'slug', $c_slug, $taxonomy );
					if ( ! $term ) {
						$inserted = wp_insert_term( $c_name, $taxonomy, array( 'slug' => $c_slug ) );
						if ( ! is_wp_error( $inserted ) ) {
							$term_slugs[] = $c_slug;
						}
					} else {
						$term_slugs[] = $c_slug;
					}
				}
			}

			if ( ! empty( $term_slugs ) ) {
				wp_set_object_terms( $product_id, $term_slugs, $taxonomy, false );

				$existing_attributes = get_post_meta( $product_id, '_product_attributes', true );
				if ( ! is_array( $existing_attributes ) ) {
					$existing_attributes = array();
				}

				$existing_attributes['pa_color'] = array(
					'name'         => 'pa_color',
					'value'        => '',
					'position'     => 0,
					'is_visible'   => 1,
					'is_variation' => 1,
					'is_taxonomy'  => 1,
				);

				update_post_meta( $product_id, '_product_attributes', $existing_attributes );

				// ── Tự động tạo các Variations thực sự trong Database ──────────────────
				if ( $is_variable && $product_id ) {
					$existing_variations = get_posts( array(
						'post_parent' => $product_id,
						'post_type'   => 'product_variation',
						'numberposts' => -1,
						'fields'      => 'ids',
					) );

					$menu_order = 0;
					foreach ( $product['colors'] as $c ) {
						$c_slug = sanitize_title( $c['slug'] ?? '' );
						$c_name = sanitize_text_field( $c['name'] ?? '' );
						if ( empty( $c_slug ) ) {
							continue;
						}

						$found_var_id = 0;
						foreach ( $existing_variations as $ev_id ) {
							$saved_color = get_post_meta( $ev_id, 'attribute_pa_color', true );
							if ( $saved_color === $c_slug ) {
								$found_var_id = $ev_id;
								break;
							}
						}

						$variation = $found_var_id ? new WC_Product_Variation( $found_var_id ) : new WC_Product_Variation();
						$variation->set_parent_id( $product_id );
						$variation->set_status( 'publish' );
						$variation->set_attributes( array( 'pa_color' => $c_slug ) );
						$variation->set_regular_price( $price );
						$variation->set_price( $price );
						$variation->set_manage_stock( false );
						$variation->set_stock_status( 'instock' );
						$variation->set_menu_order( $menu_order );
						$menu_order++;

						// Bản đồ ánh xạ tên file ảnh cho từng màu sắc variation của sản phẩm
						$var_image_map = array(
							'vasco-translator-q1' => array(
								'phantom-black' => 'vasco-translator-q1-3.png',
								'slate-blue'    => 'vasco-translator-q1.webp',
								'mystic-plum'   => 'vasco-translator-q1 (1).jpg',
								'scarlet-pulse' => 'vasco-translator-q1 (2).jpg',
							),
							'vasco-translator-m4' => array(
								'matte-black'      => 'vasco-translator-m4.jpg',
								'frosty-turquoise' => 'vasco-translator-m4.jpg',
								'misty-purple'     => 'vasco-translator-m4 (1).jpg',
							),
							'vasco-translator-v4' => array(
								'black-onyx'  => 'vasco-translator-v4.jpg',
								'stone-gray'  => 'vasco-translator-v4 (1).jpg',
								'cobalt-blue' => 'vasco-translator-v4 (2).jpg',
								'ruby-red'    => 'vasco-translator-v4 (3).jpg',
								'pearl-white' => 'vasco-translator-v4.jpg',
							),
							'q1-phantomblack-e1' => array(
								'phantom-black' => 'q1-phantomblack-e1.webp',
								'slate-blue'    => 'q1-slateblue-e1.webp',
								'mystic-plum'   => 'q1-mysticplum-e1.webp',
								'scarlet-pulse' => 'q1-scarletpulse-e1.webp',
							),
							'v4-blackonyx-e1' => array(
								'black-onyx'  => 'v4-blackonyx-e1.webp',
								'stone-gray'  => 'v4-stonegray-e1.webp',
								'cobalt-blue' => 'v4-cobaltblue-e1.webp',
								'ruby-red'    => 'v4-rubyred-e1.webp',
								'pearl-white' => 'v4-pearlwhite-e1.webp',
							),
						);

						$target_filename = isset( $var_image_map[ $slug ][ $c_slug ] ) ? $var_image_map[ $slug ][ $c_slug ] : '';
						$var_img_id = 0;
						if ( ! empty( $target_filename ) ) {
							$var_img_id = vasco_get_attachment_id_by_filename( $target_filename );
						}

						if ( ! $var_img_id && ! empty( $product['image'] ) ) {
							$var_img_id = vasco_theme_import_product_image( $product['image'], $title );
						}

						if ( $var_img_id ) {
							$variation->set_image_id( $var_img_id );
						}

						$variation->save();
					}
				}
			}
		}
	} // end foreach $products

	flush_rewrite_rules();
	return true;
}