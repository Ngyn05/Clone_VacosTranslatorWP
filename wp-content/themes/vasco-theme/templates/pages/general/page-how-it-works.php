<?php
/**
 * Template Name: Clean Page page-how-it-works.php
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
<li><span aria-current="page" class="breadcrumb-current body-16">Cách Hoạt Động</span></li>
</ol>
</nav>
</div>
</div>

<div class="js-content-wrapper" id="content-wrapper">
<div class="socialimpact-pages">

<!-- Top Banner -->
<div class="socialimpact-top">
<div class="container">
<h1 class="h1">Cách Hoạt Động Của Vasco</h1>
<p class="socialimpact-subtitle">Khám phá cách máy phiên dịch Vasco giúp bạn giao tiếp ngoại ngữ tự nhiên và tự tin mọi lúc mọi nơi thông qua các bước thao tác trực quan đơn giản.</p>
</div>
</div>

<!-- Main Card Wrapper -->
<section class="socialimpact-card-wrapper">
<div class="socialimpact-inner-card">

<!-- Tutorial 1: Dịch Giọng Nói -->
<div class="si-item si-item--left">
<div class="si-text">
<h2 class="h2">Hỏi Đường Bằng Dịch Giọng Nói</h2>
<h3 class="box-subtitle">Trò chuyện 2 chiều tự nhiên với thao tác 1 chạm</h3>
<p>Dịch giọng nói tức thì cho phép bạn giao tiếp trực tiếp với người nước ngoài mà không cần qua trường lớp đào tạo ngôn ngữ.</p>
<ul>
<li>Chọn ứng dụng dịch giọng nói trên màn hình</li>
<li>Nhấn và giữ biểu tượng micro để bắt đầu phát biểu</li>
<li>Thả nút ra, thiết bị tự động dịch và phát âm lại cho người đối diện</li>
<li>Nhấn nút micro khi người đối diện muốn trả lời để lắng nghe bản dịch</li>
</ul>
<a class="btn btn-md btn-black" href="<?php echo esc_url( home_url( "/features-translate-voice/" ) ); ?>">Khám phá dịch giọng nói <span class="text-sr-only">Vasco</span></a>
</div>
<div class="si-image">
<img alt="Hỏi đường bằng dịch giọng nói" src="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/q1/voice.webp' ); ?>"/>
</div>
</div>

<hr class="si-divider"/>

<!-- Tutorial 2: Dịch Hình Ảnh -->
<div class="si-item si-item--right">
<div class="si-image">
<img alt="Cách đọc văn bản dịch hình ảnh" src="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/q1/photo.webp' ); ?>"/>
</div>
<div class="si-text">
<h2 class="h2">Cách Đọc Văn Bản & Bảng Hiệu</h2>
<h3 class="box-subtitle">Chụp ảnh để hiểu ngay menu, biển chỉ đường & tờ rơi</h3>
<p>Tính năng Photo Translator cho phép bạn đọc hiểu mọi văn bản tiếng nước ngoài chỉ bằng một thao tác chụp ảnh sắc nét.</p>
<ul>
<li>Mở ứng dụng dịch hình ảnh và đưa máy về phía văn bản</li>
<li>Chụp một bức ảnh sắc nét về thông tin bạn muốn đọc</li>
<li>Vasco tự động nhận diện ngôn ngữ và đè bản dịch lên ảnh trong 0.5s</li>
</ul>
<a class="btn btn-md btn-black" href="<?php echo esc_url( home_url( "/features-translate-photos/" ) ); ?>">Xem tính năng dịch ảnh <span class="text-sr-only">Vasco</span></a>
</div>
</div>

<hr class="si-divider"/>

<!-- Tutorial 3: Dịch Văn Bản -->
<div class="si-item si-item--left">
<div class="si-text">
<h2 class="h2">Tra Cứu Nghĩa Của Từ & Cụm Từ</h2>
<h3 class="box-subtitle">Nhập bàn phím kỹ thuật số tra cứu nhanh từ vựng lạ</h3>
<p>Công cụ dịch văn bản là giải pháp hoàn hảo để tra cứu nhanh nghĩa của các từ vựng hoặc đoạn hội thoại ngắn chuẩn ngữ cảnh.</p>
<ul>
<li>Chọn ứng dụng dịch văn bản trực tiếp trên màn hình</li>
<li>Gõ bàn phím số từ hoặc cụm từ ngắn bạn muốn dịch</li>
<li>Nhận ngay bản dịch bằng ngôn ngữ mẹ đẻ của bạn</li>
</ul>
<a class="btn btn-md btn-black" href="<?php echo esc_url( home_url( "/features-translate-text/" ) ); ?>">Khám phá dịch văn bản <span class="text-sr-only">Vasco</span></a>
</div>
<div class="si-image">
<img alt="Tra cứu nghĩa dịch văn bản" src="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/q1/text.webp' ); ?>"/>
</div>
</div>

<hr class="si-divider"/>

<!-- Tutorial 4: MultiTalk -->
<div class="si-item si-item--right">
<div class="si-image">
<img alt="Trò chuyện nhóm MultiTalk" src="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/q1/group.webp' ); ?>"/>
</div>
<div class="si-text">
<h2 class="h2">Trò Chuyện Nhóm MultiTalk</h2>
<h3 class="box-subtitle">Kết nối hội thảo & đoàn du lịch đa ngôn ngữ đến 100 người</h3>
<p>Dễ dàng liên lạc với đồng nghiệp hoặc đối tác quốc tế thông qua phòng trò chuyện nhóm đa ngôn ngữ Vasco MultiTalk.</p>
<ul>
<li>Tạo hoặc tham gia phòng trò chuyện nhóm bằng mã QR</li>
<li>Nói hoặc nhập tin nhắn bằng tiếng mẹ đẻ của bạn</li>
<li>Mọi thành viên đều xem & nghe tin nhắn bằng ngôn ngữ của họ</li>
</ul>
<a class="btn btn-md btn-black" href="<?php echo esc_url( home_url( "/features-translate-chat/" ) ); ?>">Xem thêm MultiTalk <span class="text-sr-only">Vasco</span></a>
</div>
</div>

</div><!-- .socialimpact-inner-card -->
</section><!-- .socialimpact-card-wrapper -->

<!-- Single Featured Product -->
<section aria-labelledby="vasco-products-heading" class="vasco-products">
<div class="container">
<h2 class="h2-notosans" id="vasco-products-heading">Sản phẩm tích hợp tính năng này</h2>
<div class="single-product-featured">
<div class="box">
<img alt="Vasco Translator Q1" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/homepage-carousel/q1.webp" ); ?>"/>
<div class="product-description">
<h3>Vasco Translator Q1</h3>
<p>Máy dịch cao cấp sở hữu trọn bộ tính năng dịch giọng nói, dịch ảnh, dịch văn bản và dịch cuộc gọi 2 chiều.</p>
<a class="btn btn-md btn-white" href="<?php echo esc_url( home_url( "/product/vasco-translator-q1/" ) ); ?>">
Tìm hiểu thêm
</a>
</div>
</div>
</div>
</div>
</section>

</div><!-- .socialimpact-pages -->
</div><!-- .js-content-wrapper -->
</div>
</section>
<hr/>

<?php
get_footer();
