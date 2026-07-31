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
