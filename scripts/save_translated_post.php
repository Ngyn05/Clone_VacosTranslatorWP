<?php
/**
 * Script đọc JSON tệp bài viết đã dịch tiếng Việt và chèn vào WordPress Database
 */

set_time_limit(0);
require_once __DIR__ . '/../wp-load.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/taxonomy.php';

$json_path = __DIR__ . '/translated_posts.json';
if (!file_exists($json_path)) {
    die("File JSON không tồn tại");
}

$target_slug = isset($argv[1]) ? trim($argv[1]) : '';

$json_data = json_decode(file_get_contents($json_path), true);
if (!$json_data || !is_array($json_data)) {
    die("Dữ liệu JSON không hợp lệ");
}

function download_image_to_media($image_url, $post_id = 0, $desc = null) {
    if (empty($image_url) || strpos($image_url, 'data:image') === 0) {
        return false;
    }
    if (strpos($image_url, '//') === 0) {
        $image_url = 'https:' . $image_url;
    }

    $filename = basename(parse_url($image_url, PHP_URL_PATH));
    $clean_filename = preg_replace('/-\d+x\d+(\.[a-z]{3,4})$/i', '$1', $filename);

    global $wpdb;
    $existing_id = $wpdb->get_var($wpdb->prepare(
        "SELECT ID FROM {$wpdb->posts} WHERE post_type = 'attachment' AND guid LIKE %s LIMIT 1",
        '%' . $wpdb->esc_like($clean_filename) . '%'
    ));

    if ($existing_id) {
        return [
            'id'  => $existing_id,
            'url' => wp_get_attachment_url($existing_id)
        ];
    }

    $file_array = [];
    $file_array['name'] = $clean_filename;

    $raw_data = false;
    if (function_exists('curl_init')) {
        $ch = curl_init($image_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        $raw_data = curl_exec($ch);
        curl_close($ch);
    }
    if (!$raw_data) {
        $opts = [
            'http' => ['header' => "User-Agent: Mozilla/5.0\r\n"],
            'ssl' => ['verify_peer' => false, 'verify_peer_name' => false]
        ];
        $raw_data = @file_get_contents($image_url, false, stream_context_create($opts));
    }

    if (!$raw_data) {
        return false;
    }

    $tmp_file = wp_tempnam($clean_filename);
    file_put_contents($tmp_file, $raw_data);
    $file_array['tmp_name'] = $tmp_file;

    if (is_wp_error($tmp_file)) {
        return false;
    }

    $id = media_handle_sideload($file_array, $post_id, $desc);
    @unlink($file_array['tmp_name']);

    if (is_wp_error($id)) {
        return false;
    }

    return [
        'id'  => $id,
        'url' => wp_get_attachment_url($id)
    ];
}

foreach ($json_data as $item) {
    if ($target_slug && $item['slug'] !== $target_slug) {
        continue;
    }

    $slug = $item['slug'];
    $title = $item['title_vi'] ?: $item['title_en'];
    $content = $item['content_html'];
    $category_name = $item['category'] ?: 'Blog';
    $author_name = $item['author'] ?: 'Vasco Team';
    $featured_img_url = $item['featured_img'];
    $original_url = $item['original_url'];
    $raw_date = $item['post_date'];

    $post_date = $raw_date ? date('Y-m-d H:i:s', strtotime($raw_date)) : date('Y-m-d H:i:s');

    $existing_post = get_page_by_path($slug, OBJECT, 'post');
    $post_data = [
        'post_title'    => $title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => $slug,
        'post_type'     => 'post',
        'post_date'     => $post_date,
        'post_date_gmt' => get_gmt_from_date($post_date),
    ];

    if ($existing_post) {
        $post_data['ID'] = $existing_post->ID;
        $post_id = wp_update_post($post_data);
        $action = "Đã cập nhật Tiếng Việt ID: $post_id";
    } else {
        $post_id = wp_insert_post($post_data);
        $action = "Đã tạo mới Tiếng Việt ID: $post_id";
    }

    if (is_wp_error($post_id)) {
        echo "Lỗi WP: " . $post_id->get_error_message();
        continue;
    }

    if ($category_name) {
        $cat_id = wp_create_category($category_name);
        if ($cat_id) {
            wp_set_post_categories($post_id, [$cat_id]);
        }
    }

    update_post_meta($post_id, '_vasco_author_name', $author_name);
    update_post_meta($post_id, '_vasco_original_url', $original_url);

    // Tải featured image
    if ($featured_img_url) {
        $img_result = download_image_to_media($featured_img_url, $post_id, "Featured Image - $title");
        if ($img_result && isset($img_result['id'])) {
            set_post_thumbnail($post_id, $img_result['id']);
        }
    }

    // Tải ảnh trong bài viết
    $post_updated_content = get_post_field('post_content', $post_id);
    preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $post_updated_content, $matches);

    if (!empty($matches[1])) {
        $replaced = false;
        foreach (array_unique($matches[1]) as $img_src) {
            if (strpos($img_src, 'vasco-translator.com') !== false || strpos($img_src, 'http') === 0) {
                $sub_img = download_image_to_media($img_src, $post_id);
                if ($sub_img && isset($sub_img['url'])) {
                    $post_updated_content = str_replace($img_src, $sub_img['url'], $post_updated_content);
                    $replaced = true;
                }
            }
        }
        if ($replaced) {
            wp_update_post([
                'ID'           => $post_id,
                'post_content' => $post_updated_content
            ]);
        }
    }

    echo "$action ($title)";
}
