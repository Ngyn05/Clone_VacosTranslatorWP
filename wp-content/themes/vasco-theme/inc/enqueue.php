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
	// 1. Enqueue ALL CSS files from source
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

	// 2. Enqueue Main Theme Style (MUST BE LAST to override assets CSS rules)
	wp_enqueue_style( 'vasco-main-style', VASCO_THEME_URI . '/style.css', array( 'vasco-css-5' ), VASCO_THEME_VERSION );


	// 3. Enqueue jQuery Core
	wp_enqueue_script( 'jquery' );
	wp_add_inline_script( 'jquery', 'window.$ = window.jQuery;' );

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
	wp_enqueue_script( 'vasco-js-16', VASCO_THEME_URI . '/assets/js/core.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-17', VASCO_THEME_URI . '/assets/js/category-B_zo-gnJ.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-18', VASCO_THEME_URI . '/assets/js/index-Dp7Wv8_s.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-19', VASCO_THEME_URI . '/assets/js/landing-D-hh3MsL.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-20', VASCO_THEME_URI . '/assets/js/product-Dtgren3K.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-21', VASCO_THEME_URI . '/assets/js/smooth-carousel.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-22', VASCO_THEME_URI . '/assets/js/theme-xdI8XRYL.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-23', VASCO_THEME_URI . '/assets/modules/ps_emailsubscription/views/js/ps_emailsubscription.js', array( 'jquery' ), VASCO_THEME_VERSION, true );
	wp_enqueue_script( 'vasco-js-24', VASCO_THEME_URI . '/assets/modules/ps_shoppingcart/ps_shoppingcart.js', array( 'jquery' ), VASCO_THEME_VERSION, true );

	// Inline DOM fix for product tab menus (About / Specification / Languages / FAQ)
	// and FAQ accordions.
	$cart_url = esc_url( home_url( '/cart/' ) );
	$custom_js = <<<'EOT'
			// Universal Product Tab Switcher Handler (Về sản phẩm / Thông số / Ngôn ngữ / FAQ)
			document.addEventListener('click', function(e) {
				var tabBtn = e.target.closest('.tab-menu .menu-link, .product-menu-container .menu-link, [data-id^="product-"]');
				if (tabBtn) {
					e.preventDefault();
					var targetId = tabBtn.getAttribute('data-id') || tabBtn.getAttribute('aria-controls');
					if (!targetId) return;

					// Switch Active Button Style
					var menuContainer = tabBtn.closest('.tab-menu, .product-menu-container, nav');
					if (menuContainer) {
						menuContainer.querySelectorAll('.menu-link').forEach(function(b) {
							b.classList.remove('current', 'active', 'active-tab');
						});
						tabBtn.classList.add('current', 'active');
					}

					// Switch Active Tab Content
					var allTabs = document.querySelectorAll('.tab-content > .tab, .tab-content > div[id^="product-"]');
					allTabs.forEach(function(tab) {
						if (tab.id === targetId || tab.classList.contains(targetId)) {
							tab.classList.add('active-tab', 'active', 'current');
							tab.style.setProperty('display', 'block', 'important');
						} else {
							tab.classList.remove('active-tab', 'active', 'current');
							tab.style.setProperty('display', 'none', 'important');
						}
					});
				}

				// Universal FAQ Accordion Toggle Handler
				var faqHeader = e.target.closest('.accordion-header, .accordion-title, .faq-question, .accordion-single');
				if (faqHeader) {
					var parentAccordion = faqHeader.closest('.accordion-single, .accordion-item, .faq-item');
					if (parentAccordion) {
						var content = parentAccordion.querySelector('.accordion-hidden, .accordion-content, .faq-answer');
						var icon = parentAccordion.querySelector('svg, .arrow, .icon');
						if (content) {
							content.classList.toggle('show');
							if (content.classList.contains('show')) {
								content.style.setProperty('display', 'block', 'important');
							} else {
								content.style.setProperty('display', 'none', 'important');
							}
						}
						if (icon) icon.classList.toggle('rotate');
					}
				}
			});

			// Universal Carousel Navigation Arrows Click Handler (< and >)
			document.addEventListener('click', function(e) {
				var prevBtn = e.target.closest('.swiper-button-prev, .btn-carousel-prev, .btn-card-prev, .smooth-carousel-btn-prev, .btn-events-prev, .btn-timeline-prev, .btn-colors-prev, .btn-videos-prev');
				var nextBtn = e.target.closest('.swiper-button-next, .btn-carousel-next, .btn-card-next, .smooth-carousel-btn-next, .btn-events-next, .btn-timeline-next, .btn-colors-next, .btn-videos-next');

				if (prevBtn || nextBtn) {
					var btn = prevBtn || nextBtn;
					var isNext = !!nextBtn;
					e.preventDefault();

					var container = btn.closest('.swiper-carousel, .carousel-media, .carousel-awards, .carousel-award, .key-features-section, .translators-carousel, .smooth-carousel-container, .swiper, section');
					if (!container) return;

					var swiperEl = container.classList.contains('swiper') ? container : container.querySelector('.swiper');
					if (swiperEl && swiperEl.swiper) {
						if (isNext) {
							swiperEl.swiper.slideNext();
						} else {
							swiperEl.swiper.slidePrev();
						}
						return;
					}

					var track = container.querySelector('.smooth-carousel-track, .swiper-wrapper');
					if (track) {
						var currentTransform = track.style.transform || '';
						var currentX = 0;
						var match = currentTransform.match(/translate3d\(([-0-9.]+)px/);
						if (match) {
							currentX = parseFloat(match[1]);
						}

						var firstSlide = track.querySelector('.swiper-slide, .smooth-carousel-slide, > div, > a');
						var slideWidth = firstSlide ? (firstSlide.offsetWidth + 20) : 320;
						var newX = isNext ? (currentX - slideWidth) : (currentX + slideWidth);

						var maxScroll = -(track.scrollWidth - container.offsetWidth);
						if (isNaN(maxScroll) || maxScroll > 0) maxScroll = 0;

						if (newX < maxScroll) newX = 0;
						if (newX > 0) newX = maxScroll;

						track.style.transition = 'transform 0.4s cubic-bezier(0.25, 1, 0.5, 1)';
						track.style.transform = 'translate3d(' + newX + 'px, 0, 0)';
					}
				}
			});

			// Vasco E-Commerce Cart Engine
			window.VascoCart = {
				getCart: function() {
					try { return JSON.parse(localStorage.getItem('vasco_cart')) || []; }
					catch(e) { return []; }
				},
				saveCart: function(cart) {
					localStorage.setItem('vasco_cart', JSON.stringify(cart));
					this.updateBadge();
				},
				addItem: function(product) {
					var cart = this.getCart();
					var existing = cart.find(function(item) { return item.name === product.name; });
					if (existing) {
						existing.quantity += (product.quantity || 1);
					} else {
						cart.push({
							id: product.id || 'prod-' + Date.now(),
							name: product.name || 'Máy phiên dịch Vasco',
							price: product.price || 9990000,
							priceText: product.priceText || '9.990.000 đ',
							image: product.image || '',
							link: product.link || window.location.href,
							quantity: product.quantity || 1
						});
					}
					this.saveCart(cart);
					this.showToast(product.name);
				},
				removeItem: function(id) {
					var cart = this.getCart().filter(function(item) { return item.id !== id; });
					this.saveCart(cart);
				},
				updateQuantity: function(id, qty) {
					var cart = this.getCart();
					var item = cart.find(function(i) { return i.id === id; });
					if (item) {
						item.quantity = Math.max(1, qty);
						this.saveCart(cart);
					}
				},
				clearCart: function() {
					localStorage.removeItem('vasco_cart');
					this.updateBadge();
				},
				getTotalCount: function() {
					return this.getCart().reduce(function(sum, item) { return sum + item.quantity; }, 0);
				},
				getTotalPrice: function() {
					return this.getCart().reduce(function(sum, item) {
						var p = typeof item.price === 'number' ? item.price : parseFloat(String(item.price).replace(/[^0-9]/g, '')) || 0;
						return sum + (p * item.quantity);
					}, 0);
				},
				formatMoney: function(num) {
					return new Intl.NumberFormat('vi-VN').format(num) + ' đ';
				},
				updateBadge: function() {
					var count = this.getTotalCount();
					var badges = document.querySelectorAll('.cart-count-badge, .header-cart-count, .cart-quantity-badge, [data-cart-count], .cart-products-count');
					badges.forEach(function(badge) {
						badge.textContent = count;
						badge.style.display = count > 0 ? 'inline-flex' : 'none';
					});
				},
				showToast: function(productName) {
					var existing = document.getElementById('vasco-cart-toast');
					if (existing) existing.remove();

					var cartUrl = window.VASCO_CART_URL || '/cart/';
					var toast = document.createElement('div');
					toast.id = 'vasco-cart-toast';
					toast.style.cssText = 'position:fixed;bottom:24px;right:24px;z-index:999999;background:#ffffff;color:#2D3139;padding:18px 24px;border-radius:14px;box-shadow:0 8px 32px rgba(0,0,0,0.18);display:flex;align-items:center;gap:16px;max-width:440px;border-left:5px solid #001480;animation:vascoSlideUp 0.35s ease;';
					toast.innerHTML = '<div style="flex:1;"><strong style="display:block;font-size:15px;color:#001480;margin-bottom:2px;">Thành công!</strong><span style="font-size:14px;color:#555;">Đã thêm <b>' + (productName || 'Sản phẩm') + '</b> vào giỏ hàng.</span></div>' +
						'<a href="' + cartUrl + '" style="background:#001480;color:#ffffff;padding:9px 16px;border-radius:8px;text-decoration:none;font-weight:600;font-size:13px;white-space:nowrap;">Xem giỏ hàng</a>' +
						'<button onclick="this.parentElement.remove()" style="background:none;border:none;font-size:20px;cursor:pointer;color:#999;padding:0 4px;line-height:1;">&times;</button>';
					document.body.appendChild(toast);

					setTimeout(function() {
						if (toast && toast.parentElement) toast.remove();
					}, 4500);
				}
			};

			if (document.readyState === 'loading') {
				document.addEventListener('DOMContentLoaded', function() { window.VascoCart.updateBadge(); });
			} else {
				window.VascoCart.updateBadge();
			}

			document.addEventListener('click', function(ev) {
				var btn = ev.target.closest('.btn-add-to-cart, .add-to-cart, [data-button-action="add-to-cart"], .add_to_cart_button, .product-add-to-cart button, .btn-primary[href*="cart"], .btn-black[href*="cart"]');
				if (btn) {
					var isCartPageLink = btn.tagName === 'A' && btn.getAttribute('href') && btn.getAttribute('href').indexOf('/cart/') !== -1 && !btn.classList.contains('btn-add-to-cart');
					if (isCartPageLink) return;

					ev.preventDefault();
					var container = btn.closest('.product-detail, .product-container, .product-single, section, body') || document;
					var nameEl = container.querySelector('.product-title, h1, .product-name, [itemprop="name"]');
					var priceEl = container.querySelector('.current-price, .price, .product-price, .price-new, [itemprop="price"]');
					var imgEl = container.querySelector('.product-main-image img, .product-cover img, .gallery img, img[itemprop="image"]');

					var productName = nameEl ? nameEl.textContent.trim() : 'Máy phiên dịch Vasco';
					var priceText = priceEl ? priceEl.textContent.trim() : '9.990.000 đ';
					var imgUrl = imgEl ? imgEl.src : '';
					var priceNum = parseFloat(priceText.replace(/[^0-9]/g, '')) || 9990000;

					window.VascoCart.addItem({
						id: 'prod-' + productName.toLowerCase().replace(/[^a-z0-9]/gi, '-'),
						name: productName,
						price: priceNum,
						priceText: priceText,
						image: imgUrl,
						link: window.location.href,
						quantity: 1
					});
				}
			});

			// Auto Fix for Lazyloaded Images & Hardcoded /themes/vasco-theme Asset Paths
			document.addEventListener('DOMContentLoaded', function() {
				var themeUri = window.VASCO_THEME_URI || '';
				function fixAssetPaths() {
					var fixAttributes = ['src', 'poster', 'data-holder', 'data-src', 'data-folder', 'data-lazy-src'];
					var elements = document.querySelectorAll('img, video, div, source, link, script');
					elements.forEach(function(el) {
						fixAttributes.forEach(function(attr) {
							var val = el.getAttribute(attr);
							if (val && themeUri) {
								if (val.indexOf('<?php echo esc_url( VASCO_THEME_URI . '/assets/' ); ?>') === 0 || val.indexOf('..<?php echo esc_url( VASCO_THEME_URI . '/assets/' ); ?>') === 0) {
									var cleanPath = val.replace(/^(\.\.)?\/themes\/vasco-theme/, '');
									el.setAttribute(attr, themeUri + cleanPath);
								}
							}
						});
					});

					var lazyImgs = document.querySelectorAll('img[data-lazy-src], img[data-src]');
					lazyImgs.forEach(function(img) {
						var realSrc = img.getAttribute('data-lazy-src') || img.getAttribute('data-src');
						if (realSrc) {
							img.src = realSrc;
							img.removeAttribute('data-lazy-src');
							img.removeAttribute('data-src');
						}
					});
				}
				fixAssetPaths();
				setTimeout(fixAssetPaths, 500);
				setTimeout(fixAssetPaths, 2000);
			});
EOT;

	// Send Vasco Theme Config data to JS
	wp_add_inline_script( 'jquery', 'window.VASCO_THEME_URI = "' . esc_url( VASCO_THEME_URI ) . '"; window.VASCO_CART_URL = "' . esc_url( home_url( '/cart/' ) ) . '"; window.VASCO_HOME_URL = "' . esc_url( home_url( '/' ) ) . '";' );
	wp_add_inline_script( 'jquery', $custom_js );
}
add_action( 'wp_enqueue_scripts', 'vasco_theme_enqueue_all_assets' );

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


