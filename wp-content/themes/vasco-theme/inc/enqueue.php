<?php
/**
 * Master Enqueue Styles and Scripts for Vasco Theme
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vasco_theme_enqueue_all_assets() {
	// 1. Enqueue Main Theme Style
	wp_enqueue_style( 'vasco-main-style', VASCO_THEME_URI . '/style.css', array(), VASCO_THEME_VERSION );

	// 2. Enqueue ALL CSS files from source
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
	wp_enqueue_style( 'vasco-css-12', VASCO_THEME_URI . '/assets/themes/vasco-theme/assets/css/category-BkrAaUZX.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-13', VASCO_THEME_URI . '/assets/themes/vasco-theme/assets/css/index-BdfBdicE.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-14', VASCO_THEME_URI . '/assets/themes/vasco-theme/assets/css/landing-Dc8GznoV.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-15', VASCO_THEME_URI . '/assets/themes/vasco-theme/assets/css/product-Dcv3kZVH.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-16', VASCO_THEME_URI . '/assets/themes/vasco-theme/assets/css/smooth-carousel.css', array(), VASCO_THEME_VERSION );
	wp_enqueue_style( 'vasco-css-17', VASCO_THEME_URI . '/assets/themes/vasco-theme/assets/css/theme-DXqo8zvY.css', array(), VASCO_THEME_VERSION );


	// 3. Enqueue jQuery Core
	wp_enqueue_script( 'jquery' );

	// 4. Enqueue ALL JavaScript files from source
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
	wp_enqueue_script( 'vasco-js-16', VASCO_THEME_URI . '/assets/themes/core.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-17', VASCO_THEME_URI . '/assets/themes/vasco-theme/assets/js/category-B_zo-gnJ.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-18', VASCO_THEME_URI . '/assets/themes/vasco-theme/assets/js/index-Dp7Wv8_s.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-19', VASCO_THEME_URI . '/assets/themes/vasco-theme/assets/js/landing-D-hh3MsL.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-20', VASCO_THEME_URI . '/assets/themes/vasco-theme/assets/js/product-Dtgren3K.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-21', VASCO_THEME_URI . '/assets/themes/vasco-theme/assets/js/smooth-carousel.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-22', VASCO_THEME_URI . '/assets/themes/vasco-theme/assets/js/theme-xdI8XRYL.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-23', VASCO_THEME_URI . '/assets/themes/vasco-theme/modules/ps_emailsubscription/views/js/ps_emailsubscription.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-24', VASCO_THEME_URI . '/assets/themes/vasco-theme/modules/ps_shoppingcart/ps_shoppingcart.js', array( 'jquery' ), VASCO_THEME_VERSION, true );

	// Inline DOM fix for product tab menus (About / Specification / Languages / FAQ)
	// The real markup is <button class="menu-link" data-id="product-xxx"> inside
	// <nav class="tab-menu">, with matching <div class="tab" id="product-xxx"> panes
	// inside <div class="tab-content">. The theme's own tab JS (a code-split Vite
	// chunk) is missing from the deployed build, so tab clicks never do anything.
	// This delegated listener restores that behavior without depending on the
	// missing chunk.
	$custom_js = "
		(function() {
			function activateTab(menu, targetId) {
				var content = menu.parentElement ? menu.parentElement.querySelector('.tab-content') : null;
				if (!content) {
					content = document.getElementById('tab-content');
				}
				if (!content) return;

				menu.querySelectorAll('.menu-link').forEach(function(btn) {
					btn.classList.toggle('current', btn.getAttribute('data-id') === targetId);
				});
				content.querySelectorAll(':scope > .tab').forEach(function(pane) {
					if (pane.id === targetId) {
						pane.style.display = '';
					} else {
						pane.style.display = 'none';
					}
				});
			}

			document.addEventListener('click', function(e) {
				var btn = e.target.closest('.tab-menu .menu-link[data-id]');
				if (!btn) return;
				var menu = btn.closest('.tab-menu');
				var targetId = btn.getAttribute('data-id');
				if (menu && targetId) {
					activateTab(menu, targetId);
				}
			});
		})();
	";
	wp_add_inline_script( 'jquery', $custom_js );
}
add_action( 'wp_enqueue_scripts', 'vasco_theme_enqueue_all_assets' );


