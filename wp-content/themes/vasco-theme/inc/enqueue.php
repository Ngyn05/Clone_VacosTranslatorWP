<?php
/**
 * Master Enqueue Styles and Scripts for Vasco Theme
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Frontend Styles and Scripts
 */
function vasco_theme_enqueue_all_assets() {
	// 1. Enqueue CSS files from source
	wp_enqueue_style( 'vasco-css-0', VASCO_THEME_URI . '/assets/css/category-BkrAaUZX.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-1', VASCO_THEME_URI . '/assets/css/index-BdfBdicE.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-2', VASCO_THEME_URI . '/assets/css/landing-Dc8GznoV.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-3', VASCO_THEME_URI . '/assets/css/product-Dcv3kZVH.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-4', VASCO_THEME_URI . '/assets/css/smooth-carousel.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-5', VASCO_THEME_URI . '/assets/css/theme-DXqo8zvY.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-6', VASCO_THEME_URI . '/assets/js/jquery/plugins/fancybox/jquery.fancybox.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-7', VASCO_THEME_URI . '/assets/modules/amazonpay/views/css/front.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-8', VASCO_THEME_URI . '/assets/modules/paypal/views/css/paypal_fo.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-9', VASCO_THEME_URI . '/assets/modules/ve_extdescription/views/css/vmap.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-10', VASCO_THEME_URI . '/assets/modules/ve_gdpr_info/views/css/ve_gdpr.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-11', VASCO_THEME_URI . '/assets/modules/ve_notifyproducts/views/assets/css/notifyproduct.css', array(), VASCO_THEME_VERSION );

	// 2. Enqueue Custom Fields and Main Theme Style
	wp_enqueue_style( 'vasco-custom-fields', VASCO_THEME_URI . '/assets/css/vasco-custom-fields.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-main-style', VASCO_THEME_URI . '/style.css', array( 'vasco-css-5', 'vasco-custom-fields' ), VASCO_THEME_VERSION );
	wp_enqueue_script( 'vasco-custom-fields-js', VASCO_THEME_URI . '/assets/js/vasco-custom-fields.js', array(), VASCO_THEME_VERSION, true );

	// 3. Enqueue jQuery Core & Helper Scripts
	wp_enqueue_script( 'jquery' );
	wp_add_inline_script( 'jquery', 'window.$ = window.jQuery;' );

	// 4. Enqueue JavaScript Module Dependencies
	wp_enqueue_script( 'vasco-js-0', VASCO_THEME_URI . '/assets/js/jquery/plugins/fancybox/jquery.fancybox.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-1', VASCO_THEME_URI . '/assets/modules/amazonpay/views/js/button.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-2', VASCO_THEME_URI . '/assets/modules/ps_emailalerts/js/mailalerts.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-3', VASCO_THEME_URI . '/assets/modules/trustpilot/views/js/tp_preview.min.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-4', VASCO_THEME_URI . '/assets/modules/trustpilot/views/js/tp_register.min.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-5', VASCO_THEME_URI . '/assets/modules/trustpilot/views/js/tp_trustbox.min.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-6', VASCO_THEME_URI . '/assets/modules/ve_analytics/views/js/datalayer.9bb08a1c.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-7', VASCO_THEME_URI . '/assets/modules/ve_analytics/views/js/ve-logger.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-8', VASCO_THEME_URI . '/assets/modules/ve_checkboxes/views/assets/js/ve_checkboxes.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-9', VASCO_THEME_URI . '/assets/modules/ve_custom_pages/views/assets/js/events.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-10', VASCO_THEME_URI . '/assets/modules/ve_discounts/views/js/timer.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-11', VASCO_THEME_URI . '/assets/modules/ve_extdescription/views/js/vmap/jquery-ui.min.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-12', VASCO_THEME_URI . '/assets/modules/ve_extdescription/views/js/vmap/jquery.vmap.world.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-13', VASCO_THEME_URI . '/assets/modules/ve_extdescription/views/js/vmap/jvectormap.min.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-14', VASCO_THEME_URI . '/assets/modules/ve_gdpr_info/views/js/js.cookie.min.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-15', VASCO_THEME_URI . '/assets/modules/ve_gdpr_info/views/js/ve_gdpr.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-16', VASCO_THEME_URI . '/assets/js/core.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-17', VASCO_THEME_URI . '/assets/js/category-B_zo-gnJ.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-18', VASCO_THEME_URI . '/assets/js/index-Dp7Wv8_s.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-19', VASCO_THEME_URI . '/assets/js/landing-D-hh3MsL.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-20', VASCO_THEME_URI . '/assets/js/product-Dtgren3K.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-21', VASCO_THEME_URI . '/assets/js/smooth-carousel.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-22', VASCO_THEME_URI . '/assets/js/theme-xdI8XRYL.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-23', VASCO_THEME_URI . '/assets/modules/ps_emailsubscription/views/js/ps_emailsubscription.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-24', VASCO_THEME_URI . '/assets/modules/ps_shoppingcart/ps_shoppingcart.js', array( 'jquery' ), VASCO_THEME_VERSION, true );

	// 5. Enqueue Standalone Vasco Cart Engine
	wp_enqueue_script( 'vasco-cart-engine', VASCO_THEME_URI . '/assets/js/vasco-cart-engine.js', array( 'jquery' ), VASCO_THEME_VERSION, true );

	// Fetch suggested accessories dynamically from WooCommerce
	$suggested_accessories = array();
	if ( function_exists( 'wc_get_products' ) ) {
		$acc_products = wc_get_products(
			array(
				'category' => array( 'accessories' ),
				'limit'    => 4,
				'status'   => 'publish',
			)
		);
		foreach ( $acc_products as $acc ) {
			$image_id  = $acc->get_image_id();
			$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'thumbnail' ) : '';
			if ( ! $image_url ) {
				$image_url = VASCO_THEME_URI . '/assets/img/v4.webp';
			}
			$suggested_accessories[] = array(
				'id'        => $acc->get_id(),
				'name'      => $acc->get_name(),
				'price'     => (float) $acc->get_price(),
				'price_fmt' => wc_price( $acc->get_price() ),
				'image'     => esc_url( $image_url ),
				'permalink' => esc_url( $acc->get_permalink() ),
			);
		}
	}

	// Fallback accessories
	if ( empty( $suggested_accessories ) ) {
		$suggested_accessories = array(
			array(
				'id'        => 0,
				'name'      => 'Miếng dán kính cường lực Vasco Q1',
				'price'     => 490000,
				'price_fmt' => '490.000&nbsp;&#8363;',
				'image'     => VASCO_THEME_URI . '/assets/images/products/381-medium_default/tempered-glass-q1.jpg',
				'permalink' => home_url( '/accessories/tempered-glass-q1/' ),
			),
			array(
				'id'        => 0,
				'name'      => 'Túi bảo vệ cho Vasco Translator Q1',
				'price'     => 750000,
				'price_fmt' => '750.000&nbsp;&#8363;',
				'image'     => VASCO_THEME_URI . '/assets/images/products/438-medium_default/case-for-vasco-translator-q1.jpg',
				'permalink' => home_url( '/accessories/case-for-vasco-translator-q1/' ),
			),
		);
	}

	// Pass Vasco Theme Config data to JS with secure nonce
	wp_add_inline_script(
		'vasco-cart-engine',
		'window.VASCO_THEME_URI = "' . esc_url( VASCO_THEME_URI ) . '"; ' .
		'window.VASCO_CART_URL = "' . esc_url( home_url( '/cart/' ) ) . '"; ' .
		'window.VASCO_HOME_URL = "' . esc_url( home_url( '/' ) ) . '"; ' .
		'window.VASCO_AJAX_URL = "' . esc_url( admin_url( 'admin-ajax.php' ) ) . '"; ' .
		'window.VASCO_WC_NONCE = "' . esc_js( wp_create_nonce( 'vasco_cart_nonce' ) ) . '"; ' .
		'window.VASCO_SUGGESTED_PRODUCTS = ' . wp_json_encode( $suggested_accessories ) . ';',
		'before'
	);
}
add_action( 'wp_enqueue_scripts', 'vasco_theme_enqueue_all_assets' );

/**
 * Enqueue Admin Styles and Scripts
 */
function vasco_theme_enqueue_admin_assets( $hook ) {
	if ( in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
		$screen = get_current_screen();
		if ( $screen && 'product' === $screen->post_type ) {
			wp_enqueue_script(
				'vasco-admin-fields',
				VASCO_THEME_URI . '/assets/js/vasco-admin-fields.js',
				array( 'jquery' ),
				VASCO_THEME_VERSION,
				true
			);
		}
	}
}
add_action( 'admin_enqueue_scripts', 'vasco_theme_enqueue_admin_assets' );

/**
 * AJAX Handler for syncing frontend Add-to-Cart with WooCommerce Cart Session (Secured with Nonce)
 */
function vasco_theme_add_to_wc_cart_ajax() {
	check_ajax_referer( 'vasco_cart_nonce', 'nonce' );

	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		wp_send_json_error( array( 'message' => 'WooCommerce not active' ) );
	}

	$product_id = isset( $_POST['product_id'] ) ? (int) $_POST['product_id'] : 0;
	$quantity   = isset( $_POST['quantity'] ) ? (int) $_POST['quantity'] : 1;

	if ( $product_id > 0 ) {
		WC()->cart->add_to_cart( $product_id, $quantity );
		wp_send_json_success( array( 'cart_count' => WC()->cart->get_cart_contents_count() ) );
	}

	wp_send_json_error( array( 'message' => 'Invalid Product ID' ) );
}
add_action( 'wp_ajax_vasco_add_to_wc_cart', 'vasco_theme_add_to_wc_cart_ajax' );
add_action( 'wp_ajax_nopriv_vasco_add_to_wc_cart', 'vasco_theme_add_to_wc_cart_ajax' );

/**
 * Add type="module" attribute to Vite ES Module scripts.
 */
function vasco_theme_script_loader_tag( $tag, $handle, $src ) {
	$module_handles = array(
		'vasco-js-17',
		'vasco-js-18',
		'vasco-js-19',
		'vasco-js-20',
		'vasco-js-22',
	);
	if ( in_array( $handle, $module_handles, true ) ) {
		return '<script type="module" src="' . esc_url( $src ) . '" id="' . esc_attr( $handle ) . '-js"></script>' . "\n";
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'vasco_theme_script_loader_tag', 10, 3 );
