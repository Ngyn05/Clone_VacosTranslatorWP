<?php
/**
 * Template Name: Clean Page page-bundles.php
 *
 * @package VascoTheme
 */

get_header();

vasco_theme_render_catalog_page(
	array(
		'active_tab'    => 'bundles',
		'heading'       => 'Bộ sản phẩm',
		'category_slug' => 'bundles',
		'show_compare'  => true,
	)
);
get_footer();
return;
?>


<section class="relative" id="wrapper">
<aside id="notifications">
<div class="container">
</div>
</aside>
<div>
<div class="breadcrumb-container">
<div class="container">
<nav aria-label="Đường dẫn điều hướng" class="breadcrumb" data-depth="2">
<ol>
<li>
<a href="<?php echo esc_url( home_url( "/" ) ); ?>">
<span class="breadcrumb-link">Trang chủ</span>
</a>
<span class="breadcrumb-divider">&gt;</span>
</li>
<li>
<span aria-current="page" class="breadcrumb-current">Bộ sản phẩm</span>
</li>
</ol>
</nav>
</div>
</div>
<div class="js-content-wrapper" id="content-wrapper">
<section id="main">
<div class="menu-container">
<div class="container">
<nav class="tab-menu">
<a aria-label="Máy dịch" class="menu-link" href="<?php echo esc_url( home_url( "/translators/" ) ); ?>">Máy dịch</a><a aria-label="Bộ sản phẩm" class="menu-link current" href="<?php echo esc_url( home_url( "/bundles/" ) ); ?>">Bộ sản phẩm</a><a aria-label="Phụ kiện" class="menu-link" href="<?php echo esc_url( home_url( "/accessories/" ) ); ?>">Phụ kiện</a><a aria-label="Tất cả sản phẩm" class="menu-link" href="<?php echo esc_url( home_url( "/all-products/" ) ); ?>">Tất cả sản phẩm</a><a aria-label="Gói sản phẩm" class="menu-link" href="<?php echo esc_url( home_url( "/packages/" ) ); ?>">Gói sản phẩm</a>
</nav>
</div>
</div>
<section class="products-catalog-wrapper" id="products">
<div class="number-one">
<img alt="số một" class="nr-one" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/icons/no1-badge.svg" ); ?>"/>
</div>
<div class="category-header">
<div class="container">
<h1 class="h1">Bộ sản phẩm</h1>
</div>
</div>
<hr/>
<div class="hidden-sm-down">
</div>
<div class="container">
<div class="comparison-page-link">
<a class="comparison-page-link-anchor view-compare-button" href="<?php echo esc_url( home_url( '/comparison-engine/' ) ); ?>">
<svg fill="none" height="20" viewbox="0 0 12 20" width="12" xmlns="http://www.w3.org/2000/svg">
<path d="M2 18L10 10L2 2" stroke="#4966FF" stroke-linecap="square" stroke-width="2"></path>
</svg>
<p>So sánh các máy dịch</p>
</a>
</div>
</div>
<div id="js-product-list">
<div class="products products-grid-listing">
<div class="listing-translators js-product product">
<article aria-labelledby="vasco-translator-q1-phantom-black-+-e1-name" class="container product-miniature js-product-miniature" data-has-quantity="1" data-id-product="43" data-id-product-attribute="0" tabindex="0">
<div class="thumbnail-container">
<div class="thumbnail-top js-variant-spinner-wrapper">
<div class="product-flags js-product-flags">
<div class="product-flag-wrapper promotion-theme-yellow">
<div aria-label="Rẻ hơn khi mua theo bộ" class="body-base product-flag">Rẻ hơn khi mua theo bộ</div>
</div>
</div>
<a class="product-link" content="../translators/vasco-translator-q1.html" href="<?php echo esc_url( home_url( "/translators/q1-phantomblack-e1/" ) ); ?>" title="Vasco Translator Q1 Phantom Black + E1">
<img alt="Vasco Translator Q1 Phantom Black + E1" data-full-size-image-url="./426-og_image/q1-phantomblack-e1.jpg" height="480" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/images/products/426-medium_default/q1-phantomblack-e1.jpg" ); ?>" width="480"/>
</a>
<div class="loading-spinner">
<svg fill="none" height="320" viewbox="0 0 320 320" width="320" xmlns="http://www.w3.org/2000/svg">
<path d="M237.247 95C241.417 95.0243 245.494 96.2155 249.004 98.435C252.514 100.655 255.313 103.811 257.074 107.537L310 223.921H278.171L243.625 143.475C241.056 137.679 239.055 131.654 237.649 125.482H237.045C235.655 131.662 233.653 137.692 231.07 143.488L196.347 223.921H164.682L217.432 107.562C219.191 103.835 221.987 100.676 225.494 98.4526C229.001 96.229 233.077 95.0318 237.247 95Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
<path d="M83.2238 226C79.0837 225.977 75.0353 224.787 71.5505 222.567C68.0658 220.348 65.288 217.191 63.5411 213.464L11 97.0918H42.5971L76.8919 177.529C79.4443 183.321 81.4349 189.342 82.8366 195.509H83.4361C84.815 189.333 86.802 183.307 89.3684 177.517L123.838 97.0794H155.273L102.906 213.439C101.162 217.169 98.3855 220.331 94.9007 222.555C91.4159 224.779 87.3663 225.974 83.2238 226Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
</svg>
</div>
</div>
<div class="product-description">
<div class="product-description-head">
<a aria-label="Xem chi tiết sản phẩm Vasco Translator Q1 Phantom Black + E1" class="product-link product-title-link" content="../translators/vasco-translator-q1.html" href="<?php echo esc_url( home_url( "/translators/q1-phantomblack-e1/" ) ); ?>" title="Vasco Translator Q1 Phantom Black + E1">
<h2 class="product-title product-name" id="vasco-translator-q1-phantom-black-+-e1-name">Vasco Translator Q1 Phantom Black + E1</h2>
</a>
<h3 class="product-subtitle">Bộ sản phẩm hiện đại nhất với Internet miễn phí trọn đời cho việc dịch thuật</h3>
<div class="trustpilot-top trustpilot-top--category">
<!-- TrustBox widget - Product Mini -->
<div aria-hidden="true" class="trustpilot-widget" color="#2D3139" data-businessunit-id="64cbd5206cac53316ece59d0" data-font-family="Noto Sans" data-font-weight="normal" data-locale="en-us" data-no-reviews="show" data-scroll-to-list="false" data-sku="Q1-PB-E1-CB" data-star-color="#5E976A" data-style-alignment="left" data-style-height="24px" data-style-width="100%" data-template-id="54d39695764ea907c0f34825" data-theme="light" tabindex="-1">
<a href="#" rel="noopener" target="_blank">Trustpilot</a>
</div>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-scroll" data-trustpilot-placement="category" data-trustpilot-scroll-target="trustpilot-category-bottom-anchor" tabindex="-1" type="button">
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-logo" type="button">
<img alt="" aria-hidden="true" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/trustpilot.svg" ); ?>"/>
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<!-- End TrustBox widget -->
</div>
<ul>
<li>Mạnh mẽ hơn khi kết hợp: hỗ trợ 85 ngôn ngữ dịch giọng nói</li>
<li>Dữ liệu miễn phí cho dịch thuật: truy cập trọn đời tại gần 200 quốc gia</li>
<li>Tối đa 6 người có thể cùng tham gia hội thoại</li>
<li>Tính năng bổ sung: công nghệ dịch ảnh, văn bản và nhân bản giọng nói</li>
<li>Tính linh hoạt: chọn sử dụng riêng tai nghe hoặc bộ đầy đủ cùng Vasco Translator Q1</li>
</ul>
</div>
<div class="product-description-body">
<form action="./cart" id="add-to-cart-or-refresh" method="post">
<input name="token" type="hidden" value="4d648adb0a3dc7ed67dce0366e2eb442"/>
<input id="product_page_product_id" name="id_product" type="hidden" value="43"/>
<input class="js-product-customization-id" id="product_customization_id" name="id_customization" type="hidden" value="0"/>
<div></div>
<div class="product-variants js-product-variants product-variants-bundle" data-pack-key="packE1Q1" id="product-variants">
<fieldset aria-labelledby="pack-color-legend-packE1Q1" class="product-variants-items bundle-variants-item" role="radiogroup" tabindex="0">
<p id="pack-color-legend-packE1Q1">Màu sắc:</p>
<div class="product-variants-list product-variants-listing mt-2" tabindex="0">
<label class="product-variants-item product-variants-item-bundle input-container" data-active="1" data-has-quantity="1" data-product-id="43" role="radio" tabindex="0">
<div class="circle phantom-black"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="43" name="bundle_color_packE1Q1" title="Phantom Black" type="radio" value="43"/>
<span class="radio-label body-16">Đen Phantom</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="44" role="radio" tabindex="0">
<div class="circle slate-blue"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="44" name="bundle_color_packE1Q1" title="Slate Blue" type="radio" value="44"/>
<span class="radio-label body-16">Xanh Slate</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="45" role="radio" tabindex="0">
<div class="circle mystic-plum"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="45" name="bundle_color_packE1Q1" title="Mystic Plum" type="radio" value="45"/>
<span class="radio-label body-16">Mận Mystic</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="46" role="radio" tabindex="0">
<div class="circle scarlet-pulse"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="46" name="bundle_color_packE1Q1" title="Scarlet Pulse" type="radio" value="46"/>
<span class="radio-label body-16">Đỏ Scarlet</span>
</label>
</div>
</fieldset>
</div>
<div class="product-add-to-cart-block">
<div class="add-to-cart-and-price">
<div class="product_button_description">
<a class="btn btn-md btn-secondary btn-description" href="<?php echo esc_url( home_url( "/translators/q1-phantomblack-e1/" ) ); ?>">Mô tả<span class="text-sr-only">Vasco Translator Q1 Phantom Black + E1</span></a>
</div>
<div class="product-price-and-shipping product-price order-first md:order-none">
<span class="regular-price-wrapper">
<span class="regular-price-text">
</span>
<span aria-label="Giá gốc $799" class="regular-price" data-text="Regular price">
</span>
</span>
<span aria-label="Giá $799" class="price">
																																								$799																									</span>
<div class="bundle-savings">
<p>Tiết kiệm khi mua theo bộ<span class="saving-price">$139</span></p>
<a href="<?php echo esc_url( home_url( '/terms-and-conditions-of-the-promotion-cheaper-in-a-set/' ) ); ?>">Xem điều khoản khuyến mãi</a>
</div>
</div>
<div class="product-add-to-cart js-product-add-to-cart">
<div class="add">
<button aria-label="MUA NGAY: Vasco Translator Q1 Phantom Black + E1" class="btn btn-primary add-to-cart" data-button-action="add-to-cart" type="submit"> <img alt="Giỏ hàng" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/basket.svg" ); ?>"/>MUA NGAY</button>
<button aria-hidden="true" class="btn btn-secondary notify-modal-button font-semibold" data-id-attribute="0" data-id-product="43" style="display:none">
<img alt="Thông báo cho tôi" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/notify.svg" ); ?>"/>Thông báo cho tôi</button>
</div>
<p class="product-minimal-quantity js-product-minimal-quantity">
</p>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</article>
</div>
<div class="listing-translators js-product product">
<article aria-labelledby="vasco-translator-q1-slate-blue-+-e1-name" class="container product-miniature js-product-miniature" data-has-quantity="1" data-id-product="44" data-id-product-attribute="0" tabindex="0">
<div class="thumbnail-container">
<div class="thumbnail-top js-variant-spinner-wrapper">
<div class="product-flags js-product-flags">
<div class="product-flag-wrapper promotion-theme-yellow">
<div aria-label="Rẻ hơn khi mua theo bộ" class="body-base product-flag">Rẻ hơn khi mua theo bộ</div>
</div>
</div>
<a class="product-link" content="../translators/vasco-translator-q1.html" href="<?php echo esc_url( home_url( '/product/q1-slateblue-e1/' ) ); ?>" title="Vasco Translator Q1 Slate Blue + E1">
<img alt="Vasco Translator Q1 Slate Blue + E1" data-full-size-image-url="./428-og_image/q1-slateblue-e1.jpg" height="480" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/images/products/428-medium_default/q1-slateblue-e1.jpg" ); ?>" width="480"/>
</a>
<div class="loading-spinner">
<svg fill="none" height="320" viewbox="0 0 320 320" width="320" xmlns="http://www.w3.org/2000/svg">
<path d="M237.247 95C241.417 95.0243 245.494 96.2155 249.004 98.435C252.514 100.655 255.313 103.811 257.074 107.537L310 223.921H278.171L243.625 143.475C241.056 137.679 239.055 131.654 237.649 125.482H237.045C235.655 131.662 233.653 137.692 231.07 143.488L196.347 223.921H164.682L217.432 107.562C219.191 103.835 221.987 100.676 225.494 98.4526C229.001 96.229 233.077 95.0318 237.247 95Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
<path d="M83.2238 226C79.0837 225.977 75.0353 224.787 71.5505 222.567C68.0658 220.348 65.288 217.191 63.5411 213.464L11 97.0918H42.5971L76.8919 177.529C79.4443 183.321 81.4349 189.342 82.8366 195.509H83.4361C84.815 189.333 86.802 183.307 89.3684 177.517L123.838 97.0794H155.273L102.906 213.439C101.162 217.169 98.3855 220.331 94.9007 222.555C91.4159 224.779 87.3663 225.974 83.2238 226Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
</svg>
</div>
</div>
<div class="product-description">
<div class="product-description-head">
<a aria-label="Xem chi tiết sản phẩm Vasco Translator Q1 Slate Blue + E1" class="product-link product-title-link" content="../translators/vasco-translator-q1.html" href="<?php echo esc_url( home_url( '/product/q1-slateblue-e1/' ) ); ?>" title="Vasco Translator Q1 Slate Blue + E1">
<h2 class="product-title product-name" id="vasco-translator-q1-slate-blue-+-e1-name">Vasco Translator Q1 Slate Blue + E1</h2>
</a>
<h3 class="product-subtitle">Bộ sản phẩm hiện đại nhất với Internet miễn phí trọn đời cho việc dịch thuật</h3>
<div class="trustpilot-top trustpilot-top--category">
<!-- TrustBox widget - Product Mini -->
<div aria-hidden="true" class="trustpilot-widget" color="#2D3139" data-businessunit-id="64cbd5206cac53316ece59d0" data-font-family="Noto Sans" data-font-weight="normal" data-locale="en-us" data-no-reviews="show" data-scroll-to-list="false" data-sku="Q1-SB-E1-CB" data-star-color="#5E976A" data-style-alignment="left" data-style-height="24px" data-style-width="100%" data-template-id="54d39695764ea907c0f34825" data-theme="light" tabindex="-1">
<a href="#" rel="noopener" target="_blank">Trustpilot</a>
</div>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-scroll" data-trustpilot-placement="category" data-trustpilot-scroll-target="trustpilot-category-bottom-anchor" tabindex="-1" type="button">
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-logo" type="button">
<img alt="" aria-hidden="true" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/trustpilot.svg" ); ?>"/>
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<!-- End TrustBox widget -->
</div>
<ul>
<li>Mạnh mẽ hơn khi kết hợp: hỗ trợ 85 ngôn ngữ dịch giọng nói</li>
<li>Dữ liệu miễn phí cho dịch thuật: truy cập trọn đời tại gần 200 quốc gia</li>
<li>Tối đa 6 người có thể cùng tham gia hội thoại</li>
<li>Tính năng bổ sung: công nghệ dịch ảnh, văn bản và nhân bản giọng nói</li>
<li>Tính linh hoạt: chọn sử dụng riêng tai nghe hoặc bộ đầy đủ cùng Vasco Translator Q1</li>
</ul>
</div>
<div class="product-description-body">
<form action="./cart" id="add-to-cart-or-refresh" method="post">
<input name="token" type="hidden" value="4d648adb0a3dc7ed67dce0366e2eb442"/>
<input id="product_page_product_id" name="id_product" type="hidden" value="44"/>
<input class="js-product-customization-id" id="product_customization_id" name="id_customization" type="hidden" value="0"/>
<div></div>
<div class="product-variants js-product-variants product-variants-bundle" data-pack-key="packE1Q1" id="product-variants">
<fieldset aria-labelledby="pack-color-legend-packE1Q1" class="product-variants-items bundle-variants-item" role="radiogroup" tabindex="0">
<p id="pack-color-legend-packE1Q1">Màu sắc:</p>
<div class="product-variants-list product-variants-listing mt-2" tabindex="0">
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="43" role="radio" tabindex="0">
<div class="circle phantom-black"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="43" name="bundle_color_packE1Q1" title="Phantom Black" type="radio" value="43"/>
<span class="radio-label body-16">Đen Phantom</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="1" data-has-quantity="1" data-product-id="44" role="radio" tabindex="0">
<div class="circle slate-blue"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="44" name="bundle_color_packE1Q1" title="Slate Blue" type="radio" value="44"/>
<span class="radio-label body-16">Xanh Slate</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="45" role="radio" tabindex="0">
<div class="circle mystic-plum"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="45" name="bundle_color_packE1Q1" title="Mystic Plum" type="radio" value="45"/>
<span class="radio-label body-16">Mận Mystic</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="46" role="radio" tabindex="0">
<div class="circle scarlet-pulse"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="46" name="bundle_color_packE1Q1" title="Scarlet Pulse" type="radio" value="46"/>
<span class="radio-label body-16">Đỏ Scarlet</span>
</label>
</div>
</fieldset>
</div>
<div class="product-add-to-cart-block">
<div class="add-to-cart-and-price">
<div class="product_button_description">
<a class="btn btn-md btn-secondary btn-description" href="<?php echo esc_url( home_url( '/product/q1-slateblue-e1/' ) ); ?>">Mô tả<span class="text-sr-only">Vasco Translator Q1 Slate Blue + E1</span></a>
</div>
<div class="product-price-and-shipping product-price order-first md:order-none">
<span class="regular-price-wrapper">
<span class="regular-price-text">
</span>
<span aria-label="Giá gốc $799" class="regular-price" data-text="Regular price">
</span>
</span>
<span aria-label="Giá $799" class="price">
																																								$799																									</span>
<div class="bundle-savings">
<p>Tiết kiệm khi mua theo bộ<span class="saving-price">$139</span></p>
<a href="<?php echo esc_url( home_url( '/terms-and-conditions-of-the-promotion-cheaper-in-a-set/' ) ); ?>">Xem điều khoản khuyến mãi</a>
</div>
</div>
<div class="product-add-to-cart js-product-add-to-cart">
<div class="add">
<button aria-label="MUA NGAY: Vasco Translator Q1 Slate Blue + E1" class="btn btn-primary add-to-cart" data-button-action="add-to-cart" type="submit"> <img alt="Giỏ hàng" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/basket.svg" ); ?>"/>MUA NGAY</button>
<button aria-hidden="true" class="btn btn-secondary notify-modal-button font-semibold" data-id-attribute="0" data-id-product="44" style="display:none">
<img alt="Thông báo cho tôi" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/notify.svg" ); ?>"/>Thông báo cho tôi</button>
</div>
<p class="product-minimal-quantity js-product-minimal-quantity">
</p>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</article>
</div>
<div class="listing-translators js-product product">
<article aria-labelledby="vasco-translator-q1-mystic-plum-+-e1-name" class="container product-miniature js-product-miniature" data-has-quantity="1" data-id-product="45" data-id-product-attribute="0" tabindex="0">
<div class="thumbnail-container">
<div class="thumbnail-top js-variant-spinner-wrapper">
<div class="product-flags js-product-flags">
<div class="product-flag-wrapper promotion-theme-yellow">
<div aria-label="Rẻ hơn khi mua theo bộ" class="body-base product-flag">Rẻ hơn khi mua theo bộ</div>
</div>
</div>
<a class="product-link" content="../translators/vasco-translator-q1.html" href="<?php echo esc_url( home_url( '/product/q1-mysticplum-e1/' ) ); ?>" title="Vasco Translator Q1 Mystic Plum + E1">
<img alt="Vasco Translator Q1 Mystic Plum + E1" data-full-size-image-url="./425-og_image/q1-mysticplum-e1.jpg" height="480" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/images/products/425-medium_default/q1-mysticplum-e1.jpg" ); ?>" width="480"/>
</a>
<div class="loading-spinner">
<svg fill="none" height="320" viewbox="0 0 320 320" width="320" xmlns="http://www.w3.org/2000/svg">
<path d="M237.247 95C241.417 95.0243 245.494 96.2155 249.004 98.435C252.514 100.655 255.313 103.811 257.074 107.537L310 223.921H278.171L243.625 143.475C241.056 137.679 239.055 131.654 237.649 125.482H237.045C235.655 131.662 233.653 137.692 231.07 143.488L196.347 223.921H164.682L217.432 107.562C219.191 103.835 221.987 100.676 225.494 98.4526C229.001 96.229 233.077 95.0318 237.247 95Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
<path d="M83.2238 226C79.0837 225.977 75.0353 224.787 71.5505 222.567C68.0658 220.348 65.288 217.191 63.5411 213.464L11 97.0918H42.5971L76.8919 177.529C79.4443 183.321 81.4349 189.342 82.8366 195.509H83.4361C84.815 189.333 86.802 183.307 89.3684 177.517L123.838 97.0794H155.273L102.906 213.439C101.162 217.169 98.3855 220.331 94.9007 222.555C91.4159 224.779 87.3663 225.974 83.2238 226Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
</svg>
</div>
</div>
<div class="product-description">
<div class="product-description-head">
<a aria-label="Xem chi tiết sản phẩm Vasco Translator Q1 Mystic Plum + E1" class="product-link product-title-link" content="../translators/vasco-translator-q1.html" href="<?php echo esc_url( home_url( '/product/q1-mysticplum-e1/' ) ); ?>" title="Vasco Translator Q1 Mystic Plum + E1">
<h2 class="product-title product-name" id="vasco-translator-q1-mystic-plum-+-e1-name">Vasco Translator Q1 Mystic Plum + E1</h2>
</a>
<h3 class="product-subtitle">Bộ sản phẩm hiện đại nhất với Internet miễn phí trọn đời cho việc dịch thuật</h3>
<div class="trustpilot-top trustpilot-top--category">
<!-- TrustBox widget - Product Mini -->
<div aria-hidden="true" class="trustpilot-widget" color="#2D3139" data-businessunit-id="64cbd5206cac53316ece59d0" data-font-family="Noto Sans" data-font-weight="normal" data-locale="en-us" data-no-reviews="show" data-scroll-to-list="false" data-sku="Q1-MP-E1-CB" data-star-color="#5E976A" data-style-alignment="left" data-style-height="24px" data-style-width="100%" data-template-id="54d39695764ea907c0f34825" data-theme="light" tabindex="-1">
<a href="#" rel="noopener" target="_blank">Trustpilot</a>
</div>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-scroll" data-trustpilot-placement="category" data-trustpilot-scroll-target="trustpilot-category-bottom-anchor" tabindex="-1" type="button">
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-logo" type="button">
<img alt="" aria-hidden="true" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/trustpilot.svg" ); ?>"/>
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<!-- End TrustBox widget -->
</div>
<ul>
<li>Mạnh mẽ hơn khi kết hợp: hỗ trợ 85 ngôn ngữ dịch giọng nói</li>
<li>Dữ liệu miễn phí cho dịch thuật: truy cập trọn đời tại gần 200 quốc gia</li>
<li>Tối đa 6 người có thể cùng tham gia hội thoại</li>
<li>Tính năng bổ sung: công nghệ dịch ảnh, văn bản và nhân bản giọng nói</li>
<li>Tính linh hoạt: chọn sử dụng riêng tai nghe hoặc bộ đầy đủ cùng Vasco Translator Q1</li>
</ul>
</div>
<div class="product-description-body">
<form action="./cart" id="add-to-cart-or-refresh" method="post">
<input name="token" type="hidden" value="4d648adb0a3dc7ed67dce0366e2eb442"/>
<input id="product_page_product_id" name="id_product" type="hidden" value="45"/>
<input class="js-product-customization-id" id="product_customization_id" name="id_customization" type="hidden" value="0"/>
<div></div>
<div class="product-variants js-product-variants product-variants-bundle" data-pack-key="packE1Q1" id="product-variants">
<fieldset aria-labelledby="pack-color-legend-packE1Q1" class="product-variants-items bundle-variants-item" role="radiogroup" tabindex="0">
<p id="pack-color-legend-packE1Q1">Màu sắc:</p>
<div class="product-variants-list product-variants-listing mt-2" tabindex="0">
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="43" role="radio" tabindex="0">
<div class="circle phantom-black"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="43" name="bundle_color_packE1Q1" title="Phantom Black" type="radio" value="43"/>
<span class="radio-label body-16">Đen Phantom</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="44" role="radio" tabindex="0">
<div class="circle slate-blue"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="44" name="bundle_color_packE1Q1" title="Slate Blue" type="radio" value="44"/>
<span class="radio-label body-16">Xanh Slate</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="1" data-has-quantity="1" data-product-id="45" role="radio" tabindex="0">
<div class="circle mystic-plum"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="45" name="bundle_color_packE1Q1" title="Mystic Plum" type="radio" value="45"/>
<span class="radio-label body-16">Mận Mystic</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="46" role="radio" tabindex="0">
<div class="circle scarlet-pulse"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="46" name="bundle_color_packE1Q1" title="Scarlet Pulse" type="radio" value="46"/>
<span class="radio-label body-16">Đỏ Scarlet</span>
</label>
</div>
</fieldset>
</div>
<div class="product-add-to-cart-block">
<div class="add-to-cart-and-price">
<div class="product_button_description">
<a class="btn btn-md btn-secondary btn-description" href="<?php echo esc_url( home_url( '/product/q1-mysticplum-e1/' ) ); ?>">Mô tả<span class="text-sr-only">Vasco Translator Q1 Mystic Plum + E1</span></a>
</div>
<div class="product-price-and-shipping product-price order-first md:order-none">
<span class="regular-price-wrapper">
<span class="regular-price-text">
</span>
<span aria-label="Giá gốc $799" class="regular-price" data-text="Regular price">
</span>
</span>
<span aria-label="Giá $799" class="price">
																																								$799																									</span>
<div class="bundle-savings">
<p>Tiết kiệm khi mua theo bộ<span class="saving-price">$139</span></p>
<a href="<?php echo esc_url( home_url( '/terms-and-conditions-of-the-promotion-cheaper-in-a-set/' ) ); ?>">Xem điều khoản khuyến mãi</a>
</div>
</div>
<div class="product-add-to-cart js-product-add-to-cart">
<div class="add">
<button aria-label="MUA NGAY: Vasco Translator Q1 Mystic Plum + E1" class="btn btn-primary add-to-cart" data-button-action="add-to-cart" type="submit"> <img alt="Giỏ hàng" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/basket.svg" ); ?>"/>MUA NGAY</button>
<button aria-hidden="true" class="btn btn-secondary notify-modal-button font-semibold" data-id-attribute="0" data-id-product="45" style="display:none">
<img alt="Thông báo cho tôi" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/notify.svg" ); ?>"/>Thông báo cho tôi</button>
</div>
<p class="product-minimal-quantity js-product-minimal-quantity">
</p>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</article>
</div>
<div class="listing-translators js-product product">
<article aria-labelledby="vasco-translator-q1-scarlet-pulse-+-e1-name" class="container product-miniature js-product-miniature" data-has-quantity="1" data-id-product="46" data-id-product-attribute="0" tabindex="0">
<div class="thumbnail-container">
<div class="thumbnail-top js-variant-spinner-wrapper">
<div class="product-flags js-product-flags">
<div class="product-flag-wrapper promotion-theme-yellow">
<div aria-label="Rẻ hơn khi mua theo bộ" class="body-base product-flag">Rẻ hơn khi mua theo bộ</div>
</div>
</div>
<a class="product-link" content="../translators/vasco-translator-q1.html" href="<?php echo esc_url( home_url( '/product/q1-scarletpulse-e1/' ) ); ?>" title="Vasco Translator Q1 Scarlet Pulse + E1">
<img alt="Vasco Translator Q1 Scarlet Pulse + E1" data-full-size-image-url="./427-og_image/q1-scarletpulse-e1.jpg" height="480" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/images/products/427-medium_default/q1-scarletpulse-e1.jpg" ); ?>" width="480"/>
</a>
<div class="loading-spinner">
<svg fill="none" height="320" viewbox="0 0 320 320" width="320" xmlns="http://www.w3.org/2000/svg">
<path d="M237.247 95C241.417 95.0243 245.494 96.2155 249.004 98.435C252.514 100.655 255.313 103.811 257.074 107.537L310 223.921H278.171L243.625 143.475C241.056 137.679 239.055 131.654 237.649 125.482H237.045C235.655 131.662 233.653 137.692 231.07 143.488L196.347 223.921H164.682L217.432 107.562C219.191 103.835 221.987 100.676 225.494 98.4526C229.001 96.229 233.077 95.0318 237.247 95Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
<path d="M83.2238 226C79.0837 225.977 75.0353 224.787 71.5505 222.567C68.0658 220.348 65.288 217.191 63.5411 213.464L11 97.0918H42.5971L76.8919 177.529C79.4443 183.321 81.4349 189.342 82.8366 195.509H83.4361C84.815 189.333 86.802 183.307 89.3684 177.517L123.838 97.0794H155.273L102.906 213.439C101.162 217.169 98.3855 220.331 94.9007 222.555C91.4159 224.779 87.3663 225.974 83.2238 226Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
</svg>
</div>
</div>
<div class="product-description">
<div class="product-description-head">
<a aria-label="Xem chi tiết sản phẩm Vasco Translator Q1 Scarlet Pulse + E1" class="product-link product-title-link" content="../translators/vasco-translator-q1.html" href="<?php echo esc_url( home_url( '/product/q1-scarletpulse-e1/' ) ); ?>" title="Vasco Translator Q1 Scarlet Pulse + E1">
<h2 class="product-title product-name" id="vasco-translator-q1-scarlet-pulse-+-e1-name">Vasco Translator Q1 Scarlet Pulse + E1</h2>
</a>
<h3 class="product-subtitle">Bộ sản phẩm hiện đại nhất với Internet miễn phí trọn đời cho việc dịch thuật</h3>
<div class="trustpilot-top trustpilot-top--category">
<!-- TrustBox widget - Product Mini -->
<div aria-hidden="true" class="trustpilot-widget" color="#2D3139" data-businessunit-id="64cbd5206cac53316ece59d0" data-font-family="Noto Sans" data-font-weight="normal" data-locale="en-us" data-no-reviews="show" data-scroll-to-list="false" data-sku="Q1-SP-E1-CB" data-star-color="#5E976A" data-style-alignment="left" data-style-height="24px" data-style-width="100%" data-template-id="54d39695764ea907c0f34825" data-theme="light" tabindex="-1">
<a href="#" rel="noopener" target="_blank">Trustpilot</a>
</div>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-scroll" data-trustpilot-placement="category" data-trustpilot-scroll-target="trustpilot-category-bottom-anchor" tabindex="-1" type="button">
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-logo" type="button">
<img alt="" aria-hidden="true" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/trustpilot.svg" ); ?>"/>
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<!-- End TrustBox widget -->
</div>
<ul>
<li>Mạnh mẽ hơn khi kết hợp: hỗ trợ 85 ngôn ngữ dịch giọng nói</li>
<li>Dữ liệu miễn phí cho dịch thuật: truy cập trọn đời tại gần 200 quốc gia</li>
<li>Tối đa 6 người có thể cùng tham gia hội thoại</li>
<li>Tính năng bổ sung: công nghệ dịch ảnh, văn bản và nhân bản giọng nói</li>
<li>Tính linh hoạt: chọn sử dụng riêng tai nghe hoặc bộ đầy đủ cùng Vasco Translator Q1</li>
</ul>
</div>
<div class="product-description-body">
<form action="./cart" id="add-to-cart-or-refresh" method="post">
<input name="token" type="hidden" value="4d648adb0a3dc7ed67dce0366e2eb442"/>
<input id="product_page_product_id" name="id_product" type="hidden" value="46"/>
<input class="js-product-customization-id" id="product_customization_id" name="id_customization" type="hidden" value="0"/>
<div></div>
<div class="product-variants js-product-variants product-variants-bundle" data-pack-key="packE1Q1" id="product-variants">
<fieldset aria-labelledby="pack-color-legend-packE1Q1" class="product-variants-items bundle-variants-item" role="radiogroup" tabindex="0">
<p id="pack-color-legend-packE1Q1">Màu sắc:</p>
<div class="product-variants-list product-variants-listing mt-2" tabindex="0">
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="43" role="radio" tabindex="0">
<div class="circle phantom-black"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="43" name="bundle_color_packE1Q1" title="Phantom Black" type="radio" value="43"/>
<span class="radio-label body-16">Đen Phantom</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="44" role="radio" tabindex="0">
<div class="circle slate-blue"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="44" name="bundle_color_packE1Q1" title="Slate Blue" type="radio" value="44"/>
<span class="radio-label body-16">Xanh Slate</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="45" role="radio" tabindex="0">
<div class="circle mystic-plum"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="45" name="bundle_color_packE1Q1" title="Mystic Plum" type="radio" value="45"/>
<span class="radio-label body-16">Mận Mystic</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="1" data-has-quantity="1" data-product-id="46" role="radio" tabindex="0">
<div class="circle scarlet-pulse"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="46" name="bundle_color_packE1Q1" title="Scarlet Pulse" type="radio" value="46"/>
<span class="radio-label body-16">Đỏ Scarlet</span>
</label>
</div>
</fieldset>
</div>
<div class="product-add-to-cart-block">
<div class="add-to-cart-and-price">
<div class="product_button_description">
<a class="btn btn-md btn-secondary btn-description" href="<?php echo esc_url( home_url( '/product/q1-scarletpulse-e1/' ) ); ?>">Mô tả<span class="text-sr-only">Vasco Translator Q1 Scarlet Pulse + E1</span></a>
</div>
<div class="product-price-and-shipping product-price order-first md:order-none">
<span class="regular-price-wrapper">
<span class="regular-price-text">
</span>
<span aria-label="Giá gốc $799" class="regular-price" data-text="Regular price">
</span>
</span>
<span aria-label="Giá $799" class="price">
																																								$799																									</span>
<div class="bundle-savings">
<p>Tiết kiệm khi mua theo bộ<span class="saving-price">$139</span></p>
<a href="<?php echo esc_url( home_url( '/terms-and-conditions-of-the-promotion-cheaper-in-a-set/' ) ); ?>">Xem điều khoản khuyến mãi</a>
</div>
</div>
<div class="product-add-to-cart js-product-add-to-cart">
<div class="add">
<button aria-label="MUA NGAY: Vasco Translator Q1 Scarlet Pulse + E1" class="btn btn-primary add-to-cart" data-button-action="add-to-cart" type="submit"> <img alt="Giỏ hàng" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/basket.svg" ); ?>"/>MUA NGAY</button>
<button aria-hidden="true" class="btn btn-secondary notify-modal-button font-semibold" data-id-attribute="0" data-id-product="46" style="display:none">
<img alt="Thông báo cho tôi" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/notify.svg" ); ?>"/>Thông báo cho tôi</button>
</div>
<p class="product-minimal-quantity js-product-minimal-quantity">
</p>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</article>
</div>
<div class="listing-translators js-product product">
<article aria-labelledby="vasco-translator-v4-black-onyx-+-e1-name" class="container product-miniature js-product-miniature" data-has-quantity="1" data-id-product="31" data-id-product-attribute="0" tabindex="0">
<div class="thumbnail-container">
<div class="thumbnail-top js-variant-spinner-wrapper">
<div class="product-flags js-product-flags">
<div class="product-flag-wrapper promotion-theme-yellow">
<div aria-label="Rẻ hơn khi mua theo bộ" class="body-base product-flag">Rẻ hơn khi mua theo bộ</div>
</div>
</div>
<a class="product-link" content="../translators/vasco-translator-v4.html" href="<?php echo esc_url( home_url( "/translators/v4-blackonyx-e1/" ) ); ?>" title="Vasco Translator V4 Black Onyx + E1">
<img alt="Vasco Translator V4 Black Onyx + E1" data-full-size-image-url="./330-og_image/v4-blackonyx-e1.jpg" height="480" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/images/products/330-medium_default/v4-blackonyx-e1.jpg" ); ?>" width="480"/>
</a>
<div class="loading-spinner">
<svg fill="none" height="320" viewbox="0 0 320 320" width="320" xmlns="http://www.w3.org/2000/svg">
<path d="M237.247 95C241.417 95.0243 245.494 96.2155 249.004 98.435C252.514 100.655 255.313 103.811 257.074 107.537L310 223.921H278.171L243.625 143.475C241.056 137.679 239.055 131.654 237.649 125.482H237.045C235.655 131.662 233.653 137.692 231.07 143.488L196.347 223.921H164.682L217.432 107.562C219.191 103.835 221.987 100.676 225.494 98.4526C229.001 96.229 233.077 95.0318 237.247 95Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
<path d="M83.2238 226C79.0837 225.977 75.0353 224.787 71.5505 222.567C68.0658 220.348 65.288 217.191 63.5411 213.464L11 97.0918H42.5971L76.8919 177.529C79.4443 183.321 81.4349 189.342 82.8366 195.509H83.4361C84.815 189.333 86.802 183.307 89.3684 177.517L123.838 97.0794H155.273L102.906 213.439C101.162 217.169 98.3855 220.331 94.9007 222.555C91.4159 224.779 87.3663 225.974 83.2238 226Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
</svg>
</div>
</div>
<div class="product-description">
<div class="product-description-head">
<a aria-label="Xem chi tiết sản phẩm Vasco Translator V4 Black Onyx + E1" class="product-link product-title-link" content="../translators/vasco-translator-v4.html" href="<?php echo esc_url( home_url( "/translators/v4-blackonyx-e1/" ) ); ?>" title="Vasco Translator V4 Black Onyx + E1">
<h2 class="product-title product-name" id="vasco-translator-v4-black-onyx-+-e1-name">Vasco Translator V4 Black Onyx + E1</h2>
</a>
<h3 class="product-subtitle">Bộ sản phẩm đặc biệt với Internet miễn phí cho dịch thuật</h3>
<div class="trustpilot-top trustpilot-top--category">
<!-- TrustBox widget - Product Mini -->
<div aria-hidden="true" class="trustpilot-widget" color="#2D3139" data-businessunit-id="64cbd5206cac53316ece59d0" data-font-family="Noto Sans" data-font-weight="normal" data-locale="en-us" data-no-reviews="show" data-scroll-to-list="false" data-sku="V4-BO-E1-CB" data-star-color="#5E976A" data-style-alignment="left" data-style-height="24px" data-style-width="100%" data-template-id="54d39695764ea907c0f34825" data-theme="light" tabindex="-1">
<a href="#" rel="noopener" target="_blank">Trustpilot</a>
</div>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-scroll" data-trustpilot-placement="category" data-trustpilot-scroll-target="trustpilot-category-bottom-anchor" tabindex="-1" type="button">
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-logo" type="button">
<img alt="" aria-hidden="true" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/trustpilot.svg" ); ?>"/>
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<!-- End TrustBox widget -->
</div>
<ul>
<li>Nhiều ngôn ngữ hơn: 64 ngôn ngữ dịch giọng nói</li>
<li>Kết nối miễn phí vĩnh viễn: Bạn có quyền truy cập Internet không giới hạn cho việc dịch thuật</li>
<li>Số người dùng: Tối đa 6 người có thể cùng tham gia hội thoại</li>
<li>Tính năng bổ sung: Dịch ảnh, văn bản và tin nhắn trò chuyện</li>
<li>Tự do lựa chọn: Bạn có thể sử dụng tai nghe độc lập hoặc ghép nối với Vasco Translator V4</li>
</ul>
</div>
<div class="product-description-body">
<form action="./cart" id="add-to-cart-or-refresh" method="post">
<input name="token" type="hidden" value="4d648adb0a3dc7ed67dce0366e2eb442"/>
<input id="product_page_product_id" name="id_product" type="hidden" value="31"/>
<input class="js-product-customization-id" id="product_customization_id" name="id_customization" type="hidden" value="0"/>
<div></div>
<div class="product-variants js-product-variants product-variants-bundle" data-pack-key="packE1V4" id="product-variants">
<fieldset aria-labelledby="pack-color-legend-packE1V4" class="product-variants-items bundle-variants-item" role="radiogroup" tabindex="0">
<p id="pack-color-legend-packE1V4">Màu sắc:</p>
<div class="product-variants-list product-variants-listing mt-2" tabindex="0">
<label class="product-variants-item product-variants-item-bundle input-container" data-active="1" data-has-quantity="1" data-product-id="31" role="radio" tabindex="0">
<div class="circle black-onyx"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="31" name="bundle_color_packE1V4" title="Black Onyx" type="radio" value="31"/>
<span class="radio-label body-16">Đen Onyx</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="32" role="radio" tabindex="0">
<div class="circle stone-gray"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="32" name="bundle_color_packE1V4" title="Stone Gray" type="radio" value="32"/>
<span class="radio-label body-16">Xám Stone</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="33" role="radio" tabindex="0">
<div class="circle cobalt-blue"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="33" name="bundle_color_packE1V4" title="Cobalt Blue" type="radio" value="33"/>
<span class="radio-label body-16">Xanh Cobalt</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="34" role="radio" tabindex="0">
<div class="circle ruby-red"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="34" name="bundle_color_packE1V4" title="Ruby Red" type="radio" value="34"/>
<span class="radio-label body-16">Đỏ Ruby</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="35" role="radio" tabindex="0">
<div class="circle pearl-white"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="35" name="bundle_color_packE1V4" title="Pearl White" type="radio" value="35"/>
<span class="radio-label body-16">Trắng Ngọc Trai</span>
</label>
</div>
</fieldset>
</div>
<div class="product-add-to-cart-block">
<div class="add-to-cart-and-price">
<div class="product_button_description">
<a class="btn btn-md btn-secondary btn-description" href="<?php echo esc_url( home_url( "/translators/v4-blackonyx-e1/" ) ); ?>">Mô tả<span class="text-sr-only">Vasco Translator V4 Black Onyx + E1</span></a>
</div>
<div class="product-price-and-shipping product-price order-first md:order-none">
<span class="regular-price-wrapper">
<span class="regular-price-text">
</span>
<span aria-label="Giá gốc $715" class="regular-price" data-text="Regular price">
</span>
</span>
<span aria-label="Giá $715" class="price">
																																								$715																									</span>
<div class="bundle-savings">
<p>Tiết kiệm khi mua theo bộ<span class="saving-price">$123</span></p>
<a href="<?php echo esc_url( home_url( '/terms-and-conditions-of-the-promotion-cheaper-in-a-set/' ) ); ?>">Xem điều khoản khuyến mãi</a>
</div>
</div>
<div class="product-add-to-cart js-product-add-to-cart">
<div class="add">
<button aria-label="MUA NGAY: Vasco Translator V4 Black Onyx + E1" class="btn btn-primary add-to-cart" data-button-action="add-to-cart" type="submit"> <img alt="Giỏ hàng" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/basket.svg" ); ?>"/>MUA NGAY</button>
<button aria-hidden="true" class="btn btn-secondary notify-modal-button font-semibold" data-id-attribute="0" data-id-product="31" style="display:none">
<img alt="Thông báo cho tôi" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/notify.svg" ); ?>"/>Thông báo cho tôi</button>
</div>
<p class="product-minimal-quantity js-product-minimal-quantity">
</p>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</article>
</div>
<div class="listing-translators js-product product">
<article aria-labelledby="vasco-translator-v4-stone-gray-+-e1-name" class="container product-miniature js-product-miniature" data-has-quantity="1" data-id-product="32" data-id-product-attribute="0" tabindex="0">
<div class="thumbnail-container">
<div class="thumbnail-top js-variant-spinner-wrapper">
<div class="product-flags js-product-flags">
<div class="product-flag-wrapper promotion-theme-yellow">
<div aria-label="Rẻ hơn khi mua theo bộ" class="body-base product-flag">Rẻ hơn khi mua theo bộ</div>
</div>
</div>
<a class="product-link" content="../translators/vasco-translator-v4.html" href="<?php echo esc_url( home_url( '/product/v4-stonegray-e1/' ) ); ?>" title="Vasco Translator V4 Stone Gray + E1">
<img alt="Vasco Translator V4 Stone Gray + E1" data-full-size-image-url="./334-og_image/v4-stonegray-e1.jpg" height="480" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/images/products/334-medium_default/v4-stonegray-e1.jpg" ); ?>" width="480"/>
</a>
<div class="loading-spinner">
<svg fill="none" height="320" viewbox="0 0 320 320" width="320" xmlns="http://www.w3.org/2000/svg">
<path d="M237.247 95C241.417 95.0243 245.494 96.2155 249.004 98.435C252.514 100.655 255.313 103.811 257.074 107.537L310 223.921H278.171L243.625 143.475C241.056 137.679 239.055 131.654 237.649 125.482H237.045C235.655 131.662 233.653 137.692 231.07 143.488L196.347 223.921H164.682L217.432 107.562C219.191 103.835 221.987 100.676 225.494 98.4526C229.001 96.229 233.077 95.0318 237.247 95Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
<path d="M83.2238 226C79.0837 225.977 75.0353 224.787 71.5505 222.567C68.0658 220.348 65.288 217.191 63.5411 213.464L11 97.0918H42.5971L76.8919 177.529C79.4443 183.321 81.4349 189.342 82.8366 195.509H83.4361C84.815 189.333 86.802 183.307 89.3684 177.517L123.838 97.0794H155.273L102.906 213.439C101.162 217.169 98.3855 220.331 94.9007 222.555C91.4159 224.779 87.3663 225.974 83.2238 226Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
</svg>
</div>
</div>
<div class="product-description">
<div class="product-description-head">
<a aria-label="Xem chi tiết sản phẩm Vasco Translator V4 Stone Gray + E1" class="product-link product-title-link" content="../translators/vasco-translator-v4.html" href="<?php echo esc_url( home_url( '/product/v4-stonegray-e1/' ) ); ?>" title="Vasco Translator V4 Stone Gray + E1">
<h2 class="product-title product-name" id="vasco-translator-v4-stone-gray-+-e1-name">Vasco Translator V4 Stone Gray + E1</h2>
</a>
<h3 class="product-subtitle">Bộ sản phẩm đặc biệt với Internet miễn phí cho dịch thuật</h3>
<div class="trustpilot-top trustpilot-top--category">
<!-- TrustBox widget - Product Mini -->
<div aria-hidden="true" class="trustpilot-widget" color="#2D3139" data-businessunit-id="64cbd5206cac53316ece59d0" data-font-family="Noto Sans" data-font-weight="normal" data-locale="en-us" data-no-reviews="show" data-scroll-to-list="false" data-sku="V4-SG-E1-CB" data-star-color="#5E976A" data-style-alignment="left" data-style-height="24px" data-style-width="100%" data-template-id="54d39695764ea907c0f34825" data-theme="light" tabindex="-1">
<a href="#" rel="noopener" target="_blank">Trustpilot</a>
</div>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-scroll" data-trustpilot-placement="category" data-trustpilot-scroll-target="trustpilot-category-bottom-anchor" tabindex="-1" type="button">
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-logo" type="button">
<img alt="" aria-hidden="true" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/trustpilot.svg" ); ?>"/>
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<!-- End TrustBox widget -->
</div>
<ul>
<li>Nhiều ngôn ngữ hơn: 64 ngôn ngữ dịch giọng nói</li>
<li>Kết nối miễn phí vĩnh viễn: Bạn có quyền truy cập Internet không giới hạn cho việc dịch thuật</li>
<li>Số người dùng: Tối đa 6 người có thể cùng tham gia hội thoại</li>
<li>Tính năng bổ sung: Dịch ảnh, văn bản và tin nhắn trò chuyện</li>
<li>Tự do lựa chọn: Bạn có thể sử dụng tai nghe độc lập hoặc ghép nối với Vasco Translator V4</li>
</ul>
</div>
<div class="product-description-body">
<form action="./cart" id="add-to-cart-or-refresh" method="post">
<input name="token" type="hidden" value="4d648adb0a3dc7ed67dce0366e2eb442"/>
<input id="product_page_product_id" name="id_product" type="hidden" value="32"/>
<input class="js-product-customization-id" id="product_customization_id" name="id_customization" type="hidden" value="0"/>
<div></div>
<div class="product-variants js-product-variants product-variants-bundle" data-pack-key="packE1V4" id="product-variants">
<fieldset aria-labelledby="pack-color-legend-packE1V4" class="product-variants-items bundle-variants-item" role="radiogroup" tabindex="0">
<p id="pack-color-legend-packE1V4">Màu sắc:</p>
<div class="product-variants-list product-variants-listing mt-2" tabindex="0">
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="31" role="radio" tabindex="0">
<div class="circle black-onyx"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="31" name="bundle_color_packE1V4" title="Black Onyx" type="radio" value="31"/>
<span class="radio-label body-16">Đen Onyx</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="1" data-has-quantity="1" data-product-id="32" role="radio" tabindex="0">
<div class="circle stone-gray"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="32" name="bundle_color_packE1V4" title="Stone Gray" type="radio" value="32"/>
<span class="radio-label body-16">Xám Stone</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="33" role="radio" tabindex="0">
<div class="circle cobalt-blue"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="33" name="bundle_color_packE1V4" title="Cobalt Blue" type="radio" value="33"/>
<span class="radio-label body-16">Xanh Cobalt</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="34" role="radio" tabindex="0">
<div class="circle ruby-red"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="34" name="bundle_color_packE1V4" title="Ruby Red" type="radio" value="34"/>
<span class="radio-label body-16">Đỏ Ruby</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="35" role="radio" tabindex="0">
<div class="circle pearl-white"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="35" name="bundle_color_packE1V4" title="Pearl White" type="radio" value="35"/>
<span class="radio-label body-16">Trắng Ngọc Trai</span>
</label>
</div>
</fieldset>
</div>
<div class="product-add-to-cart-block">
<div class="add-to-cart-and-price">
<div class="product_button_description">
<a class="btn btn-md btn-secondary btn-description" href="<?php echo esc_url( home_url( '/product/v4-stonegray-e1/' ) ); ?>">Mô tả<span class="text-sr-only">Vasco Translator V4 Stone Gray + E1</span></a>
</div>
<div class="product-price-and-shipping product-price order-first md:order-none">
<span class="regular-price-wrapper">
<span class="regular-price-text">
</span>
<span aria-label="Giá gốc $715" class="regular-price" data-text="Regular price">
</span>
</span>
<span aria-label="Giá $715" class="price">
																																								$715																									</span>
<div class="bundle-savings">
<p>Tiết kiệm khi mua theo bộ<span class="saving-price">$123</span></p>
<a href="<?php echo esc_url( home_url( '/terms-and-conditions-of-the-promotion-cheaper-in-a-set/' ) ); ?>">Xem điều khoản khuyến mãi</a>
</div>
</div>
<div class="product-add-to-cart js-product-add-to-cart">
<div class="add">
<button aria-label="MUA NGAY: Vasco Translator V4 Stone Gray + E1" class="btn btn-primary add-to-cart" data-button-action="add-to-cart" type="submit"> <img alt="Giỏ hàng" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/basket.svg" ); ?>"/>MUA NGAY</button>
<button aria-hidden="true" class="btn btn-secondary notify-modal-button font-semibold" data-id-attribute="0" data-id-product="32" style="display:none">
<img alt="Thông báo cho tôi" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/notify.svg" ); ?>"/>Thông báo cho tôi</button>
</div>
<p class="product-minimal-quantity js-product-minimal-quantity">
</p>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</article>
</div>
<div class="listing-translators js-product product">
<article aria-labelledby="vasco-translator-v4-cobalt-blue-+-e1-name" class="container product-miniature js-product-miniature" data-has-quantity="1" data-id-product="33" data-id-product-attribute="0" tabindex="0">
<div class="thumbnail-container">
<div class="thumbnail-top js-variant-spinner-wrapper">
<div class="product-flags js-product-flags">
<div class="product-flag-wrapper promotion-theme-yellow">
<div aria-label="Rẻ hơn khi mua theo bộ" class="body-base product-flag">Rẻ hơn khi mua theo bộ</div>
</div>
</div>
<a class="product-link" content="../translators/vasco-translator-v4.html" href="<?php echo esc_url( home_url( '/product/v4-cobaltblue-e1/' ) ); ?>" title="Vasco Translator V4 Cobalt Blue + E1">
<img alt="Vasco Translator V4 Cobalt Blue + E1" data-full-size-image-url="./331-og_image/v4-cobaltblue-e1.jpg" height="480" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/images/products/331-medium_default/v4-cobaltblue-e1.jpg" ); ?>" width="480"/>
</a>
<div class="loading-spinner">
<svg fill="none" height="320" viewbox="0 0 320 320" width="320" xmlns="http://www.w3.org/2000/svg">
<path d="M237.247 95C241.417 95.0243 245.494 96.2155 249.004 98.435C252.514 100.655 255.313 103.811 257.074 107.537L310 223.921H278.171L243.625 143.475C241.056 137.679 239.055 131.654 237.649 125.482H237.045C235.655 131.662 233.653 137.692 231.07 143.488L196.347 223.921H164.682L217.432 107.562C219.191 103.835 221.987 100.676 225.494 98.4526C229.001 96.229 233.077 95.0318 237.247 95Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
<path d="M83.2238 226C79.0837 225.977 75.0353 224.787 71.5505 222.567C68.0658 220.348 65.288 217.191 63.5411 213.464L11 97.0918H42.5971L76.8919 177.529C79.4443 183.321 81.4349 189.342 82.8366 195.509H83.4361C84.815 189.333 86.802 183.307 89.3684 177.517L123.838 97.0794H155.273L102.906 213.439C101.162 217.169 98.3855 220.331 94.9007 222.555C91.4159 224.779 87.3663 225.974 83.2238 226Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
</svg>
</div>
</div>
<div class="product-description">
<div class="product-description-head">
<a aria-label="Xem chi tiết sản phẩm Vasco Translator V4 Cobalt Blue + E1" class="product-link product-title-link" content="../translators/vasco-translator-v4.html" href="<?php echo esc_url( home_url( '/product/v4-cobaltblue-e1/' ) ); ?>" title="Vasco Translator V4 Cobalt Blue + E1">
<h2 class="product-title product-name" id="vasco-translator-v4-cobalt-blue-+-e1-name">Vasco Translator V4 Cobalt Blue + E1</h2>
</a>
<h3 class="product-subtitle">Bộ sản phẩm đặc biệt với Internet miễn phí cho dịch thuật</h3>
<div class="trustpilot-top trustpilot-top--category">
<!-- TrustBox widget - Product Mini -->
<div aria-hidden="true" class="trustpilot-widget" color="#2D3139" data-businessunit-id="64cbd5206cac53316ece59d0" data-font-family="Noto Sans" data-font-weight="normal" data-locale="en-us" data-no-reviews="show" data-scroll-to-list="false" data-sku="V4-CB-E1-CB" data-star-color="#5E976A" data-style-alignment="left" data-style-height="24px" data-style-width="100%" data-template-id="54d39695764ea907c0f34825" data-theme="light" tabindex="-1">
<a href="#" rel="noopener" target="_blank">Trustpilot</a>
</div>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-scroll" data-trustpilot-placement="category" data-trustpilot-scroll-target="trustpilot-category-bottom-anchor" tabindex="-1" type="button">
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-logo" type="button">
<img alt="" aria-hidden="true" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/trustpilot.svg" ); ?>"/>
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<!-- End TrustBox widget -->
</div>
<ul>
<li>Nhiều ngôn ngữ hơn: 64 ngôn ngữ dịch giọng nói</li>
<li>Kết nối miễn phí vĩnh viễn: Bạn có quyền truy cập Internet không giới hạn cho việc dịch thuật</li>
<li>Số người dùng: Tối đa 6 người có thể cùng tham gia hội thoại</li>
<li>Tính năng bổ sung: Dịch ảnh, văn bản và tin nhắn trò chuyện</li>
<li>Tự do lựa chọn: Bạn có thể sử dụng tai nghe độc lập hoặc ghép nối với Vasco Translator V4</li>
</ul>
</div>
<div class="product-description-body">
<form action="./cart" id="add-to-cart-or-refresh" method="post">
<input name="token" type="hidden" value="4d648adb0a3dc7ed67dce0366e2eb442"/>
<input id="product_page_product_id" name="id_product" type="hidden" value="33"/>
<input class="js-product-customization-id" id="product_customization_id" name="id_customization" type="hidden" value="0"/>
<div></div>
<div class="product-variants js-product-variants product-variants-bundle" data-pack-key="packE1V4" id="product-variants">
<fieldset aria-labelledby="pack-color-legend-packE1V4" class="product-variants-items bundle-variants-item" role="radiogroup" tabindex="0">
<p id="pack-color-legend-packE1V4">Màu sắc:</p>
<div class="product-variants-list product-variants-listing mt-2" tabindex="0">
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="31" role="radio" tabindex="0">
<div class="circle black-onyx"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="31" name="bundle_color_packE1V4" title="Black Onyx" type="radio" value="31"/>
<span class="radio-label body-16">Đen Onyx</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="32" role="radio" tabindex="0">
<div class="circle stone-gray"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="32" name="bundle_color_packE1V4" title="Stone Gray" type="radio" value="32"/>
<span class="radio-label body-16">Xám Stone</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="1" data-has-quantity="1" data-product-id="33" role="radio" tabindex="0">
<div class="circle cobalt-blue"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="33" name="bundle_color_packE1V4" title="Cobalt Blue" type="radio" value="33"/>
<span class="radio-label body-16">Xanh Cobalt</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="34" role="radio" tabindex="0">
<div class="circle ruby-red"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="34" name="bundle_color_packE1V4" title="Ruby Red" type="radio" value="34"/>
<span class="radio-label body-16">Đỏ Ruby</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="35" role="radio" tabindex="0">
<div class="circle pearl-white"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="35" name="bundle_color_packE1V4" title="Pearl White" type="radio" value="35"/>
<span class="radio-label body-16">Trắng Ngọc Trai</span>
</label>
</div>
</fieldset>
</div>
<div class="product-add-to-cart-block">
<div class="add-to-cart-and-price">
<div class="product_button_description">
<a class="btn btn-md btn-secondary btn-description" href="<?php echo esc_url( home_url( '/product/v4-cobaltblue-e1/' ) ); ?>">Mô tả<span class="text-sr-only">Vasco Translator V4 Cobalt Blue + E1</span></a>
</div>
<div class="product-price-and-shipping product-price order-first md:order-none">
<span class="regular-price-wrapper">
<span class="regular-price-text">
</span>
<span aria-label="Giá gốc $715" class="regular-price" data-text="Regular price">
</span>
</span>
<span aria-label="Giá $715" class="price">
																																								$715																									</span>
<div class="bundle-savings">
<p>Tiết kiệm khi mua theo bộ<span class="saving-price">$123</span></p>
<a href="<?php echo esc_url( home_url( '/terms-and-conditions-of-the-promotion-cheaper-in-a-set/' ) ); ?>">Xem điều khoản khuyến mãi</a>
</div>
</div>
<div class="product-add-to-cart js-product-add-to-cart">
<div class="add">
<button aria-label="MUA NGAY: Vasco Translator V4 Cobalt Blue + E1" class="btn btn-primary add-to-cart" data-button-action="add-to-cart" type="submit"> <img alt="Giỏ hàng" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/basket.svg" ); ?>"/>MUA NGAY</button>
<button aria-hidden="true" class="btn btn-secondary notify-modal-button font-semibold" data-id-attribute="0" data-id-product="33" style="display:none">
<img alt="Thông báo cho tôi" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/notify.svg" ); ?>"/>Thông báo cho tôi</button>
</div>
<p class="product-minimal-quantity js-product-minimal-quantity">
</p>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</article>
</div>
<div class="listing-translators js-product product">
<article aria-labelledby="vasco-translator-v4-ruby-red-+-e1-name" class="container product-miniature js-product-miniature" data-has-quantity="1" data-id-product="34" data-id-product-attribute="0" tabindex="0">
<div class="thumbnail-container">
<div class="thumbnail-top js-variant-spinner-wrapper">
<div class="product-flags js-product-flags">
<div class="product-flag-wrapper promotion-theme-yellow">
<div aria-label="Rẻ hơn khi mua theo bộ" class="body-base product-flag">Rẻ hơn khi mua theo bộ</div>
</div>
</div>
<a class="product-link" content="../translators/vasco-translator-v4.html" href="<?php echo esc_url( home_url( '/product/v4-rubyred-e1/' ) ); ?>" title="Vasco Translator V4 Ruby Red + E1">
<img alt="Vasco Translator V4 Ruby Red + E1" data-full-size-image-url="./333-og_image/v4-rubyred-e1.jpg" height="480" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/images/products/333-medium_default/v4-rubyred-e1.jpg" ); ?>" width="480"/>
</a>
<div class="loading-spinner">
<svg fill="none" height="320" viewbox="0 0 320 320" width="320" xmlns="http://www.w3.org/2000/svg">
<path d="M237.247 95C241.417 95.0243 245.494 96.2155 249.004 98.435C252.514 100.655 255.313 103.811 257.074 107.537L310 223.921H278.171L243.625 143.475C241.056 137.679 239.055 131.654 237.649 125.482H237.045C235.655 131.662 233.653 137.692 231.07 143.488L196.347 223.921H164.682L217.432 107.562C219.191 103.835 221.987 100.676 225.494 98.4526C229.001 96.229 233.077 95.0318 237.247 95Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
<path d="M83.2238 226C79.0837 225.977 75.0353 224.787 71.5505 222.567C68.0658 220.348 65.288 217.191 63.5411 213.464L11 97.0918H42.5971L76.8919 177.529C79.4443 183.321 81.4349 189.342 82.8366 195.509H83.4361C84.815 189.333 86.802 183.307 89.3684 177.517L123.838 97.0794H155.273L102.906 213.439C101.162 217.169 98.3855 220.331 94.9007 222.555C91.4159 224.779 87.3663 225.974 83.2238 226Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
</svg>
</div>
</div>
<div class="product-description">
<div class="product-description-head">
<a aria-label="Xem chi tiết sản phẩm Vasco Translator V4 Ruby Red + E1" class="product-link product-title-link" content="../translators/vasco-translator-v4.html" href="<?php echo esc_url( home_url( '/product/v4-rubyred-e1/' ) ); ?>" title="Vasco Translator V4 Ruby Red + E1">
<h2 class="product-title product-name" id="vasco-translator-v4-ruby-red-+-e1-name">Vasco Translator V4 Ruby Red + E1</h2>
</a>
<h3 class="product-subtitle">Bộ sản phẩm đặc biệt với Internet miễn phí cho dịch thuật</h3>
<div class="trustpilot-top trustpilot-top--category">
<!-- TrustBox widget - Product Mini -->
<div aria-hidden="true" class="trustpilot-widget" color="#2D3139" data-businessunit-id="64cbd5206cac53316ece59d0" data-font-family="Noto Sans" data-font-weight="normal" data-locale="en-us" data-no-reviews="show" data-scroll-to-list="false" data-sku="V4-RR-E1-CB" data-star-color="#5E976A" data-style-alignment="left" data-style-height="24px" data-style-width="100%" data-template-id="54d39695764ea907c0f34825" data-theme="light" tabindex="-1">
<a href="#" rel="noopener" target="_blank">Trustpilot</a>
</div>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-scroll" data-trustpilot-placement="category" data-trustpilot-scroll-target="trustpilot-category-bottom-anchor" tabindex="-1" type="button">
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-logo" type="button">
<img alt="" aria-hidden="true" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/trustpilot.svg" ); ?>"/>
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<!-- End TrustBox widget -->
</div>
<ul>
<li>Nhiều ngôn ngữ hơn: 64 ngôn ngữ dịch giọng nói</li>
<li>Kết nối miễn phí vĩnh viễn: Bạn có quyền truy cập Internet không giới hạn cho việc dịch thuật</li>
<li>Số người dùng: Tối đa 6 người có thể cùng tham gia hội thoại</li>
<li>Tính năng bổ sung: Dịch ảnh, văn bản và tin nhắn trò chuyện</li>
<li>Tự do lựa chọn: Bạn có thể sử dụng tai nghe độc lập hoặc ghép nối với Vasco Translator V4</li>
</ul>
</div>
<div class="product-description-body">
<form action="./cart" id="add-to-cart-or-refresh" method="post">
<input name="token" type="hidden" value="4d648adb0a3dc7ed67dce0366e2eb442"/>
<input id="product_page_product_id" name="id_product" type="hidden" value="34"/>
<input class="js-product-customization-id" id="product_customization_id" name="id_customization" type="hidden" value="0"/>
<div></div>
<div class="product-variants js-product-variants product-variants-bundle" data-pack-key="packE1V4" id="product-variants">
<fieldset aria-labelledby="pack-color-legend-packE1V4" class="product-variants-items bundle-variants-item" role="radiogroup" tabindex="0">
<p id="pack-color-legend-packE1V4">Màu sắc:</p>
<div class="product-variants-list product-variants-listing mt-2" tabindex="0">
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="31" role="radio" tabindex="0">
<div class="circle black-onyx"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="31" name="bundle_color_packE1V4" title="Black Onyx" type="radio" value="31"/>
<span class="radio-label body-16">Đen Onyx</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="32" role="radio" tabindex="0">
<div class="circle stone-gray"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="32" name="bundle_color_packE1V4" title="Stone Gray" type="radio" value="32"/>
<span class="radio-label body-16">Xám Stone</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="33" role="radio" tabindex="0">
<div class="circle cobalt-blue"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="33" name="bundle_color_packE1V4" title="Cobalt Blue" type="radio" value="33"/>
<span class="radio-label body-16">Xanh Cobalt</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="1" data-has-quantity="1" data-product-id="34" role="radio" tabindex="0">
<div class="circle ruby-red"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="34" name="bundle_color_packE1V4" title="Ruby Red" type="radio" value="34"/>
<span class="radio-label body-16">Đỏ Ruby</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="35" role="radio" tabindex="0">
<div class="circle pearl-white"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="35" name="bundle_color_packE1V4" title="Pearl White" type="radio" value="35"/>
<span class="radio-label body-16">Trắng Ngọc Trai</span>
</label>
</div>
</fieldset>
</div>
<div class="product-add-to-cart-block">
<div class="add-to-cart-and-price">
<div class="product_button_description">
<a class="btn btn-md btn-secondary btn-description" href="<?php echo esc_url( home_url( '/product/v4-rubyred-e1/' ) ); ?>">Mô tả<span class="text-sr-only">Vasco Translator V4 Ruby Red + E1</span></a>
</div>
<div class="product-price-and-shipping product-price order-first md:order-none">
<span class="regular-price-wrapper">
<span class="regular-price-text">
</span>
<span aria-label="Giá gốc $715" class="regular-price" data-text="Regular price">
</span>
</span>
<span aria-label="Giá $715" class="price">
																																								$715																									</span>
<div class="bundle-savings">
<p>Tiết kiệm khi mua theo bộ<span class="saving-price">$123</span></p>
<a href="<?php echo esc_url( home_url( '/terms-and-conditions-of-the-promotion-cheaper-in-a-set/' ) ); ?>">Xem điều khoản khuyến mãi</a>
</div>
</div>
<div class="product-add-to-cart js-product-add-to-cart">
<div class="add">
<button aria-label="MUA NGAY: Vasco Translator V4 Ruby Red + E1" class="btn btn-primary add-to-cart" data-button-action="add-to-cart" type="submit"> <img alt="Giỏ hàng" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/basket.svg" ); ?>"/>MUA NGAY</button>
<button aria-hidden="true" class="btn btn-secondary notify-modal-button font-semibold" data-id-attribute="0" data-id-product="34" style="display:none">
<img alt="Thông báo cho tôi" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/notify.svg" ); ?>"/>Thông báo cho tôi</button>
</div>
<p class="product-minimal-quantity js-product-minimal-quantity">
</p>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</article>
</div>
<div class="listing-translators js-product product">
<article aria-labelledby="vasco-translator-v4-pearl-white-+-e1-name" class="container product-miniature js-product-miniature" data-has-quantity="1" data-id-product="35" data-id-product-attribute="0" tabindex="0">
<div class="thumbnail-container">
<div class="thumbnail-top js-variant-spinner-wrapper">
<div class="product-flags js-product-flags">
<div class="product-flag-wrapper promotion-theme-yellow">
<div aria-label="Rẻ hơn khi mua theo bộ" class="body-base product-flag">Rẻ hơn khi mua theo bộ</div>
</div>
</div>
<a class="product-link" content="../translators/vasco-translator-v4.html" href="<?php echo esc_url( home_url( '/product/v4-pearlwhite-e1/' ) ); ?>" title="Vasco Translator V4 Pearl White + E1">
<img alt="Vasco Translator V4 Pearl White + E1" data-full-size-image-url="./332-og_image/v4-pearlwhite-e1.jpg" height="480" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/images/products/332-medium_default/v4-pearlwhite-e1.jpg" ); ?>" width="480"/>
</a>
<div class="loading-spinner">
<svg fill="none" height="320" viewbox="0 0 320 320" width="320" xmlns="http://www.w3.org/2000/svg">
<path d="M237.247 95C241.417 95.0243 245.494 96.2155 249.004 98.435C252.514 100.655 255.313 103.811 257.074 107.537L310 223.921H278.171L243.625 143.475C241.056 137.679 239.055 131.654 237.649 125.482H237.045C235.655 131.662 233.653 137.692 231.07 143.488L196.347 223.921H164.682L217.432 107.562C219.191 103.835 221.987 100.676 225.494 98.4526C229.001 96.229 233.077 95.0318 237.247 95Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
<path d="M83.2238 226C79.0837 225.977 75.0353 224.787 71.5505 222.567C68.0658 220.348 65.288 217.191 63.5411 213.464L11 97.0918H42.5971L76.8919 177.529C79.4443 183.321 81.4349 189.342 82.8366 195.509H83.4361C84.815 189.333 86.802 183.307 89.3684 177.517L123.838 97.0794H155.273L102.906 213.439C101.162 217.169 98.3855 220.331 94.9007 222.555C91.4159 224.779 87.3663 225.974 83.2238 226Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
</svg>
</div>
</div>
<div class="product-description">
<div class="product-description-head">
<a aria-label="Xem chi tiết sản phẩm Vasco Translator V4 Pearl White + E1" class="product-link product-title-link" content="../translators/vasco-translator-v4.html" href="<?php echo esc_url( home_url( '/product/v4-pearlwhite-e1/' ) ); ?>" title="Vasco Translator V4 Pearl White + E1">
<h2 class="product-title product-name" id="vasco-translator-v4-pearl-white-+-e1-name">Vasco Translator V4 Pearl White + E1</h2>
</a>
<h3 class="product-subtitle">Bộ sản phẩm đặc biệt với Internet miễn phí cho dịch thuật</h3>
<div class="trustpilot-top trustpilot-top--category">
<!-- TrustBox widget - Product Mini -->
<div aria-hidden="true" class="trustpilot-widget" color="#2D3139" data-businessunit-id="64cbd5206cac53316ece59d0" data-font-family="Noto Sans" data-font-weight="normal" data-locale="en-us" data-no-reviews="show" data-scroll-to-list="false" data-sku="V4-PW-E1-CB" data-star-color="#5E976A" data-style-alignment="left" data-style-height="24px" data-style-width="100%" data-template-id="54d39695764ea907c0f34825" data-theme="light" tabindex="-1">
<a href="#" rel="noopener" target="_blank">Trustpilot</a>
</div>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-scroll" data-trustpilot-placement="category" data-trustpilot-scroll-target="trustpilot-category-bottom-anchor" tabindex="-1" type="button">
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<button aria-controls="trustpilot-category-bottom" aria-label="Ý kiến khách hàng" class="trustpilot-top-logo" type="button">
<img alt="" aria-hidden="true" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/trustpilot.svg" ); ?>"/>
<span class="sr-only">Ý kiến khách hàng</span>
</button>
<!-- End TrustBox widget -->
</div>
<ul>
<li>Nhiều ngôn ngữ hơn: 64 ngôn ngữ dịch giọng nói</li>
<li>Kết nối miễn phí vĩnh viễn: Bạn có quyền truy cập Internet không giới hạn cho việc dịch thuật</li>
<li>Số người dùng: Tối đa 6 người có thể cùng tham gia hội thoại</li>
<li>Tính năng bổ sung: Dịch ảnh, văn bản và tin nhắn trò chuyện</li>
<li>Tự do lựa chọn: Bạn có thể sử dụng tai nghe độc lập hoặc ghép nối với Vasco Translator V4</li>
</ul>
</div>
<div class="product-description-body">
<form action="./cart" id="add-to-cart-or-refresh" method="post">
<input name="token" type="hidden" value="4d648adb0a3dc7ed67dce0366e2eb442"/>
<input id="product_page_product_id" name="id_product" type="hidden" value="35"/>
<input class="js-product-customization-id" id="product_customization_id" name="id_customization" type="hidden" value="0"/>
<div></div>
<div class="product-variants js-product-variants product-variants-bundle" data-pack-key="packE1V4" id="product-variants">
<fieldset aria-labelledby="pack-color-legend-packE1V4" class="product-variants-items bundle-variants-item" role="radiogroup" tabindex="0">
<p id="pack-color-legend-packE1V4">Màu sắc:</p>
<div class="product-variants-list product-variants-listing mt-2" tabindex="0">
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="31" role="radio" tabindex="0">
<div class="circle black-onyx"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="31" name="bundle_color_packE1V4" title="Black Onyx" type="radio" value="31"/>
<span class="radio-label body-16">Đen Onyx</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="32" role="radio" tabindex="0">
<div class="circle stone-gray"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="32" name="bundle_color_packE1V4" title="Stone Gray" type="radio" value="32"/>
<span class="radio-label body-16">Xám Stone</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="33" role="radio" tabindex="0">
<div class="circle cobalt-blue"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="33" name="bundle_color_packE1V4" title="Cobalt Blue" type="radio" value="33"/>
<span class="radio-label body-16">Xanh Cobalt</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="0" data-has-quantity="1" data-product-id="34" role="radio" tabindex="0">
<div class="circle ruby-red"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="34" name="bundle_color_packE1V4" title="Ruby Red" type="radio" value="34"/>
<span class="radio-label body-16">Đỏ Ruby</span>
</label>
<label class="product-variants-item product-variants-item-bundle input-container" data-active="1" data-has-quantity="1" data-product-id="35" role="radio" tabindex="0">
<div class="circle pearl-white"></div>
<input class="input-color" data-analytics-type="colour" data-attribute="0" data-product-id="35" name="bundle_color_packE1V4" title="Pearl White" type="radio" value="35"/>
<span class="radio-label body-16">Trắng Ngọc Trai</span>
</label>
</div>
</fieldset>
</div>
<div class="product-add-to-cart-block">
<div class="add-to-cart-and-price">
<div class="product_button_description">
<a class="btn btn-md btn-secondary btn-description" href="<?php echo esc_url( home_url( '/product/v4-pearlwhite-e1/' ) ); ?>">Mô tả<span class="text-sr-only">Vasco Translator V4 Pearl White + E1</span></a>
</div>
<div class="product-price-and-shipping product-price order-first md:order-none">
<span class="regular-price-wrapper">
<span class="regular-price-text">
</span>
<span aria-label="Giá gốc $715" class="regular-price" data-text="Regular price">
</span>
</span>
<span aria-label="Giá $715" class="price">
																																								$715																									</span>
<div class="bundle-savings">
<p>Tiết kiệm khi mua theo bộ<span class="saving-price">$123</span></p>
<a href="<?php echo esc_url( home_url( '/terms-and-conditions-of-the-promotion-cheaper-in-a-set/' ) ); ?>">Xem điều khoản khuyến mãi</a>
</div>
</div>
<div class="product-add-to-cart js-product-add-to-cart">
<div class="add">
<button aria-label="MUA NGAY: Vasco Translator V4 Pearl White + E1" class="btn btn-primary add-to-cart" data-button-action="add-to-cart" type="submit"> <img alt="Giỏ hàng" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/basket.svg" ); ?>"/>MUA NGAY</button>
<button aria-hidden="true" class="btn btn-secondary notify-modal-button font-semibold" data-id-attribute="0" data-id-product="35" style="display:none">
<img alt="Thông báo cho tôi" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/notify.svg" ); ?>"/>Thông báo cho tôi</button>
</div>
<p class="product-minimal-quantity js-product-minimal-quantity">
</p>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</article>
</div>
</div>
</div>
<div id="js-product-list-bottom"></div>
</section>
<div class="trustpilot-scroll-anchor" id="trustpilot-category-bottom-anchor"></div>
<div class="trustpilot-category" id="trustpilot-category-bottom">
<div class="container">
<a class="sr-only" href="#customers-opinions-after" id="customers-opinions-skip">Bỏ qua phần đánh giá của khách hàng</a>
<h2 class="h2-notosans">Ý kiến khách hàng</h2>
<!-- TrustBox widget - Carousel -->
<div class="trustpilot-widget" data-businessunit-id="64cbd5206cac53316ece59d0" data-locale="en-us" data-review-languages="en" data-stars="4,5" data-style-height="140px" data-style-width="100%" data-template-id="53aa8912dec7e10d38f59f36">
<a href="#" rel="noopener" target="_blank">Trustpilot</a>
</div>
<!-- End TrustBox widget -->
<span class="sr-only" id="customers-opinions-after"></span>
</div>
</div>
<hr/>
<section class="media-awards">
<div class="container">
<h2 class="h2-notosans">Truyền thông nói về chúng tôi</h2>
<div aria-label="băng chuyền trích dẫn" aria-roledescription="carousel" class="swiper swiper-carousel autoplay loop carousel-media">
<a class="sr-only focusable" href="#after-media-carousel">Bỏ qua băng chuyền</a>
<div class="swiper-wrapper">
<div class="swiper-slide" role="listitem">
<a aria-labelledby="slide-label-zd_net" href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-zd_net">trích dẫn từ zd_net</h3>
<img alt="biểu tượng zd net" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/zd_net.webp" ); ?>"/>
<blockquote class="awards-text" tabindex="0">Một trong những màn demo ấn tượng nhất mà tôi được xem tại CES 2024 là với đội ngũ của Vasco Translator E1, một tai nghe sử dụng AI và một ứng dụng để dịch 49 ngôn ngữ theo thời gian thực.</blockquote>
</a>
</div>
<div class="swiper-slide" role="listitem">
<a aria-labelledby="slide-label-fox_business" href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-fox_business">trích dẫn từ fox_business</h3>
<img alt="biểu tượng fox business" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/fox_business.webp" ); ?>"/>
<blockquote class="awards-text" tabindex="0">Vasco muốn các công cụ dịch đáp ứng nhu cầu của khách hàng thường xuyên đi du lịch, cũng như những người sống ở nước ngoài, làm việc trong các nhóm quốc tế, hoặc có gia đình gặp rào cản ngôn ngữ do người thân đến từ các quốc gia khác nhau.</blockquote>
</a>
</div>
<div class="swiper-slide" role="listitem">
<a aria-labelledby="slide-label-cbs_news" href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-cbs_news">trích dẫn từ cbs_news</h3>
<img alt="biểu tượng cbs news" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/cbs_news.webp" ); ?>"/>
<blockquote class="awards-text" tabindex="0">Bạn có thể thực sự đi khắp thế giới, sử dụng thiết bị này để di chuyển và không cảm thấy lạc lõng ở một quốc gia khác.</blockquote>
</a>
</div>
<div class="swiper-slide" role="listitem">
<a aria-labelledby="slide-label-conde_nast_traveler" href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-conde_nast_traveler">trích dẫn từ conde_nast_traveler</h3>
<img alt="biểu tượng conde nest traveller" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/conde_nast_traveler.webp" ); ?>"/>
<blockquote class="awards-text" tabindex="0">Thiết bị dịch ngôn ngữ này là chiếc phao cứu sinh của tôi khi sống ở nước ngoài. Nó cho phép một cuộc trò chuyện qua lại gần như liền mạch.</blockquote>
</a>
</div>
<div class="swiper-slide" role="listitem">
<a aria-labelledby="slide-label-forbes" href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-forbes">trích dẫn từ forbes</h3>
<img alt="biểu tượng forbes" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/forbes.webp" ); ?>"/>
<blockquote class="awards-text" tabindex="0">Trong khi hầu hết các máy dịch sử dụng một công cụ duy nhất, các thiết bị của Vasco sử dụng 12 công cụ dịch, với Vasco sử dụng một đội ngũ chuyên gia ngôn ngữ có nhiệm vụ đảm bảo mọi thứ được kết nối chính xác.</blockquote>
</a>
</div>
<div class="swiper-slide" role="listitem">
<a aria-labelledby="slide-label-the_strategist" href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-the_strategist">trích dẫn từ the_strategist</h3>
<img alt="biểu tượng the strategist" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/the_strategist.webp" ); ?>"/>
<blockquote class="awards-text" tabindex="0">Tôi nghĩ Vasco là lựa chọn tốt nhất trong số các sản phẩm vì nó đi kèm dữ liệu trọn đời không giới hạn (không cần tìm Wi-Fi!) và dịch được 108 ngôn ngữ tại 200 quốc gia khác nhau.</blockquote>
</a>
</div>
<div class="swiper-slide" role="listitem">
<a aria-labelledby="slide-label-business_insider" href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-business_insider">trích dẫn từ business_insider</h3>
<img alt="biểu tượng business insider" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/business_insider.webp" ); ?>"/>
<blockquote class="awards-text" tabindex="0">Hiện đã tuân thủ HIPAA, các thiết bị dịch cầm tay của Vasco có thể cung cấp bản dịch cho tới 108 ngôn ngữ một cách an toàn, giúp chúng an toàn để sử dụng tại bất kỳ cơ sở y tế nào bởi bất kỳ nhân viên y tế nào nhằm xóa bỏ rào cản ngôn ngữ giữa bệnh nhân và nhân viên y tế.</blockquote>
</a>
</div>
<div class="swiper-slide" role="listitem">
<a aria-labelledby="slide-label-vancouver_sun" href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-vancouver_sun">trích dẫn từ vancouver_sun</h3>
<img alt="biểu tượng vancouver sun" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/vancouver_sun.webp" ); ?>"/>
<blockquote class="awards-text" tabindex="0">Công nghệ đột phá của Vasco cho phép người dùng giao tiếp với nhau qua các máy dịch của mình, kết nối 90% dân số thế giới thông qua sức mạnh của ngôn ngữ.</blockquote>
</a>
</div>
<div class="swiper-slide" role="listitem">
<a aria-labelledby="slide-label-techradar" href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-techradar">trích dẫn từ techradar</h3>
<img alt="biểu tượng tech radar" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/techradar.webp" ); ?>"/>
<blockquote class="awards-text" tabindex="0">Vasco Translator V4 mang lại khả năng dịch giọng nói đáng tin cậy, dịch ảnh nhanh chóng, và vùng phủ sóng toàn cầu miễn phí trọn đời trong một thiết kế nhỏ gọn bỏ túi, hoàn hảo cho kỳ nghỉ hoặc chuyến công tác tiếp theo của bạn.</blockquote>
</a>
</div>
</div>
<div class="swiper-button-prev btn-carousel-prev" data-label-prev="Previous slide"></div>
<div class="swiper-button-next btn-carousel-next" data-label-next="Next slide"></div>
</div>
<div class="stop-autoplay-carousel">
<button class="btn btn-md btn-stop-autoplay" data-text-button-pause="stop carousel autoplay" data-text-button-resume="resume carousel autoplay">
<span data-text-pause="Pause" data-text-resume="Resume">Tạm dừng</span>
<img alt="" aria-hidden="true" height="24" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/pause.svg" ); ?>" width="24"/>
</button>
</div>
<div id="after-media-carousel"></div>
</div>
</section>
<hr/>
<section class="trustedby-logo-carousel-wrapper">
<h2 class="h2-notosans trustedby-logo-carousel-title">Được hơn 500.000 khách hàng trên toàn thế giới tin tưởng</h2>
<div aria-label="một băng chuyền hiển thị logo các công ty đã tin tưởng chúng tôi" aria-roledescription="carousel" class="trustedby-logo-carousel" role="region">
<a class="sr-only focusable" href="#after-trustedby-logo-carousel">Bỏ qua băng chuyền</a>
<div aria-hidden="true" class="trustedby-logo-carousel-rows">
<div class="swiper autoplay loop carousel-logo-marquee carousel-trustedby-logo" data-carousel-speed="5500">
<div class="swiper-wrapper" role="list">
<div class="swiper-slide" role="listitem">
<img alt="itt" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/itt.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="randstad" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/randstad.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="schott" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/schott.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="sandvik" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/sandvik.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="yaskawa" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/yaskawa.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="markit" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/markit.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="asm" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/asm.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="wolf" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/wolf.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="fiducial" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/fiducial.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="electrolux" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/electrolux.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="gls" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/gls.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="adeo" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/adeo.svg" ); ?>" width="120"/>
</div>
</div>
</div>
<div class="swiper autoplay loop carousel-logo-marquee carousel-trustedby-logo" data-carousel-speed="7500">
<div class="swiper-wrapper" role="list">
<div class="swiper-slide" role="listitem">
<img alt="lindner" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/lindner.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="wisag" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/wisag.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="netto" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/netto.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="intercity_hotel" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/intercity_hotel.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="semperit" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/semperit.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="pepco" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/pepco.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="actemium" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/actemium.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="ape_group" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/ape_group.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="kw_informatik_gmbh" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/kw_informatik_gmbh.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="tsa_power_group" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/tsa_power_group.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="trace" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/trace.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="srg" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/srg.svg" ); ?>" width="120"/>
</div>
</div>
</div>
<div class="swiper autoplay loop carousel-logo-marquee carousel-trustedby-logo" data-carousel-speed="6500">
<div class="swiper-wrapper" role="list">
<div class="swiper-slide" role="listitem">
<img alt="nordewco" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/nordewco.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="kuenz" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/kuenz.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="boso" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/boso.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="siweco" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/siweco.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="hospital_rivera_chablais" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/hospital_rivera_chablais.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="ast" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/ast.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="xamk" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/xamk.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="salus" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/salus.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="dti" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/dti.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="clinicas_brisamar" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/clinicas_brisamar.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="hcb" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/hcb.svg" ); ?>" width="120"/>
</div>
<div class="swiper-slide" role="listitem">
<img alt="klaudianova_nemocnice" aria-hidden="true" draggable="false" height="40" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/TrustedByTriple/klaudianova_nemocnice.svg" ); ?>" width="120"/>
</div>
</div>
</div>
</div>
<div class="stop-autoplay-carousel container">
<button class="btn btn-md btn-stop-autoplay" data-text-button-pause="stop carousel autoplay" data-text-button-resume="resume carousel autoplay">
<span data-text-pause="Pause" data-text-resume="Resume">Tạm dừng</span>
<img alt="" aria-hidden="true" height="24" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/pause.svg" ); ?>" width="24"/>
</button>
</div>
</div>
<div id="after-trustedby-logo-carousel"></div>
</section>
<hr>
<section class="media-awards flex">
<div class="container">
<div class="flex flex-col media vasco-awards">
<h2 class="h2-notosans text-center">giải thưởng</h2>
<div aria-label="băng chuyền giải thưởng" aria-roledescription="carousel" class="swiper swiper-carousel autoplay loop carousel-award" role="region">
<a class="sr-only focusable" href="#after-award-carousel">Bỏ qua băng chuyền</a>
<div class="swiper-wrapper" role="list">
<div aria-labelledby="slide-label-muse_silver" class="swiper-slide" role="listitem">
<a href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-muse_silver">logo muse_silver</h3>
<img alt="MUSE SILVER" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/muse_silver.webp" ); ?>"/>
</a>
</div>
<div aria-labelledby="slide-label-european_product_design_award" class="swiper-slide" role="listitem">
<a href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-european_product_design_award">logo european_product_design_award</h3>
<img alt="European Product Design Award" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/european_product_design_award.webp" ); ?>"/>
</a>
</div>
<div aria-labelledby="slide-label-produkte_disq" class="swiper-slide" role="listitem">
<a href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-produkte_disq">logo produkte_disq</h3>
<img alt="PRODUKTE - DISQ" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/produkte_disq.webp" ); ?>"/>
</a>
</div>
<div aria-labelledby="slide-label-red_dot_2025" class="swiper-slide" role="listitem">
<a href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-red_dot_2025">logo red_dot_2025</h3>
<img alt="reddot 2025" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/red_dot_2025.webp" ); ?>"/>
</a>
</div>
<div aria-labelledby="slide-label-muse_design" class="swiper-slide" role="listitem">
<a href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-muse_design">logo muse_design</h3>
<img alt="muse design" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/muse_design.webp" ); ?>"/>
</a>
</div>
<div aria-labelledby="slide-label-red_dot_2022" class="swiper-slide" role="listitem">
<a href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-red_dot_2022">logo red_dot_2022</h3>
<img alt="red dot winner 2022" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/red_dot_2022.webp" ); ?>"/>
</a>
</div>
<div aria-labelledby="slide-label-new_york_product_design" class="swiper-slide" role="listitem">
<a href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-new_york_product_design">logo new_york_product_design</h3>
<img alt="New York product design awards" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/new_york_product_design.webp" ); ?>"/>
</a>
</div>
<div aria-labelledby="slide-label-good_design" class="swiper-slide" role="listitem">
<a href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-good_design">logo good_design</h3>
<img alt="good design award" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/good_design.webp" ); ?>"/>
</a>
</div>
<div aria-labelledby="slide-label-japan_good_design" class="swiper-slide" role="listitem">
<a href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-japan_good_design">logo japan_good_design</h3>
<img alt="Japan good design award" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/japan_good_design.webp" ); ?>"/>
</a>
</div>
<div aria-labelledby="slide-label-red_dot_2021" class="swiper-slide" role="listitem">
<a href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-red_dot_2021">logo red_dot_2021</h3>
<img alt="red dot winner 2021" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/red_dot_2021.webp" ); ?>"/>
</a>
</div>
<div aria-labelledby="slide-label-glomo" class="swiper-slide" role="listitem">
<a href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-glomo">logo glomo</h3>
<img alt="glomo global mobile awards" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/glomo.webp" ); ?>"/>
</a>
</div>
<div aria-labelledby="slide-label-red_dot_2026" class="swiper-slide" role="listitem">
<a href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-red_dot_2026">logo red_dot_2026</h3>
<img alt="red dot winner 2026" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/red_dot_2026.webp" ); ?>"/>
</a>
</div>
</div>
<div class="swiper-button-prev btn-carousel-prev" data-label-prev="Previous slide"></div>
<div class="swiper-button-next btn-carousel-next" data-label-next="Next slide"></div>
</div>
<div class="stop-autoplay-carousel">
<button class="btn btn-md btn-stop-autoplay" data-text-button-pause="stop carousel autoplay" data-text-button-resume="resume carousel autoplay">
<span data-text-pause="Pause" data-text-resume="Resume">Tạm dừng</span>
<img alt="" aria-hidden="true" height="24" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/pause.svg" ); ?>" width="24"/>
</button>
</div>
<div id="after-award-carousel"></div>
</div>
</div>
</section>
<section class="doubleboxes">
<div class="doublebox left" style="background-color: #d9ecef; color: #d9ecef;">
<div class="container">
<div class="doublebox-content">
<h3 class="h2">Cặp đôi giúp bạn kết nối với thế giới</h3>
<p>Nâng cao siêu năng lực dịch thuật của bạn với bộ sản phẩm kết hợp của Vasco. Việc ghép nối tai nghe Vasco Translator E1 với máy Vasco Translator V4 hoặc Q1 cầm tay đưa giao tiếp lên một tầm cao hoàn toàn mới. Sự kết hợp công nghệ này mang lại cho bạn sự tự do hoàn toàn trong mọi tình huống - từ những cuộc trò chuyện rảnh tay đến dịch ảnh ngay lập tức. Hãy khám phá những lợi ích khi ghép nối tai nghe với một máy dịch Vasco cầm tay.</p>
<svg class="svg-pseudo" color="" fill="none" height="48" viewbox="0 0 24 48" width="24" xmlns="http://www.w3.org/2000/svg">
<path d="M2.93362 6.29957L21.0462 17.5978C21.9252 18.1457 22.6722 19.0407 23.1966 20.1741C23.7209 21.3076 24 22.6307 24 23.9829C24 25.3351 23.7209 26.6583 23.1966 27.7917C22.6722 28.9252 21.9252 29.8201 21.0462 30.3681L2.95791 41.6149C2.07625 42.1584 1.32668 43.0522 0.801213 44.1865C0.280873 45.3097 0.00273451 46.6204 2.00603e-05 47.9604L2.00603e-05 48C-6.69205e-06 47.9868 -6.68146e-06 47.9736 2.00603e-05 47.9604L2.00603e-05 3.8147e-06C0.0114239 1.33398 0.293609 2.63561 0.813323 3.75166C1.33304 4.8677 2.06869 5.75168 2.93362 6.29957Z" fill="currentColor"></path>
</svg>
</div>
</div>
<div class="doublebox-absolute">
<img alt="Tai nghe Vasco Translator E1 và Vasco Translator Q1 được hiển thị cùng nhau; màn hình Q1 hiển thị giao diện ghép nối tai nghe, với logo Vasco hiện rõ ở phía sau." src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/doublebox/category_bundles1.webp" ); ?>"/>
</div>
</div>
<div class="doublebox right" style="background-color: #efece8; color: #efece8;">
<div class="container">
<div class="doublebox-content">
<h3 class="h2">Vasco Translator Q1 + E1</h3>
<p>Giải pháp dành cho những ai luôn tìm kiếm công nghệ tiên tiến nhất. Việc ghép nối tai nghe Vasco Translator E1 với Vasco Translator Q1 mở rộng số ngôn ngữ hỗ trợ của tai nghe lên 85 ngôn ngữ và trang bị cho chúng khả năng truy cập Internet không giới hạn tại gần 200 quốc gia. Chế độ tự động biến việc dịch thuật thành một cuộc trò chuyện tự nhiên. Cặp đôi ăn ý này hoạt động hoàn hảo cho du lịch, các cuộc họp kinh doanh và giao tiếp hàng ngày. Trò chuyện bằng ngoại ngữ, dịch thực đơn nhà hàng hay các cuộc gọi điện thoại quốc tế sẽ không còn là rào cản. Tối đa sáu tai nghe có thể được kết nối với một máy dịch cầm tay.</p>
<svg class="svg-pseudo" color="" fill="none" height="48" viewbox="0 0 24 48" width="24" xmlns="http://www.w3.org/2000/svg">
<path d="M2.93362 6.29957L21.0462 17.5978C21.9252 18.1457 22.6722 19.0407 23.1966 20.1741C23.7209 21.3076 24 22.6307 24 23.9829C24 25.3351 23.7209 26.6583 23.1966 27.7917C22.6722 28.9252 21.9252 29.8201 21.0462 30.3681L2.95791 41.6149C2.07625 42.1584 1.32668 43.0522 0.801213 44.1865C0.280873 45.3097 0.00273451 46.6204 2.00603e-05 47.9604L2.00603e-05 48C-6.69205e-06 47.9868 -6.68146e-06 47.9736 2.00603e-05 47.9604L2.00603e-05 3.8147e-06C0.0114239 1.33398 0.293609 2.63561 0.813323 3.75166C1.33304 4.8677 2.06869 5.75168 2.93362 6.29957Z" fill="currentColor"></path>
</svg>
</div>
</div>
<div class="doublebox-absolute">
<img alt="Hai người đang cười; người nam đeo tai nghe Vasco Translator E1 và chỉ vào chiếc Vasco Translator Q1 mà người nữ đang cầm." src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/doublebox/category_bundles2.webp" ); ?>"/>
</div>
</div>
<div class="doublebox left" style="background-color: #e0e2f2; color: #e0e2f2;">
<div class="container">
<div class="doublebox-content">
<h3 class="h2">Vasco Translator V4 + E1</h3>
<p>Việc ghép nối tai nghe với Vasco Translator V4 giúp tăng số ngôn ngữ có thể dịch từ 51 lên 64. Cũng như với Vasco Translator Q1, ngay cả ở những nơi xa xôi nhất trên thế giới, bạn vẫn có thể tin tưởng vào khả năng dịch giọng nói, văn bản và hình ảnh. Kết hợp công nghệ của cả hai thiết bị mang lại trải nghiệm du lịch thoải mái hơn nữa. Bạn đang tìm kiếm một cấu hình tiên tiến hơn? Hãy khám phá các phụ kiện máy dịch của chúng tôi và xây dựng bộ dụng cụ thiết yếu cho riêng bạn.</p>
<svg class="svg-pseudo" color="" fill="none" height="48" viewbox="0 0 24 48" width="24" xmlns="http://www.w3.org/2000/svg">
<path d="M2.93362 6.29957L21.0462 17.5978C21.9252 18.1457 22.6722 19.0407 23.1966 20.1741C23.7209 21.3076 24 22.6307 24 23.9829C24 25.3351 23.7209 26.6583 23.1966 27.7917C22.6722 28.9252 21.9252 29.8201 21.0462 30.3681L2.95791 41.6149C2.07625 42.1584 1.32668 43.0522 0.801213 44.1865C0.280873 45.3097 0.00273451 46.6204 2.00603e-05 47.9604L2.00603e-05 48C-6.69205e-06 47.9868 -6.68146e-06 47.9736 2.00603e-05 47.9604L2.00603e-05 3.8147e-06C0.0114239 1.33398 0.293609 2.63561 0.813323 3.75166C1.33304 4.8677 2.06869 5.75168 2.93362 6.29957Z" fill="currentColor"></path>
</svg>
</div>
</div>
<div class="doublebox-absolute">
<img alt="Một người nữ và một người nam ngồi cùng nhau trong nhà hàng, cả hai đều đeo tai nghe Vasco Translator E1; người nam cầm chiếc Vasco Translator V4 và cho người nữ xem một thứ gì đó." src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/doublebox/category_bundles3.webp" ); ?>"/>
</div>
</div>
<div class="doublebox right" style="background-color: #efece8; color: #efece8;">
<div class="container">
<div class="doublebox-content">
<h3 class="h2">Internet miễn phí tại gần 200 quốc gia - vĩnh viễn</h3>
<p>Bằng cách ghép nối tai nghe Vasco Translator E1 với một trong các máy dịch cầm tay của chúng tôi, bạn sẽ nhận được dữ liệu miễn phí trọn đời cho việc dịch thuật, khả dụng tại gần 200 quốc gia trên toàn thế giới.</p>
<svg class="svg-pseudo" color="" fill="none" height="48" viewbox="0 0 24 48" width="24" xmlns="http://www.w3.org/2000/svg">
<path d="M2.93362 6.29957L21.0462 17.5978C21.9252 18.1457 22.6722 19.0407 23.1966 20.1741C23.7209 21.3076 24 22.6307 24 23.9829C24 25.3351 23.7209 26.6583 23.1966 27.7917C22.6722 28.9252 21.9252 29.8201 21.0462 30.3681L2.95791 41.6149C2.07625 42.1584 1.32668 43.0522 0.801213 44.1865C0.280873 45.3097 0.00273451 46.6204 2.00603e-05 47.9604L2.00603e-05 48C-6.69205e-06 47.9868 -6.68146e-06 47.9736 2.00603e-05 47.9604L2.00603e-05 3.8147e-06C0.0114239 1.33398 0.293609 2.63561 0.813323 3.75166C1.33304 4.8677 2.06869 5.75168 2.93362 6.29957Z" fill="currentColor"></path>
</svg>
</div>
</div>
<div class="doublebox-absolute">
<img alt="Hình ảnh Trái Đất nhìn từ không gian với các đường nối liền nhiều địa điểm khác nhau trên toàn thế giới, minh họa cho kết nối toàn cầu thông qua Internet miễn phí có sẵn tại gần 200 quốc gia, do các máy dịch Vasco cung cấp." src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/doublebox/category_bundles4.webp" ); ?>"/>
</div>
</div>
</section>
</hr></section>
</div>
</div>
</section>
<hr/>


<?php
get_footer();
