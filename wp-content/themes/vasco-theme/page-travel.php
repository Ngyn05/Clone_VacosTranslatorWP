<?php
/**
 * Template Name: Clean Page page-travel.php
 *
 * @package VascoTheme
 */

get_header();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vasco Electronics - Thông Tin Sản Phẩm & Dịch Vụ</title>
<style>
body { font-family: sans-serif; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; margin: 0; background: #f8fafc; color: #1e293b; text-align: center; padding: 20px; }
.card { background: white; padding: 40px; border-radius: 16px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1); max-width: 500px; width: 100%; }
h1 { color: #2563eb; margin-bottom: 12px; }
p { font-size: 16px; color: #64748b; line-height: 1.6; }
.btn { display: inline-block; margin-top: 24px; padding: 12px 28px; background: #2563eb; color: white; border-radius: 99px; text-decoration: none; font-weight: 600; }
</style>
</head>
<body>
<div class="card">
  <h1>Vasco Electronics</h1>
  <p>Trang thông tin bạn chọn đang được cập nhật thêm nội dung. Bạn có thể quay lại trang chủ để khám phá các sản phẩm máy phiên dịch mới nhất.</p>
  <a href="<?php echo esc_url( home_url( "/" ) ); ?>" class="btn">Quay về Trang chủ</a>
</div>
</body>
</html>

<?php
get_footer();
