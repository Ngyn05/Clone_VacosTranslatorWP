/**
 * Custom Product Fields JavaScript for Vasco Theme
 * Handles Star Rating Interactive, FAQ Accordion Toggles & Dynamic Color Variant Image/Title Switcher
 */

document.addEventListener("DOMContentLoaded", function() {
	// ── 1. FAQ Accordion Toggle ──────────────────────────────
	document.querySelectorAll(".vasco-faq-question").forEach(function(btn) {
		btn.addEventListener("click", function() {
			var expanded = this.getAttribute("aria-expanded") === "true";
			var answerId = this.getAttribute("aria-controls");
			var answerEl = document.getElementById(answerId);
			this.setAttribute("aria-expanded", expanded ? "false" : "true");
			this.classList.toggle("vasco-faq-question--open", !expanded);
			if (answerEl) {
				if (expanded) {
					answerEl.setAttribute("hidden", "");
				} else {
					answerEl.removeAttribute("hidden");
				}
			}
		});
	});

	// ── 2. Interactive Star Rating ───────────────────────────
	var starsContainer = document.getElementById("vasco-star-rating");
	if (starsContainer) {
		var stars = starsContainer.querySelectorAll(".star");
		var ratingInput = document.getElementById("rating");

		function setRating(val) {
			if (ratingInput) {
				ratingInput.value = val;
			}
			stars.forEach(function(s) {
				var sVal = parseInt(s.getAttribute("data-value"), 10);
				if (sVal <= val) {
					s.classList.add("active");
				} else {
					s.classList.remove("active");
				}
			});
		}

		// Mặc định chọn 5 sao
		setRating(5);

		stars.forEach(function(star) {
			star.addEventListener("mouseover", function() {
				var val = parseInt(this.getAttribute("data-value"), 10);
				stars.forEach(function(s) {
					var sVal = parseInt(s.getAttribute("data-value"), 10);
					if (sVal <= val) {
						s.classList.add("hover");
					} else {
						s.classList.remove("hover");
					}
				});
			});

			star.addEventListener("mouseout", function() {
				stars.forEach(function(s) {
					s.classList.remove("hover");
				});
			});

			star.addEventListener("click", function() {
				var val = parseInt(this.getAttribute("data-value"), 10);
				setRating(val);
			});
		});
	}

	// ── 3. Sticky Top Bar (Cuộn xuống: Hiện thanh trên, Cuộn lên: Ẩn thanh trên) ──
	var header = document.getElementById("header");
	if (header) {
		function updateHeaderDimensions() {
			if (header) {
				var h = header.offsetHeight;
				document.body.style.paddingTop = h + "px";
				document.documentElement.style.setProperty('--header-height', h + 'px');

				var activeNav = document.querySelector('.desktop-nav.active, .mobile-menu.active, .mobile-nav.active');
				if (activeNav) {
					activeNav.style.top = h + "px";
					activeNav.style.height = "calc(100vh - " + h + "px)";
				}
			}
		}

		updateHeaderDimensions();
		window.addEventListener("resize", updateHeaderDimensions);
		window.addEventListener("orientationchange", updateHeaderDimensions);
		window.addEventListener("load", updateHeaderDimensions);
		setTimeout(updateHeaderDimensions, 100);
		setTimeout(updateHeaderDimensions, 400);

		var lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;
		var scrollThreshold = 4;

		window.addEventListener("scroll", function() {
			var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
			if (scrollTop < 0) scrollTop = 0;

			// Khi menu mobile đang mở, giữ header luôn hiển thị
			var isMobileMenuOpen = document.querySelector('.desktop-nav.active, .mobile-menu.active, .mobile-nav.active, #open-menu.is-active, .is-active');
			if (isMobileMenuOpen) {
				header.classList.remove("header--hide");
				header.classList.add("header--show");
				return;
			}

			if (scrollTop <= 40) {
				header.classList.remove("header--hide");
				header.classList.add("header--show");
				lastScrollTop = scrollTop;
				return;
			}

			if (Math.abs(scrollTop - lastScrollTop) <= scrollThreshold) {
				return;
			}

			if (scrollTop > lastScrollTop) {
				// Cuộn xuống (Scroll Down) -> Hiện thanh trên
				header.classList.remove("header--hide");
				header.classList.add("header--show");
			} else {
				// Cuộn lên (Scroll Up) -> Ẩn thanh trên
				header.classList.remove("header--show");
				header.classList.add("header--hide");
			}

			lastScrollTop = scrollTop;
		}, { passive: true });
	}

	// ── 4. Dynamic Color Variant Image & Title Switcher ──────────────────
	document.addEventListener("click", function(e) {
		var item = e.target.closest(".product-variants-item, .input-container, .circle.button, .circle, [data-image]");
		if (!item) return;

		var labelContainer = item.closest(".product-variants-item, .input-container") || item;

		var newImg = item.getAttribute("data-image");
		if (!newImg && labelContainer) {
			newImg = labelContainer.getAttribute("data-image");
		}

		// Update active class on color items in the same container
		var list = item.closest(".product-variants-list, .product-variants-items");
		if (list) {
			list.querySelectorAll(".product-variants-item, .circle, .input-container").forEach(function(el) {
				el.classList.remove("active");
				if (el.hasAttribute("aria-checked")) {
					el.setAttribute("aria-checked", "false");
				}
			});
		}
		labelContainer.classList.add("active");
		if (labelContainer.hasAttribute("aria-checked")) {
			labelContainer.setAttribute("aria-checked", "true");
		}
		var innerCircle = labelContainer.querySelector(".circle");
		if (innerCircle) {
			innerCircle.classList.add("active");
		}

		var colorName = labelContainer.getAttribute("aria-label") || (labelContainer.querySelector(".radio-label") ? labelContainer.querySelector(".radio-label").innerText.trim() : "");
		var productCard = item.closest("article.product-miniature, .product-container, #main, body");

		// Update Product Title Name & Color Legend Text
		if (colorName && productCard) {
			// 1. Keep Legend Text static as 'Màu sắc:'
			var legend = productCard.querySelector("#legend-color, #legend-color-1, .color-label-title");
			if (legend) {
				legend.innerHTML = "Màu sắc:";
			}

			// 2. Update Product Name H1 only
			var titleEls = document.querySelectorAll(".product-name, h1#product-name, .product-header-section .product-name");
			titleEls.forEach(function(titleEl) {
				if (!titleEl.hasAttribute("data-base-title")) {
					var raw = titleEl.innerText.trim();
					var colorList = ["Phantom Black", "Slate Blue", "Mystic Plum", "Scarlet Pulse", "Black Onyx", "Stone Gray", "Cobalt Blue", "Ruby Red", "Pearl White", "Matte Black", "Frosty Turquoise", "Misty Purple"];
					colorList.forEach(function(c) {
						raw = raw.replace(new RegExp("\\s*\\(?\\b" + c + "\\b\\)?", "gi"), "").trim();
					});
					titleEl.setAttribute("data-base-title", raw);
				}

				var baseTitle = titleEl.getAttribute("data-base-title");
				if (baseTitle.indexOf("+") !== -1) {
					// Bundle product format: Vasco Translator Q1 Slate Blue + E1
					var parts = baseTitle.split("+");
					var mainName = parts[0].trim();
					var rest = parts.slice(1).join("+").trim();
					titleEl.innerText = mainName + " " + colorName + " +" + rest;
				} else {
					// Single product format: Vasco Translator Q1 Slate Blue
					titleEl.innerText = baseTitle + " " + colorName;
				}
			});
		}

		// Update main product image / Swiper slide
		if (newImg && productCard) {
			// 1. Swiper Cover slide image (Detail pages)
			var swiperImg = productCard.querySelector(".swiper-cover .swiper-slide-active img, .swiper-cover img, .product-cover img");
			if (swiperImg) {
				swiperImg.src = newImg;
				if (swiperImg.hasAttribute("srcset")) {
					swiperImg.removeAttribute("srcset");
				}
			}

			// 2. Listing Card Thumbnail (Catalog pages / Horizontal cards)
			var cardImg = productCard.querySelector(".product-thumb-wrapper img, .product-link img");
			if (cardImg) {
				cardImg.src = newImg;
				if (cardImg.hasAttribute("srcset")) {
					cardImg.removeAttribute("srcset");
				}
			}
		}
	});
});
