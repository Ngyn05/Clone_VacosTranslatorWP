<?php
/**
 * 404 Error Page Template
 *
 * @package VascoTheme
 */

get_header();
?>

<div class="container my-5 py-5 text-center">
	<div class="card p-5 shadow-sm border-0 max-w-500 mx-auto">
		<h1 class="display-3 font-weight-bold text-primary mb-3">404</h1>
		<h2 class="h4 mb-3">Không Tìm Thấy Trang</h2>
		<p class="text-secondary mb-4">Trang thông tin bạn chọn đang được cập nhật thêm nội dung. Bạn có thể quay lại trang chủ để khám phá các sản phẩm máy phiên dịch mới nhất.</p>
		<div>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary rounded-pill px-4">Quay Về Trang Chủ</a>
		</div>
	</div>
</div>

<?php
get_footer();
