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
				<button type="submit" class="btn btn-primary font-weight-bold">Gửi đánh giá</button>
			</form>
		</div>
	</div>
</div>
