<?php
/**
 * Template Name: Order Received Page
 *
 * @package VascoTheme
 */

get_header();

// Lấy thông tin đơn hàng
$order_id  = isset( $_GET['order_id'] ) ? absint( $_GET['order_id'] ) : 0;
$order_key = isset( $_GET['order_key'] ) ? sanitize_text_field( $_GET['order_key'] ) : '';
$order     = null;

if ( $order_id && function_exists( 'wc_get_order' ) ) {
	$order = wc_get_order( $order_id );
	// Bảo mật: xác minh order_key
	if ( $order && $order->get_order_key() !== $order_key ) {
		$order = null;
	}
}
?>

<div class="breadcrumb-container" style="background: #F8F9FA; padding: 14px 0; border-bottom: 1px solid #EAECEF;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <nav aria-label="Breadcrumbs" class="breadcrumb">
            <ol style="display: flex; gap: 8px; list-style: none; margin: 0; padding: 0; font-size: 14px; color: #6C757D;">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #001480; text-decoration: none;">Trang chủ</a> <span>&gt;</span></li>
                <li style="color: #2D3139; font-weight: 600;">Xác nhận đơn hàng</li>
            </ol>
        </nav>
    </div>
</div>

<div style="padding: 64px 20px; background: #FAFBFD; min-height: 70vh;">
    <div style="max-width: 720px; margin: 0 auto;">

    <?php if ( $order ) : ?>

        <!-- SUCCESS STATE -->
        <div style="text-align: center; margin-bottom: 40px;">
            <div style="width: 80px; height: 80px; background: #D1FAE5; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 36px;">✅</div>
            <h1 style="font-size: 28px; font-weight: 800; color: #065F46; margin-bottom: 8px;">Đặt hàng thành công!</h1>
            <p style="font-size: 16px; color: #4A5568;">Cảm ơn bạn đã tin tưởng mua sắm tại <strong>Vasco Electronics</strong>.</p>
            <p style="font-size: 14px; color: #718096;">Email xác nhận đã được gửi tới <strong><?php echo esc_html( $order->get_billing_email() ); ?></strong></p>
        </div>

        <!-- ORDER DETAILS -->
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #EAECEF; padding: 28px; margin-bottom: 24px; box-shadow: 0 2px 12px rgba(0,0,0,0.04);">
            <h2 style="font-size: 18px; font-weight: 700; color: #2D3139; margin: 0 0 20px 0; padding-bottom: 12px; border-bottom: 1px solid #EAECEF;">
                Chi tiết đơn hàng <span style="color: #5A67D8;">#<?php echo esc_html( (string) $order->get_order_number() ); ?></span>
            </h2>

            <!-- Order Items -->
            <div style="margin-bottom: 20px;">
                <?php foreach ( $order->get_items() as $item ) :
                    $product  = $item->get_product();
                    $image_id = $product ? $product->get_image_id() : 0;
                    $img_url  = $image_id ? wp_get_attachment_image_url( $image_id, 'thumbnail' ) : wc_placeholder_img_src( 'thumbnail' );
                    $link     = $product ? get_permalink( $item->get_product_id() ) : '#';
                ?>
                <div style="display: flex; align-items: center; gap: 16px; padding: 12px 0; border-bottom: 1px solid #F0F0F0;">
                    <a href="<?php echo esc_url( $link ); ?>">
                        <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $item->get_name() ); ?>" style="width: 60px; height: 60px; object-fit: contain; border-radius: 8px; background: #F8F9FA; padding: 4px;" />
                    </a>
                    <div style="flex: 1;">
                        <a href="<?php echo esc_url( $link ); ?>" style="font-size: 15px; font-weight: 700; color: #2D3139; text-decoration: none;"><?php echo esc_html( $item->get_name() ); ?></a>
                        <div style="font-size: 13px; color: #718096; margin-top: 2px;">Số lượng: <?php echo esc_html( (string) $item->get_quantity() ); ?></div>
                    </div>
                    <div style="font-size: 15px; font-weight: 700; color: #001480; white-space: nowrap;">
                        <?php echo wp_kses_post( wc_price( $item->get_total() ) ); ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Totals -->
            <div style="font-size: 14px; color: #4A5568;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <span>Tạm tính</span>
                    <strong style="color: #2D3139;"><?php echo wp_kses_post( wc_price( $order->get_subtotal() ) ); ?></strong>
                </div>
                <?php if ( $order->get_discount_total() > 0 ) : ?>
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px; color: #28A745;">
                    <span>Giảm giá (<?php echo esc_html( implode( ', ', $order->get_coupon_codes() ) ); ?>)</span>
                    <strong>- <?php echo wp_kses_post( wc_price( $order->get_discount_total() ) ); ?></strong>
                </div>
                <?php endif; ?>
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <span>Vận chuyển</span>
                    <strong style="color: #28A745;">Miễn phí</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding-top: 12px; border-top: 2px solid #2D3139; margin-top: 8px;">
                    <span style="font-size: 16px; font-weight: 700; color: #2D3139;">Tổng cộng</span>
                    <strong style="font-size: 20px; font-weight: 800; color: #5A67D8;"><?php echo wp_kses_post( wc_price( $order->get_total() ) ); ?></strong>
                </div>
            </div>
        </div>

        <!-- Billing Info -->
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #EAECEF; padding: 28px; margin-bottom: 24px; box-shadow: 0 2px 12px rgba(0,0,0,0.04);">
            <h2 style="font-size: 16px; font-weight: 700; color: #2D3139; margin: 0 0 16px 0;">Thông tin giao hàng</h2>
            <div style="font-size: 14px; color: #4A5568; line-height: 1.8;">
                <p style="margin: 0;"><strong><?php echo esc_html( $order->get_billing_first_name() . ' ' . $order->get_billing_last_name() ); ?></strong></p>
                <p style="margin: 0;"><?php echo esc_html( $order->get_billing_address_1() ); ?></p>
                <p style="margin: 0;"><?php echo esc_html( $order->get_billing_city() ); ?></p>
                <p style="margin: 0;">SĐT: <?php echo esc_html( $order->get_billing_phone() ); ?></p>
                <p style="margin: 0;">Email: <?php echo esc_html( $order->get_billing_email() ); ?></p>
            </div>
        </div>

        <!-- Payment Info -->
        <div style="background: #F0F5FF; border-radius: 12px; border: 1px solid #BEE3F8; padding: 20px; margin-bottom: 32px;">
            <p style="margin: 0; font-size: 14px; color: #2C5282;">
                💳 <strong>Phương thức thanh toán:</strong> <?php echo esc_html( $order->get_payment_method_title() ); ?>
            </p>
            <?php if ( 'bacs' === $order->get_payment_method() ) : ?>
            <p style="margin: 8px 0 0; font-size: 13px; color: #4A5568;">
                Vui lòng chuyển khoản theo thông tin sau để hoàn tất đơn hàng. Email xác nhận có chứa thông tin tài khoản chi tiết.
            </p>
            <?php endif; ?>
        </div>

        <!-- Action Buttons -->
        <div style="display: flex; gap: 16px; flex-wrap: wrap; justify-content: center;">
            <a href="<?php echo esc_url( home_url( '/translators/' ) ); ?>" style="display: inline-block; background: #001480; color: #ffffff; padding: 14px 32px; border-radius: 24px; font-size: 15px; font-weight: 700; text-decoration: none; letter-spacing: 0.5px;">
                🛍️ Tiếp tục mua sắm
            </a>
        </div>

    <?php else : ?>

        <!-- INVALID / NOT FOUND STATE -->
        <div style="text-align: center; padding: 48px 20px;">
            <div style="font-size: 64px; margin-bottom: 20px;">🔍</div>
            <h1 style="font-size: 24px; font-weight: 700; color: #2D3139; margin-bottom: 12px;">Không tìm thấy đơn hàng</h1>
            <p style="font-size: 15px; color: #718096; margin-bottom: 32px;">Liên kết đơn hàng không hợp lệ hoặc đã hết hạn. Vui lòng kiểm tra email xác nhận hoặc liên hệ hỗ trợ.</p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: inline-block; background: #001480; color: #fff; padding: 14px 32px; border-radius: 24px; font-size: 15px; font-weight: 700; text-decoration: none;">Về trang chủ</a>
        </div>

    <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>
