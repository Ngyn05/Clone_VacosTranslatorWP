<?php
/**
 * Template Name: Clean Page page-cart.php
 *
 * @package VascoTheme
 */

get_header();
?>

<div class="breadcrumb-container" style="background: #F8F9FA; padding: 14px 0; border-bottom: 1px solid #EAECEF;">
    <div class="container">
        <nav aria-label="Breadcrumbs" class="breadcrumb">
            <ol style="display: flex; gap: 8px; list-style: none; margin: 0; padding: 0; font-size: 14px; color: #6C757D;">
                <li><a href="<?php echo esc_url( home_url( "/" ) ); ?>" style="color: #001480; text-decoration: none;">Trang chủ</a> <span>&gt;</span></li>
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
                    <!-- Dynamic Cart Items via JavaScript -->
                </div>
            </div>

            <!-- Cart Summary Box (Right Column) -->
            <div style="flex: 0 0 360px; max-width: 100%; background: #ffffff; border-radius: 16px; padding: 28px; box-shadow: 0 4px 20px rgba(0,0,0,0.04); border: 1px solid #EAECEF; position: sticky; top: 100px;">
                <h3 style="font-size: 20px; font-weight: 700; color: #2D3139; margin-top: 0; margin-bottom: 20px; border-bottom: 1px solid #EAECEF; padding-bottom: 14px;">Tóm tắt đơn hàng</h3>
                
                <div style="display: flex; justify-content: space-between; margin-bottom: 14px; font-size: 15px; color: #555;">
                    <span>Tạm tính:</span>
                    <strong id="cart-subtotal-price" style="color: #2D3139;">0 đ</strong>
                </div>
                
                <div style="display: flex; justify-content: space-between; margin-bottom: 14px; font-size: 15px; color: #555;">
                    <span>Phí vận chuyển:</span>
                    <span style="color: #28A745; font-weight: 600;">Miễn phí</span>
                </div>
                
                <div style="border-top: 1px solid #EAECEF; margin: 18px 0; padding-top: 16px; display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 17px; font-weight: 700; color: #2D3139;">Tổng cộng:</span>
                    <strong id="cart-grand-total-price" style="font-size: 22px; font-weight: 800; color: #001480;">0 đ</strong>
                </div>

                <a href="<?php echo esc_url( home_url( "/translators/" ) ); ?>" onclick="alert('Đơn hàng của bạn đã được ghi nhận! Cảm ơn bạn đã đặt hàng tại Vasco.'); VascoCart.clearCart(); location.reload(); return false;" style="display: block; width: 100%; background: #001480; color: #ffffff; text-align: center; padding: 14px 20px; border-radius: 10px; font-size: 16px; font-weight: 700; text-decoration: none; margin-top: 24px; transition: background 0.2s ease; box-sizing: border-box;">
                    TIẾN HÀNH THANH TOÁN
                </a>

                <a href="<?php echo esc_url( home_url( "/translators/" ) ); ?>" style="display: block; width: 100%; background: transparent; color: #001480; text-align: center; padding: 12px 20px; border-radius: 10px; font-size: 14px; font-weight: 600; text-decoration: none; margin-top: 12px; border: 1px solid #001480; box-sizing: border-box;">
                    Tiếp tục mua sắm
                </a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    renderCart();
});

function renderCart() {
    var container = document.getElementById('cart-items-container');
    var cart = window.VascoCart.getCart();

    if (!cart || cart.length === 0) {
        container.innerHTML = `
            <div style="text-align: center; padding: 48px 20px;">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#A0AEC0" stroke-width="1.5" style="margin-bottom: 16px;"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                <h3 style="font-size: 20px; color: #2D3139; margin-bottom: 8px;">Giỏ hàng của bạn đang trống</h3>
                <p style="color: #718096; font-size: 15px; margin-bottom: 24px;">Hãy khám phá các dòng Máy phiên dịch Vasco để thêm sản phẩm vào giỏ hàng.</p>
                <a href="<?php echo esc_url( home_url( "/translators/" ) ); ?>" style="display: inline-block; background: #001480; color: #fff; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600;">Xem danh sách sản phẩm</a>
            </div>
        `;
        document.getElementById('cart-subtotal-price').textContent = '0 đ';
        document.getElementById('cart-grand-total-price').textContent = '0 đ';
        return;
    }

    var html = '';
    cart.forEach(function(item) {
        var itemTotal = (item.price * item.quantity);
        var formattedItemTotal = window.VascoCart.formatMoney(itemTotal);
        var formattedPrice = window.VascoCart.formatMoney(item.price);
        var imgUrl = item.image || '<?php echo esc_url( VASCO_THEME_URI . "/assets/img/homepage-carousel/v4.webp" ); ?>';

        html += `
            <div style="display: flex; align-items: center; gap: 20px; padding: 20px 0; border-bottom: 1px solid #EAECEF; flex-wrap: wrap;">
                <img src="${imgUrl}" alt="${item.name}" style="width: 80px; height: 80px; object-fit: contain; border-radius: 8px; background: #F8F9FA; padding: 6px; border: 1px solid #EAECEF;" />
                
                <div style="flex: 1 1 200px;">
                    <a href="${item.link}" style="font-size: 16px; font-weight: 700; color: #2D3139; text-decoration: none; display: block; margin-bottom: 4px;">${item.name}</a>
                    <span style="font-size: 14px; color: #718096;">Giá: ${formattedPrice}</span>
                </div>

                <div style="display: flex; align-items: center; border: 1px solid #CBD5E0; border-radius: 8px; overflow: hidden; background: #fff;">
                    <button onclick="changeQty('${item.id}', ${item.quantity - 1})" style="width: 32px; height: 32px; border: none; background: #F7FAFC; cursor: pointer; font-size: 16px; font-weight: bold; color: #4A5568;">-</button>
                    <span style="width: 40px; text-align: center; font-size: 15px; font-weight: 600; color: #2D3139;">${item.quantity}</span>
                    <button onclick="changeQty('${item.id}', ${item.quantity + 1})" style="width: 32px; height: 32px; border: none; background: #F7FAFC; cursor: pointer; font-size: 16px; font-weight: bold; color: #4A5568;">+</button>
                </div>

                <div style="width: 120px; text-align: right; font-size: 16px; font-weight: 700; color: #001480;">
                    ${formattedItemTotal}
                </div>

                <button onclick="removeItem('${item.id}')" title="Xóa sản phẩm" style="background: none; border: none; font-size: 22px; color: #A0AEC0; cursor: pointer; padding: 4px 8px; line-height: 1; transition: color 0.2s ease;">
                    &times;
                </button>
            </div>
        `;
    });

    container.innerHTML = html;
    var grandTotal = window.VascoCart.getTotalPrice();
    var formattedGrandTotal = window.VascoCart.formatMoney(grandTotal);
    document.getElementById('cart-subtotal-price').textContent = formattedGrandTotal;
    document.getElementById('cart-grand-total-price').textContent = formattedGrandTotal;
}

function changeQty(id, qty) {
    if (qty <= 0) {
        removeItem(id);
    } else {
        window.VascoCart.updateQuantity(id, qty);
        renderCart();
    }
}

function removeItem(id) {
    window.VascoCart.removeItem(id);
    renderCart();
}
</script>

<?php
get_footer();
?>
