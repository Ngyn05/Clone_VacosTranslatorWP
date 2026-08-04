<?php
/**
 * Template Name: Cart Page (WooCommerce Integrated)
 *
 * @package VascoTheme
 */

get_header();
?>

<div class="breadcrumb-container" style="background: #F8F9FA; padding: 14px 0; border-bottom: 1px solid #EAECEF;">
    <div class="container">
        <nav aria-label="Breadcrumbs" class="breadcrumb">
            <ol style="display: flex; gap: 8px; list-style: none; margin: 0; padding: 0; font-size: 14px; color: #6C757D;">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #001480; text-decoration: none;">Trang chủ</a> <span>&gt;</span></li>
                <li style="color: #2D3139; font-weight: 600;">Giỏ hàng</li>
            </ol>
        </nav>
    </div>
</div>

<div class="cart-page-wrapper" style="padding: 48px 0; background: #FAFBFD; min-height: 65vh;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <h1 style="font-size: 32px; font-weight: 700; color: #001480; margin-bottom: 32px;">Giỏ hàng của bạn</h1>

        <div id="cart-content-area" style="display: flex; gap: 32px; align-items: flex-start; flex-wrap: wrap;">
            <!-- Cart Items List (Left Column) -->
            <div style="flex: 1 1 680px; background: #ffffff; border-radius: 16px; padding: 24px 32px; box-shadow: 0 4px 20px rgba(0,0,0,0.04); border: 1px solid #EAECEF;">
                <div id="cart-items-container">
                    <div style="text-align:center; padding: 32px 0;"><span style="font-size:15px;color:#718096;">Đang tải giỏ hàng...</span></div>
                </div>

                <!-- Coupon Section -->
                <div id="coupon-section" style="border-top: 1px solid #EAECEF; margin-top: 24px; padding-top: 20px; display: none;">
                    <p style="font-size: 14px; font-weight: 700; color: #2D3139; margin-bottom: 12px;">🏷️ Mã giảm giá</p>
                    <div style="display: flex; gap: 10px; flex-wrap: wrap; align-items: center;">
                        <input id="coupon-input" type="text" placeholder="Nhập mã giảm giá..." style="flex: 1; min-width: 200px; padding: 10px 14px; border: 1px solid #CBD5E0; border-radius: 8px; font-size: 14px; outline: none;" />
                        <button id="apply-coupon-btn" onclick="vascoCoupon.apply()" style="background: #001480; color: #fff; border: none; padding: 10px 20px; border-radius: 8px; font-weight: 700; font-size: 14px; cursor: pointer; white-space: nowrap;">Áp dụng</button>
                    </div>
                    <div id="coupon-message" style="margin-top: 8px; font-size: 13px;"></div>
                    <div id="applied-coupons" style="margin-top: 8px;"></div>
                </div>
            </div>

            <!-- Cart Summary Box (Right Column) -->
            <div style="flex: 0 0 360px; max-width: 100%; background: #ffffff; border-radius: 16px; padding: 28px; box-shadow: 0 4px 20px rgba(0,0,0,0.04); border: 1px solid #EAECEF; position: sticky; top: 100px;">
                <h3 style="font-size: 20px; font-weight: 700; color: #2D3139; margin-top: 0; margin-bottom: 20px; border-bottom: 1px solid #EAECEF; padding-bottom: 14px;">Tóm tắt đơn hàng</h3>
                
                <div style="display: flex; justify-content: space-between; margin-bottom: 14px; font-size: 15px; color: #555;">
                    <span>Tạm tính:</span>
                    <strong id="cart-subtotal-price" style="color: #2D3139;">0 đ</strong>
                </div>

                <div id="discount-row" style="display: none; justify-content: space-between; margin-bottom: 14px; font-size: 15px; color: #555;">
                    <span>Giảm giá:</span>
                    <strong id="cart-discount-price" style="color: #28A745;">- 0 đ</strong>
                </div>
                
                <div style="display: flex; justify-content: space-between; margin-bottom: 14px; font-size: 15px; color: #555;">
                    <span>Phí vận chuyển:</span>
                    <span style="color: #28A745; font-weight: 600;">Miễn phí</span>
                </div>
                
                <div style="border-top: 1px solid #EAECEF; margin: 18px 0; padding-top: 16px; display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 17px; font-weight: 700; color: #2D3139;">Tổng cộng:</span>
                    <strong id="cart-grand-total-price" style="font-size: 22px; font-weight: 800; color: #001480;">0 đ</strong>
                </div>

                <a href="<?php echo esc_url( home_url( '/checkout/' ) ); ?>" style="display: block; width: 100%; background: #3B82F6; color: #ffffff; text-align: center; padding: 14px 20px; border-radius: 24px; font-size: 15px; font-weight: 700; text-decoration: none; margin-top: 24px; transition: background 0.2s ease; box-sizing: border-box; text-transform: uppercase; letter-spacing: 0.5px;">
                    THANH TOÁN NGAY
                </a>

                <a href="<?php echo esc_url( home_url( '/translators/' ) ); ?>" style="display: block; width: 100%; background: transparent; color: #5A67D8; text-align: center; padding: 12px 20px; border-radius: 24px; font-size: 14px; font-weight: 600; text-decoration: none; margin-top: 12px; border: 1px solid #CBD5E0; box-sizing: border-box;">
                    Tiếp tục mua sắm
                </a>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    var nonce    = window.VASCO_WC_NONCE || '';
    var ajaxUrl  = window.VASCO_AJAX_URL || '<?php echo esc_url( admin_url( "admin-ajax.php" ) ); ?>';
    var themeUri = window.VASCO_THEME_URI || '<?php echo esc_url( VASCO_THEME_URI ); ?>';

    // ── Render giỏ hàng ──
    function loadCart() {
        var fd = new FormData();
        fd.append('action', 'vasco_wc_get_cart');
        fd.append('nonce', nonce);
        fetch(ajaxUrl, { method: 'POST', body: fd })
            .then(function(r) { return r.json(); })
            .then(function(res) {
                if (res.success) {
                    renderCartItems(res.data);
                } else {
                    renderEmptyCart();
                }
            })
            .catch(function() { renderEmptyCart(); });
    }

    function renderCartItems(data) {
        var container = document.getElementById('cart-items-container');
        var couponSec = document.getElementById('coupon-section');
        
        if (!data.items || data.items.length === 0) {
            renderEmptyCart();
            return;
        }

        var html = '';
        data.items.forEach(function(item) {
            html += '<div data-cart-key="' + item.cart_item_key + '" style="display:flex;align-items:center;gap:20px;padding:20px 0;border-bottom:1px solid #EAECEF;flex-wrap:wrap;">';
            html += '  <a href="' + item.permalink + '"><img src="' + item.image + '" alt="' + item.name + '" style="width:80px;height:80px;object-fit:contain;border-radius:8px;background:#F8F9FA;padding:6px;border:1px solid #EAECEF;" /></a>';
            html += '  <div style="flex:1 1 200px;">';
            html += '    <a href="' + item.permalink + '" style="font-size:16px;font-weight:700;color:#2D3139;text-decoration:none;display:block;margin-bottom:4px;">' + item.name + '</a>';
            html += '    <span style="font-size:14px;color:#718096;">Đơn giá: ' + item.price_fmt + '</span>';
            html += '  </div>';
            html += '  <div style="display:flex;align-items:center;border:1px solid #CBD5E0;border-radius:8px;overflow:hidden;background:#fff;">';
            html += '    <button onclick="vascoCart.updateQty(\'' + item.cart_item_key + '\', ' + (item.quantity - 1) + ')" style="width:32px;height:32px;border:none;background:#F7FAFC;cursor:pointer;font-size:16px;font-weight:bold;color:#4A5568;">-</button>';
            html += '    <span style="width:40px;text-align:center;font-size:15px;font-weight:600;color:#2D3139;">' + item.quantity + '</span>';
            html += '    <button onclick="vascoCart.updateQty(\'' + item.cart_item_key + '\', ' + (item.quantity + 1) + ')" style="width:32px;height:32px;border:none;background:#F7FAFC;cursor:pointer;font-size:16px;font-weight:bold;color:#4A5568;">+</button>';
            html += '  </div>';
            html += '  <div style="width:120px;text-align:right;font-size:16px;font-weight:700;color:#001480;">' + item.item_total_fmt + '</div>';
            html += '  <button onclick="vascoCart.removeItem(\'' + item.cart_item_key + '\')" title="Xóa sản phẩm" style="background:none;border:none;font-size:22px;color:#A0AEC0;cursor:pointer;padding:4px 8px;">&times;</button>';
            html += '</div>';
        });

        container.innerHTML = html;

        // Cập nhật tổng tiền
        document.getElementById('cart-subtotal-price').textContent = data.subtotal_fmt;
        document.getElementById('cart-grand-total-price').textContent = data.total_fmt;

        // Hiện coupon section
        if (couponSec) couponSec.style.display = 'block';

        // Hiện/ẩn dòng giảm giá
        var discountRow = document.getElementById('discount-row');
        var discountEl  = document.getElementById('cart-discount-price');
        if (data.discount_fmt && discountRow && discountEl) {
            discountRow.style.display = 'flex';
            discountEl.textContent = '- ' + data.discount_fmt;
        } else if (discountRow) {
            discountRow.style.display = 'none';
        }

        // Render applied coupons
        renderAppliedCoupons(data.coupons || []);

        // Cập nhật badge
        updateBadge(data.count);
    }

    function renderEmptyCart() {
        var container = document.getElementById('cart-items-container');
        container.innerHTML = '<div style="text-align:center;padding:48px 20px;">'
            + '<svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#A0AEC0" stroke-width="1.5" style="margin-bottom:16px;"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>'
            + '<h3 style="font-size:20px;color:#2D3139;margin-bottom:8px;">Giỏ hàng của bạn đang trống</h3>'
            + '<p style="color:#718096;font-size:15px;margin-bottom:24px;">Hãy khám phá các dòng Máy phiên dịch Vasco để thêm sản phẩm vào giỏ hàng.</p>'
            + '<a href="<?php echo esc_url( home_url( "/translators/" ) ); ?>" style="display:inline-block;background:#001480;color:#fff;padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:600;">Xem danh sách sản phẩm</a>'
            + '</div>';
        document.getElementById('cart-subtotal-price').textContent = '0 đ';
        document.getElementById('cart-grand-total-price').textContent = '0 đ';
        updateBadge(0);
    }

    function renderAppliedCoupons(coupons) {
        var el = document.getElementById('applied-coupons');
        if (!el || !coupons.length) { if (el) el.innerHTML = ''; return; }
        var html = '<div style="display:flex;gap:8px;flex-wrap:wrap;margin-top:8px;">';
        coupons.forEach(function(code) {
            html += '<span style="background:#E6FFED;color:#276749;padding:4px 10px;border-radius:20px;font-size:12px;font-weight:600;display:flex;align-items:center;gap:6px;">'
                + '🏷️ ' + code
                + ' <button onclick="vascoCoupon.remove(\'' + code + '\')" style="background:none;border:none;cursor:pointer;color:#276749;font-size:14px;padding:0;line-height:1;">&times;</button>'
                + '</span>';
        });
        html += '</div>';
        el.innerHTML = html;
    }

    function updateBadge(count) {
        document.querySelectorAll('.cart-count-badge, .header-cart-count, .cart-quantity-badge, [data-cart-count]').forEach(function(b) {
            b.textContent = count;
            b.style.display = count > 0 ? 'inline-flex' : 'none';
        });
    }

    // ── Cart actions ──
    window.vascoCart = {
        updateQty: function(cartItemKey, qty) {
            var fd = new FormData();
            fd.append('action', 'vasco_wc_update_cart_item');
            fd.append('nonce', nonce);
            fd.append('cart_item_key', cartItemKey);
            fd.append('quantity', qty);
            fetch(ajaxUrl, { method: 'POST', body: fd })
                .then(function(r) { return r.json(); })
                .then(function() { loadCart(); });
        },
        removeItem: function(cartItemKey) {
            var fd = new FormData();
            fd.append('action', 'vasco_wc_remove_cart_item');
            fd.append('nonce', nonce);
            fd.append('cart_item_key', cartItemKey);
            fetch(ajaxUrl, { method: 'POST', body: fd })
                .then(function(r) { return r.json(); })
                .then(function() { loadCart(); });
        }
    };

    // ── Coupon actions ──
    window.vascoCoupon = {
        apply: function() {
            var code = document.getElementById('coupon-input').value.trim();
            if (!code) return;
            var msgEl = document.getElementById('coupon-message');
            msgEl.textContent = 'Đang áp dụng...';
            var fd = new FormData();
            fd.append('action', 'vasco_wc_apply_coupon');
            fd.append('nonce', nonce);
            fd.append('coupon_code', code);
            fetch(ajaxUrl, { method: 'POST', body: fd })
                .then(function(r) { return r.json(); })
                .then(function(res) {
                    if (res.success) {
                        msgEl.style.color = '#276749';
                        msgEl.textContent = '✅ ' + res.data.message;
                        document.getElementById('coupon-input').value = '';
                        loadCart();
                    } else {
                        msgEl.style.color = '#c53030';
                        msgEl.textContent = '❌ ' + (res.data ? res.data.message : 'Lỗi không xác định.');
                    }
                });
        },
        remove: function(code) {
            var fd = new FormData();
            fd.append('action', 'vasco_wc_remove_coupon');
            fd.append('nonce', nonce);
            fd.append('coupon_code', code);
            fetch(ajaxUrl, { method: 'POST', body: fd })
                .then(function(r) { return r.json(); })
                .then(function() { loadCart(); });
        }
    };

    document.addEventListener('DOMContentLoaded', function() {
        loadCart();
    });
})();
</script>

<?php get_footer(); ?>
