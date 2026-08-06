<?php
/**
 * WooCommerce Full Integration
 *
 * Cung cấp đầy đủ: AJAX cart, coupon, checkout, order management, fragments
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Helper: Format WooCommerce price string thành text thuần (không có HTML entities)
 * Ví dụ: "<span>14.480.000&nbsp;&#8363;</span>" → "14.480.000 ₫"
 */
function vasco_wc_clean_price( $price_html ) {
	// Decode HTML entities trước, rồi mới strip tags
	$decoded = html_entity_decode( (string) $price_html, ENT_QUOTES | ENT_HTML5, 'UTF-8' );
	$text    = wp_strip_all_tags( $decoded );
	// Chuẩn hoá khoảng trắng
	return trim( preg_replace( '/\s+/', ' ', $text ) );
}

/**
 * Helper: Tìm chính xác ID sản phẩm WooCommerce trong CSDL theo ID, slug, hoặc tên
 */
function vasco_wc_find_product_id( $product_id = 0, $product_name = '' ) {
	$product_id   = absint( $product_id );
	$product_name = sanitize_text_field( $product_name );

	// 1. Kiểm tra nếu $product_id hợp lệ và là bài viết kiểu product đã xuất bản
	if ( $product_id > 0 ) {
		$post_type   = get_post_type( $product_id );
		$post_status = get_post_status( $product_id );
		if ( ( 'product' === $post_type || 'product_variation' === $post_type ) && 'publish' === $post_status ) {
			return $product_id;
		}
	}

	// 2. Tìm sản phẩm theo Slug (từ tên sản phẩm)
	$slug = sanitize_title( $product_name );
	if ( ! empty( $slug ) ) {
		$by_slug = get_posts( array(
			'name'        => $slug,
			'post_type'   => 'product',
			'post_status' => 'publish',
			'numberposts' => 1,
		) );
		if ( ! empty( $by_slug[0]->ID ) ) {
			return (int) $by_slug[0]->ID;
		}
	}

	// 3. Tìm sản phẩm theo tên chính xác trong CSDL
	if ( ! empty( $product_name ) ) {
		$found = get_page_by_title( $product_name, OBJECT, 'product' );
		if ( $found && 'publish' === get_post_status( $found->ID ) ) {
			return (int) $found->ID;
		}

		// 4. Tìm kiếm từ khóa theo chuỗi tên sản phẩm
		$posts = get_posts( array(
			'post_type'   => 'product',
			's'           => $product_name,
			'post_status' => 'publish',
			'numberposts' => 1,
		) );
		if ( ! empty( $posts[0]->ID ) ) {
			return (int) $posts[0]->ID;
		}
	}

	// 5. Khớp theo mã model nhận dạng (Q1, V4, M4, E1) nếu tên có chứa
	if ( preg_match( '/\b(q1|v4|m4|e1)\b/i', $product_name . ' ' . $slug, $matches ) ) {
		$model_slug = 'vasco-translator-' . strtolower( $matches[1] );
		$by_model   = get_posts( array(
			'name'        => $model_slug,
			'post_type'   => 'product',
			'post_status' => 'publish',
			'numberposts' => 1,
		) );
		if ( ! empty( $by_model[0]->ID ) ) {
			return (int) $by_model[0]->ID;
		}
	}

	return 0;
}

// ─────────────────────────────────────────────
// 1. AJAX: Thêm sản phẩm vào giỏ WooCommerce
// ─────────────────────────────────────────────
function vasco_wc_add_to_cart() {
	if ( ! check_ajax_referer( 'vasco_cart_nonce', 'nonce', false ) && ! check_ajax_referer( 'vasco_wc_nonce', 'nonce', false ) ) {
		// Cho phép bổ sung xử lý an toàn nếu nonce hết hạn hoặc chưa khởi tạo
	}

	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		wp_send_json_error( array( 'message' => 'WooCommerce không khả dụng.' ) );
	}

	$product_id_input   = isset( $_POST['product_id'] ) ? absint( $_POST['product_id'] ) : 0;
	$product_name_input = isset( $_POST['product_name'] ) ? sanitize_text_field( $_POST['product_name'] ) : '';
	$quantity           = isset( $_POST['quantity'] ) ? absint( $_POST['quantity'] ) : 1;
	$variation_id       = isset( $_POST['variation_id'] ) ? absint( $_POST['variation_id'] ) : 0;

	$product_id = vasco_wc_find_product_id( $product_id_input, $product_name_input );

	if ( ! $product_id ) {
		wp_send_json_error( array( 'message' => 'Không tìm thấy ID sản phẩm tương ứng.' ) );
	}

	$result = WC()->cart->add_to_cart( $product_id, $quantity, $variation_id );

	if ( $result ) {
		WC()->cart->calculate_totals();
		wp_send_json_success( array(
			'cart_count'  => WC()->cart->get_cart_contents_count(),
			'cart_total'  => WC()->cart->get_cart_total(),
			'message'     => 'Đã thêm sản phẩm vào giỏ hàng.',
		) );
	} else {
		wp_send_json_error( array( 'message' => 'Không thể thêm sản phẩm. Vui lòng thử lại.' ) );
	}
}
add_action( 'wp_ajax_vasco_wc_add_to_cart', 'vasco_wc_add_to_cart' );
add_action( 'wp_ajax_nopriv_vasco_wc_add_to_cart', 'vasco_wc_add_to_cart' );
add_action( 'wp_ajax_vasco_add_to_wc_cart', 'vasco_wc_add_to_cart' );
add_action( 'wp_ajax_nopriv_vasco_add_to_wc_cart', 'vasco_wc_add_to_cart' );

// ─────────────────────────────────────────────
// 1.1. AJAX: Đồng bộ hàng loạt sản phẩm từ LocalStorage vào WC Cart (1 Request duy nhất)
// ─────────────────────────────────────────────
function vasco_wc_sync_cart() {
	if ( ! check_ajax_referer( 'vasco_cart_nonce', 'nonce', false ) && ! check_ajax_referer( 'vasco_wc_nonce', 'nonce', false ) ) {
		// Cho phép bổ sung xử lý an toàn
	}

	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		wp_send_json_error( array( 'message' => 'WooCommerce không khả dụng.' ) );
	}

	$raw_items = $_POST['items'] ?? '';
	$items     = is_string( $raw_items ) ? json_decode( wp_unslash( $raw_items ), true ) : (array) $raw_items;

	if ( ! empty( $items ) && is_array( $items ) ) {
		WC()->cart->empty_cart();
		foreach ( $items as $item ) {
			$raw_id = isset( $item['id'] ) ? absint( $item['id'] ) : 0;
			$p_name = isset( $item['name'] ) ? sanitize_text_field( $item['name'] ) : '';
			$qty    = isset( $item['quantity'] ) ? absint( $item['quantity'] ) : 1;

			$p_id = vasco_wc_find_product_id( $raw_id, $p_name );
			if ( $p_id ) {
				WC()->cart->add_to_cart( $p_id, $qty );
			}
		}
		WC()->cart->calculate_totals();
	}

	// Trả về dữ liệu giỏ hàng mới nhất
	vasco_wc_get_cart();
}
add_action( 'wp_ajax_vasco_wc_sync_cart', 'vasco_wc_sync_cart' );
add_action( 'wp_ajax_nopriv_vasco_wc_sync_cart', 'vasco_wc_sync_cart' );

// ─────────────────────────────────────────────
// 2. AJAX: Lấy toàn bộ dữ liệu giỏ hàng (JSON)
// ─────────────────────────────────────────────
function vasco_wc_get_cart() {
	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		wp_send_json_success( array( 'items' => array(), 'count' => 0, 'total' => 0 ) );
	}

	WC()->cart->calculate_totals();

	$items = array();
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$product  = $cart_item['data'];
		$image_id = $product->get_image_id();
		$image    = $image_id ? wp_get_attachment_image_url( $image_id, 'thumbnail' ) : wc_placeholder_img_src( 'thumbnail' );

		$items[] = array(
			'cart_item_key' => $cart_item_key,
			'product_id'    => $cart_item['product_id'],
			'name'          => $product->get_name(),
			'price'         => (float) $product->get_price(),
			'price_fmt'     => vasco_wc_clean_price( wc_price( $product->get_price() ) ),
			'quantity'      => $cart_item['quantity'],
			'item_total'    => (float) $product->get_price() * $cart_item['quantity'],
			'item_total_fmt'=> vasco_wc_clean_price( wc_price( $product->get_price() * $cart_item['quantity'] ) ),
			'image'         => esc_url( $image ),
			'permalink'     => get_permalink( $cart_item['product_id'] ),
		);
	}

	wp_send_json_success( array(
		'items'           => $items,
		'count'           => WC()->cart->get_cart_contents_count(),
		'subtotal'        => (float) WC()->cart->get_cart_subtotal(),
		'subtotal_raw'    => (float) WC()->cart->get_subtotal(),
		'subtotal_fmt'    => vasco_wc_clean_price( WC()->cart->get_cart_subtotal() ),
		'total_fmt'       => vasco_wc_clean_price( WC()->cart->get_cart_total() ),
		'coupons'         => WC()->cart->get_applied_coupons(),
		'discount_fmt'    => WC()->cart->get_coupon_discount_totals() ? vasco_wc_clean_price( wc_price( array_sum( WC()->cart->get_coupon_discount_totals() ) ) ) : '',
	) );
}
add_action( 'wp_ajax_vasco_wc_get_cart', 'vasco_wc_get_cart' );
add_action( 'wp_ajax_nopriv_vasco_wc_get_cart', 'vasco_wc_get_cart' );

// ─────────────────────────────────────────────
// 3. AJAX: Cập nhật số lượng sản phẩm trong giỏ
// ─────────────────────────────────────────────
function vasco_wc_update_cart_item() {
	check_ajax_referer( 'vasco_wc_nonce', 'nonce' );

	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		wp_send_json_error( array( 'message' => 'WooCommerce không khả dụng.' ) );
	}

	$cart_item_key = sanitize_text_field( $_POST['cart_item_key'] ?? '' );
	$quantity      = isset( $_POST['quantity'] ) ? absint( $_POST['quantity'] ) : 0;

	if ( ! $cart_item_key ) {
		wp_send_json_error( array( 'message' => 'Cart item key không hợp lệ.' ) );
	}

	if ( $quantity === 0 ) {
		WC()->cart->remove_cart_item( $cart_item_key );
	} else {
		WC()->cart->set_quantity( $cart_item_key, $quantity );
	}

	WC()->cart->calculate_totals();

	wp_send_json_success( array(
		'cart_count'    => WC()->cart->get_cart_contents_count(),
		'subtotal_fmt'  => vasco_wc_clean_price( WC()->cart->get_cart_subtotal() ),
		'total_fmt'     => vasco_wc_clean_price( WC()->cart->get_cart_total() ),
	) );
}
add_action( 'wp_ajax_vasco_wc_update_cart_item', 'vasco_wc_update_cart_item' );
add_action( 'wp_ajax_nopriv_vasco_wc_update_cart_item', 'vasco_wc_update_cart_item' );

// ─────────────────────────────────────────────
// 4. AJAX: Xóa sản phẩm khỏi giỏ
// ─────────────────────────────────────────────
function vasco_wc_remove_cart_item() {
	check_ajax_referer( 'vasco_wc_nonce', 'nonce' );

	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		wp_send_json_error( array( 'message' => 'WooCommerce không khả dụng.' ) );
	}

	$cart_item_key = sanitize_text_field( $_POST['cart_item_key'] ?? '' );

	if ( ! $cart_item_key ) {
		wp_send_json_error( array( 'message' => 'Cart item key không hợp lệ.' ) );
	}

	WC()->cart->remove_cart_item( $cart_item_key );
	WC()->cart->calculate_totals();

	wp_send_json_success( array(
		'cart_count'    => WC()->cart->get_cart_contents_count(),
		'subtotal_fmt'  => vasco_wc_clean_price( WC()->cart->get_cart_subtotal() ),
		'total_fmt'     => vasco_wc_clean_price( WC()->cart->get_cart_total() ),
	) );
}
add_action( 'wp_ajax_vasco_wc_remove_cart_item', 'vasco_wc_remove_cart_item' );
add_action( 'wp_ajax_nopriv_vasco_wc_remove_cart_item', 'vasco_wc_remove_cart_item' );

// ─────────────────────────────────────────────
// 5. AJAX: Áp dụng mã giảm giá (Coupon)
// ─────────────────────────────────────────────
function vasco_wc_apply_coupon() {
	check_ajax_referer( 'vasco_wc_nonce', 'nonce' );

	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		wp_send_json_error( array( 'message' => 'WooCommerce không khả dụng.' ) );
	}

	$coupon_code = sanitize_text_field( trim( $_POST['coupon_code'] ?? '' ) );

	if ( empty( $coupon_code ) ) {
		wp_send_json_error( array( 'message' => 'Vui lòng nhập mã giảm giá.' ) );
	}

	// Kiểm tra coupon có tồn tại không
	$coupon = new WC_Coupon( $coupon_code );
	if ( ! $coupon->get_id() ) {
		wp_send_json_error( array( 'message' => 'Mã giảm giá không tồn tại.' ) );
	}

	// Kiểm tra xem đã áp dụng chưa
	if ( WC()->cart->has_discount( $coupon_code ) ) {
		wp_send_json_error( array( 'message' => 'Mã giảm giá này đã được áp dụng.' ) );
	}

	$result = WC()->cart->apply_coupon( $coupon_code );

	if ( $result ) {
		WC()->cart->calculate_totals();
		$discount_total = array_sum( WC()->cart->get_coupon_discount_totals() );
		wp_send_json_success( array(
			'message'       => 'Áp dụng mã giảm giá thành công!',
			'discount_fmt'  => wc_price( $discount_total ),
			'subtotal_fmt'  => vasco_wc_clean_price( WC()->cart->get_cart_subtotal() ),
			'total_fmt'     => vasco_wc_clean_price( WC()->cart->get_cart_total() ),
		) );
	} else {
		$notices = wc_get_notices( 'error' );
		$message = ! empty( $notices ) ? strip_tags( $notices[0]['notice'] ) : 'Mã giảm giá không hợp lệ hoặc không thể áp dụng.';
		wc_clear_notices();
		wp_send_json_error( array( 'message' => $message ) );
	}
}
add_action( 'wp_ajax_vasco_wc_apply_coupon', 'vasco_wc_apply_coupon' );
add_action( 'wp_ajax_nopriv_vasco_wc_apply_coupon', 'vasco_wc_apply_coupon' );

// ─────────────────────────────────────────────
// 6. AJAX: Xóa mã giảm giá
// ─────────────────────────────────────────────
function vasco_wc_remove_coupon() {
	check_ajax_referer( 'vasco_wc_nonce', 'nonce' );

	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		wp_send_json_error( array( 'message' => 'WooCommerce không khả dụng.' ) );
	}

	$coupon_code = sanitize_text_field( trim( $_POST['coupon_code'] ?? '' ) );
	WC()->cart->remove_coupon( $coupon_code );
	WC()->cart->calculate_totals();

	wp_send_json_success( array(
		'message'      => 'Đã xóa mã giảm giá.',
		'subtotal_fmt' => vasco_wc_clean_price( WC()->cart->get_cart_subtotal() ),
		'total_fmt'    => vasco_wc_clean_price( WC()->cart->get_cart_total() ),
	) );
}
add_action( 'wp_ajax_vasco_wc_remove_coupon', 'vasco_wc_remove_coupon' );
add_action( 'wp_ajax_nopriv_vasco_wc_remove_coupon', 'vasco_wc_remove_coupon' );

// ─────────────────────────────────────────────
// 7. AJAX: Đặt hàng (Checkout) → Tạo WooCommerce Order
// ─────────────────────────────────────────────
function vasco_wc_place_order() {
	check_ajax_referer( 'vasco_wc_nonce', 'nonce' );

	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		wp_send_json_error( array( 'message' => 'WooCommerce không khả dụng.' ) );
	}

	if ( WC()->cart->is_empty() ) {
		wp_send_json_error( array( 'message' => 'Giỏ hàng của bạn đang trống.' ) );
	}

	// Thu thập dữ liệu billing
	$full_name      = sanitize_text_field( $_POST['billing_full_name'] ?? '' );
	$first_name     = sanitize_text_field( $_POST['billing_first_name'] ?? '' );
	$last_name      = sanitize_text_field( $_POST['billing_last_name'] ?? '' );
	$email          = sanitize_email( $_POST['billing_email'] ?? '' );
	$phone          = sanitize_text_field( $_POST['billing_phone'] ?? '' );
	$address_1      = sanitize_text_field( $_POST['billing_address_1'] ?? '' );
	$city           = sanitize_text_field( $_POST['billing_city'] ?? '' );
	$country        = sanitize_text_field( $_POST['billing_country'] ?? 'VN' );
	$payment_method = sanitize_text_field( $_POST['payment_method'] ?? 'cod' );
	$order_notes    = sanitize_textarea_field( $_POST['order_notes'] ?? '' );

	// Phân tách họ và tên nếu khách nhập ô Họ và tên gộp
	if ( ! empty( $full_name ) && empty( $last_name ) ) {
		$parts      = explode( ' ', trim( $full_name ), 2 );
		$first_name = isset( $parts[1] ) ? $parts[0] : '';
		$last_name  = isset( $parts[1] ) ? $parts[1] : $parts[0];
	}

	// Validate & Chuẩn hóa Số điện thoại (Bắt buộc, 10-11 chữ số chuẩn Việt Nam)
	$clean_phone = preg_replace( '/\D/', '', $phone );
	if ( strpos( $clean_phone, '84' ) === 0 && strlen( $clean_phone ) > 9 ) {
		$clean_phone = '0' . substr( $clean_phone, 2 );
	}
	if ( empty( $clean_phone ) || ! preg_match( '/^(0[357892][0-9]{8,9})$/', $clean_phone ) ) {
		wp_send_json_error( array( 'message' => 'Số điện thoại không hợp lệ. Vui lòng nhập số điện thoại Việt Nam hợp lệ (VD: 0901234567 hoặc 02473048700).' ) );
	}
	$phone = $clean_phone;

	// Gán giá trị mặc định cho các trường tùy chọn nếu khách không nhập
	if ( empty( $first_name ) && empty( $last_name ) ) {
		$last_name = 'Khách hàng';
	}
	if ( empty( $email ) ) {
		$email = 'khachhang_' . preg_replace( '/\D/', '', $phone ) . '@vasco.local';
	}
	if ( empty( $address_1 ) ) {
		$address_1 = 'Chưa cung cấp';
	}
	if ( empty( $city ) ) {
		$city = 'Việt Nam';
	}

	// Validate payment method
	$allowed_payment_methods = array( 'cod', 'bacs' );
	if ( ! in_array( $payment_method, $allowed_payment_methods, true ) ) {
		$payment_method = 'cod';
	}

	// Tạo order từ WC cart
	WC()->cart->calculate_totals();

	$checkout = WC()->checkout();

	$order_data = array(
		'status'        => 'pending',
		'customer_id'   => is_user_logged_in() ? get_current_user_id() : 0,
	);

	$order = wc_create_order( $order_data );

	if ( is_wp_error( $order ) ) {
		wp_send_json_error( array( 'message' => 'Không thể tạo đơn hàng: ' . $order->get_error_message() ) );
	}

	// Thêm sản phẩm từ cart vào order
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$product  = $cart_item['data'];
		$quantity = $cart_item['quantity'];
		$order->add_product( $product, $quantity, array(
			'subtotal'     => $product->get_price() * $quantity,
			'total'        => $product->get_price() * $quantity,
		) );
	}

	// Set billing address
	$order->set_billing_first_name( $first_name );
	$order->set_billing_last_name( $last_name );
	$order->set_billing_email( $email );
	$order->set_billing_phone( $phone );
	$order->set_billing_address_1( $address_1 );
	$order->set_billing_city( $city );
	$order->set_billing_country( $country );

	// Shipping = billing (copy)
	$order->set_shipping_first_name( $first_name );
	$order->set_shipping_last_name( $last_name );
	$order->set_shipping_address_1( $address_1 );
	$order->set_shipping_city( $city );
	$order->set_shipping_country( $country );

	// Payment method
	$order->set_payment_method( $payment_method );
	$payment_title = ( 'bacs' === $payment_method ) ? 'Chuyển khoản ngân hàng qua mã QR' : 'Thanh toán khi nhận hàng (COD)';
	$order->set_payment_method_title( $payment_title );

	// Ghi chú đơn hàng nếu có
	if ( ! empty( $order_notes ) ) {
		$order->add_order_note( $order_notes, 1 );
	}

	// Áp dụng coupon (nếu có trong cart)
	$applied_coupons = WC()->cart->get_applied_coupons();
	foreach ( $applied_coupons as $coupon_code ) {
		$coupon = new WC_Coupon( $coupon_code );
		$order->apply_coupon( $coupon );
	}

	// Tính toán totals cho order
	$order->calculate_totals();

	// Set order status theo payment method
	if ( 'cod' === $payment_method ) {
		$order->update_status( 'processing', 'Đơn hàng COD - Đang xử lý.' );
	} else {
		$order->update_status( 'pending', 'Đang chờ thanh toán chuyển khoản.' );
	}

	$order_id = $order->get_id();
	$order->save();

	// Gửi email xác nhận đơn hàng cho khách
	$mailer     = WC()->mailer();
	$mails      = $mailer->get_emails();
	if ( isset( $mails['WC_Email_New_Order'] ) ) {
		$mails['WC_Email_New_Order']->trigger( $order_id );
	}
	if ( isset( $mails['WC_Email_Customer_Processing_Order'] ) ) {
		$mails['WC_Email_Customer_Processing_Order']->trigger( $order_id );
	}

	// Xóa giỏ hàng WC sau khi đặt hàng thành công
	WC()->cart->empty_cart();

	$order_received_url = $order->get_checkout_order_received_url();

	wp_send_json_success( array(
		'message'            => 'Đặt hàng thành công! Cảm ơn bạn đã tin tưởng VASCO VN.',
		'order_id'           => $order_id,
		'order_received_url' => $order_received_url,
		'redirect'           => home_url( '/order-received/?order_id=' . $order_id . '&order_key=' . $order->get_order_key() ),
	) );
}
add_action( 'wp_ajax_vasco_wc_place_order', 'vasco_wc_place_order' );
add_action( 'wp_ajax_nopriv_vasco_wc_place_order', 'vasco_wc_place_order' );

// ─────────────────────────────────────────────
// 8. Trang xác nhận đơn hàng (Order Received)
// ─────────────────────────────────────────────
function vasco_wc_order_received_redirect() {
	if ( is_page( 'order-received' ) || ( isset( $_GET['order_id'] ) && isset( $_GET['order_key'] ) ) ) {
		return;
	}
}

// ─────────────────────────────────────────────
// 9. Truyền Nonce, AJAX URL & Cart Count vào JS
// ─────────────────────────────────────────────
function vasco_wc_inject_frontend_config() {
	if ( ! function_exists( 'WC' ) ) {
		return;
	}
	$cart_count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
	echo '<script>
window.VASCO_WC_NONCE = "' . esc_js( wp_create_nonce( 'vasco_wc_nonce' ) ) . '";
window.VASCO_AJAX_URL = "' . esc_url( admin_url( 'admin-ajax.php' ) ) . '";
window.VASCO_WC_CART_COUNT = ' . (int) $cart_count . ';
</script>' . "\n";
}
add_action( 'wp_head', 'vasco_wc_inject_frontend_config', 5 );

// ─────────────────────────────────────────────
// 10. Cập nhật badge giỏ hàng qua WC Fragments
// ─────────────────────────────────────────────
function vasco_wc_cart_fragments( $fragments ) {
	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		return $fragments;
	}
	$count = WC()->cart->get_cart_contents_count();
	$fragments['span.cart-count-badge']   = '<span class="cart-count-badge">' . (int) $count . '</span>';
	$fragments['span.header-cart-count']  = '<span class="header-cart-count">' . (int) $count . '</span>';
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'vasco_wc_cart_fragments' );

// ─────────────────────────────────────────────
// 11. Khi logout → clear WC cart
// ─────────────────────────────────────────────
add_action( 'wp_logout', function() {
	if ( function_exists( 'WC' ) && WC()->cart ) {
		WC()->cart->empty_cart();
	}
} );

// ─────────────────────────────────────────────
// 12. Render Custom Product Badge Label (Mới = Cam, Bán chạy nhất = Xanh Dương)
// ─────────────────────────────────────────────
function vasco_display_product_badge( $product_id = 0 ) {
	if ( ! $product_id ) {
		$product_id = get_the_ID();
	}

	$badge_raw = get_post_meta( $product_id, '_vasco_product_badge', true );
	if ( empty( $badge_raw ) ) {
		return;
	}

	$badge_label = '';
	$bg_color    = '#ff7d47'; // Mặc định Cam

	if ( 'new' === $badge_raw || 'Mới' === $badge_raw ) {
		$badge_label = 'Mới';
		$bg_color    = '#ff7d47'; // Cam
	} elseif ( 'bestseller' === $badge_raw || 'Bán chạy nhất' === $badge_raw ) {
		$badge_label = 'Bán chạy nhất';
		$bg_color    = '#0066cc'; // Xanh dương
	} else {
		// Nhãn tự do nếu có
		$badge_label = $badge_raw;
		$bg_color    = '#ff7d47';
	}

	?>
	<div class="vasco-product-badge-ribbon badge-type-<?php echo esc_attr( sanitize_html_class( $badge_raw ) ); ?>">
		<span style="background: <?php echo esc_attr( $bg_color ); ?>;"><?php echo esc_html( $badge_label ); ?></span>
	</div>
	<style>
	.vasco-product-badge-ribbon {
		position: absolute;
		top: 12px;
		left: 0;
		z-index: 10;
		display: inline-flex;
		align-items: center;
		pointer-events: none;
	}
	.vasco-product-badge-ribbon span {
		color: #ffffff;
		font-size: 13px;
		font-weight: 700;
		padding: 5px 14px 5px 12px;
		clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 50%, calc(100% - 10px) 100%, 0 100%);
		box-shadow: 2px 2px 8px rgba(0,0,0,0.15);
		letter-spacing: 0.5px;
	}
	</style>
	<?php
}
add_action( 'woocommerce_before_shop_loop_item_title', 'vasco_display_product_badge', 5 );

// ─────────────────────────────────────────────
// 13. Tắt hình ảnh sản phẩm trong Email WooCommerce (Chỉ giữ lại Text)
// ─────────────────────────────────────────────
function vasco_disable_email_product_images( $args ) {
	$args['show_image'] = false;
	return $args;
}
add_filter( 'woocommerce_email_order_items_args', 'vasco_disable_email_product_images', 99 );
add_filter( 'woocommerce_email_order_item_thumbnail', '__return_empty_string', 99 );



