<?php
/**
 * Script cập nhật trực tiếp Tiêu Đề & Nội Dung Tiếng Việt hoàn chỉnh cho tất cả các bài viết còn lại
 */

require_once __DIR__ . '/../wp-load.php';

echo "=== CẬP NHẬT TRỰC TIẾP TIẾNG VIỆT CHO BÀI VIẾT ===\n\n";

$translations = [
    'pmm-trains-iraqi-medics' => [
        'title' => 'Phái bộ Y tế Ba Lan Vasco huấn luyện lực lượng y tế tại Iraq',
        'excerpt' => 'Vasco đồng hành cùng Phái bộ Y tế Ba Lan tổ chức các khóa huấn luyện chuyên sâu cho nhân viên y tế khẩn cấp tại Iraq.'
    ],
    'good-manners-while-traveling' => [
        'title' => 'Cách giữ lịch sự và ứng xử văn minh khi đi du lịch quốc tế',
        'excerpt' => 'Hướng dẫn thực hành các thói quen và văn hóa giao tiếp ứng xử văn minh khi khám phá những đất nước mới.'
    ],
    'pmm-vasco-visit-to-jordan' => [
        'title' => 'Đội cứu hộ khẩn cấp PMM Vasco đến thăm và làm việc tại Jordan',
        'excerpt' => 'Chuyến công tác hỗ trợ cộng đồng và trao tặng giải pháp dịch thuật thông minh tại Jordan.'
    ],
    'vasco-supports-minority-rights-group' => [
        'title' => 'Vasco tài trợ và đồng hành cùng Tổ chức Quyền Dân tộc thiểu số (MRG)',
        'excerpt' => 'Vasco khẳng định sứ mệnh kết nối ngôn ngữ và bảo tồn sự đa dạng văn hóa trên thế giới.'
    ],
    'design-oscar-for-vasco-translator-v4' => [
        'title' => 'Vasco Translator V4 xuất sắc giành giải thưởng thiết kế Red Dot',
        'excerpt' => 'Máy dịch thông minh Vasco Translator V4 vinh dự nhận giải thưởng thiết kế cao quý được mệnh danh là Oscar của ngành thiết kế.'
    ],
    'vasco-translator-v4-enters-the-market' => [
        'title' => 'Máy phiên dịch Vasco Translator V4 chính thức ra mắt thị trường toàn cầu',
        'excerpt' => 'Vasco ra mắt thế hệ máy phiên dịch cầm tay mới nhất với công nghệ dịch thuật đa ngôn ngữ tức thì qua sóng 4G miễn phí trọn đời.'
    ]
];

foreach ($translations as $slug => $info) {
    $post = get_page_by_path($slug, OBJECT, 'post');
    if ($post) {
        wp_update_post([
            'ID'           => $post->ID,
            'post_title'   => $info['title'],
            'post_excerpt' => $info['excerpt']
        ]);
        echo "[✓] Đã chuyển đổi tiêu đề Tiếng Việt cho ID {$post->ID} ($slug): {$info['title']}\n";
    }
}

echo "\n=== HOÀN THÀNH CẬP NHẬT TIẾNG VIỆT BÀI VIẾT ===\n";
