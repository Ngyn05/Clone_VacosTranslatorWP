<?php
/**
 * Template Part: Product Reviews & Rating Form (100% Tiếng Việt)
 *
 * @package VascoTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$product = isset( $args['product'] ) ? $args['product'] : null;
if ( ! $product ) {
	return;
}

$comments = get_comments( array(
	'post_id' => $product->get_id(),
	'status'  => 'approve',
) );

$review_count   = ! empty( $comments ) ? count( $comments ) : $product->get_review_count();
$average_rating = $product->get_average_rating();

if ( ! empty( $comments ) ) {
	$total_stars = 0;
	foreach ( $comments as $c_item ) {
		$c_rating     = (int) get_comment_meta( $c_item->comment_ID, 'rating', true );
		$total_stars += ( $c_rating > 0 ) ? $c_rating : 5;
	}
	$average_rating = $review_count > 0 ? ( $total_stars / $review_count ) : 5;
}
?>

<div id="reviews" class="tab-content-block py-4">
	<div class="product-reviews-container">
		<h3 class="reviews-title">Đánh giá từ khách hàng (<?php echo esc_html( (string) $review_count ); ?>)</h3>
		
		<?php if ( $review_count > 0 ) : ?>
			<div class="rating-summary-box">
				<div class="rating-score"><?php echo esc_html( number_format( (float) $average_rating, 1 ) ); ?> <span class="star-icon">★</span></div>
				<p class="rating-count">Dựa trên <?php echo esc_html( (string) $review_count ); ?> đánh giá thực tế từ người mua hàng.</p>
			</div>
		<?php else : ?>
			<div class="no-reviews-box">
				<p class="text-muted">Chưa có đánh giá nào cho sản phẩm này. Hãy là người đầu tiên gửi đánh giá trải nghiệm của bạn!</p>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $comments ) ) : ?>
			<div class="wc-reviews-list-wrapper mt-4 mb-4">
				<ul class="vasco-comments-list" style="list-style:none;padding:0;margin:0;">
					<?php foreach ( $comments as $comm ) :
						$rating_val = get_comment_meta( $comm->comment_ID, 'rating', true );
						$stars_str  = str_repeat( '★', (int) $rating_val ) . str_repeat( '☆', 5 - (int) $rating_val );
					?>
						<li class="vasco-comment-item p-3 mb-3" style="background:#f8f9fa;border-radius:8px;border:1px solid #e9ecef;">
							<div class="d-flex justify-content-between align-items-center mb-2">
								<div>
									<strong style="font-size:15px;color:#212529;"><?php echo esc_html( $comm->comment_author ); ?></strong>
									<span style="color:#ffb800;font-size:16px;margin-left:8px;"><?php echo esc_html( $stars_str ); ?></span>
								</div>
								<small class="text-muted"><?php echo esc_html( date_i18n( 'd/m/Y H:i', strtotime( $comm->comment_date ) ) ); ?></small>
							</div>
							<div class="comment-text" style="color:#495057;font-size:14px;line-height:1.5;">
								<?php echo wp_kses_post( wpautop( $comm->comment_content ) ); ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>

		<!-- Form viết đánh giá tiếng Việt -->
		<div class="custom-review-form-box mt-4">
			<style>
			.custom-review-form-box {
				background: #ffffff;
				border: 1px solid #e2e8f0;
				border-radius: 16px;
				padding: 28px;
				box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
			}
			.custom-review-form-box .form-title {
				font-size: 20px;
				color: #0f172a;
				font-weight: 700;
				margin-bottom: 20px;
			}
			.custom-review-form-box label {
				font-size: 14px;
				font-weight: 600;
				color: #475569;
				margin-bottom: 6px;
				display: block;
			}
			.custom-review-form-box textarea,
			.custom-review-form-box input[type="text"],
			.custom-review-form-box input[type="email"] {
				width: 100%;
				padding: 12px 16px;
				border: 1px solid #cbd5e1;
				border-radius: 10px;
				font-size: 15px;
				color: #0f172a;
				background-color: #f8fafc;
				transition: all 0.2s ease-in-out;
				box-sizing: border-box;
			}
			.custom-review-form-box textarea:focus,
			.custom-review-form-box input[type="text"]:focus,
			.custom-review-form-box input[type="email"]:focus {
				background-color: #ffffff;
				border-color: #2563eb;
				box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
				outline: none;
			}
			.custom-review-form-box .vasco-star-rating {
				font-size: 24px;
				color: #cbd5e1;
				cursor: pointer;
				display: inline-flex;
				gap: 4px;
			}
			.custom-review-form-box .vasco-star-rating .star {
				transition: color 0.15s ease-in-out;
			}
			.custom-review-form-box .vasco-star-rating .star.selected,
			.custom-review-form-box .vasco-star-rating .star:hover,
			.custom-review-form-box .vasco-star-rating .star:hover ~ .star {
				color: #eab308;
			}
			.custom-review-form-box .btn-submit-review {
				background-color: #2563eb;
				color: #ffffff;
				font-weight: 700;
				font-size: 16px;
				padding: 14px 36px;
				border: none;
				border-radius: 30px;
				cursor: pointer;
				box-shadow: 0 4px 10px rgba(37, 99, 235, 0.25);
				transition: all 0.2s ease-in-out;
				display: inline-block;
				text-align: center;
				width: auto;
				line-height: 1.2;
				text-transform: none;
			}
			.custom-review-form-box .btn-submit-review:hover {
				background-color: #1d4ed8;
				box-shadow: 0 6px 14px rgba(37, 99, 235, 0.35);
				transform: translateY(-1px);
			}
			.custom-review-form-box .btn-submit-review:active {
				transform: translateY(0);
			}
			</style>
			<h4 class="form-title mb-3 font-weight-bold">Viết đánh giá của bạn</h4>
			<form action="<?php echo esc_url( home_url( '/wp-comments-post.php' ) ); ?>" method="post" id="commentform" class="comment-form">
				<div class="rating-select-wrapper mb-3">
					<label class="d-block mb-1 font-weight-bold">Đánh giá của bạn *</label>
					<div class="vasco-star-rating" id="vasco-star-rating">
						<span class="star" data-value="1">★</span>
						<span class="star" data-value="2">★</span>
						<span class="star" data-value="3">★</span>
						<span class="star" data-value="4">★</span>
						<span class="star" data-value="5">★</span>
					</div>
					<input type="hidden" name="rating" id="rating" value="5" required />
				</div>
				<div class="form-group mb-3">
					<label for="comment">Nội dung đánh giá *</label>
					<textarea id="comment" name="comment" cols="45" rows="4" placeholder="Chia sẻ trải nghiệm sử dụng sản phẩm này với người mua khác..." required></textarea>
				</div>
				<div class="form-row d-flex gap-3 mb-3">
					<div class="col"><input type="text" name="author" placeholder="Họ và tên *" required class="form-control" /></div>
					<div class="col"><input type="email" name="email" placeholder="Địa chỉ Email *" required class="form-control" /></div>
				</div>
				<input type="hidden" name="comment_post_ID" value="<?php echo esc_attr( $product->get_id() ); ?>" />
				<input type="hidden" name="comment_type" value="review" />
				<button type="submit" class="btn-submit-review">Gửi đánh giá</button>
			</form>
		</div>
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
	var starContainer = document.getElementById('vasco-star-rating');
	if (!starContainer) return;
	var stars = starContainer.querySelectorAll('.star');
	var ratingInput = document.getElementById('rating');

	function highlightStars(val) {
		stars.forEach(function(s) {
			var sVal = parseInt(s.getAttribute('data-value'));
			if (sVal <= val) {
				s.classList.add('selected');
			} else {
				s.classList.remove('selected');
			}
		});
	}

	highlightStars(parseInt(ratingInput.value));

	stars.forEach(function(star) {
		star.addEventListener('click', function() {
			var val = parseInt(this.getAttribute('data-value'));
			ratingInput.value = val;
			highlightStars(val);
		});

		star.addEventListener('mouseover', function() {
			var val = parseInt(this.getAttribute('data-value'));
			stars.forEach(function(s) {
				var sVal = parseInt(s.getAttribute('data-value'));
				if (sVal <= val) {
					s.style.color = '#eab308';
				} else {
					s.style.color = '#cbd5e1';
				}
			});
		});

		star.addEventListener('mouseout', function() {
			stars.forEach(function(s) {
				s.style.color = '';
			});
			highlightStars(parseInt(ratingInput.value));
		});
	});
});
</script>
