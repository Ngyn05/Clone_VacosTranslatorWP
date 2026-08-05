<?php
/**
 * SMTP Mailer Integration via PHPMailer
 *
 * Cấu hình gửi mail qua SMTP (Gmail, SendGrid, SMTP riêng...)
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Tự động cấu hình PHPMailer khi WordPress gửi mail
 */
function vasco_configure_smtp( $phpmailer ) {
	// Lấy cấu hình từ wp-config.php hoặc môi trường .env
	$smtp_host  = defined( 'WP_SMTP_HOST' ) ? WP_SMTP_HOST : ( getenv( 'SMTP_HOST' ) ?: '' );
	$smtp_user  = defined( 'WP_SMTP_USER' ) ? WP_SMTP_USER : ( getenv( 'SMTP_USER' ) ?: '' );
	$smtp_pass  = defined( 'WP_SMTP_PASS' ) ? WP_SMTP_PASS : ( getenv( 'SMTP_PASS' ) ?: '' );
	$smtp_port  = defined( 'WP_SMTP_PORT' ) ? WP_SMTP_PORT : ( getenv( 'SMTP_PORT' ) ?: 587 );
	$smtp_secure= defined( 'WP_SMTP_SECURE' ) ? WP_SMTP_SECURE : ( getenv( 'SMTP_SECURE' ) ?: 'tls' );
	$from_email = defined( 'WP_SMTP_FROM' ) ? WP_SMTP_FROM : ( getenv( 'SMTP_FROM' ) ?: '' );
	$from_name  = defined( 'WP_SMTP_NAME' ) ? WP_SMTP_NAME : ( getenv( 'SMTP_NAME' ) ?: get_bloginfo( 'name' ) );

	// Chỉ kích hoạt SMTP khi đã điền đủ Host, User và Password
	if ( ! empty( $smtp_host ) && ! empty( $smtp_user ) && ! empty( $smtp_pass ) ) {
		$phpmailer->isSMTP();
		$phpmailer->Host       = $smtp_host;
		$phpmailer->SMTPAuth   = true;
		$phpmailer->Port       = (int) $smtp_port;
		$phpmailer->Username   = $smtp_user;
		$phpmailer->Password   = $smtp_pass;
		$phpmailer->SMTPSecure = $smtp_secure; // 'tls' hoặc 'ssl'

		if ( ! empty( $from_email ) ) {
			$phpmailer->From     = $from_email;
			$phpmailer->FromName = $from_name;
		}
	}
}
add_action( 'phpmailer_init', 'vasco_configure_smtp' );
