<?php
/**
 * Product Custom Fields: Thong So Ky Thuat & FAQ
 *
 * Them 2 custom field vao trang chinh sua san pham WooCommerce:
 *   - Thong so ky thuat (bang key-value)
 *   - FAQ / Hoi dap (accordion cau hoi - cau tra loi)
 * Hien thi tab tuong ung ngoai frontend theo style thiet ke.
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// =============================================================
// Thong so ky thuat & FAQ mac dinh (dung lam fallback)
// =============================================================

/**
 * Trả về danh sách thông số kỹ thuật mặc định.
 *
 * @return array
 */
function vasco_get_default_specs() {
	return array(
		array( 'name' => 'Màn hình',           'value' => '' ),
		array( 'name' => 'Bộ xử lý',           'value' => '' ),
		array( 'name' => 'RAM',                 'value' => '' ),
		array( 'name' => 'ROM / Bộ nhớ',       'value' => '' ),
		array( 'name' => 'Modem',               'value' => '' ),
		array( 'name' => 'WiFi',                'value' => '' ),
		array( 'name' => 'Pin',                 'value' => '' ),
		array( 'name' => 'Kích thước',          'value' => '' ),
		array( 'name' => 'Trọng lượng',         'value' => '' ),
		array( 'name' => 'Cổng kết nối',       'value' => '' ),
		array( 'name' => 'Ngôn ngữ hỗ trợ',   'value' => '' ),
		array( 'name' => 'Tài liệu hướng dẫn', 'value' => '' ),
	);
}

/**
 * Trả về danh sách FAQ mặc định.
 *
 * @return array
 */
function vasco_get_default_faqs() {
	return array(
		array( 'question' => 'Sản phẩm có hoạt động không cần kết nối internet không?',       'answer' => '' ),
		array( 'question' => 'Thiết bị hỗ trợ những ngôn ngữ nào?',                           'answer' => '' ),
		array( 'question' => 'Sản phẩm có hoạt động được ở nước ngoài không?',                'answer' => '' ),
		array( 'question' => 'Chất lượng dịch thuật có tốt hơn Google Translate không?',      'answer' => '' ),
		array( 'question' => 'Sản phẩm có dễ sử dụng với người lớn tuổi không?',              'answer' => '' ),
		array( 'question' => 'Tôi có thể tùy chỉnh giọng nói không?',                         'answer' => '' ),
		array( 'question' => 'Thiết bị có hỗ trợ sạc nhanh không?',                           'answer' => '' ),
		array( 'question' => 'Tôi có thể sử dụng tai nghe Bluetooth với sản phẩm này không?', 'answer' => '' ),
		array( 'question' => 'Chính sách bảo hành của sản phẩm là gì?',                       'answer' => '' ),
		array( 'question' => 'Tôi có thể mua thêm phụ kiện ở đâu?',                           'answer' => '' ),
	);
}

// =============================================================
// ADMIN: Dang ky tab tuy chinh trong Product Data metabox
// =============================================================

add_filter( 'woocommerce_product_data_tabs', 'vasco_add_product_data_tabs' );
function vasco_add_product_data_tabs( $tabs ) {
	$tabs['vasco_specs'] = array(
		'label'    => 'Thông Số Kỹ Thuật',
		'target'   => 'vasco_specs_data',
		'class'    => array(),
		'priority' => 80,
	);
	$tabs['vasco_faq']   = array(
		'label'    => 'FAQ / Hỏi Đáp',
		'target'   => 'vasco_faq_data',
		'class'    => array(),
		'priority' => 81,
	);
	return $tabs;
}

add_action( 'woocommerce_product_data_panels', 'vasco_render_specs_panel' );
function vasco_render_specs_panel() {
	global $post;
	wp_nonce_field( 'vasco_specs_save_action', 'vasco_specs_nonce' );

	$specs = get_post_meta( $post->ID, '_vasco_specs', true );
	if ( ! is_array( $specs ) || empty( $specs ) ) {
		$specs = vasco_get_default_specs();
	}
	?>
	<div id="vasco_specs_data" class="panel woocommerce_options_panel">
		<div class="options_group">
			<p style="padding:10px 16px;font-size:13px;font-weight:600;border-bottom:1px solid #eee;margin:0;">
				📋 Thông Số Kỹ Thuật Sản Phẩm
			</p>
			<p style="padding:8px 16px;color:#666;font-size:12px;margin:0;">
				Thêm các thông số kỹ thuật. Mỗi dòng là một cặp <strong>Tên thông số</strong> và <strong>Giá trị</strong>.
			</p>
			<div style="padding:12px 16px;">
				<table style="width:100%;border-collapse:collapse;">
					<thead>
						<tr style="background:#f5f5f5;">
							<th style="padding:8px 12px;text-align:left;border:1px solid #ddd;font-size:12px;width:40%;">Tên thông số</th>
							<th style="padding:8px 12px;text-align:left;border:1px solid #ddd;font-size:12px;">Giá trị</th>
							<th style="padding:8px 12px;text-align:center;border:1px solid #ddd;font-size:12px;width:56px;">Xóa</th>
						</tr>
					</thead>
					<tbody id="vasco-specs-rows">
						<?php
						$rows = ! empty( $specs ) ? $specs : array( array( 'name' => '', 'value' => '' ) );
						foreach ( $rows as $index => $spec ) :
						?>
						<tr class="vasco-spec-row">
							<td style="padding:5px;border:1px solid #ddd;">
								<input type="text" name="vasco_specs[<?php echo esc_attr( $index ); ?>][name]"
									value="<?php echo esc_attr( $spec['name'] ?? '' ); ?>"
									placeholder="VD: Màn hình, RAM, Pin..."
									style="width:100%;border:1px solid #ccc;border-radius:3px;padding:5px 7px;font-size:12px;" />
							</td>
							<td style="padding:5px;border:1px solid #ddd;">
								<input type="text" name="vasco_specs[<?php echo esc_attr( $index ); ?>][value]"
									value="<?php echo esc_attr( $spec['value'] ?? '' ); ?>"
									placeholder="VD: TFT 3.54 inch, 3 GB, 2500 mAh..."
									style="width:100%;border:1px solid #ccc;border-radius:3px;padding:5px 7px;font-size:12px;" />
							</td>
							<td style="padding:5px;border:1px solid #ddd;text-align:center;">
								<button type="button" class="vasco-remove-spec button"
									style="color:#a00;border-color:#a00;font-size:16px;line-height:1;padding:2px 7px;">×</button>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<button type="button" id="vasco-add-spec" class="button button-secondary" style="margin-top:8px;font-size:12px;">
					+ Thêm thông số
				</button>
			</div>
		</div>
	</div>
	<?php
}

add_action( 'woocommerce_product_data_panels', 'vasco_render_faq_panel' );
function vasco_render_faq_panel() {
	global $post;
	wp_nonce_field( 'vasco_faq_save_action', 'vasco_faq_nonce' );

	$faqs = get_post_meta( $post->ID, '_vasco_faq', true );
	if ( ! is_array( $faqs ) ) {
		$faqs = array();
	}
	?>
	<div id="vasco_faq_data" class="panel woocommerce_options_panel">
		<div class="options_group">
			<p style="padding:10px 16px;font-size:13px;font-weight:600;border-bottom:1px solid #eee;margin:0;">
				❓ FAQ / Hỏi Đáp Thường Gặp
			</p>
			<p style="padding:8px 16px;color:#666;font-size:12px;margin:0;">
				Thêm các câu hỏi và câu trả lời. Người dùng sẽ thấy accordion ở trang sản phẩm.
			</p>
			<div style="padding:12px 16px;">
				<div id="vasco-faq-rows">
					<?php
					$rows = ! empty( $faqs ) ? $faqs : array( array( 'question' => '', 'answer' => '' ) );
					foreach ( $rows as $index => $faq ) :
					?>
					<div class="vasco-faq-row" style="border:1px solid #ddd;border-radius:5px;margin-bottom:8px;background:#fafafa;">
						<div style="padding:8px 12px;border-bottom:1px solid #eee;display:flex;align-items:center;justify-content:space-between;">
							<strong style="font-size:12px;color:#333;">Câu hỏi #<?php echo esc_html( $index + 1 ); ?></strong>
							<button type="button" class="vasco-remove-faq button" style="color:#a00;border-color:#a00;font-size:12px;">Xóa</button>
						</div>
						<div style="padding:8px 12px;">
							<label style="display:block;font-size:11px;font-weight:600;margin-bottom:3px;color:#555;">Câu hỏi:</label>
							<input type="text" name="vasco_faq[<?php echo esc_attr( $index ); ?>][question]"
								value="<?php echo esc_attr( $faq['question'] ?? '' ); ?>"
								placeholder="VD: Sản phẩm có hoạt động không cần internet không?"
								style="width:100%;border:1px solid #ccc;border-radius:3px;padding:6px 8px;font-size:12px;margin-bottom:6px;" />
							<label style="display:block;font-size:11px;font-weight:600;margin-bottom:3px;color:#555;">Câu trả lời:</label>
							<textarea name="vasco_faq[<?php echo esc_attr( $index ); ?>][answer]" rows="3"
								placeholder="Nhập câu trả lời chi tiết tại đây..."
								style="width:100%;border:1px solid #ccc;border-radius:3px;padding:6px 8px;font-size:12px;resize:vertical;"><?php echo esc_textarea( $faq['answer'] ?? '' ); ?></textarea>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<button type="button" id="vasco-add-faq" class="button button-secondary" style="margin-top:4px;font-size:12px;">
					+ Thêm câu hỏi
				</button>
			</div>
		</div>
	</div>
	<?php
}

// =============================================================
// ADMIN: Luu du lieu khi save product (Bao mat voi Nonce & Capabilities)
// =============================================================

add_action( 'woocommerce_process_product_meta', 'vasco_save_product_fields' );
function vasco_save_product_fields( $post_id ) {
	// Autosave check
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Permission check
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Save Specs
	if ( isset( $_POST['vasco_specs_nonce'] ) && wp_verify_nonce( $_POST['vasco_specs_nonce'], 'vasco_specs_save_action' ) ) {
		$specs = array();
		if ( isset( $_POST['vasco_specs'] ) && is_array( $_POST['vasco_specs'] ) ) {
			foreach ( $_POST['vasco_specs'] as $spec ) {
				$name  = sanitize_text_field( $spec['name'] ?? '' );
				$value = sanitize_text_field( $spec['value'] ?? '' );
				if ( ! empty( $name ) ) {
					$specs[] = array( 'name' => $name, 'value' => $value );
				}
			}
		}
		update_post_meta( $post_id, '_vasco_specs', $specs );
	}

	// Save FAQ
	if ( isset( $_POST['vasco_faq_nonce'] ) && wp_verify_nonce( $_POST['vasco_faq_nonce'], 'vasco_faq_save_action' ) ) {
		$faqs = array();
		if ( isset( $_POST['vasco_faq'] ) && is_array( $_POST['vasco_faq'] ) ) {
			foreach ( $_POST['vasco_faq'] as $faq ) {
				$question = sanitize_text_field( $faq['question'] ?? '' );
				$answer   = sanitize_textarea_field( $faq['answer'] ?? '' );
				if ( ! empty( $question ) ) {
					$faqs[] = array( 'question' => $question, 'answer' => $answer );
				}
			}
		}
		update_post_meta( $post_id, '_vasco_faq', $faqs );
	}
}

// =============================================================
// FRONTEND: Tab Thong So Ky Thuat & FAQ vao WooCommerce
// =============================================================

add_filter( 'woocommerce_product_tabs', 'vasco_add_product_frontend_tabs' );
function vasco_add_product_frontend_tabs( $tabs ) {
	if ( ! is_product() ) {
		return $tabs;
	}
	$tabs['vasco_specs'] = array(
		'title'    => 'Thông Số Kỹ Thuật',
		'priority' => 25,
		'callback' => 'vasco_tab_specs_content',
	);
	$tabs['vasco_faq']   = array(
		'title'    => 'FAQ',
		'priority' => 26,
		'callback' => 'vasco_tab_faq_content',
	);
	return $tabs;
}

function vasco_tab_specs_content() {
	global $product;
	$specs = get_post_meta( $product->get_id(), '_vasco_specs', true );
	if ( empty( $specs ) || ! is_array( $specs ) ) {
		$specs = vasco_get_default_specs();
	}
	?>
	<div class="vasco-specs-tab">
		<h2 class="vasco-tab-title">Thông Số Kỹ Thuật</h2>
		<div class="vasco-specs-table-wrapper">
			<table class="vasco-specs-table-frontend">
				<tbody>
					<?php foreach ( $specs as $spec ) : ?>
						<?php if ( empty( $spec['name'] ) ) continue; ?>
						<tr class="vasco-spec-row-frontend">
							<td class="vasco-spec-name"><?php echo esc_html( $spec['name'] ); ?></td>
							<td class="vasco-spec-value vasco-spec-value--<?php echo empty( $spec['value'] ) ? 'empty' : 'filled'; ?>">
								<?php echo ! empty( $spec['value'] ) ? esc_html( $spec['value'] ) : '<span class="vasco-spec-placeholder">—</span>'; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php
}

function vasco_tab_faq_content() {
	global $product;
	$faqs = get_post_meta( $product->get_id(), '_vasco_faq', true );
	if ( empty( $faqs ) || ! is_array( $faqs ) ) {
		$faqs = vasco_get_default_faqs();
	}
	?>
	<div class="vasco-faq-tab">
		<h2 class="vasco-tab-title">FAQ</h2>
		<div class="vasco-faq-accordion">
			<?php foreach ( $faqs as $i => $faq ) : ?>
				<?php if ( empty( $faq['question'] ) ) continue; ?>
				<div class="vasco-faq-item">
					<button class="vasco-faq-question" aria-expanded="false" aria-controls="vasco-faq-ans-<?php echo esc_attr( $i ); ?>">
						<span class="vasco-faq-question-text"><?php echo esc_html( $faq['question'] ); ?></span>
						<span class="vasco-faq-icon" aria-hidden="true">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none">
								<path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</span>
					</button>
					<div class="vasco-faq-answer" id="vasco-faq-ans-<?php echo esc_attr( $i ); ?>" hidden>
						<div class="vasco-faq-answer-inner">
							<?php echo wp_kses_post( nl2br( esc_html( $faq['answer'] ) ) ); ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
}