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
});
