# Vasco Custom WordPress Theme (`vasco-theme`)

Custom WordPress Classic Theme được chuyển đổi hoàn chỉnh từ dự án Vasco Electronics frontend sang môi trường WordPress / LocalWP.

## 1. Cấu Trúc Thư Mục Theme
- `style.css`: File định danh theme WordPress.
- `functions.php`: Nạp các mô-đun cốt lõi từ `inc/`.
- `header.php`: Cấu trúc Header, MegaMenu và Logo.
- `footer.php`: Cấu trúc Footer và Copyright.
- `front-page.php`: Giao diện Trang chủ hiển thị các dòng máy phiên dịch chính.
- `index.php`: Template danh sách bài viết / Blog fallback.
- `page.php`: Template hiển thị các trang nội dung tĩnh chuẩn WordPress.
- `page-translators.php`: Template trang danh mục tất cả máy phiên dịch.
- `single-product.php`: Template trang chi tiết sản phẩm phiên dịch.
- `page-contact.php`: Template trang liên hệ tích hợp form gửi tư vấn.
- `single.php`: Template bài viết Blog chi tiết.
- `404.php`: Giao diện trang báo lỗi 404.
- `inc/`:
  - `setup.php`: Đăng ký `title-tag`, `post-thumbnails`, `custom-logo`, `woocommerce`.
  - `enqueue.php`: Quản lý nạp tất cả CSS, JS của theme.
  - `menus.php`: Quản lý Navigation Menu locations.
  - `activation.php`: Tự động khởi tạo các WordPress Pages & Slugs trên database khi kích hoạt theme.
- `assets/`: Thư mục lưu trữ tất cả CSS, JavaScript, Hình ảnh và Fonts từ bản gốc.
- `docs/`: Tài liệu dự án (`tech-stack-audit.md`, `route-map.md`, `conversion-strategy.md`, `qa-report.md`).

## 2. Hướng Dẫn Sử Dụng Trong LocalWP
1. Mở trang LocalWP `vacos`.
2. Vào màn hình quản trị **WordPress Dashboard > Appearance > Themes**.
3. Kích hoạt theme **Vasco Theme**.
4. Khi kích hoạt, theme sẽ tự động thực thi script trong `inc/activation.php` để khởi tạo các trang và cấu hình đường dẫn động.
