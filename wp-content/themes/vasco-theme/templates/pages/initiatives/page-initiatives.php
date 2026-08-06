<?php
/**
 * Template Name: Clean Page page-initiatives.php
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
<li><span aria-current="page" class="breadcrumb-current body-16">Tác động xã hội của chúng tôi</span></li>
</ol>
</nav>
</div>
</div>
<div class="js-content-wrapper" id="content-wrapper">
<div class="socialimpact-pages">

<!-- Tiêu đề trang -->
<div class="socialimpact-top">
<div class="container">
<h1 class="h1">Tác động xã hội của chúng tôi</h1>
<p class="socialimpact-subtitle">Chúng tôi tin rằng công nghệ không chỉ kết nối ngôn ngữ — mà còn kết nối con người. Dưới đây là những sáng kiến chúng tôi thực hiện để tạo ra tác động thực sự.</p>
</div>
</div>

<!-- Khung xám chứa tất cả 3 sáng kiến -->
<section class="socialimpact-card-wrapper">
<div class="socialimpact-inner-card">

<?php
$pmm_page       = get_page_by_path( 'initiatives/initiatives-polish-medical-mission-pmm' ) ?: ( get_page_by_path( 'initiatives-polish-medical-mission-pmm' ) ?: get_page_by_path( 'polish-medical-mission-pmm' ) );
$pmm_url        = $pmm_page ? get_permalink( $pmm_page ) : home_url( '/initiatives-polish-medical-mission-pmm/' );

$quinnipiac_page = get_page_by_path( 'initiatives/initiatives-quinnipiac' ) ?: ( get_page_by_path( 'initiatives-quinnipiac' ) ?: get_page_by_path( 'quinnipiac' ) );
$quinnipiac_url  = $quinnipiac_page ? get_permalink( $quinnipiac_page ) : home_url( '/initiatives-quinnipiac/' );

$ukraine_page   = get_page_by_path( 'initiatives/initiatives-help-ukraine' ) ?: ( get_page_by_path( 'initiatives-help-ukraine' ) ?: get_page_by_path( 'help-ukraine' ) );
$ukraine_url    = $ukraine_page ? get_permalink( $ukraine_page ) : home_url( '/initiatives-help-ukraine/' );
?>

<!-- Sáng kiến 1: PMM -->
<div class="si-item si-item--left">
<div class="si-text">
<h2 class="h2">Đội Ứng phó Khẩn cấp PMM Vasco</h2>
<h3 class="box-subtitle">Đội phản ứng nhanh mang lại sự trợ giúp trong vòng 24 đến 48 giờ sau khi xảy ra thảm họa hoặc khủng hoảng</h3>
<p>Vào tháng 3 năm 2022, Vasco và Polish Medical Mission đã hợp lực để mang lại sự trợ giúp ngay lập tức sau các thảm họa thiên nhiên và khủng hoảng nhân đạo trên toàn thế giới.</p>
<ul>
<li>Nhóm bao gồm các chuyên gia y tế được đào tạo</li>
<li>Hoạt động của nhóm được giám sát theo các chỉ thị của Tổ chức Y tế Thế giới</li>
<li>Đội đã giúp đỡ những người tị nạn chiến tranh từ Ukraine và đang lên kế hoạch cho nhiều sứ mệnh hơn trên toàn thế giới</li>
</ul>
<a class="btn btn-md btn-black" href="<?php echo esc_url( $pmm_url ); ?>">Tìm hiểu thêm <span class="text-sr-only">về Đội Cứu hộ Khẩn cấp PMM Vasco</span></a>
</div>
<div class="si-image">
<img alt="Đội Ứng phó Khẩn cấp PMM Vasco - hỗ trợ nhân đạo" src="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/social-impact/social-impact-new-1.webp' ); ?>"/>
</div>
</div>

<hr class="si-divider"/>

<!-- Sáng kiến 2: Quinnipiac (ảnh trái, text phải) -->
<div class="si-item si-item--right">
<div class="si-image">
<img alt="Quinnipiac University - sinh viên quốc tế sử dụng Vasco Translator" src="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/social-impact/social-impact-new-2.webp' ); ?>"/>
</div>
<div class="si-text">
<h2 class="h2">Quinnipiac University</h2>
<h3 class="box-subtitle">Hợp tác với sinh viên nước ngoài của Đại học Quinnipiac bằng cách cho mượn các thiết bị Vasco Translator M3</h3>
<p>Sinh viên quốc tế gặp phải nhiều khó khăn khi học tập tại Hoa Kỳ. Họ có thể cần học một ngôn ngữ mới, làm quen với một nền văn hóa, và kết bạn trong một môi trường khác với môi trường của họ.</p>
<ul>
<li>Máy dịch ảnh đã giúp sinh viên hiểu tài liệu học tập trong các buổi giảng</li>
<li>Máy dịch giọng nói được sử dụng để giao tiếp hiệu quả với giảng viên</li>
<li>Phản hồi của cả sinh viên và giảng viên đối với các máy dịch của chúng tôi đều rất tích cực</li>
</ul>
<a class="btn btn-md btn-black" href="<?php echo esc_url( $quinnipiac_url ); ?>">Tìm hiểu thêm <span class="text-sr-only">về sự hợp tác với Đại học Quinnipiac</span></a>
</div>
</div>

<hr class="si-divider"/>

<!-- Sáng kiến 3: Ukraine -->
<div class="si-item si-item--left">
<div class="si-text">
<h2 class="h2">Hỗ trợ cho Ukraine</h2>
<h3 class="box-subtitle">Xe cứu thương lưu động, thiết bị y tế và máy Vasco Translator cho Ukraine</h3>
<p>Các máy dịch điện tử của chúng tôi đã được gửi miễn phí đến một số bệnh viện và trung tâm tị nạn gần biên giới Ba Lan-Ukraine.</p>
<ul>
<li>10 đô la từ mỗi máy dịch được mua đã được dành cho Đội Cứu hộ Khẩn cấp PMM Vasco</li>
<li>Chúng tôi đã cho mượn gần 500 máy Vasco Translator cho các quỹ, tổ chức phi lợi nhuận và trường học để hỗ trợ giao tiếp hiệu quả với người tị nạn chiến tranh từ Ukraine</li>
<li>Đội Cứu hộ Khẩn cấp PMM Vasco đã gửi một xe cứu thương lưu động và thiết bị y tế đến bệnh viện tại Drohobycz, Ukraine</li>
</ul>
<a class="btn btn-md btn-black" href="<?php echo esc_url( $ukraine_url ); ?>">Tìm hiểu thêm <span class="text-sr-only">về cách Vasco đã giúp đỡ Ukraine</span></a>
</div>
<div class="si-image">
<img alt="Hỗ trợ Ukraine - xe cứu thương và thiết bị y tế" src="<?php echo esc_url( VASCO_THEME_URI . '/assets/img/social-impact/social-impact-new-3.webp' ); ?>"/>
</div>
</div>

</div><!-- .socialimpact-inner-card -->
</section><!-- .socialimpact-card-wrapper -->

</div><!-- .socialimpact-pages -->
</div><!-- .js-content-wrapper -->
</div>
</section>
<hr/>


<?php
get_footer();
