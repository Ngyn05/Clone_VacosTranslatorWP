<?php
/**
 * Debug SQL execution for variation image update
 */
require_once dirname(__FILE__) . '/wp-load.php';

global $wpdb;
$wpdb->show_errors(); // Hiện lỗi SQL nếu có

echo "=== ĐANG THỰC THI SQL CẬP NHẬT TRỰC TIẾP ===<br>";

// Xem giá trị hiện tại trước khi xóa
$prev = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id = 1180 AND meta_key = '_thumbnail_id'");
echo "Giá trị cũ trước khi chạy: " . ($prev ? $prev : 'Không có') . "<br>";

// Thử xóa
$del = $wpdb->query(
	"DELETE FROM $wpdb->postmeta WHERE post_id = 1180 AND meta_key = '_thumbnail_id'"
);
echo "Số dòng đã xóa: " . $del . "<br>";
if ($wpdb->last_error) {
	echo "Lỗi khi xóa: " . $wpdb->last_error . "<br>";
}

// Thử chèn
$ins = $wpdb->insert(
	$wpdb->postmeta,
	array(
		'post_id'    => 1180,
		'meta_key'   => '_thumbnail_id',
		'meta_value' => '147'
	)
);
echo "Kết quả chèn: " . ($ins ? 'Thành công' : 'Thất bại') . "<br>";
if ($wpdb->last_error) {
	echo "Lỗi khi chèn: " . $wpdb->last_error . "<br>";
}

// Kiểm tra lại sau khi chạy
$after = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id = 1180 AND meta_key = '_thumbnail_id'");
echo "Giá trị mới sau khi chạy: " . ($after ? $after : 'Không có') . "<br>";

// Xóa cache transients
if ( function_exists( 'wc_delete_product_transients' ) ) {
	wc_delete_product_transients( 1176 );
}
wp_cache_flush();
