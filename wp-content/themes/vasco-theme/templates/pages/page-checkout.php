<?php
/**
 * Template Name: Checkout Page (WooCommerce Integrated & Responsive)
 *
 * @package VascoTheme
 */

get_header();
?>

<div class="breadcrumb-container" style="background: #F8F9FA; padding: 14px 0; border-bottom: 1px solid #EAECEF;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <nav aria-label="Breadcrumbs" class="breadcrumb">
            <ol style="display: flex; gap: 8px; list-style: none; margin: 0; padding: 0; font-size: 14px; color: #6C757D; flex-wrap: wrap;">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #001480; text-decoration: none;">Trang chủ</a> <span>&gt;</span></li>
                <li><a href="<?php echo esc_url( home_url( '/cart/' ) ); ?>" style="color: #001480; text-decoration: none;">Giỏ hàng</a> <span>&gt;</span></li>
                <li style="color: #2D3139; font-weight: 600;">Thanh toán</li>
            </ol>
        </nav>
    </div>
</div>

<style>
.checkout-grid-layout {
    display: grid;
    grid-template-columns: 340px 1fr;
    gap: 32px;
    align-items: start;
}
.checkout-form-row {
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
}
.checkout-form-row label {
    flex: 0 0 160px;
    font-weight: 700;
    font-size: 14px;
    color: #2D3139;
}
.checkout-form-row input[type="text"],
.checkout-form-row input[type="email"],
.checkout-form-row input[type="tel"] {
    flex: 1;
    min-width: 200px;
    padding: 10px 14px;
    border: 1px solid #CBD5E0;
    border-radius: 6px;
    font-size: 14px;
    color: #2D3139;
    outline: none;
    box-sizing: border-box;
}

@media (max-width: 900px) {
    .checkout-grid-layout {
        grid-template-columns: 1fr !important;
        gap: 24px !important;
    }
    .checkout-summary-box {
        position: static !important;
        order: 2;
    }
    .checkout-steps-box {
        order: 1;
    }
}

@media (max-width: 600px) {
    .checkout-form-row {
        flex-direction: column !important;
        align-items: stretch !important;
        gap: 6px !important;
    }
    .checkout-form-row label {
        flex: none !important;
        width: 100% !important;
    }
    .checkout-form-row input[type="text"],
    .checkout-form-row input[type="email"],
    .checkout-form-row input[type="tel"] {
        min-width: 100% !important;
        width: 100% !important;
    }
    .checkout-step {
        padding: 16px !important;
    }
}
</style>

<div class="checkout-page-wrapper" style="padding: 32px 0; background: #FAFBFD; min-height: 70vh;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <div class="checkout-grid-layout">
            
            <!-- Left Sidebar Order Summary Box -->
            <div class="checkout-summary-box" style="background: #F5F3EF; border-radius: 12px; padding: 24px; box-shadow: 0 2px 12px rgba(0,0,0,0.03); position: sticky; top: 100px;">
                <h3 style="font-size: 16px; font-weight: 700; color: #5A67D8; letter-spacing: 1px; margin: 0 0 16px 0; text-transform: uppercase; border-bottom: 2px solid #2D3139; padding-bottom: 12px;">TÓM TẮT ĐƠN HÀNG</h3>

                <div id="checkout-summary-items" style="margin-bottom: 16px;">
                    <div style="text-align:center;padding:16px 0;color:#718096;font-size:14px;">Đang tải...</div>
                </div>

                <div style="border-top: 1px solid #CBD5E0; padding-top: 12px; margin-bottom: 10px; display: flex; justify-content: space-between; font-size: 14px; color: #4A5568;">
                    <span>Tạm tính</span>
                    <strong id="summary-subtotal" style="color: #2D3139;">0 đ</strong>
                </div>

                <div id="summary-discount-row" style="display: none; justify-content: space-between; font-size: 14px; color: #4A5568; margin-bottom: 10px;">
                    <span>Giảm giá</span>
                    <strong id="summary-discount" style="color: #28A745;">- 0 đ</strong>
                </div>

                <div style="display: flex; justify-content: space-between; font-size: 14px; color: #4A5568; margin-bottom: 12px;">
                    <span>Vận chuyển</span>
                    <strong style="color: #10B981;">Miễn phí</strong>
                </div>

                <div style="border-top: 1px solid #2D3139; padding-top: 14px; display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 15px; font-weight: 700; color: #4A5568; letter-spacing: 0.5px; text-transform: uppercase;">TỔNG CỘNG</span>
                    <strong id="summary-total" style="font-size: 20px; font-weight: 800; color: #5A67D8;">0 đ</strong>
                </div>
            </div>

            <!-- Right Accordion Steps Section -->
            <div class="checkout-steps-box">
                <!-- Step 1: Personal Info & Shipping Address -->
                <div class="checkout-step active" id="step-1" style="background: #ffffff; border-radius: 12px; border: 2px solid #5A67D8; padding: 20px 28px; margin-bottom: 20px;">
                    <div class="step-header" style="display: flex; align-items: center; gap: 14px; cursor: pointer; border-bottom: 1px solid #E2E8F0; padding-bottom: 16px; margin-bottom: 20px;" onclick="goToStep(1)">
                        <span style="display: flex; align-items: center; justify-content: center; width: 28px; height: 28px; border-radius: 50%; border: 2px solid #5A67D8; color: #5A67D8; font-weight: 700; font-size: 14px; flex-shrink: 0;" id="num-1">1</span>
                        <h2 style="font-size: 16px; font-weight: 700; color: #5A67D8; letter-spacing: 0.5px; margin: 0; text-transform: uppercase;" id="title-1">1. THÔNG TIN & ĐỊA CHỈ GIAO HÀNG</h2>
                    </div>

                    <div id="step-1-body" style="display: block;">
                        <h3 style="font-size: 16px; font-weight: 600; color: #2D3139; margin: 0 0 20px 0;">Điền thông tin nhận hàng của bạn</h3>

                        <form id="checkout-personal-form" onsubmit="event.preventDefault(); goToStep(2);">
                            <!-- Phone (Required) -->
                            <div class="checkout-form-row" style="margin-bottom: 20px;">
                                <label for="billing_phone">Số điện thoại<span style="color: #5A67D8;">*</span></label>
                                <input type="tel" id="billing_phone" required placeholder="Nhập số điện thoại nhận hàng (VD: 0901234567)..." />
                            </div>

                            <!-- Email (Optional) - Đưa lên sau SĐT -->
                            <div class="checkout-form-row" style="margin-bottom: 20px;">
                                <label for="billing_email">Địa chỉ E-mail</label>
                                <input type="email" id="billing_email" placeholder="Nhập email nhận hóa đơn (tùy chọn)..." />
                            </div>

                            <!-- Full Name (Combined) -->
                            <div style="margin-bottom: 20px;">
                                <label style="display: block; font-weight: 700; font-size: 14px; margin-bottom: 6px; color: #2D3139;" for="billing_full_name">Họ và tên</label>
                                <input type="text" id="billing_full_name" placeholder="Nhập đầy đủ họ và tên (tùy chọn)..." style="width: 100%; padding: 10px 14px; border: 1px solid #CBD5E0; border-radius: 6px; box-sizing: border-box; font-size: 14px;" />
                            </div>

                            <!-- Address (Combined) -->
                            <div style="margin-bottom: 20px;">
                                <label style="display: block; font-weight: 700; font-size: 14px; margin-bottom: 6px; color: #2D3139;" for="billing_address_1">Địa chỉ</label>
                                <input type="text" id="billing_address_1" placeholder="Nhập số nhà, tên đường, phường/xã, quận/huyện, tỉnh/thành phố (tùy chọn)..." style="width: 100%; padding: 10px 14px; border: 1px solid #CBD5E0; border-radius: 6px; box-sizing: border-box; font-size: 14px;" />
                            </div>

                            <div style="margin-bottom: 20px;">
                                <label style="display: block; font-weight: 700; font-size: 14px; margin-bottom: 6px; color: #2D3139;" for="order_notes">Ghi chú đơn hàng</label>
                                <textarea id="order_notes" placeholder="Ghi chú về đơn hàng, chỉ dẫn địa điểm giao hàng..." rows="3" style="width: 100%; padding: 10px 14px; border: 1px solid #CBD5E0; border-radius: 6px; box-sizing: border-box; font-size: 14px; resize: vertical;"></textarea>
                            </div>

                            <!-- Terms & Checkboxes -->
                            <div style="display: flex; flex-direction: column; gap: 14px; margin-bottom: 24px; font-size: 13px; color: #4A5568;">
                                <label style="display: flex; align-items: flex-start; gap: 10px; cursor: pointer;">
                                    <input type="checkbox" id="check_all" onchange="toggleSelectAllTerms(this)" style="margin-top: 2px; width: 16px; height: 16px; flex-shrink: 0;" />
                                    <strong style="color: #2D3139;">Chọn tất cả</strong>
                                </label>

                                <label style="display: flex; align-items: flex-start; gap: 10px; cursor: pointer;">
                                    <input type="checkbox" class="term-check" id="term_tos" required style="margin-top: 2px; width: 16px; height: 16px; flex-shrink: 0;" />
                                    <span>Tôi đã đọc và đồng ý với <a href="<?php echo esc_url( home_url( '/terms-and-conditions/' ) ); ?>" style="color: #5A67D8; text-decoration: underline;">Điều khoản dịch vụ</a><span style="color: #5A67D8;">*</span></span>
                                </label>

                                <label style="display: flex; align-items: flex-start; gap: 10px; cursor: pointer;">
                                    <input type="checkbox" class="term-check" id="term_privacy" required style="margin-top: 2px; width: 16px; height: 16px; flex-shrink: 0;" />
                                    <span>Tôi đã đọc và đồng ý với <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" style="color: #5A67D8; text-decoration: underline;">Chính sách bảo mật</a><span style="color: #5A67D8;">*</span></span>
                                </label>

                                <label style="display: flex; align-items: flex-start; gap: 10px; cursor: pointer;">
                                    <input type="checkbox" id="term_newsletter" style="margin-top: 2px; width: 16px; height: 16px; flex-shrink: 0;" />
                                    <span>Tôi đồng ý nhận các thông tin ưu đãi và khuyến mãi từ Vasco Electronics qua email.</span>
                                </label>
                            </div>

                            <div style="font-size: 12px; color: #718096; margin-bottom: 24px;">* Thông tin bắt buộc</div>

                            <div style="text-align: right;">
                                <button type="submit" style="background: #3B82F6; color: #ffffff; border: none; padding: 12px 36px; border-radius: 24px; font-weight: 700; font-size: 14px; letter-spacing: 0.5px; cursor: pointer; text-transform: uppercase; width: 100%; max-width: 220px;">TIẾP TỤC</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Step 2: Shipping Method -->
                <div class="checkout-step" id="step-2" style="background: #ffffff; border-radius: 12px; border: 1px solid #E2E8F0; padding: 20px 28px; margin-bottom: 20px;">
                    <div class="step-header" style="display: flex; align-items: center; gap: 14px; cursor: pointer;" onclick="goToStep(2)">
                        <span style="display: flex; align-items: center; justify-content: center; width: 28px; height: 28px; border-radius: 50%; border: 2px solid #A0AEC0; color: #718096; font-weight: 700; font-size: 14px; flex-shrink: 0;" id="num-2">2</span>
                        <h2 style="font-size: 16px; font-weight: 700; color: #718096; letter-spacing: 0.5px; margin: 0; text-transform: uppercase;" id="title-2">2. PHƯƠNG THỨC VẬN CHUYỂN</h2>
                    </div>

                    <div id="step-2-body" style="display: none;">
                        <label style="display: flex; align-items: center; justify-content: space-between; padding: 16px; border: 1px solid #3B82F6; background: #F0F5FF; border-radius: 8px; margin-bottom: 20px; cursor: pointer; flex-wrap: wrap; gap: 12px;">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <input type="radio" checked name="shipping_method" value="free_shipping" style="width: 18px; height: 18px; flex-shrink: 0;" />
                                <div>
                                    <strong style="display: block; font-size: 15px; color: #2D3139;">Giao hàng tiêu chuẩn toàn quốc (24h - 48h)</strong>
                                    <span style="font-size: 13px; color: #718096;">Miễn phí giao hàng tận nhà</span>
                                </div>
                            </div>
                            <strong style="color: #10B981;">MIỄN PHÍ</strong>
                        </label>
                        <div style="text-align: right;">
                            <button type="button" onclick="goToStep(3)" style="background: #3B82F6; color: #ffffff; border: none; padding: 12px 36px; border-radius: 24px; font-weight: 700; font-size: 14px; cursor: pointer; text-transform: uppercase; width: 100%; max-width: 220px;">TIẾP TỤC</button>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Payment Method -->
                <div class="checkout-step" id="step-3" style="background: #ffffff; border-radius: 12px; border: 1px solid #E2E8F0; padding: 20px 28px; margin-bottom: 20px;">
                    <div class="step-header" style="display: flex; align-items: center; gap: 14px; cursor: pointer;" onclick="goToStep(3)">
                        <span style="display: flex; align-items: center; justify-content: center; width: 28px; height: 28px; border-radius: 50%; border: 2px solid #A0AEC0; color: #718096; font-weight: 700; font-size: 14px; flex-shrink: 0;" id="num-3">3</span>
                        <h2 style="font-size: 16px; font-weight: 700; color: #718096; letter-spacing: 0.5px; margin: 0; text-transform: uppercase;" id="title-3">3. PHƯƠNG THỨC THANH TOÁN</h2>
                    </div>

                    <div id="step-3-body" style="display: none;">
                        <div style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 24px;">
                            <label id="pay-cod-label" style="display: flex; align-items: center; gap: 12px; padding: 14px 18px; border: 2px solid #3B82F6; background: #F0F5FF; border-radius: 8px; cursor: pointer;">
                                <input type="radio" name="payment_method" value="cod" id="pay_cod" checked style="width: 18px; height: 18px; flex-shrink: 0;" onchange="togglePayment()" />
                                <div>
                                    <strong style="display: block; font-size: 14px; color: #2D3139;">💵 Thanh toán khi nhận hàng (COD)</strong>
                                    <span style="font-size: 12px; color: #718096;">Kiểm tra hàng trước khi thanh toán tiền mặt</span>
                                </div>
                            </label>

                            <label id="pay-bacs-label" style="display: flex; align-items: center; gap: 12px; padding: 14px 18px; border: 1px solid #CBD5E0; border-radius: 8px; cursor: pointer;">
                                <input type="radio" name="payment_method" value="bacs" id="pay_bacs" style="width: 18px; height: 18px; flex-shrink: 0;" onchange="togglePayment()" />
                                <div>
                                    <strong style="display: block; font-size: 14px; color: #2D3139;">🏦 Chuyển khoản ngân hàng qua mã QR</strong>
                                    <span style="font-size: 12px; color: #718096;">Nhận mã QR chuyển khoản tự động sau khi đặt hàng</span>
                                </div>
                            </label>
                        </div>

                        <div id="checkout-error" style="display:none; background: #FFF5F5; border: 1px solid #FC8181; color: #c53030; padding: 12px 16px; border-radius: 8px; font-size: 14px; margin-bottom: 16px;"></div>

                        <button type="button" id="place-order-btn" onclick="placeOrder()" style="display: block; width: 100%; background: #3B82F6; color: #ffffff; border: none; padding: 16px; border-radius: 8px; font-weight: 700; font-size: 16px; cursor: pointer; text-transform: uppercase; letter-spacing: 0.5px;">
                            HOÀN TẤT ĐẶT HÀNG
                        </button>
                        <p style="font-size: 12px; color: #718096; text-align: center; margin-top: 12px;">🔒 Thông tin của bạn được bảo mật hoàn toàn</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
(function() {
    var nonce    = window.VASCO_WC_NONCE || '';
    var ajaxUrl  = window.VASCO_AJAX_URL || '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>';

    // ── Load cart summary ──
    function loadCheckoutSummary() {
        var fd = new FormData();
        fd.append('action', 'vasco_wc_get_cart');
        fd.append('nonce', nonce);
        fetch(ajaxUrl, { method: 'POST', body: fd })
            .then(function(r) { return r.json(); })
            .then(function(res) {
                if (res.success) renderSummary(res.data);
            });
    }

    function renderSummary(data) {
        var container = document.getElementById('checkout-summary-items');
        var html = '';
        if (!data.items || data.items.length === 0) {
            html = '<p style="font-size:14px;color:#718096;">Giỏ hàng trống.</p>';
        } else {
            data.items.forEach(function(item) {
                html += '<div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:12px;font-size:14px;">';
                html += '  <div style="display:flex;gap:10px;align-items:flex-start;">';
                html += '    <img src="' + item.image + '" style="width:44px;height:44px;object-fit:contain;border-radius:6px;background:#fff;padding:2px;" />';
                html += '    <div style="color:#2D3139;"><span style="font-weight:600;">' + item.quantity + 'x</span> ' + item.name + '</div>';
                html += '  </div>';
                html += '  <strong style="color:#2D3139;white-space:nowrap;margin-left:12px;">' + item.item_total_fmt + '</strong>';
                html += '</div>';
            });
        }
        container.innerHTML = html;
        document.getElementById('summary-subtotal').textContent = data.subtotal_fmt || '0 đ';
        document.getElementById('summary-total').textContent    = data.total_fmt || '0 đ';

        var discountRow = document.getElementById('summary-discount-row');
        var discountEl  = document.getElementById('summary-discount');
        if (data.discount_fmt && discountRow && discountEl) {
            discountRow.style.display = 'flex';
            discountEl.textContent = '- ' + data.discount_fmt;
        }
    }

    // ── Accordion Steps ──
    window.goToStep = function(stepNum) {
        for (var i = 1; i <= 3; i++) {
            var stepEl  = document.getElementById('step-' + i);
            var bodyEl  = document.getElementById('step-' + i + '-body');
            var numEl   = document.getElementById('num-' + i);
            var titleEl = document.getElementById('title-' + i);
            var headerEl= stepEl ? stepEl.querySelector('.step-header') : null;

            if (i === stepNum) {
                if (stepEl)   { stepEl.style.borderColor = '#5A67D8'; stepEl.style.borderWidth = '2px'; }
                if (bodyEl)   bodyEl.style.display = 'block';
                if (numEl)    { numEl.style.borderColor = '#5A67D8'; numEl.style.color = '#5A67D8'; }
                if (titleEl)  titleEl.style.color = '#5A67D8';
                if (headerEl) { headerEl.style.borderBottom = '1px solid #E2E8F0'; headerEl.style.paddingBottom = '16px'; headerEl.style.marginBottom = '20px'; }
            } else {
                if (stepEl)   { stepEl.style.borderColor = '#E2E8F0'; stepEl.style.borderWidth = '1px'; }
                if (bodyEl)   bodyEl.style.display = 'none';
                if (numEl)    { numEl.style.borderColor = '#A0AEC0'; numEl.style.color = '#718096'; }
                if (titleEl)  titleEl.style.color = '#718096';
                if (headerEl) { headerEl.style.borderBottom = 'none'; headerEl.style.paddingBottom = '0'; headerEl.style.marginBottom = '0'; }
            }
        }
    };

    // ── Toggle payment label highlight ──
    window.togglePayment = function() {
        var codLabel  = document.getElementById('pay-cod-label');
        var bacsLabel = document.getElementById('pay-bacs-label');
        var isCod     = document.getElementById('pay_cod').checked;
        if (codLabel)  { codLabel.style.border  = isCod  ? '2px solid #3B82F6' : '1px solid #CBD5E0'; codLabel.style.background  = isCod  ? '#F0F5FF' : '#fff'; }
        if (bacsLabel) { bacsLabel.style.border = !isCod ? '2px solid #3B82F6' : '1px solid #CBD5E0'; bacsLabel.style.background = !isCod ? '#F0F5FF' : '#fff'; }
    };

    // ── Terms ──
    window.toggleSelectAllTerms = function(mainCheck) {
        document.querySelectorAll('.term-check').forEach(function(c) { c.checked = mainCheck.checked; });
    };

    // ── Place Order → WooCommerce ──
    window.placeOrder = function() {
        var fullName = document.getElementById('billing_full_name')?.value.trim() || '';
        var email    = document.getElementById('billing_email')?.value.trim() || '';
        var address  = document.getElementById('billing_address_1')?.value.trim() || '';
        var phone    = document.getElementById('billing_phone')?.value.trim() || '';
        var payment  = document.querySelector('input[name="payment_method"]:checked')?.value || 'cod';
        var notes    = document.getElementById('order_notes')?.value || '';
        var errorEl  = document.getElementById('checkout-error');

        function showError(msg) {
            errorEl.textContent = msg;
            errorEl.style.display = 'block';
            errorEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        errorEl.style.display = 'none';

        if (!phone) { showError('Vui lòng nhập số điện thoại.'); return; }

        var btn = document.getElementById('place-order-btn');
        btn.textContent = '⏳ Đang xử lý...';
        btn.disabled = true;
        btn.style.background = '#A0AEC0';

        var fd = new FormData();
        fd.append('action', 'vasco_wc_place_order');
        fd.append('nonce', nonce);
        fd.append('billing_full_name', fullName);
        fd.append('billing_email', email);
        fd.append('billing_phone', phone);
        fd.append('billing_address_1', address);
        fd.append('billing_country', 'VN');
        fd.append('payment_method', payment);
        fd.append('order_notes', notes);

        fetch(ajaxUrl, { method: 'POST', body: fd })
            .then(function(r) { return r.json(); })
            .then(function(res) {
                if (res.success) {
                    try { localStorage.removeItem('vasco_cart'); } catch(e) {}
                    window.location.href = res.data.redirect || '<?php echo esc_url( home_url( "/" ) ); ?>';
                } else {
                    showError('❌ ' + (res.data ? res.data.message : 'Có lỗi xảy ra. Vui lòng thử lại.'));
                    btn.textContent = 'HOÀN TẤT ĐẶT HÀNG';
                    btn.disabled = false;
                    btn.style.background = '#3B82F6';
                }
            })
            .catch(function() {
                showError('Lỗi kết nối. Vui lòng thử lại sau.');
                btn.textContent = 'HOÀN TẤT ĐẶT HÀNG';
                btn.disabled = false;
                btn.style.background = '#3B82F6';
            });
    };

    document.addEventListener('DOMContentLoaded', function() {
        loadCheckoutSummary();
    });
})();
</script>

<?php get_footer(); ?>
