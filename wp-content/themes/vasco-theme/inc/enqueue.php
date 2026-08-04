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
					var self = this;
					// Optimistic UI: thêm vào localStorage trước cho tốc độ
					var cart = self.getCart();
					var existing = cart.find(function(item) { return item.name === product.name; });
					if (existing) {
						existing.quantity += (product.quantity || 1);
					} else {
						cart.push({
							id: product.id || 'prod-' + Date.now(),
							name: product.name || 'Máy phiên dịch Vasco',
							price: product.price || 0,
							priceText: product.priceText || '',
							image: product.image || '',
							link: product.link || window.location.href,
							quantity: product.quantity || 1
						});
					}
					self.saveCart(cart);
					self.showToast(product.name, product);

					// Đồng bộ với WooCommerce cart session qua AJAX
					var pId = parseInt(product.id, 10);
					if (pId > 0 && window.VASCO_AJAX_URL && window.VASCO_WC_NONCE) {
						var fd = new FormData();
						fd.append('action', 'vasco_wc_add_to_cart');
						fd.append('nonce', window.VASCO_WC_NONCE);
						fd.append('product_id', pId);
						fd.append('quantity', product.quantity || 1);
						fetch(window.VASCO_AJAX_URL, { method: 'POST', body: fd })
							.then(function(r) { return r.json(); })
							.then(function(res) {
								if (res.success && res.data) {
									// Cập nhật badge theo WC session count
									window.VASCO_WC_CART_COUNT = res.data.cart_count || 0;
									self.updateBadge();
								}
							})
							.catch(function(e) { /* silent fail */ });
					}
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
					window.VASCO_WC_CART_COUNT = 0;
					this.updateBadge();
				},
				getTotalCount: function() {
					// Ưu tiên WC session count nếu có
					if (window.VASCO_WC_CART_COUNT !== undefined && window.VASCO_WC_CART_COUNT > 0) {
						return window.VASCO_WC_CART_COUNT;
					}
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
				showToast: function(productName, productItem) {
					var existingDrawer = document.getElementById('vasco-side-drawer');
					if (existingDrawer) existingDrawer.remove();
					var existingOverlay = document.getElementById('vasco-drawer-overlay');
					if (existingOverlay) existingOverlay.remove();

					var cartUrl = window.VASCO_CART_URL || '<?php echo esc_url( home_url( "/cart/" ) ); ?>';
					var defaultImg = "<?php echo esc_url( VASCO_THEME_URI . '/assets/img/v4.webp' ); ?>";
					var accGlassImg = "<?php echo esc_url( VASCO_THEME_URI . '/assets/img/v4.webp' ); ?>";
					var accCaseImg = "<?php echo esc_url( VASCO_THEME_URI . '/assets/img/m4/m4-phantom-black.webp' ); ?>";
					var itemImg = (productItem && productItem.image) ? productItem.image : defaultImg;
					var itemName = productName || 'Vasco Translator Q1';

					var overlay = document.createElement('div');
					overlay.id = 'vasco-drawer-overlay';
					overlay.style.cssText = 'position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.4);z-index:999998;opacity:0;transition:opacity 0.3s ease;';

					var drawer = document.createElement('div');
					drawer.id = 'vasco-side-drawer';
					drawer.style.cssText = 'position:fixed;top:0;right:0;width:420px;max-width:90vw;height:100vh;background:#2D3139;color:#ffffff;z-index:999999;box-shadow:-8px 0 32px rgba(0,0,0,0.3);transform:translateX(100%);transition:transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);display:flex;flex-direction:column;font-family:system-ui, -apple-system, sans-serif;';

					var html = '<div style="background:#2D3139;padding:20px 24px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.1);">';
					html += '<h3 style="margin:0;font-size:15px;font-weight:700;letter-spacing:0.5px;color:#ffffff;text-transform:uppercase;">ĐÃ THÊM SẢN PHẨM VÀO GIỎ HÀNG</h3>';
					html += '<button onclick="window.VascoCart.closeDrawer()" style="background:none;border:none;color:#ffffff;font-size:24px;cursor:pointer;padding:0;line-height:1;">&times;</button>';
					html += '</div>';
					html += '<div style="flex:1;overflow-y:auto;padding:24px;background:#ffffff;color:#2D3139;">';
					html += '<div style="background:#EFECE8;border-radius:14px;padding:18px;display:flex;align-items:center;gap:16px;margin-bottom:24px;">';
					html += '<img src="' + itemImg + '" alt="' + itemName + '" style="width:70px;height:70px;object-fit:contain;border-radius:8px;background:#fff;padding:4px;" />';
					html += '<div>';
					html += '<h4 style="margin:0 0 4px 0;font-size:17px;font-weight:700;color:#2D3139;font-family:Georgia, serif;">' + itemName + '</h4>';
					html += '<span style="font-size:13px;color:#718096;">Đã chọn phiên bản chuẩn Vasco</span>';
					html += '</div></div>';

					html += '<div style="text-align:center;margin-bottom:32px;">';
					html += '<a href="' + cartUrl + '" style="display:inline-block;width:100%;background:#3B82F6;color:#ffffff;padding:14px 20px;border-radius:24px;text-decoration:none;font-weight:700;font-size:14px;letter-spacing:0.5px;text-transform:uppercase;box-sizing:border-box;">XEM GIỎ HÀNG & THANH TOÁN</a>';
					html += '</div>';

					html += '<div style="border-top:1px solid #E2E8F0;padding-top:24px;">';
					html += '<h4 style="text-align:center;font-size:15px;font-weight:600;color:#2D3139;margin-bottom:20px;">Gợi ý phụ kiện mua kèm</h4>';
					html += '<div style="display:flex;flex-direction:column;gap:16px;">';
					
					var suggestedList = window.VASCO_SUGGESTED_PRODUCTS || [
						{ name: 'Miếng dán kính cường lực Vasco Q1', price: 490000, price_fmt: '490.000 đ', image: accGlassImg, permalink: '#' },
						{ name: 'Túi bảo vệ kéo khóa Vasco Q1', price: 750000, price_fmt: '750.000 đ', image: accCaseImg, permalink: '#' }
					];

					suggestedList.forEach(function(acc) {
						var accLink = acc.permalink || '#';
						var accImg = acc.image || defaultImg;
						var accPriceDisplay = acc.price_fmt || (window.VascoCart.formatMoney(acc.price));

						html += '<div style="border:1px solid #E2E8F0;border-radius:12px;padding:12px 16px;display:flex;align-items:center;gap:14px;background:#fff;">';
						html += '<a href="' + accLink + '" style="display:block;flex-shrink:0;"><img src="' + accImg + '" alt="' + acc.name + '" style="width:50px;height:50px;object-fit:contain;border-radius:6px;" /></a>';
						html += '<div style="flex:1;min-width:0;">';
						html += '<a href="' + accLink + '" style="display:block;font-size:13px;font-weight:600;color:#2D3139;text-decoration:none;line-height:1.3;margin-bottom:4px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="' + acc.name + '">' + acc.name + '</a>';
						html += '<strong style="font-size:14px;color:#001480;">' + accPriceDisplay + '</strong>';
						html += '</div>';
						html += '<button onclick="window.VascoCart.addItem({id:\'' + (acc.id || 0) + '\',name:\'' + acc.name.replace(/'/g, "\\'") + '\',price:' + acc.price + ',image:\'' + accImg + '\'})" style="background:#F0F5FF;border:1px solid #3B82F6;border-radius:20px;padding:6px 14px;cursor:pointer;color:#3B82F6;font-weight:600;font-size:13px;flex-shrink:0;">+ Thêm</button>';
						html += '</div>';
					});

					html += '</div></div></div>';

					drawer.innerHTML = html;

					document.body.appendChild(overlay);
					document.body.appendChild(drawer);

					overlay.onclick = this.closeDrawer;

					setTimeout(function() {
						overlay.style.opacity = '1';
						drawer.style.transform = 'translateX(0)';
					}, 10);
				},
				closeDrawer: function() {
					var drawer = document.getElementById('vasco-side-drawer');
					var overlay = document.getElementById('vasco-drawer-overlay');
					if (drawer) drawer.style.transform = 'translateX(100%)';
					if (overlay) overlay.style.opacity = '0';
					setTimeout(function() {
						if (drawer) drawer.remove();
						if (overlay) overlay.remove();
					}, 350);
				}
			};

			if (document.readyState === 'loading') {
				document.addEventListener('DOMContentLoaded', function() { window.VascoCart.updateBadge(); });
			} else {
				window.VascoCart.updateBadge();
			}

			document.addEventListener('click', function(ev) {
				var btn = ev.target.closest('.btn-add-to-cart, .add-to-cart, [data-button-action="add-to-cart"], .add_to_cart_button, .product-add-to-cart button, .add-to-cart-btn-full, .add-to-cart-btn-primary');
				if (btn) {
					var isCartPageLink = btn.tagName === 'A' && btn.getAttribute('href') && btn.getAttribute('href').indexOf('/cart/') !== -1 && !btn.classList.contains('btn-add-to-cart') && !btn.classList.contains('add-to-cart');
					if (isCartPageLink) return;

					ev.preventDefault();
					ev.stopPropagation();

					var pId = btn.getAttribute('data-product-id');
					var pName = btn.getAttribute('data-product-name');
					var pPrice = btn.getAttribute('data-product-price');
					var pImg = btn.getAttribute('data-product-image');

					var container = btn.closest('.product-miniature, .product-detail, .product-container, .product-single, .js-product-container, #content, #main, section, body') || document;
					var nameEl = container.querySelector('.product-title a, .product-name, .product-title, h1, [itemprop="name"]');
					var priceEl = container.querySelector('.current-price-value, .current-price, .price, .product-price, .price-new, [itemprop="price"]');
					var imgEl = container.querySelector('.swiper-slide-active img, .product-cover img, .product-thumb-wrapper img, .product-main-image img, .gallery img, img[itemprop="image"]');

					var productName = pName || (nameEl ? nameEl.textContent.trim() : 'Vasco Translator Q1');
					var priceText = priceEl ? priceEl.textContent.trim() : '13.990.000 đ';
					var imgUrl = pImg || (imgEl ? imgEl.src : '');
					var priceNum = pPrice ? parseFloat(pPrice) : (parseFloat(priceText.replace(/[^0-9]/g, '')) || 13990000);

					var productItem = {
						id: pId ? pId : ('prod-' + productName.toLowerCase().replace(/[^a-z0-9]/gi, '-')),
						name: productName,
						price: priceNum,
						priceText: window.VascoCart.formatMoney(priceNum),
						image: imgUrl,
						link: window.location.href,
						quantity: 1
					};

					window.VascoCart.addItem(productItem);
				}
			}, true);

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

	// Get suggested accessories dynamically from WooCommerce / Database
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

	// Fallback if WooCommerce products are not synced yet
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

	// Send Vasco Theme Config data to JS
	wp_add_inline_script( 'jquery', 'window.VASCO_THEME_URI = "' . esc_url( VASCO_THEME_URI ) . '"; window.VASCO_CART_URL = "' . esc_url( home_url( '/cart/' ) ) . '"; window.VASCO_HOME_URL = "' . esc_url( home_url( '/' ) ) . '"; window.VASCO_AJAX_URL = "' . esc_url( admin_url( 'admin-ajax.php' ) ) . '"; window.VASCO_SUGGESTED_PRODUCTS = ' . wp_json_encode( $suggested_accessories ) . ';' );
	wp_add_inline_script( 'jquery', $custom_js );
}
add_action( 'wp_enqueue_scripts', 'vasco_theme_enqueue_all_assets' );

/**
 * AJAX Handler for syncing frontend Add-to-Cart with WooCommerce Cart Session
 */
function vasco_theme_add_to_wc_cart_ajax() {
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


