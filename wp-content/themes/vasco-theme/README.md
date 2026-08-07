# Vasco Custom WordPress Theme (`vasco-theme`)

Custom WordPress Classic Theme được chuyển đổi hoàn chỉnh từ dự án Vasco Electronics frontend sang môi trường WordPress / LocalWP.

## 1. Cấu Trúc Thư Mục & Phân Loại Mô-đun Theme
- `style.css`: File định danh theme và chứa các quy tắc CSS tùy biến của WordPress Theme.
- `functions.php`: Tệp nạp trung tâm, thực hiện import tất cả các mô-đun cốt lõi từ `inc/`.
- `header.php`: Cấu trúc Header, MegaMenu, logo, thanh điều hướng và giỏ hàng.
- `footer.php`: Cấu trúc Footer, form đăng ký tin tức, chính sách và Copyright.
- `front-page.php`: Giao diện Trang chủ hiển thị dòng sản phẩm máy phiên dịch chính.
- `single-product.php`: Giao diện hiển thị trang chi tiết sản phẩm WooCommerce.
- `single.php`: Giao diện hiển thị chi tiết bài viết Blog.
- `page.php` / `index.php` / `404.php`: Các tệp template mặc định và xử lý lỗi 404.
- `inc/`:
  - `setup.php`: Đăng ký các tính năng chuẩn (`title-tag`, `post-thumbnails`, `custom-logo`, `woocommerce`).
  - `enqueue.php`: Quản lý nạp tất cả CSS, JavaScript của theme một cách tối ưu.
  - `menus.php`: Đăng ký danh mục menu tĩnh/động.
  - `helpers.php`: Chứa các hàm tiện ích trợ giúp xử lý dữ liệu giao diện.
  - `activation.php`: Tự động khởi tạo các trang tĩnh & cấu hình đường dẫn chuẩn trong database khi kích hoạt theme.
  - `wc-integration.php`: Tùy biến và tích hợp tính năng nâng cao với WooCommerce.
  - `product-fields.php`: Quản lý các trường thông tin bổ sung cho sản phẩm máy phiên dịch.
- `templates/`: Thư mục chứa toàn bộ page templates theo từng chuyên mục:
  - `templates/products/`: Các trang danh mục & giới thiệu chi tiết từng dòng sản phẩm.
  - `templates/pages/`: Các trang giải pháp doanh nghiệp (`business/`), tính năng (`features/`), và trang tổng hợp.
  - `templates/articles/`: Các trang bài viết, báo chí và tin tức.
- `assets/`: Thư mục tài nguyên tĩnh (`css/`, `js/`, `fonts/`, `img/`).

## 2. Quy Trình Chuyển Đổi & Kiến Trúc Kỹ Thuật (Tech Stack Audit)
- **Mã nguồn gốc**: HTML5 / CSS3 / Vanilla JS + jQuery + PrestaShop Export Assets.
- **Môi trường mới**: WordPress Classic PHP Theme + Tích hợp WooCommerce.
- **Tối ưu hóa**: Đã làm sạch toàn bộ các tệp tài liệu thừa, dọn dẹp 26+ hình ảnh tĩnh không được sử dụng để tối ưu dung lượng theme.

## 3. Hướng Dẫn Kích Hoạt Trong LocalWP
1. Mở trang LocalWP `vacos`.
2. Vào màn hình quản trị **WordPress Dashboard > Appearance > Themes**.
3. Kích hoạt theme **Vasco Theme**.
4. Theme sẽ tự động thực thi script trong `inc/activation.php` để đăng ký trang và cấu hình hệ thống.

