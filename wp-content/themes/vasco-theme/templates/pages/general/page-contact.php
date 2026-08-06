<?php
/**
 * Template Name: Contact Page page-contact.php
 *
 * @package VascoTheme
 */

get_header();
?>

<style>
/* Responsive Styles for Contact Page */
.contact-page-wrapper {
  background: #fafafa;
  width: 100%;
}
.contact-hero-title {
  font-size: 2.4rem;
  color: #0f172a;
  font-weight: 800;
  margin-bottom: 12px;
  letter-spacing: -0.5px;
}
.contact-hero-subtitle {
  color: #475569;
  font-size: 1.05rem;
  max-width: 680px;
  margin: 0 auto;
  line-height: 1.6;
}
.contact-cards-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 24px;
}
.contact-card-box {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  padding: 32px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  box-shadow: 0 4px 20px rgba(0,0,0,0.03);
}
.contact-form-box {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  padding: 44px;
  max-width: 840px;
  margin: 0 auto;
  box-shadow: 0 4px 20px rgba(0,0,0,0.02);
}
.provinces-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
  gap: 16px;
}

@media (max-width: 768px) {
  .contact-hero-title {
    font-size: 1.65rem;
  }
  .contact-hero-subtitle {
    font-size: 0.95rem;
    padding: 0 12px;
  }
  .contact-cards-grid {
    grid-template-columns: 1fr;
    gap: 16px;
  }
  .contact-card-box {
    padding: 22px;
  }
  .contact-form-box {
    padding: 24px 16px;
    border-radius: 14px;
  }
  .provinces-grid {
    grid-template-columns: repeat(auto-fill, minmax(145px, 1fr));
    gap: 10px;
  }
  .province-card-item {
    padding: 12px !important;
  }
  .province-card-item h4 {
    font-size: 0.88rem !important;
  }
  .province-card-item p {
    font-size: 0.8rem !important;
  }
}
</style>

<section id="wrapper" class="relative contact-page-wrapper">
<aside id="notifications">
<div class="container">
</div>
</aside>

<div class="breadcrumb-container" style="background: transparent; padding-top: 16px;">
<div class="container">
<nav aria-label="Đường dẫn điều hướng" class="breadcrumb">
<ol>
<li class="body-16">
<a href="<?php echo esc_url( home_url( "/" ) ); ?>"><span class="breadcrumb-link">Trang chủ</span></a><span class="breadcrumb-divider">&gt;</span>
</li>
<li><span aria-current="page" class="breadcrumb-current body-16">Liên hệ</span></li>
</ol>
</nav>
</div>
</div>

<div class="js-content-wrapper" id="content-wrapper">
<section class="contact" style="padding-bottom: 60px;">

<!-- Header Section -->
<div style="text-align: center; padding: 36px 0 24px;">
<div class="container">
<span style="color: #2563eb; font-weight: 700; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 1px; display: block; margin-bottom: 6px;">VASCO TRANSLATOR VIỆT NAM</span>
<h1 class="contact-hero-title">THÔNG TIN LIÊN HỆ & SHOWROOM</h1>
<p class="contact-hero-subtitle">CÔNG TY TNHH VASCO TRANSLATOR VIỆT NAM - Hệ thống văn phòng đại diện & tổng đài hỗ trợ tư vấn khách hàng 24/7 trên toàn quốc.</p>
</div>
</div>

<!-- 3 Main Corporate Office Cards -->
<section class="container" style="margin-bottom: 48px;">
<div class="contact-cards-grid">

<!-- Card 1: Hà Nội -->
<div class="contact-card-box">
<div>
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
<span style="background: #f1f5f9; color: #475569; font-size: 0.75rem; font-weight: 700; padding: 4px 10px; border-radius: 6px; text-transform: uppercase; letter-spacing: 0.5px;">MIỀN BẮC</span>
<span style="font-size: 0.85rem; color: #94a3b8; font-weight: 500;">Chi Nhánh Hà Nội</span>
</div>
<h3 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 12px; letter-spacing: -0.3px;">VĂN PHÒNG HÀ NỘI</h3>
<p style="color: #334155; font-size: 0.95rem; line-height: 1.6; margin-bottom: 20px;">
226 Đường Láng, Phường Thịnh Quang, Quận Đống Đa, Hà Nội
</p>
</div>
<div>
<div style="border-top: 1px solid #f1f5f9; padding-top: 14px; margin-bottom: 16px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px;">
<span style="font-size: 0.85rem; color: #64748b;">Điện thoại:</span>
<a href="tel:02473048700" style="font-size: 1.1rem; font-weight: 800; color: #0f172a; text-decoration: none;">024.7304.8700</a>
</div>
<a href="https://maps.app.goo.gl/YJDuKpGBk7UACFQs6" target="_blank" rel="noopener" style="display: block; text-align: center; width: 100%; padding: 12px; background: #0f172a; color: #ffffff; border-radius: 8px; font-weight: 600; font-size: 0.9rem; text-decoration: none; min-height: 44px; line-height: 20px;">
Xem chỉ đường Google Maps
</a>
</div>
</div>

<!-- Card 2: TP.HCM -->
<div class="contact-card-box">
<div>
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
<span style="background: #f1f5f9; color: #475569; font-size: 0.75rem; font-weight: 700; padding: 4px 10px; border-radius: 6px; text-transform: uppercase; letter-spacing: 0.5px;">MIỀN NAM</span>
<span style="font-size: 0.85rem; color: #94a3b8; font-weight: 500;">Chi Nhánh TP.HCM</span>
</div>
<h3 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 12px; letter-spacing: -0.3px;">VĂN PHÒNG HỒ CHÍ MINH</h3>
<p style="color: #334155; font-size: 0.95rem; line-height: 1.6; margin-bottom: 20px;">
137 Hòa Hưng, Phường Hòa Hưng, TP. Hồ Chí Minh
</p>
</div>
<div>
<div style="border-top: 1px solid #f1f5f9; padding-top: 14px; margin-bottom: 16px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px;">
<span style="font-size: 0.85rem; color: #64748b;">Điện thoại:</span>
<a href="tel:02873048700" style="font-size: 1.1rem; font-weight: 800; color: #0f172a; text-decoration: none;">028.7304.8700</a>
</div>
<a href="https://maps.app.goo.gl/NRQjmSVkjmHR62VYA" target="_blank" rel="noopener" style="display: block; text-align: center; width: 100%; padding: 12px; background: #0f172a; color: #ffffff; border-radius: 8px; font-weight: 600; font-size: 0.9rem; text-decoration: none; min-height: 44px; line-height: 20px;">
Xem chỉ đường Google Maps
</a>
</div>
</div>

<!-- Card 3: Hotline Tổng Đài (Chính) -->
<div class="contact-card-box" style="background: #2563eb; border: none; color: #ffffff; box-shadow: 0 10px 25px rgba(37, 99, 235, 0.25);">
<div>
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
<span style="background: rgba(255, 255, 255, 0.2); color: #ffffff; font-size: 0.75rem; font-weight: 700; padding: 4px 10px; border-radius: 6px; text-transform: uppercase; letter-spacing: 0.5px;">TƯ VẤN 24/7</span>
<span style="font-size: 0.85rem; color: #bfdbfe; font-weight: 500;">Toàn Quốc</span>
</div>
<h3 style="font-size: 1.25rem; font-weight: 800; color: #ffffff; margin-bottom: 12px; letter-spacing: -0.3px;">HOTLINE TỔNG ĐÀI</h3>
<p style="color: #dbeafe; font-size: 0.95rem; line-height: 1.6; margin-bottom: 20px;">
Hỗ trợ và tư vấn giải pháp máy phiên dịch khách hàng mọi lúc, mọi nơi trên toàn quốc.
</p>
</div>
<div>
<a href="tel:1900638400" style="display: flex; align-items: center; justify-content: center; width: 100%; padding: 14px; background: #ffffff; color: #2563eb; border-radius: 8px; font-weight: 800; font-size: 1.25rem; text-decoration: none; box-shadow: 0 4px 12px rgba(0,0,0,0.1); min-height: 48px;">
1900.63.8400
</a>
</div>
</div>

</div>

<!-- Minimal Tagline Bar -->
<div style="margin-top: 28px; text-align: center; color: #64748b; font-weight: 600; font-size: 0.85rem; letter-spacing: 0.5px; display: flex; justify-content: center; align-items: center; flex-wrap: wrap; gap: 12px;">
<span>Sản phẩm chính hãng</span>
<span style="color: #cbd5e1;">•</span>
<span>Bảo hành uy tín</span>
<span style="color: #cbd5e1;">•</span>
<span>Hỗ trợ tận tâm</span>
</div>
</section>

<!-- Form Đăng Ký Tư Vấn Chuyên Nghiệp -->
<section class="container" style="margin-bottom: 48px;">
<div class="contact-form-box">
<h2 style="font-size: 1.45rem; font-weight: 800; color: #0f172a; text-align: center; margin-bottom: 6px;">Gửi Yêu Cầu Tư Vấn & Báo Giá</h2>
<p style="text-align: center; color: #64748b; margin-bottom: 28px; font-size: 0.9rem;">Quý khách vui lòng để lại thông tin, đội ngũ chuyên viên Vasco sẽ liên hệ hỗ trợ trong vòng 15 phút.</p>

<form action="" method="post" style="display: grid; gap: 16px;">
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px;">
<div>
<label style="display: block; font-weight: 600; margin-bottom: 6px; color: #1e293b; font-size: 0.85rem;">Họ và tên <span style="color: #ef4444;">*</span></label>
<input placeholder="Nhập họ và tên" required="" type="text" style="width: 100%; padding: 12px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.9rem; background: #fafafa;"/>
</div>
<div>
<label style="display: block; font-weight: 600; margin-bottom: 6px; color: #1e293b; font-size: 0.85rem;">Số điện thoại <span style="color: #ef4444;">*</span></label>
<input placeholder="Nhập số điện thoại" required="" type="tel" style="width: 100%; padding: 12px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.9rem; background: #fafafa;"/>
</div>
</div>
<div>
<label style="display: block; font-weight: 600; margin-bottom: 6px; color: #1e293b; font-size: 0.85rem;">Email liên hệ</label>
<input placeholder="Nhập email của bạn" type="email" style="width: 100%; padding: 12px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.9rem; background: #fafafa;"/>
</div>
<div>
<label style="display: block; font-weight: 600; margin-bottom: 6px; color: #1e293b; font-size: 0.85rem;">Nội dung tư vấn</label>
<textarea placeholder="Nhập nhu cầu tư vấn hoặc nội dung câu hỏi..." rows="3" style="width: 100%; padding: 12px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.9rem; background: #fafafa;"></textarea>
</div>
<button type="submit" style="background: #0f172a; color: #ffffff; padding: 14px; border-radius: 8px; font-weight: 700; border: none; cursor: pointer; font-size: 0.95rem; margin-top: 4px; min-height: 48px;">
Gửi thông tin liên hệ
</button>
</form>
</div>
</section>

<!-- System of Representative Offices across 63 Provinces Grid -->
<section class="container">
<div style="background: #ffffff; border-radius: 20px; border: 1px solid #e2e8f0; padding: 32px 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.02);">
<div style="text-align: center; margin-bottom: 28px;">
<h2 style="font-size: 1.35rem; font-weight: 800; color: #0f172a; text-transform: uppercase; margin-bottom: 6px;">VĂN PHÒNG ĐẠI DIỆN 63 TỈNH THÀNH</h2>
<p style="color: #64748b; font-size: 0.9rem;">Hệ thống điểm tư vấn và hỗ trợ kỹ thuật Vasco Translator trên toàn quốc</p>
</div>

<div class="provinces-grid">
<?php
$provinces = array(
	array( 'name' => 'An Giang', 'address' => 'Phường Châu Phú A, TP.Châu Đốc' ),
	array( 'name' => 'Bà Rịa - Vũng Tàu', 'address' => 'Phường Phước Trung, TP.Bà Rịa' ),
	array( 'name' => 'Bắc Giang', 'address' => 'Phường Ngô Quyền, TP.Bắc Giang' ),
	array( 'name' => 'Bắc Kạn', 'address' => 'Phường Sông Cầu, TP.Bắc Kạn' ),
	array( 'name' => 'Bạc Liêu', 'address' => 'Phường 5, TP.Bạc Liêu' ),
	array( 'name' => 'Bắc Ninh', 'address' => 'Phường Đại Phúc, TP.Bắc Ninh' ),
	array( 'name' => 'Bến Tre', 'address' => 'Phường 8, TP.Bến Tre' ),
	array( 'name' => 'Bình Định', 'address' => 'Phường Quang Trung, TP.Quy Nhơn' ),
	array( 'name' => 'Bình Dương', 'address' => 'Phường Phú Lợi, TP.Thủ Dầu Một' ),
	array( 'name' => 'Bình Phước', 'address' => 'Phường Tân Phú, TP.Đồng Xoài' ),
	array( 'name' => 'Bình Thuận', 'address' => 'Phường Phú Thủy, TP.Phan Thiết' ),
	array( 'name' => 'Cà Mau', 'address' => 'Phường 5, TP.Cà Mau' ),
	array( 'name' => 'Cần Thơ', 'address' => 'Phường Tân An, Q.Ninh Kiều' ),
	array( 'name' => 'Cao Bằng', 'address' => 'Phường Sông Hiến, TP.Cao Bằng' ),
	array( 'name' => 'Đà Nẵng', 'address' => 'Phường Hải Châu I, Q.Hải Châu' ),
	array( 'name' => 'Đắk Lắk', 'address' => 'Phường Tân An, TP.Buôn Ma Thuột' ),
	array( 'name' => 'Đắk Nông', 'address' => 'Phường Nghĩa Tân, TP.Gia Nghĩa' ),
	array( 'name' => 'Điện Biên', 'address' => 'Phường Mường Thanh, TP.Điện Biên Phủ' ),
	array( 'name' => 'Đồng Nai', 'address' => 'Phường Thống Nhất, TP.Biên Hòa' ),
	array( 'name' => 'Đồng Tháp', 'address' => 'Phường 1, TP.Cao Lãnh' ),
	array( 'name' => 'Gia Lai', 'address' => 'Phường Tây Sơn, TP.Pleiku' ),
	array( 'name' => 'Hà Giang', 'address' => 'Phường Trần Phú, TP.Hà Giang' ),
	array( 'name' => 'Hà Nam', 'address' => 'Phường Minh Khai, TP.Phủ Lý' ),
	array( 'name' => 'Hà Tĩnh', 'address' => 'Phường Bắc Hà, TP.Hà Tĩnh' ),
	array( 'name' => 'Hải Dương', 'address' => 'Phường Trần Hưng Đạo, TP.Hải Dương' ),
	array( 'name' => 'Hải Phòng', 'address' => 'Phường Hoàng Văn Thụ, Q.Hồng Bàng' ),
	array( 'name' => 'Hậu Giang', 'address' => 'Phường 1, TP.Vị Thanh' ),
	array( 'name' => 'Hòa Bình', 'address' => 'Phường Phương Lâm, TP.Hòa Bình' ),
	array( 'name' => 'Hưng Yên', 'address' => 'Phường Hiến Nam, TP.Hưng Yên' ),
	array( 'name' => 'Khánh Hòa', 'address' => 'Phường Lộc Thọ, TP.Nha Trang' ),
	array( 'name' => 'Kiên Giang', 'address' => 'Phường Vĩnh Thanh, TP.Rạch Giá' ),
	array( 'name' => 'Kon Tum', 'address' => 'Phường Quyết Thắng, TP.Kon Tum' ),
	array( 'name' => 'Lâm Đồng', 'address' => 'Phường 1, TP.Đà Lạt' ),
	array( 'name' => 'Long An', 'address' => 'Phường 2, TP.Tân An' ),
	array( 'name' => 'Nam Định', 'address' => 'Phường Trần Hưng Đạo, TP.Nam Định' ),
	array( 'name' => 'Nghệ An', 'address' => 'Phường Hưng Bình, TP.Vinh' ),
	array( 'name' => 'Ninh Bình', 'address' => 'Phường Vân Giang, TP.Ninh Bình' ),
	array( 'name' => 'Quảng Nam', 'address' => 'Phường An Xuân, TP.Tam Kỳ' ),
	array( 'name' => 'Quảng Ngãi', 'address' => 'Phường Trần Hưng Đạo, TP.Quảng Ngãi' ),
	array( 'name' => 'Quảng Ninh', 'address' => 'Phường Hồng Gai, TP.Hạ Long' ),
	array( 'name' => 'Thanh Hóa', 'address' => 'Phường Điện Biên, TP.Thanh Hóa' ),
	array( 'name' => 'Thừa Thiên Huế', 'address' => 'Phường Vĩnh Ninh, TP.Huế' ),
	array( 'name' => 'Tiền Giang', 'address' => 'Phường 1, TP.Mỹ Tho' ),
	array( 'name' => 'Vĩnh Long', 'address' => 'Phường 1, TP.Vĩnh Long' ),
);

foreach ( $provinces as $p ) :
?>
<div class="province-card-item" style="background: #fafafa; border: 1px solid #f1f5f9; padding: 14px; border-radius: 10px;">
<h4 style="font-size: 0.9rem; font-weight: 700; color: #0f172a; margin-bottom: 4px;"><?php echo esc_html( $p['name'] ); ?></h4>
<p style="font-size: 0.82rem; color: #64748b; margin-bottom: 6px; line-height: 1.35;"><?php echo esc_html( $p['address'] ); ?></p>
<a href="tel:1900638400" style="font-size: 0.82rem; font-weight: 700; color: #2563eb; text-decoration: none;">Hotline: 1900.63.8400</a>
</div>
<?php endforeach; ?>
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
