<?php
/**
 * Template Name: Clean Page page-about-us.php
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
<nav aria-label="Đường dẫn điều hướng" class="breadcrumb">
<ol>
<li class="body-16">
<a href="<?php echo esc_url( home_url( "/" ) ); ?>"><span class="breadcrumb-link">Trang chủ</span></a><span class="breadcrumb-divider">&gt;</span>
</li>
<li><span aria-current="page" class="breadcrumb-current body-16">Về chúng tôi</span></li>
</ol>
</nav>
</div>
</div>

<div class="js-content-wrapper" id="content-wrapper">
<div class="socialimpact-pages">

<!-- Top Title Banner -->
<div class="socialimpact-top">
<div class="container">
<h1 class="h1">Sứ mệnh của chúng tôi</h1>
<p class="socialimpact-subtitle">Một thế giới không còn rào cản ngôn ngữ — Chúng tôi thiết kế công nghệ giúp thế giới trở nên gần gũi hơn và đưa con người xích lại gần nhau.</p>
</div>
</div>

<!-- Section 1: Hero Image + Text (Format Social Impact Style) -->
<section class="socialimpact-card-wrapper">
<div class="socialimpact-inner-card">

<div class="si-item si-item--left">
<div class="si-text">
<h2 class="h2">Hành Trình Xóa Bỏ Rào Cản Ngôn Ngữ</h2>
<h3 class="box-subtitle">Cây cầu vô hình kết nối triệu người dùng trên toàn thế giới</h3>
<p>Chúng tôi thiết kế công nghệ giúp thế giới trở nên gần gũi hơn và đưa con người xích lại gần nhau. Đội ngũ của chúng tôi, trải rộng trên bốn lục địa, mỗi ngày đều định hình lại các chuẩn mực giao tiếp. Chúng tôi tạo ra những giải pháp giúp bạn quên đi rào cản ngôn ngữ và tập trung vào điều thực sự quan trọng—tự do khám phá thế giới và xây dựng những kết nối chân thực.</p>
<p>Điều tưởng như không thể ngày nào đã trở thành thực tế hằng ngày của hàng triệu người dùng của chúng tôi. Việc dịch giọng nói hay dịch ảnh ngay lập tức có vẻ hiển nhiên với bạn ngày hôm nay? Với chúng tôi, đó là lời khen ngợi lớn nhất và là bằng chứng cho thấy công nghệ chúng tôi xây dựng đã trở thành một cây cầu vô hình kết nối con người.</p>
<a class="btn btn-md btn-black" href="<?php echo esc_url( home_url( "/all-products/" ) ); ?>">Khám phá sản phẩm <span class="text-sr-only">của Vasco</span></a>
</div>
<div class="si-image">
<img alt="Một phụ nữ đứng trên sân khấu hội nghị thuyết trình trước khán giả về Vasco Assistance" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/vasco-audience-presentation.webp" ); ?>"/>
</div>
</div>

</div><!-- .socialimpact-inner-card -->
</section><!-- .socialimpact-card-wrapper -->

<!-- Global Quality Images Grid (Exactly 2 images, no loop) -->
<section class="global-carousel-section container" style="margin-top: 50px; margin-bottom: 50px; text-align: center;">
<h2 class="h2-notosans" style="margin-bottom: 14px;">Dấu ấn chất lượng toàn cầu</h2>
<p style="max-width: 840px; margin: 0 auto 32px; color: #475569; line-height: 1.6;">Qua nhiều năm, chúng tôi đã giành được hàng chục giải thưởng quốc tế cho thiết kế, công nghệ đột phá và chất lượng cao của sản phẩm. Với chúng tôi, đây không chỉ là những chiếc cúp—đó là bằng chứng cho thấy kỹ thuật và sự đổi mới của Ba Lan đang thiết lập những chuẩn mực toàn cầu.</p>
<div class="global-images-grid" style="display: flex; gap: 24px; justify-content: center; align-items: center; flex-wrap: wrap;">
<div class="global-image-item" style="flex: 1; min-width: 280px; max-width: 560px; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08);">
<img alt="Lễ trao giải thưởng Vasco" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/about-us/global1.webp" ); ?>" style="width: 100%; height: auto; display: block; border-radius: 20px; transition: transform 0.3s ease;" />
</div>
<div class="global-image-item" style="flex: 1; min-width: 280px; max-width: 560px; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08);">
<img alt="Giấy chứng nhận giải thưởng Vasco" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/about-us/global2.webp" ); ?>" style="width: 100%; height: auto; display: block; border-radius: 20px; transition: transform 0.3s ease;" />
</div>
</div>
</section>

<!-- Media Awards Swiper (Original) -->
<section class="media-awards">
<div class="container">
<div id="awards-section">
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
<div aria-labelledby="slide-label-red_dot_2025" class="swiper-slide" role="listitem">
<a href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-red_dot_2025">logo red_dot_2025</h3>
<img alt="reddot 2025" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/red_dot_2025.webp" ); ?>"/>
</a>
</div>
<div aria-labelledby="slide-label-red_dot_2022" class="swiper-slide" role="listitem">
<a href="#" rel="nofollow" target="_blank">
<h3 class="sr-only" id="slide-label-red_dot_2022">logo red_dot_2022</h3>
<img alt="red dot winner 2022" loading="lazy" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/red_dot_2022.webp" ); ?>"/>
</a>
</div>
</div>
<div class="swiper-button-prev btn-carousel-prev" data-label-prev="Previous slide"></div>
<div class="swiper-button-next btn-carousel-next" data-label-next="Next slide"></div>
</div>
</div>
</div>
</section>

<!-- Timeline Swiper Section (Original) -->
<section class="events-slider">
<div class="container text-container">
<h2 class="h1">Từ quá khứ đến tương lai</h2>
<p>Cách mạng nối tiếp cách mạng</p>
<p>Ý tưởng. Vấn đề. Giải pháp. Đó là cách những bước đột phá ra đời. Khi một trở ngại tưởng như không thể vượt qua, chúng tôi lại nhắc mình lý do vì sao chúng tôi làm điều này.</p>
</div>
<div class="event-wrapper">
<div class="swiper swiper-events">
<div class="swiper-wrapper">
<div class="swiper-slide" tabindex="0">
<img alt="Hình ảnh đồ họa với chữ Hello!" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/landings/ces/card1.webp" ); ?>"/>
<div class="event-text">
<p>2008<br/>Từ lời nói đến hành động</p>
<p>Maciej Góralski thành lập công ty ban đầu sản xuất thẻ học ngôn ngữ và bán những thiết bị dịch đầu tiên.</p>
</div>
</div>
<div class="swiper-slide" tabindex="0">
<img alt="Vasco Translator M3" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/landings/ces/card9.webp" ); ?>"/>
<div class="event-text">
<p>2020<br/>Khởi đầu của một Triều đại</p>
<p>Vasco Translator M3 là thiết bị đầu tiên hoàn toàn do chúng tôi tự thiết kế.</p>
</div>
</div>
<div class="swiper-slide" tabindex="0">
<img alt="Vasco Translator V4" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/landings/ces/card10.webp" ); ?>"/>
<div class="event-text">
<p>2022<br/>Một huyền thoại ra đời</p>
<p>Vasco Translator V4 trở thành mẫu máy đoạt giải thưởng với độ chính xác 96% và kết nối internet trọn đời.</p>
</div>
</div>
</div>
<div class="custom-navigation">
<div class="swiper-button-prev btn-events-prev" data-label-prev="Previous slide"></div>
<div class="swiper-button-next btn-events-next" data-label-next="Next slide"></div>
</div>
</div>
</div>
</section>

<!-- Section 2: Team Video/Image + Text (Format Social Impact Style) -->
<section class="socialimpact-card-wrapper" style="margin-top: 40px; margin-bottom: 40px;">
<div class="socialimpact-inner-card">

<div class="si-item si-item--right">
<div class="si-image">
<video aria-describedby="video-desc-hero" autoplay="" class="lazy" data-setup="{}" id="about_us.v2-hero-video" loop="" muted="" playsinline="" poster="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/' ); ?>about-us/career_video_placeholder.webp" style="width:100%; height:100%; object-fit:cover;">
<source data-src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/about-us/about_us_video.webm" ); ?>" type="video/webm"/>
<source data-src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/about-us/about_us_video.mp4" ); ?>" type="video/mp4"/>
</video>
</div>
<div class="si-text">
<h2 class="h2">Đội Ngũ Đằng Sau Sứ Mệnh</h2>
<h3 class="box-subtitle">Con người kết hợp chuyên môn và sự đồng cảm chân thành</h3>
<p>Vasco không chỉ là công nghệ—đó còn là những con người đã cùng nhau làm việc trong nhiều năm để giúp giao tiếp trở nên đơn giản, tự nhiên và không còn rào cản. Một số người trong chúng tôi đã ở đây từ những ngày đầu tiên, trong khi những người khác gia nhập trong suốt hành trình, nhưng tất cả chúng tôi đều gắn kết bởi cùng một niềm đam mê.</p>
<p>Mỗi ngày, chúng tôi kết hợp kiến thức, kinh nghiệm và những góc nhìn đa dạng để thiết kế các thiết bị đáp ứng nhu cầu thực tế. Chúng tôi tin rằng những đổi mới tốt nhất xuất hiện khi công nghệ tiên tiến gặp gỡ sự đồng cảm và sự thấu hiểu chân thành đối với người khác.</p>
<a class="btn btn-md btn-black" href="<?php echo esc_url( home_url( "/contact/" ) ); ?>">Gặp gỡ đội ngũ <span class="text-sr-only">Vasco</span></a>
</div>
</div>

</div><!-- .socialimpact-inner-card -->
</section><!-- .socialimpact-card-wrapper -->

<!-- Leadership Team Slider (Original) -->
<section class="about-employee">
<section class="contact-people">
<div aria-labelledby="people-title" class="container" tabindex="0">
<div class="people-flex">
<h2 class="h2-notosans" id="people-title">GẶP GỠ BAN LÃNH ĐẠO CỦA CHÚNG TÔI</h2>
<div class="people-wrapper">
<div aria-roledescription="carousel" class="swiper swiper-contact-people-slider loop">
<div class="swiper-wrapper" role="list">
<div aria-describedby=" people-name people-position" aria-labelledby="people-name" class="swiper-slide" role="listitem" tabindex="0">
<img alt="" aria-hidden="true" class="img-people" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/about-us/maciej_goralski.webp" ); ?>" title="Nhà sáng lập và Giám đốc điều hành"/>
<p class="h2" id="people-name">Maciej Góralski</p>
<p id="people-position">Nhà sáng lập và Giám đốc điều hành</p>
</div>
<div aria-describedby=" people-name people-position" aria-labelledby="people-name" class="swiper-slide" role="listitem" tabindex="0">
<img alt="" aria-hidden="true" class="img-people" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/about-us/tomasz_stomski.webp" ); ?>" title="Giám đốc Sản phẩm &amp; Công nghệ"/>
<p class="h2" id="people-name">Tomasz Stomski</p>
<p id="people-position">Giám đốc Sản phẩm và Công nghệ</p>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</section>

</div><!-- .socialimpact-pages -->
</div><!-- .js-content-wrapper -->
</div>
</section>
<hr/>

<?php
get_footer();
