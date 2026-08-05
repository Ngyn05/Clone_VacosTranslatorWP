<?php
/**
 * Template Name: Clean Page page-shipping.php
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
<a href="<?php echo esc_url( home_url( "/" ) ); ?>"><span class="breadcrumb-link">Trang chủ</span></a><span class="breadcrumb-divider">&gt;</span>
</li>
<li><span aria-current="page" class="breadcrumb-current body-16">Giao hàng &amp; Thanh toán</span></li>
</ol>
</nav>
</div>
</div>
<div class="js-content-wrapper" id="content-wrapper">
<section class="shipping">
<div class="shipping-top">
<div class="container">
<h1 class="h1">Giao hàng &amp; Thanh toán</h1>
</div>
</div>
<section aria-labelledby="shipping-prices-title" class="shipping-prices">
<h2 class="h2-notosans" id="shipping-prices-title">SHIPPING PRICES</h2>
<div class="container">
<div class="shipping-table-wrapper">
<div class="shipping-to">
<p>United states</p>
</div>
<table class="shipping-table">
<thead>
<tr class="shipping-row">
<th class="shipping-prices-bold">Service provider</th>
<th class="shipping-prices-bold">Shipping time</th>
<th class="shipping-prices-bold">Prices</th>
</tr>
</thead>
<tbody>
<tr class="shipping-row">
<td>UPS Ground</td>
<td>2 - 7 business days</td>
<td class="shipping-prices-violet">
																					Free
																			</td>
</tr>
<tr class="shipping-row">
<td>USPS Ground</td>
<td>2 - 7 business days</td>
<td class="shipping-prices-violet">
																					Free
																			</td>
</tr>
<tr class="shipping-row">
<td>UPS 3rd Busness Day</td>
<td>Orders placed before 10 AM ET ship out the same day<span class="asterisk">**</span></td>
<td class="shipping-prices-violet">
																					$20
																			</td>
</tr>
<tr class="shipping-row">
<td>UPS 2nd business day</td>
<td>Orders placed before 10 AM ET ship out the same day<span class="asterisk">**</span></td>
<td class="shipping-prices-violet">
																					$40
																			</td>
</tr>
</tbody>
</table>
</div>
<div class="shipping-table-wrapper">
<div class="shipping-to">
<p>Canada, Mexico</p>
<p class="mt-4" style="color: #2d3139; text-transform: none;"><strong>We do not ship outside the United
								States.</strong><br/>To buy Vasco Translator in Canada or Mexico, please look for our Amazon listings in
							one of those countries or click one of the links below.<br/><span style="color: #4966ff;"><a href="#" rel="nofollow noopener" target="_blank">Amazon MX</a><br/><a href="#" rel="nofollow noopener" target="_blank">Amazon CA</a></span></p>
</div>
</div>
<div class="shipping-addition">
<p class="mb-4">* Giao hàng đến Alaska, Hawaii, Puerto Rico, Guam và các lãnh thổ ngoại ô có thể mất từ 14 đến 21 ngày.</p>
<p>** Thời gian chốt đơn gửi trong ngày là 10 giờ sáng. Tất cả các đơn hàng đặt sau 10 giờ sáng có thể được vận chuyển vào ngày hôm sau.</p>
</div>
</div>
</section>
<hr/>
<section class="shipping-icons-section">
<div class="container">
<div class="icons-flex">
<h2 class="h2-notosans">Why order at Vasco?</h2>
<div class="grid-section">
<div class="key">
<div><img alt="shipping icon" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/shipping/fast-shipping.svg" ); ?>"/></div>
<div>
<p>Rely on our fast shipping policy. We process all orders <b>within 24 hours, Monday-Friday.</b></p>
</div>
</div>
<div class="key">
<div><img alt="insured icon" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/shipping/insured-shipping.svg" ); ?>"/></div>
<div>
<p>Yên tâm đơn hàng của bạn được giao nguyên vẹn. Tất cả sản phẩm đều được vận chuyển có bảo hiểm đầy đủ.</p>
</div>
</div>
<div class="key">
<div><img alt="shipping icon" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/shipping/shipping-free.svg" ); ?>"/></div>
<div>
<p>We offer <b>free standard shipping</b> within the United States. Shipping takes <b>3-7 business days</b>.</p>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="payment-forms">
<div class="container">
<h2 class="h2-notosans">We accept the following forms of payment:</h2>
<div class="payment-grid"><img alt="visa" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/shipping/following-payments/visa.svg" ); ?>"/>
<img alt="mastercard" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/shipping/following-payments/mastercard.svg" ); ?>"/>
<img alt="americanexpress" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/shipping/following-payments/americanexpress.svg" ); ?>"/>
<img alt="paypal" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/shipping/following-payments/paypal.svg" ); ?>"/>
<img alt="sezzle" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/shipping/following-payments/sezzle.svg" ); ?>"/>
<img alt="afterpay" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/shipping/following-payments/afterpay.svg" ); ?>"/>
</div>
</div>
</section>
</section>
</div>
</div>
</section>
<hr/>


<?php
get_footer();
