# Tech Stack Audit Report - Vasco Cloning Project

## 1. Summary

- **Source Path**: `c:\Users\hnguy\Desktop\Cloning_Vasco`
- **Target Theme Path**: `C:\Users\hnguy\Local Sites\vacos\app\public\wp-content\themes\vasco-theme`
- **Target Core Plugin Path**: `C:\Users\hnguy\Local Sites\vacos\app\public\wp-content\plugins\vasco-core`
- **Main Stack**: Pure Multi-page HTML5 / CSS3 / Vanilla JS + jQuery + PrestaShop Assets Export
- **Target Tech Stack**: Custom WordPress Classic PHP Theme + WooCommerce Integration

## 2. Technical Stack Details

| Thành phần | File nguồn | Công nghệ | Chức năng | Cách chuyển sang WordPress | Folder đích |
|---|---|---|---|---|---|
| Trang chủ | `index.html` | HTML5, CSS, JS | Trang chủ giới thiệu thiết bị phiên dịch | Chuyển thành `front-page.php` và `template-parts/homepage/` | `vasco-theme/` |
| Danh mục Máy phiên dịch | `translators/index.html` | HTML5, CSS | Danh sách tất cả máy phiên dịch | `page-translators.php` / `archive-product.php` | `vasco-theme/` |
| Trang Máy phiên dịch Chi tiết | `translators/vasco-translator-*.html` | HTML5, CSS, JS | Chi tiết máy phiên dịch Q1, V4, M4, E1 | `single-product.php` / `page-templates/` | `vasco-theme/` |
| Danh mục Phụ kiện | `accessories/index.html` | HTML5, CSS | Danh sách phụ kiện | `page-accessories.php` | `vasco-theme/` |
| Danh mục Combo | `bundles/index.html` | HTML5, CSS | Các gói combo | `page-bundles.php` | `vasco-theme/` |
| Trang Doanh nghiệp | `business/*.html`, `features/*.html` | HTML5, CSS | Giải pháp doanh nghiệp | `page-business.php`, `page-features.php` | `vasco-theme/` |
| Trang Tin tức / Blog | `newsroom.html`, `articles/*.html` | HTML5, CSS | Blog, tin tức, thông cáo | `home.php`, `single.php`, `category.php` | `vasco-theme/` |
| Trang Giới thiệu & Cách hoạt động | `about-us.html`, `how-it-works.html`, `meet-vasco.html` | HTML5, CSS | Thông tin thương hiệu & sản phẩm | `page-about-us.php`, `page-how-it-works.php` | `vasco-theme/` |
| Trang Liên hệ & Chính sách | `contact.html`, `privacy-policy.html`, `terms-and-conditions.html` | HTML5, CSS | Liên hệ, pháp lý | `page-contact.php`, `page-privacy-policy.php` | `vasco-theme/` |
| Stylesheets | `themes/vasco-theme/assets/css/`, `modules/` | CSS3 | Styling toàn bộ website | Di chuyển vào `assets/css/` và nạp qua `enqueue.php` | `vasco-theme/assets/css/` |
| Scripts & Carousel | `js/`, `themes/vasco-theme/assets/js/` | JavaScript, jQuery, Fancybox | Sliders, Modals, Dynamic UI | Di chuyển vào `assets/js/` và nạp qua `enqueue.php` | `vasco-theme/assets/js/` |
| Images & Icons | `assets/images/`, `themes/` | WebP, PNG, SVG, JPG | Hình ảnh sản phẩm, banner, logo | Di chuyển vào `assets/images/` | `vasco-theme/assets/images/` |
| Form Processing | HTML `<form>` elements | JavaScript / AJAX | Gửi tin nhắn liên hệ, nhận news | `inc/forms.php` / WordPress AJAX API | `vasco-theme/inc/` |
