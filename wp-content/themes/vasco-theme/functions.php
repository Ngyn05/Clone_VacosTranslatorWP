<?php
/**
 * Vasco Theme functions and definitions
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'VASCO_THEME_VERSION', '1.0.0' );
define( 'VASCO_THEME_DIR', get_template_directory() );
define( 'VASCO_THEME_URI', get_template_directory_uri() );

// Load Core Modules
require_once VASCO_THEME_DIR . '/inc/setup.php';
require_once VASCO_THEME_DIR . '/inc/enqueue.php';
require_once VASCO_THEME_DIR . '/inc/menus.php';
require_once VASCO_THEME_DIR . '/inc/template-tags.php';
require_once VASCO_THEME_DIR . '/inc/helpers.php';
require_once VASCO_THEME_DIR . '/inc/post-types.php';
require_once VASCO_THEME_DIR . '/inc/activation.php';
