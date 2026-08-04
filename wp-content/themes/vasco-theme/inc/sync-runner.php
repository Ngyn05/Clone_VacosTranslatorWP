<?php
define('WP_USE_THEMES', false);
require_once 'c:/Users/hnguy/Local Sites/vacos/app/public/wp-load.php';

// Step 1: Wipe all existing pages in WordPress database (including drafts & trash)
$all_pages = get_posts(array(
    'post_type'      => 'page',
    'post_status'    => 'any',
    'posts_per_page' => -1,
    'fields'         => 'ids'
));

$deleted_count = 0;
foreach ($all_pages as $page_id) {
    wp_delete_post($page_id, true); // force delete permanently
    $deleted_count++;
}

// Step 2: Complete clean list of short Vietnamese pages to create
$clean_pages = array(
    array('title' => 'Trang chủ', 'slug' => 'home', 'template' => 'front-page.php', 'front' => true),
    array('title' => 'Về chúng tôi', 'slug' => 'about-us', 'template' => 'page-about-us.php'),
    array('title' => 'Truyền thông', 'slug' => 'media-about-us', 'template' => 'page-media-about-us.php'),
    array('title' => 'Liên hệ', 'slug' => 'contact', 'template' => 'page-contact.php'),
    
    // Sản phẩm máy dịch
    array('title' => 'Máy phiên dịch', 'slug' => 'translators', 'template' => 'page-translators.php'),
    array('title' => 'Vasco Q1', 'slug' => 'vasco-translator-q1', 'template' => 'page-vasco-translator-q1.php'),
    array('title' => 'Vasco V4', 'slug' => 'vasco-translator-v4', 'template' => 'page-vasco-translator-v4.php'),
    array('title' => 'Vasco M4', 'slug' => 'vasco-translator-m4', 'template' => 'page-vasco-translator-m4.php'),
    array('title' => 'Vasco E1', 'slug' => 'vasco-translator-e1', 'template' => 'page-vasco-translator-e1.php'),
    array('title' => 'Bộ Q1 + E1', 'slug' => 'q1-phantomblack-e1', 'template' => 'page-q1-phantomblack-e1.php'),
    array('title' => 'Bộ V4 + E1', 'slug' => 'v4-blackonyx-e1', 'template' => 'page-v4-blackonyx-e1.php'),
    array('title' => 'So sánh sản phẩm', 'slug' => 'comparison-engine', 'template' => 'page-comparison-engine.php'),
    array('title' => 'Dịch cuộc gọi', 'slug' => 'call-translator', 'template' => 'page-call-translator.php'),
    
    // Ngành & Doanh nghiệp
    array('title' => 'Khách sạn & Du lịch', 'slug' => 'business-hospitality', 'template' => 'page-business-hospitality.php'),
    array('title' => 'Du lịch & Khách sạn', 'slug' => 'business-du-lich-khach-san', 'template' => 'page-business-du-lich-khach-san.php'),
    array('title' => 'Giáo dục', 'slug' => 'business-education', 'template' => 'page-business-education.php'),
    array('title' => 'Giáo dục VN', 'slug' => 'business-giao-duc', 'template' => 'page-business-giao-duc.php'),
    array('title' => 'Y tế', 'slug' => 'business-healthcare', 'template' => 'page-business-healthcare.php'),
    array('title' => 'Y tế VN', 'slug' => 'business-y-te', 'template' => 'page-business-y-te.php'),
    array('title' => 'Bảo vệ & Pháp luật', 'slug' => 'business-law-enforcement', 'template' => 'page-business-law-enforcement.php'),
    array('title' => 'Chính quyền', 'slug' => 'business-local-government', 'template' => 'page-business-local-government.php'),
    array('title' => 'Sản xuất', 'slug' => 'business-manufacturing', 'template' => 'page-business-manufacturing.php'),
    array('title' => 'Sản xuất VN', 'slug' => 'business-san-xuat', 'template' => 'page-business-san-xuat.php'),
    array('title' => 'Phi lợi nhuận', 'slug' => 'business-ngo', 'template' => 'page-business-ngo.php'),
    array('title' => 'Đối tượng sử dụng', 'slug' => 'business-vasco-audience', 'template' => 'page-business-vasco-audience.php'),
    
    // Sáng kiến xã hội
    array('title' => 'Tác động xã hội', 'slug' => 'initiatives', 'template' => 'page-initiatives.php'),
    array('title' => 'Hỗ trợ Ukraine', 'slug' => 'initiatives-help-ukraine', 'template' => 'page-initiatives-help-ukraine.php'),
    array('title' => 'Sứ mệnh Y tế PMM', 'slug' => 'initiatives-polish-medical-mission-pmm', 'template' => 'page-initiatives-polish-medical-mission-pmm.php'),
    array('title' => 'Hợp tác Quinnipiac', 'slug' => 'initiatives-quinnipiac', 'template' => 'page-initiatives-quinnipiac.php'),
    
    // Tính năng
    array('title' => 'Tính năng', 'slug' => 'features', 'template' => 'page-features.php'),
    array('title' => 'Dịch giọng nói', 'slug' => 'features-translate-voice', 'template' => 'page-features-translate-voice.php'),
    array('title' => 'Dịch văn bản', 'slug' => 'features-translate-text', 'template' => 'page-features-translate-text.php'),
    array('title' => 'Dịch hình ảnh', 'slug' => 'features-translate-photos', 'template' => 'page-features-translate-photos.php'),
    array('title' => 'Dịch trò chuyện', 'slug' => 'features-translate-chat', 'template' => 'page-features-translate-chat.php'),
    array('title' => 'Cách hoạt động', 'slug' => 'how-it-works', 'template' => 'page-how-it-works.php'),

    // Phụ kiện
    array('title' => 'Phụ kiện', 'slug' => 'accessories', 'template' => 'page-accessories.php'),
    array('title' => 'Bao da M4', 'slug' => 'accessories-case-for-vasco-translator-m4', 'template' => 'page-accessories-case-for-vasco-translator-m4.php'),
    array('title' => 'Bao da Q1', 'slug' => 'accessories-case-for-vasco-translator-q1', 'template' => 'page-accessories-case-for-vasco-translator-q1.php'),
    array('title' => 'Bao da V4', 'slug' => 'accessories-case-for-vasco-translator-v4', 'template' => 'page-accessories-case-for-vasco-translator-v4.php'),
    array('title' => 'Ốp lưng M4', 'slug' => 'accessories-light-case-for-vasco-translator-m4', 'template' => 'page-accessories-light-case-for-vasco-translator-m4.php'),
    array('title' => 'Ốp lưng Q1', 'slug' => 'accessories-light-case-for-vasco-translator-q1', 'template' => 'page-accessories-light-case-for-vasco-translator-q1.php'),
    array('title' => 'Củ sạc US', 'slug' => 'accessories-power-adapter-us', 'template' => 'page-accessories-power-adapter-us.php'),
    array('title' => 'Kính cường lực M4', 'slug' => 'accessories-tempered-glass-m4', 'template' => 'page-accessories-tempered-glass-m4.php'),
    array('title' => 'Kính cường lực Q1', 'slug' => 'accessories-tempered-glass-q1', 'template' => 'page-accessories-tempered-glass-q1.php'),
    array('title' => 'Kính cường lực V4', 'slug' => 'accessories-tempered-glass-v4', 'template' => 'page-accessories-tempered-glass-v4.php'),

    // Trang chung & Pháp lý
    array('title' => 'Tất cả sản phẩm', 'slug' => 'all-products', 'template' => 'page-all-products.php'),
    array('title' => 'Giới thiệu Vasco', 'slug' => 'meet-vasco', 'template' => 'page-meet-vasco.php'),
    array('title' => 'Tin tức', 'slug' => 'newsroom', 'template' => 'page-newsroom.php'),
    array('title' => 'Bài viết tin tức', 'slug' => 'tin-tuc', 'template' => 'page-tin-tuc.php'),
    array('title' => 'Chính sách bảo mật', 'slug' => 'privacy-policy', 'template' => 'page-privacy-policy.php'),
    array('title' => 'Điều khoản sử dụng', 'slug' => 'terms-and-conditions', 'template' => 'page-terms-and-conditions.php'),
    array('title' => 'Chính sách đổi trả', 'slug' => 'returns', 'template' => 'page-returns.php'),
    array('title' => 'Chính sách vận chuyển', 'slug' => 'shipping', 'template' => 'page-shipping.php'),
    array('title' => 'Sơ đồ trang', 'slug' => 'sitemap', 'template' => 'page-sitemap.php'),
    array('title' => 'Tải về', 'slug' => 'downloads', 'template' => 'page-downloads.php'),
    array('title' => 'Bản đồ phủ sóng', 'slug' => 'coverage-map', 'template' => 'page-coverage-map.php'),
    array('title' => 'Sự kiện CES 2026', 'slug' => 'vasco-ces-2026', 'template' => 'page-vasco-ces-2026.php'),
    array('title' => 'Đổi mới công nghệ', 'slug' => 'vasco-innovations', 'template' => 'page-vasco-innovations.php'),
    array('title' => 'Hành trình Tour', 'slug' => 'camper-tour', 'template' => 'page-camper-tour.php')
);

$created_count = 0;
foreach ($clean_pages as $item) {
    $slug = $item['slug'];
    $title = $item['title'];
    $template = $item['template'];

    $page_id = wp_insert_post(array(
        'post_title'   => $title,
        'post_name'    => $slug,
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_content' => ''
    ));

    if ($page_id && !is_wp_error($page_id)) {
        update_post_meta($page_id, '_wp_page_template', $template);
        $created_count++;

        if (!empty($item['front'])) {
            update_option('show_on_front', 'page');
            update_option('page_on_front', $page_id);
        }
    }
}

flush_rewrite_rules();

// Get remaining total
$remaining_pages = get_posts(array('post_type' => 'page', 'post_status' => 'any', 'posts_per_page' => -1));
$total_now = is_array($remaining_pages) ? count($remaining_pages) : 0;

echo "WIPE_AND_RELOAD_SUCCESS: Deleted {$deleted_count} old pages. Created {$created_count} clean pages. Total pages in DB now: {$total_now}\n";
