<?php
/**
 * Template Name: Clean Page page-coverage-map.php
 *
 * @package VascoTheme
 */

get_header();
?>


<section class="relative" id="wrapper">
<aside id="notifications">
<div class="container">
</div>
</aside>
<div>
<div class="breadcrumb-container">
<div class="container">
<nav aria-label="Breadcrumbs" class="breadcrumb">
<ol>
<li class="body-16">
<a href="<?php echo esc_url( home_url( "/" ) ); ?>"><span class="breadcrumb-link">Home</span></a><span class="breadcrumb-divider">&gt;</span>
</li>
<li><span aria-current="page" class="breadcrumb-current body-16">Bản đồ phủ sóng Internet</span></li>
</ol>
</nav>
</div>
</div>
<div class="js-content-wrapper" id="content-wrapper">
<section class="coverage-map">
<div class="title-wrapper">
<div class="container">
<h1 class="h1">Bản đồ phủ sóng Internet</h1>
</div>
</div>
<div class="container content">
<h2 class="h2-notosans">Xem nơi máy phiên dịch đa năng Vasco hoạt động</h2>
<p>Đừng lo về chi phí phát sinh khi ở nước ngoài. Vasco cung cấp Internet miễn phí trọn đời cho mọi bản dịch.
Nhấp vào bản đồ để xác nhận Vasco Translator kết nối miễn phí tại quốc gia bạn đến.</p>
<form id="product-switcher">
<label>
<input name="product_id" type="radio" value="14"/>
<p>Vasco Translator V4</p>
</label>
<label>
<input name="product_id" type="radio" value="38"/>
<p>Vasco Translator Q1</p>
</label>
<label>
<input name="product_id" type="radio" value="62"/>
<p>Vasco Translator M4</p>
</label>
</form>
<div id="map-wrapper">
<div class="map-search-container">
<div class="map-search-wrapper">
<input class="map-search" id="autocomplete" name="country-search" placeholder="Nhập quốc gia" type="text"/>
<div class="nothing-found">
<svg fill="none" height="16" viewbox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_55593_3536)">
<path clip-rule="evenodd" d="M7.99996 14.0001C11.3302 14.0001 14 11.3304 14 8.00008C14 4.66979 11.3302 2.00008 7.99996 2.00008C4.66967 2.00008 1.99996 4.66979 1.99996 8.00008C1.99996 11.3304 4.66967 14.0001 7.99996 14.0001ZM15.3333 8.00008C15.3333 12.0667 12.0666 15.3334 7.99996 15.3334C3.93329 15.3334 0.666626 12.0667 0.666626 8.00008C0.666626 3.93341 3.93329 0.666748 7.99996 0.666748C12.0666 0.666748 15.3333 3.93341 15.3333 8.00008Z" fill="#E40000" fill-rule="evenodd"></path>
<path d="M8.00004 11.7332C8.38893 11.7332 8.66671 11.4555 8.66671 11.0666C8.66671 10.6777 8.38893 10.3999 8.00004 10.3999C7.61115 10.3999 7.33337 10.6777 7.33337 11.0666C7.33337 11.3999 7.61115 11.7332 8.00004 11.7332Z" fill="#E40000"></path>
<path d="M8.66671 4H7.33337V9.33333H8.66671V4Z" fill="#E40000"></path>
</g>
<defs>
<clippath id="clip0_55593_3536">
<rect fill="white" height="16" width="16"></rect>
</clippath>
</defs>
</svg>
<p>Không tìm thấy kết quả</p>
</div>
</div>
</div>
<div class="vmap" data-type="aeris" id="vmap">
<div class="map-container" id="vmap-content">
<div class="map-popup ui-widget-content" id="drag-popup">
<div class="map-popup-dialog map-popup-container">
<div class="map-popup-content">
<button class="close-map-popup" type="button"><img height="24px" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/icon-end.svg" ); ?>" width="24px"/></button>
<div class="map-popup-header">
<h3 class="map-popup-title"></h3>
</div>
<div class="map-popup-body">
</div>
</div>
</div>
</div>
<div id="world-map" style="width: 100%; height:100%;">
<div aria-hidden="true" class="loading-spinner">
<svg fill="none" height="320" viewbox="0 0 320 320" width="320" xmlns="http://www.w3.org/2000/svg">
<path d="M237.247 95C241.417 95.0243 245.494 96.2155 249.004 98.435C252.514 100.655 255.313 103.811 257.074 107.537L310 223.921H278.171L243.625 143.475C241.056 137.679 239.055 131.654 237.649 125.482H237.045C235.655 131.662 233.653 137.692 231.07 143.488L196.347 223.921H164.682L217.432 107.562C219.191 103.835 221.987 100.676 225.494 98.4526C229.001 96.229 233.077 95.0318 237.247 95Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
<path d="M83.2238 226C79.0837 225.977 75.0353 224.787 71.5505 222.567C68.0658 220.348 65.288 217.191 63.5411 213.464L11 97.0918H42.5971L76.8919 177.529C79.4443 183.321 81.4349 189.342 82.8366 195.509H83.4361C84.815 189.333 86.802 183.307 89.3684 177.517L123.838 97.0794H155.273L102.906 213.439C101.162 217.169 98.3855 220.331 94.9007 222.555C91.4159 224.779 87.3663 225.974 83.2238 226Z" fill="none" stroke="#2D3139" stroke-width="4"></path>
</svg>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</section>
<hr/>


<?php
get_footer();
