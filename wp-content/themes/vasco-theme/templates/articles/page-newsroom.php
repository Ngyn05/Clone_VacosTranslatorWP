<?php
/**
 * Template Name: Clean Page page-newsroom.php
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
<a href="<?php echo esc_url( home_url( "/" ) ); ?>">
<span class="breadcrumb-link">Trang chủ</span>
</a><span class="breadcrumb-divider">&gt;</span>
</li>
<li><span aria-current="page" class="breadcrumb-current body-16">Phòng tin tức</span>
</li>
</ol>
</nav>
</div>
</div>
<div class="js-content-wrapper" id="content-wrapper">
<div class="Tin tức-title-wrapper">
<div class="container">
<h1 class="h1">Phòng tin tức</h1>
</div>
</div>
<section class="hero-section" style="min-height: 560px;">
<section class="doubleboxes">
<div class="doublebox left" id="box-color-random" style="background-color: #E0E2F2; color: #E0E2F2;">
<div class="container">
<div class="doublebox-content">
<h2 class="h1">Đọc về các sản phẩm, đổi mới của Vasco và mọi điều quan trọng với chúng tôi</h2>
<div>
<a aria-controls="Tin-tuc-anchor" class="btn btn-2xl btn-primary" href="#Tin-tuc-anchor" id="Tin-tuc-anchor-btn">Liên hệ với chúng tôi</a>
</div>
<svg class="svg-pseudo" color="" fill="none" height="48" viewbox="0 0 24 48" width="24" xmlns="http://www.w3.org/2000/svg">
<path d="M2.93362 6.29957L21.0462 17.5978C21.9252 18.1457 22.6722 19.0407 23.1966 20.1741C23.7209 21.3076 24 22.6307 24 23.9829C24 25.3351 23.7209 26.6583 23.1966 27.7917C22.6722 28.9252 21.9252 29.8201 21.0462 30.3681L2.95791 41.6149C2.07625 42.1584 1.32668 43.0522 0.801213 44.1865C0.280873 45.3097 0.00273451 46.6204 2.00603e-05 47.9604L2.00603e-05 48C-6.69205e-06 47.9868 -6.68146e-06 47.9736 2.00603e-05 47.9604L2.00603e-05 3.8147e-06C0.0114239 1.33398 0.293609 2.63561 0.813323 3.75166C1.33304 4.8677 2.06869 5.75168 2.93362 6.29957Z" fill="currentColor"></path>
</svg>
</div>
</div>
<div class="doublebox-absolute" id="img-change">
<img alt="Phòng tin tức Vasco" class="hero-image" src="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/landings/newsroom/newsroom-main.webp' ); ?>" style="width:100%;height:100%;object-fit:cover;"/>
</div>
</div>
</section>
</section>
<section class="how-vasco-section" style="max-width:1200px;margin:0 auto;padding:60px 20px;">
<div class="how-vasco-flex container" style="max-width:1200px;margin:0 auto;">
<h2 class="h2-notosans" style="text-align:center;margin-bottom:40px;">Tài liệu quan hệ công chúng từ Vasco</h2>
<div class="grid-section" style="display:grid;grid-template-columns:repeat(3,1fr);gap:30px;">
<div class="card" style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.08);display:flex;flex-direction:column;">
<picture style="width:100%;height:200px;overflow:hidden;display:block;">
<source media="(min-width: 700px)" srcset="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/landings/newsroom/newsroom-news.webp' ); ?>"/>
<img alt="Tin tức Vasco" src="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/landings/newsroom/newsroom-news.webp' ); ?>" style="width:100%;height:200px;object-fit:cover;"/>
</picture>
<div style="padding:24px;flex:1;display:flex;flex-direction:column;">
<h3 class="h2" style="margin-bottom:12px;">Tin tức</h3>
<p style="flex:1;">Tại đây bạn sẽ tìm thấy các tin tức và sự kiện hiện tại trong hoạt động của công ty</p>
<a class="btn btn-md btn-black" href="<?php echo esc_url( home_url( "/" ) ); ?>" style="margin-top:16px;align-self:flex-start;">Đọc thêm</a>
</div>
</div>
<div class="card card-bottom" style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.08);display:flex;flex-direction:column;">
<picture style="width:100%;height:200px;overflow:hidden;display:block;">
<source media="(min-width: 700px)" srcset="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/landings/newsroom/newsroom-press.webp' ); ?>"/>
<img alt="Thông cáo báo chí Vasco" src="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/landings/newsroom/newsroom-press.webp' ); ?>" style="width:100%;height:200px;object-fit:cover;"/>
</picture>
<div style="padding:24px;flex:1;display:flex;flex-direction:column;">
<h3 class="h2" style="margin-bottom:12px;">Thông cáo báo chí</h3>
<p style="flex:1;">Tại đây bạn sẽ tìm thấy các tài liệu chúng tôi gửi cho truyền thông: thông cáo báo chí và báo cáo</p>
<a class="btn btn-md btn-black" href="<?php echo esc_url( home_url( "/" ) ); ?>" style="margin-top:16px;align-self:flex-start;">Đọc thêm</a>
</div>
</div>
<div class="card" style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.08);display:flex;flex-direction:column;">
<picture style="width:100%;height:200px;overflow:hidden;display:block;">
<source media="(min-width: 700px)" srcset="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/landings/newsroom/newsroom-mediakit.webp' ); ?>"/>
<img alt="Bộ tài liệu truyền thông Vasco" src="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/landings/newsroom/newsroom-mediakit.webp' ); ?>" style="width:100%;height:200px;object-fit:cover;"/>
</picture>
<div style="padding:24px;flex:1;display:flex;flex-direction:column;">
<h3 class="h2" style="margin-bottom:12px;">Bộ tài liệu truyền thông</h3>
<p style="flex:1;">Tại đây bạn có thể tải xuống:</p>
<ul style="margin:8px 0;">
<li><a download="Logo pack" href="./downloads/Newsroom-logos.zip" target="_blank">Bộ logo</a></li>
<li><a download="Press kit" href="#" target="_blank">Bộ tài liệu báo chí</a></li>
<li><a download="Photos" href="./downloads/Newsroom-photos.zip" target="_blank">Hình ảnh</a></li>
</ul>
</div>
</div>
</div>
</div>
</section>
<section class="media-awards flex">
<div class="container">
<div class="flex flex-col media">
<h2 class="h2-notosans text-center">Truyền thông nói về chúng tôi</h2>
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
<div class="swiper-button-prev btn-carousel-prev" data-label-prev="Slide trước"></div>
<div class="swiper-button-next btn-carousel-next" data-label-next="Slide tiếp theo"></div>
</div>
<div class="stop-autoplay-carousel">
<button class="btn btn-md btn-stop-autoplay" data-text-button-pause="dừng tự phát băng chuyền" data-text-button-resume="tiếp tục tự phát băng chuyền">
<span data-text-pause="Tạm dừng" data-text-resume="Tiếp tục">Tạm dừng</span>
<img alt="" aria-hidden="true" height="24" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/pause.svg" ); ?>" width="24"/>
</button>
</div>
<div id="after-media-carousel"></div>
</div>
</div>
<div class="container Tin tức-media-btn">
<a class="btn btn-md btn-black" href="<?php echo esc_url( home_url( "/media-about-us/" ) ); ?>">đọc thêm</a>
</div>
<hr/>
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
<div class="swiper-button-prev btn-carousel-prev" data-label-prev="Slide trước"></div>
<div class="swiper-button-next btn-carousel-next" data-label-next="Slide tiếp theo"></div>
</div>
<div class="stop-autoplay-carousel">
<button class="btn btn-md btn-stop-autoplay" data-text-button-pause="dừng tự phát băng chuyền" data-text-button-resume="tiếp tục tự phát băng chuyền">
<span data-text-pause="Tạm dừng" data-text-resume="Tiếp tục">Tạm dừng</span>
<img alt="" aria-hidden="true" height="24" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/pause.svg" ); ?>" width="24"/>
</button>
</div>
<div id="after-award-carousel"></div>
</div>
</div>
</section>
<section aria-labelledby="newsroom-contact-heading" class="Tin-tuc-contact" id="Tin-tuc-anchor" tabindex="-1" style="background:#f5f6fa;padding:60px 20px;">
<div class="container" style="max-width:1200px;margin:0 auto;text-align:center;">
<h2 class="h2-notosans" id="newsroom-contact-heading" style="text-align:center;margin-bottom:40px;">Bạn cần thêm thông tin? Hãy liên hệ với chúng tôi</h2>
<div class="contact-box-wrapper" style="display:flex;justify-content:center;gap:40px;flex-wrap:wrap;">
<div class="contact-box-single" style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 4px 20px rgba(0,0,0,0.08);text-align:center;min-width:260px;">
<img alt="Michał Sikora - PR & Truyền thông" aria-hidden="false" src="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/menu/megamenu_about_us_img1.webp' ); ?>" style="width:80px;height:80px;border-radius:50%;object-fit:cover;margin-bottom:16px;"/>
<h3 class="h2" style="margin-bottom:8px;">Michał Sikora</h3>
<p style="color:#666;margin-bottom:12px;">PR &amp; Truyền thông</p>
<a href="mailto:m.sikora@vasco-electronics.com" style="color:#3E5AEE;font-weight:600;">m.sikora@vasco-electronics.com</a>
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
