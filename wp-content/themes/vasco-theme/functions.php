<?php
/**
 * Vasco Theme functions and definitions
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Fix HTTPS/SSL for Reverse Proxies (Flashpanel / Cloudflare / Nginx)
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && strpos( $_SERVER['HTTP_X_FORWARDED_PROTO'], 'https' ) !== false ) {
	$_SERVER['HTTPS'] = 'on';
}

$style_file = get_template_directory() . '/style.css';
define( 'VASCO_THEME_VERSION', file_exists( $style_file ) ? filemtime( $style_file ) : time() );
define( 'VASCO_THEME_DIR', get_template_directory() );
define( 'VASCO_THEME_URI', get_template_directory_uri() );

// Load Core Modules
require_once VASCO_THEME_DIR . '/inc/setup.php';
require_once VASCO_THEME_DIR . '/inc/enqueue.php';
require_once VASCO_THEME_DIR . '/inc/menus.php';
require_once VASCO_THEME_DIR . '/inc/template-tags.php';
require_once VASCO_THEME_DIR . '/inc/helpers.php';
require_once VASCO_THEME_DIR . '/inc/post-types.php';
require_once VASCO_THEME_DIR . '/inc/product-sync.php';
require_once VASCO_THEME_DIR . '/inc/activation.php';
require_once VASCO_THEME_DIR . '/inc/wc-integration.php';
require_once VASCO_THEME_DIR . '/inc/product-fields.php';
require_once VASCO_THEME_DIR . '/inc/smtp.php';


