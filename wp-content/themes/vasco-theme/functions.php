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
$theme_data = file_exists( $style_file ) ? get_file_data( $style_file, array( 'Version' => 'Version' ) ) : array();
$theme_ver  = ! empty( $theme_data['Version'] ) ? $theme_data['Version'] : filemtime( $style_file );
define( 'VASCO_THEME_VERSION', $theme_ver );
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

