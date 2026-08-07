/**
 * Vasco Theme Cart Engine & Universal UI Component Handlers
 * 
 * Handles optimistic LocalStorage cart, WooCommerce AJAX sync session,
 * side drawer notifications, universal tab switcher, FAQ accordions,
 * carousel control arrows, and lazyload image path fixes.
 *
 * @package VascoTheme
 */

(function () {
	'use strict';

	// Auto-remove any side drawer or toast elements from DOM
	var purgeDrawers = function () {
		['vasco-side-drawer', 'vasco-drawer-overlay', 'blockcart-modal'].forEach(function (id) {
			var el = document.getElementById(id);
			if (el) el.remove();
		});
		document.querySelectorAll('.cart-drawer, .cross-selling-section-drawer, .cross-alert, .cross-alert-error, .toast-animation').forEach(function (el) {
			el.remove();
		});
	};
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', purgeDrawers);
	} else {
		purgeDrawers();
	}
	setInterval(purgeDrawers, 300);

	// ── 1. Universal Product Tab Switcher ──────────────────────────
	document.addEventListener('click', function (e) {
		var tabBtn = e.target.closest('button.menu-link, .product-menu-container button, [data-id^="product-"]');
		if (!tabBtn) return;

		var href = tabBtn.getAttribute('href');
		if (href && href !== '#' && href.indexOf('javascript:') !== 0) return;

		var targetId = tabBtn.getAttribute('data-id') || tabBtn.getAttribute('aria-controls');
		if (!targetId) return;

		// Alias target IDs for description / about / details
		if (targetId === 'product-description' || targetId === 'description' || targetId === 'product-details') {
			var aboutTab = document.getElementById('product-about');
			if (aboutTab) {
				targetId = 'product-about';
			}
		}

		e.preventDefault();

		var menuContainer = tabBtn.closest('.tab-menu, .product-menu-container, nav');
		if (menuContainer) {
			menuContainer.querySelectorAll('.menu-link, button').forEach(function (b) {
				b.classList.remove('current', 'active', 'active-tab');
			});
			tabBtn.classList.add('current', 'active');
		}

		var allTabs = document.querySelectorAll('.tab-content > .tab, .tab-content > div[id^="product-"]');
		var foundMatch = false;
		allTabs.forEach(function (tab) {
			if (tab.id === targetId || tab.classList.contains(targetId) || ((targetId === 'product-about' || targetId === 'product-description') && (tab.id === 'product-about' || tab.id === 'product-description' || tab.id === 'product-details'))) {
				tab.classList.add('active-tab', 'active', 'current');
				tab.style.setProperty('display', 'block', 'important');
				foundMatch = true;
			} else {
				tab.classList.remove('active-tab', 'active', 'current');
				tab.style.setProperty('display', 'none', 'important');
			}
		});

		if (!foundMatch && allTabs.length > 0) {
			allTabs[0].classList.add('active-tab', 'active', 'current');
			allTabs[0].style.setProperty('display', 'block', 'important');
		}
	});

	// ── 2. Universal FAQ Accordion Toggle ─────────────────────────
	document.addEventListener('click', function (e) {
		var faqHeader = e.target.closest('.accordion-header, .accordion-title, .faq-question, .accordion-single');
		if (!faqHeader) return;

		var parentAccordion = faqHeader.closest('.accordion-single, .accordion-item, .faq-item');
		if (!parentAccordion) return;

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
		if (icon) {
			icon.classList.toggle('rotate');
		}
	});

	// ── 3. Universal Carousel Navigation Arrows (< and >) ─────────
	document.addEventListener('click', function (e) {
		var prevBtn = e.target.closest('.swiper-button-prev, .btn-carousel-prev, .btn-card-prev, .smooth-carousel-btn-prev, .btn-events-prev, .btn-timeline-prev, .btn-colors-prev, .btn-videos-prev');
		var nextBtn = e.target.closest('.swiper-button-next, .btn-carousel-next, .btn-card-next, .smooth-carousel-btn-next, .btn-events-next, .btn-timeline-next, .btn-colors-next, .btn-videos-next');

		if (!prevBtn && !nextBtn) return;

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
	});

	// ── 4. Vasco E-Commerce Cart Engine ───────────────────────────
	window.VascoCart = {
		getCart: function () {
			try {
				return JSON.parse(localStorage.getItem('vasco_cart')) || [];
			} catch (e) {
				return [];
			}
		},
		saveCart: function (cart) {
			localStorage.setItem('vasco_cart', JSON.stringify(cart));
			this.updateBadge();
		},
		addItem: function (product, directCheckout) {
			if (directCheckout === undefined) directCheckout = true;
			var self = this;
			// Reset cart array so only the currently selected product is bought
			var cart = [{
				id: product.id || 'prod-' + Date.now(),
				name: product.name || 'Máy phiên dịch Vasco',
				color: product.color || '',
				price: product.price || 0,
				priceText: product.priceText || '',
				image: product.image || '',
				link: product.link || window.location.href,
				quantity: product.quantity || 1
			}];
			self.saveCart(cart);

			var checkoutUrl = window.VASCO_CHECKOUT_URL || (window.VASCO_HOME_URL || '/') + 'checkout/';

			if (!directCheckout) {
				self.showToast(product.name, product);
			}

			var pId = parseInt(product.id, 10) || 0;
			if (window.VASCO_AJAX_URL && window.VASCO_WC_NONCE) {
				var fd = new FormData();
				// Get selected color from active color label
				var activeColorEl = document.querySelector('.product-variants-item.active .radio-label, .product-variants-item.active, .input-container.active .radio-label');
				var selectedColor = '';
				if (activeColorEl) {
					var radioLabel = activeColorEl.querySelector ? activeColorEl.querySelector('.radio-label') : null;
					selectedColor = (radioLabel ? radioLabel.innerText.trim() : activeColorEl.innerText.trim()) || '';
				}

				fd.append('action', 'vasco_wc_add_to_cart');
				fd.append('nonce', window.VASCO_WC_NONCE);
				fd.append('product_id', pId);
				fd.append('product_name', product.name || '');
				fd.append('product_color', selectedColor);
				fd.append('quantity', product.quantity || 1);

				fetch(window.VASCO_AJAX_URL, { method: 'POST', body: fd })
					.then(function (r) { return r.json(); })
					.then(function (res) {
						if (res.success && res.data) {
							window.VASCO_WC_CART_COUNT = res.data.cart_count || 0;
							self.updateBadge();
						}
						if (directCheckout) {
							window.location.href = checkoutUrl;
						}
					})
					.catch(function () {
						if (directCheckout) {
							window.location.href = checkoutUrl;
						}
					});
			} else if (directCheckout) {
				window.location.href = checkoutUrl;
			}
		},
		removeItem: function (id) {
			var cart = this.getCart().filter(function (item) { return item.id !== id; });
			this.saveCart(cart);
		},
		updateQuantity: function (id, qty) {
			var cart = this.getCart();
			var item = cart.find(function (i) { return i.id === id; });
			if (item) {
				item.quantity = Math.max(1, qty);
				this.saveCart(cart);
			}
		},
		clearCart: function () {
			localStorage.removeItem('vasco_cart');
			window.VASCO_WC_CART_COUNT = 0;
			this.updateBadge();
		},
		getTotalCount: function () {
			if (window.VASCO_WC_CART_COUNT !== undefined && window.VASCO_WC_CART_COUNT > 0) {
				return window.VASCO_WC_CART_COUNT;
			}
			return this.getCart().reduce(function (sum, item) { return sum + item.quantity; }, 0);
		},
		getTotalPrice: function () {
			return this.getCart().reduce(function (sum, item) {
				var p = typeof item.price === 'number' ? item.price : parseFloat(String(item.price).replace(/[^0-9]/g, '')) || 0;
				return sum + (p * item.quantity);
			}, 0);
		},
		formatMoney: function (num) {
			return new Intl.NumberFormat('vi-VN').format(num) + ' đ';
		},
		updateBadge: function () {
			var count = this.getTotalCount();
			var badges = document.querySelectorAll('.cart-count-badge, .header-cart-count, .cart-quantity-badge, [data-cart-count], .cart-products-count');
			badges.forEach(function (badge) {
				badge.textContent = count;
				badge.style.display = count > 0 ? 'inline-flex' : 'none';
			});
		},
		showToast: function (productName, productItem) {
			// Toast notification drawer disabled per user request
			var existingDrawer = document.getElementById('vasco-side-drawer');
			if (existingDrawer) existingDrawer.remove();
			var existingOverlay = document.getElementById('vasco-drawer-overlay');
			if (existingOverlay) existingOverlay.remove();
			return;
		},
		closeDrawer: function () {
			var drawer = document.getElementById('vasco-side-drawer');
			var overlay = document.getElementById('vasco-drawer-overlay');
			if (drawer) drawer.style.transform = 'translateX(100%)';
			if (overlay) overlay.style.opacity = '0';
			setTimeout(function () {
				if (drawer) drawer.remove();
				if (overlay) overlay.remove();
			}, 350);
		}
	};

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', function () { window.VascoCart.updateBadge(); });
	} else {
		window.VascoCart.updateBadge();
	}

	// ── 5. Add to Cart & Buy Now Click Delegator ──────────────────
	document.addEventListener('click', function (ev) {
		if (ev.target.closest('.vasco-phone-consult-box, .consultation-quick-form') || ev.target.name === 'phone_consult') {
			return;
		}

		var btn = ev.target.closest('.btn-add-to-cart, .add-to-cart, [data-button-action="add-to-cart"], .add_to_cart_button, .product-add-to-cart button.btn-mua-ngay-orange, .add-to-cart-btn-full, .add-to-cart-btn-primary, .btn-buy-now, .buy-now, [data-button-action="buy-now"]');
		if (!btn) {
			var potentialBtn = ev.target.closest('button, a.btn, a.button, a');
			if (potentialBtn && !potentialBtn.closest('.vasco-phone-consult-box, .consultation-quick-form')) {
				var txt = (potentialBtn.textContent || '').toLowerCase();
				if ((txt.indexOf('thêm vào giỏ') !== -1 || txt.indexOf('mua ngay') !== -1 || txt.indexOf('add to cart') !== -1) && txt.indexOf('xem giỏ hàng') === -1) {
					btn = potentialBtn;
				}
			}
		}
		if (!btn) return;

		if (btn.closest('#vasco-side-drawer') || btn.classList.contains('btn-drawer-add') || btn.getAttribute('data-vasco-handled') === 'true') {
			return;
		}

		var isCartPageLink = btn.tagName === 'A' && btn.getAttribute('href') && btn.getAttribute('href').indexOf('/cart/') !== -1 && !btn.classList.contains('btn-add-to-cart') && !btn.classList.contains('add-to-cart');
		if (isCartPageLink) return;

		ev.preventDefault();
		ev.stopPropagation();

		var pId = btn.getAttribute('data-product-id');
		var pName = btn.getAttribute('data-product-name');
		var pPrice = btn.getAttribute('data-product-price');
		var pImg = btn.getAttribute('data-product-image');

		var container = btn.closest('.product-miniature, .product-detail, .product-container, .product-single, .js-product-container, #content, #main, section, body') || document;
		var nameEl = container.querySelector('.product-name, h1#product-name, .product-title a, .product-title, h1, [itemprop="name"]');
		var priceEl = container.querySelector('.current-price-value, .current-price, .price, .product-price, .price-new, [itemprop="price"]');
		var imgEl = container.querySelector('.swiper-slide-active img, .product-cover img, .product-thumb-wrapper img, .product-main-image img, .gallery img, img[itemprop="image"]');

		var productName = (nameEl ? nameEl.textContent.trim() : '') || pName || 'Vasco Translator Q1';

		// Always include selected color in product name
		// 1. Find active color label
		var activeVariant = document.querySelector('.product-variants-list .product-variants-item.active, .product-variants-list .input-container.active');
		var activeLabelEl = activeVariant ? activeVariant.querySelector('.radio-label') : null;
		var activeLabelText = activeLabelEl ? activeLabelEl.innerText.trim() : '';

		if (activeLabelText) {
			// 2. Strip any previously appended color from the name (use data-base-title if set, else raw)
			var nameEl2 = container.querySelector('[data-base-title]');
			var baseName = nameEl2 ? nameEl2.getAttribute('data-base-title') : productName;

			// Also strip color from raw name if no base-title yet
			if (!nameEl2) {
				var knownColors = ['Phantom Black','Slate Blue','Mystic Plum','Scarlet Pulse','Black Onyx','Stone Gray','Cobalt Blue','Ruby Red','Pearl White','Matte Black','Frosty Turquoise','Misty Purple'];
				knownColors.forEach(function(c) {
					baseName = baseName.replace(new RegExp('\\s*\\(?\\b' + c + '\\b\\)?', 'gi'), '').trim();
				});
			}

			// 3. Rebuild name with color
			if (baseName.indexOf('+') !== -1) {
				var parts = baseName.split('+');
				productName = parts[0].trim() + ' ' + activeLabelText + ' +' + parts.slice(1).join('+').trim();
			} else {
				productName = baseName + ' ' + activeLabelText;
			}
		}
		var priceText = priceEl ? priceEl.textContent.trim() : '13.990.000 đ';
		var imgUrl = pImg || (imgEl ? imgEl.src : '');
		var priceNum = pPrice ? parseFloat(pPrice) : (parseFloat(priceText.replace(/[^0-9]/g, '')) || 13990000);

		var productItem = {
			id: pId ? pId : ('prod-' + productName.toLowerCase().replace(/[^a-z0-9]/gi, '-')),
			name: productName,
			color: activeLabelText || '',
			price: priceNum,
			priceText: window.VascoCart.formatMoney(priceNum),
			image: imgUrl,
			link: window.location.href,
			quantity: 1
		};

		window.VascoCart.addItem(productItem, true);
	}, true);

	// ── 6. Lazyload Image & Path Fixer ─────────────────────────────
	document.addEventListener('DOMContentLoaded', function () {
		var themeUri = window.VASCO_THEME_URI || '';
		function fixAssetPaths() {
			var fixAttributes = ['src', 'poster', 'data-holder', 'data-src', 'data-folder', 'data-lazy-src'];
			var elements = document.querySelectorAll('img, video, div, source, link, script');
			elements.forEach(function (el) {
				fixAttributes.forEach(function (attr) {
					var val = el.getAttribute(attr);
					if (val && themeUri) {
						if (val.indexOf('/themes/vasco-theme/assets/') === 0 || val.indexOf('../themes/vasco-theme/assets/') === 0) {
							var cleanPath = val.replace(/^(\.\.)?\/themes\/vasco-theme/, '');
							el.setAttribute(attr, themeUri + cleanPath);
						}
					}
				});
			});

			var lazyImgs = document.querySelectorAll('img[data-lazy-src], img[data-src]');
			lazyImgs.forEach(function (img) {
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

	// ── 7. Phone Icon Click Handler ────────────────────────────────
	document.addEventListener('click', function (e) {
		var phoneBtn = e.target.closest('#phone-numbers .icon, .phone-number .icon, .phone-icon-link');
		if (phoneBtn) {
			var href = phoneBtn.getAttribute('href');
			if (href && href.indexOf('tel:') === 0) {
				// Allow direct tel: call, do not block or redirect to /contact/
				return;
			}
			e.preventDefault();
			window.location.href = 'tel:1900638400';
		}
	});

	// Chặn hoàn toàn ký tự chữ/ký tự đặc biệt khi gõ vào ô SĐT
	document.addEventListener('input', function (e) {
		if (e.target && e.target.name === 'phone_consult') {
			e.target.value = e.target.value.replace(/[^0-9]/g, '');
		}
	});

	// ── 8. Quick Phone Consultation Handler ───────────────────────
	window.submitQuickConsultation = function(targetEl) {
		var formEl = targetEl.closest('.consultation-quick-form');
		if (!formEl) return;

		var phoneInput = formEl.querySelector('input[name="phone_consult"]');
		var successMsg = formEl.nextElementSibling;
		if (!phoneInput) return;

		var val = phoneInput.value.trim().replace(/\s+/g, '');
		// Ràng buộc số điện thoại Việt Nam chuẩn: 10 số (Bắt đầu bằng 03, 05, 07, 08, 09) hoặc +84
		var phoneRegex = /^(0|\+84)[3|5|7|8|9][0-9]{8}$|^0[0-9]{9}$/;

		if (!val || !phoneRegex.test(val)) {
			phoneInput.focus();
			phoneInput.value = '';
			phoneInput.placeholder = 'Vui lòng nhập SĐT hợp lệ (VD: 0912345678)...';
			phoneInput.style.outline = '2px solid #FF3B30';
			phoneInput.style.background = '#FFF5F5';
			return;
		}

		// Reset styling khi hợp lệ
		phoneInput.style.outline = 'none';
		phoneInput.style.background = 'transparent';

		var btn = formEl.querySelector('button');
		if (btn) { btn.textContent = '...'; btn.disabled = true; }

		var fd = new FormData();
		fd.append('action', 'vasco_wc_save_consultation');
		fd.append('nonce', window.VASCO_WC_NONCE || '');
		fd.append('phone', val);
		fd.append('product', document.title || window.location.href);

		fetch(window.VASCO_AJAX_URL || '/wp-admin/admin-ajax.php', { method: 'POST', body: fd })
			.then(function(res) { return res.json(); })
			.then(function(data) {
				if (data && data.success) {
					formEl.style.display = 'none';
					if (successMsg) successMsg.style.display = 'block';
				} else {
					if (btn) { btn.textContent = 'GỬI ĐI'; btn.disabled = false; }
					phoneInput.focus();
					phoneInput.value = '';
					phoneInput.placeholder = 'SĐT không hợp lệ, thử lại...';
					phoneInput.style.outline = '2px solid #FF3B30';
				}
			})
			.catch(function() {
				formEl.style.display = 'none';
				if (successMsg) successMsg.style.display = 'block';
			});
	};

	// ── 9. Render 2-Button Row & Consultation Form on Product Pages ──
	function initVascoProductBuyActions() {
		// Clean up any boxes mistakenly rendered inside category / catalog miniatures
		var miniatureBoxes = document.querySelectorAll('.product-miniature .vasco-buy-action-box, .product-card .vasco-buy-action-box, .grid-item .vasco-buy-action-box, .products-grid .vasco-buy-action-box');
		miniatureBoxes.forEach(function(el) { el.remove(); });

		// Only run on single product detail pages
		var isSingleProduct = document.body.classList.contains('single-product') ||
		                      document.body.classList.contains('page-template-page-vasco-translator-q1') ||
		                      document.body.classList.contains('page-template-page-vasco-translator-v4') ||
		                      document.body.classList.contains('page-template-page-vasco-translator-m4') ||
		                      document.body.classList.contains('page-template-page-vasco-translator-e1') ||
		                      document.querySelector('.product-detail, .product-information, #product-detail, #add-to-cart-or-refresh');

		if (!isSingleProduct) return;

		var cartContainers = document.querySelectorAll('.product-detail .product-add-to-cart, .product-information .product-add-to-cart, #product-detail .product-add-to-cart, .product-actions .product-add-to-cart, #add-to-cart-or-refresh .product-add-to-cart');
		cartContainers.forEach(function (container) {
			if (container.closest('.product-miniature, .product-card, .grid-item, .products-grid')) return;
			if (container.querySelector('.vasco-buy-action-box')) return;

			var oldBtn = container.querySelector('button.add-to-cart, .add-to-cart, button');
			var pId = oldBtn ? oldBtn.getAttribute('data-product-id') : '';
			var pName = oldBtn ? oldBtn.getAttribute('data-product-name') : '';

			var html = '<div class="vasco-buy-action-box">';
			html += '  <div class="vasco-buttons-row">';
			html += '    <a href="https://zalo.me/0917834532" target="_blank" rel="noopener noreferrer" class="btn-tu-van-zalo">';
			html += '      <svg width="22" height="22" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16 3C8.8 3 3 8.4 3 15c0 3.7 1.8 6.9 4.6 9.2L6 29l5.3-2.6c1.5.4 3.1.6 4.7.6 7.2 0 13-5.4 13-12S23.2 3 16 3z" fill="#FFFFFF"/><text x="16" y="18.5" font-family="-apple-system, BlinkMacSystemFont, Arial, sans-serif" font-size="8.5" font-weight="900" fill="#0068FF" text-anchor="middle" letter-spacing="-0.3px">Zalo</text></svg>';
			html += '      <span>TƯ VẤN NGAY</span>';
			html += '    </a>';
			html += '    <button type="submit" class="btn btn-primary add-to-cart btn-mua-ngay-orange" ' + (pId ? 'data-product-id="' + pId + '" ' : '') + (pName ? 'data-product-name="' + pName + '" ' : '') + 'data-button-action="add-to-cart">';
			html += '      <span class="txt-main">MUA NGAY</span>';
			html += '    </button>';
			html += '  </div>';

			html += '  <div class="vasco-phone-consult-box">';
			html += '    <div class="consult-header">';
			html += '      <div class="consult-text">';
			html += '        Hãy để lại <strong class="hl-yellow">số điện thoại</strong>, chúng tôi sẽ gọi ngay cho bạn <strong class="hl-yellow">tư vấn miễn phí!</strong>';
			html += '      </div>';
			html += '    </div>';
			html += '    <div class="consultation-quick-form" style="display: flex; align-items: center; border-radius: 30px; overflow: hidden; background: #ffffff; padding: 3px 3px 3px 18px; box-shadow: inset 0 2px 4px rgba(0,0,0,0.06), 0 4px 12px rgba(0,0,0,0.1); width: 100%; box-sizing: border-box;">';
			html += '      <input type="tel" name="phone_consult" maxlength="11" placeholder="Nhập sđt tư vấn miễn phí..." style="flex: 1; border: none; background: transparent; padding: 8px 0; font-size: 14px; font-weight: 500; color: #1E293B; outline: none;" oninput="this.value=this.value.replace(/[^0-9]/g,\'\');" onkeydown="if(event.key===\'Enter\'){event.preventDefault();event.stopPropagation();window.submitQuickConsultation(this);}" />';
			html += '      <button type="button" onclick="event.preventDefault(); event.stopPropagation(); window.submitQuickConsultation(this);" style="background: linear-gradient(135deg, #990000 0%, #770000 100%); color: #ffffff; border: none; padding: 10px 24px; border-radius: 24px; font-weight: 800; font-size: 13.5px; cursor: pointer; text-transform: uppercase; letter-spacing: 0.5px; white-space: nowrap; flex-shrink: 0; display: inline-block;">GỬI ĐI</button>';
			html += '    </div>';
			html += '    <div class="consultation-success-msg" style="display: none; margin-top: 10px; font-size: 13.5px; font-weight: 700; color: #FFEB3B; text-align: center;">✓ Cảm ơn bạn! Chúng tôi sẽ liên hệ tư vấn ngay.</div>';
			html += '  </div>';
			html += '</div>';

			container.innerHTML = html;
		});

		// Replace Afterpay simulator elements directly with trial notice
		var afterpayEls = document.querySelectorAll('.AfterpaySimulator, .afterpaySimulator, .afterpay-text');
		afterpayEls.forEach(function (el) {
			el.innerHTML = '<div class="vasco-trial-notice" style="font-size: 14px; color: #475569; font-weight: 600; margin-top: 6px; margin-bottom: 8px; display: flex; align-items: center; gap: 6px;"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" fill="#10B981"/></svg><span>(Được dùng thử trước khi thanh toán)</span></div>';
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initVascoProductBuyActions);
	} else {
		initVascoProductBuyActions();
	}

	// ── 9. Universal Product Description & Title Link Click Delegator ────
	document.addEventListener('click', function (e) {
		var descBtn = e.target.closest('.btn-description, .product-description-button-wrapper a, a.btn-secondary, a.product-title-link, a.product-link');
		if (!descBtn) return;

		// Skip buy buttons or add-to-cart actions
		if (descBtn.classList.contains('add-to-cart') || descBtn.classList.contains('btn-primary') || descBtn.hasAttribute('data-button-action')) {
			return;
		}

		var href = descBtn.getAttribute('href');
		if (href && href !== '#' && href.indexOf('javascript:') !== 0 && href !== 'undefined' && href !== 'null') {
			e.stopPropagation();
			window.location.href = href;
		}
	}, true);

})();

