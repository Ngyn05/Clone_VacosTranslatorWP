const viewCompareButton = document.querySelectorAll(".view-compare-button");
window.dataLayer = window.dataLayer || [];
viewCompareButton.forEach((value) => {
	value.addEventListener("click", function () {
		window.dataLayer.push({
			"event": "compare",
			"pagetype": prestashop.page.page_name,
		});
	});
});
