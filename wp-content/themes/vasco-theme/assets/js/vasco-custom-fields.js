/**
 * Custom Product Fields JavaScript for Vasco Theme
 * Handles Star Rating Interactive & FAQ Accordion Toggles
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
});



