<?php
/**
 * Single Blog Post Template with GEO & Schema Optimization
 *
 * @package VascoTheme
 */

get_header();
?>

<style>
#et-main-area {
    background: #f7f9fa !important;
    padding: 30px 0 60px 0 !important;
}
.single-post-wrapper {
    max-width: 900px;
    margin: 20px auto;
    background: #ffffff;
    padding: 50px 60px;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.05);
    border: 1px solid #eaeaea;
}
@media (max-width: 768px) {
    .single-post-wrapper {
        padding: 25px 20px;
        border-radius: 12px;
    }
}
.single-post-breadcrumbs {
    font-size: 13px;
    color: #888;
    margin-bottom: 20px;
}
.single-post-breadcrumbs a {
    color: #555;
    text-decoration: none;
}
.single-post-breadcrumbs a:hover {
    color: #e30613;
}
.single-post-title {
    font-size: 34px;
    font-weight: 800;
    line-height: 1.35;
    color: #1a1a1a;
    margin-bottom: 18px;
    letter-spacing: -0.5px;
}
@media (max-width: 768px) {
    .single-post-title {
        font-size: 24px;
    }
}
.single-post-meta {
    font-size: 14px;
    color: #777777;
    margin-bottom: 30px;
    padding-bottom: 18px;
    border-bottom: 1px solid #f0f0f0;
    display: flex;
    gap: 14px;
    align-items: center;
    flex-wrap: wrap;
}
.single-post-meta strong {
    color: #333;
}
.single-post-featured-img {
    width: 100%;
    max-height: 500px;
    object-fit: cover;
    border-radius: 16px;
    margin-bottom: 35px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.06);
}
.single-post-content {
    font-size: 17px;
    line-height: 1.85;
    color: #2d3748;
}
.single-post-content p {
    margin-bottom: 22px;
}
.single-post-content h2 {
    font-size: 24px;
    font-weight: 700;
    color: #1a202c;
    margin-top: 40px;
    margin-bottom: 18px;
    padding-bottom: 8px;
    border-bottom: 2px solid #edf2f7;
}
.single-post-content h3 {
    font-size: 20px;
    font-weight: 700;
    color: #2d3748;
    margin-top: 30px;
    margin-bottom: 15px;
}
.single-post-content h4 {
    font-size: 17px;
    font-weight: 700;
    color: #4a5568;
    margin-top: 22px;
    margin-bottom: 10px;
}
.single-post-content ul, .single-post-content ol {
    margin-bottom: 25px;
    padding-left: 24px;
}
.single-post-content li {
    margin-bottom: 8px;
}
.single-post-content blockquote {
    background: #f8fafc;
    border-left: 4px solid #e30613;
    padding: 18px 24px;
    margin: 30px 0;
    border-radius: 0 12px 12px 0;
    font-style: italic;
    color: #4a5568;
}
.single-post-content img {
    max-width: 100%;
    height: auto;
    border-radius: 14px;
    margin: 25px auto;
    display: block;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}
/* Style FAQ section inside post content */
.single-post-content .faq-section {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 30px;
    margin: 35px 0;
}
.single-post-content .faq-section h3 {
    margin-top: 0;
    color: #e30613;
    font-size: 20px;
    margin-bottom: 20px;
}
.single-post-content .faq-section h4 {
    color: #1a202c;
    font-size: 16px;
    margin-top: 15px;
    margin-bottom: 6px;
}
.single-post-content .faq-section div[class^="answer"] {
    color: #4a5568;
    font-size: 15px;
    line-height: 1.6;
    margin-bottom: 16px;
    padding-bottom: 12px;
    border-bottom: 1px dashed #cbd5e0;
}
.single-post-content .faq-section div[class^="answer"]:last-child {
    border-bottom: none;
    margin-bottom: 0;
}
/* Style CTA banner box */
.vasco-seo-cta-box {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border: 2px solid #e30613;
    padding: 25px 30px;
    border-radius: 16px;
    margin: 35px 0;
    box-shadow: 0 10px 25px rgba(227,6,19,0.08);
}
.vasco-seo-cta-box h4 {
    font-size: 19px !important;
    color: #1a202c !important;
    margin-top: 0 !important;
    margin-bottom: 10px !important;
}
.vasco-seo-cta-box p {
    font-size: 15px !important;
    color: #4a5568 !important;
    margin-bottom: 16px !important;
}
.vasco-seo-cta-box a.button {
    background: #e30613;
    color: #ffffff !important;
    padding: 10px 24px;
    border-radius: 30px;
    text-decoration: none !important;
    display: inline-block;
    font-weight: 700;
    font-size: 14px;
    transition: all 0.25s ease;
    box-shadow: 0 4px 12px rgba(227,6,19,0.3);
}
.vasco-seo-cta-box a.button:hover {
    background: #c00410;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(227,6,19,0.4);
}
</style>

<div id="et-main-area">
<div id="main-content">
<div class="container">
	<?php
	while ( have_posts() ) :
		the_post();
		$post_id     = get_the_ID();
		$author_name = get_post_meta( $post_id, '_vasco_author_name', true ) ?: get_the_author();
		$read_time   = get_post_meta( $post_id, '_vasco_read_time', true ) ?: '10 phút đọc';
		$thumb_meta  = get_post_meta( $post_id, '_vasco_thumb_url', true );

		if ( has_post_thumbnail( $post_id ) ) {
			$thumb_src = get_the_post_thumbnail_url( $post_id, 'full' );
		} elseif ( ! empty( $thumb_meta ) ) {
			$thumb_src = $thumb_meta;
		} else {
			$thumb_src = VASCO_THEME_URI . '/assets/img/happy-people.webp';
		}
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-wrapper' ); ?> itemscope itemtype="https://schema.org/BlogPosting">
			<meta itemprop="mainEntityOfPage" content="<?php the_permalink(); ?>">
			<meta itemprop="inLanguage" content="vi-VN">

			<!-- Breadcrumbs Navigation -->
			<div class="single-post-breadcrumbs">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ</a> &raquo; 
				<a href="<?php echo esc_url( home_url( '/articles/' ) ); ?>">Bài viết</a> &raquo; 
				<span><?php the_title(); ?></span>
			</div>

			<h1 class="single-post-title" itemprop="headline"><?php the_title(); ?></h1>
			
			<div class="single-post-meta">
				<span itemprop="author" itemscope itemtype="https://schema.org/Person">
					👤 Tác giả: <strong itemprop="name"><?php echo esc_html( $author_name ); ?></strong>
				</span>
				<span>•</span>
				<time itemprop="datePublished" datetime="<?php echo get_the_date( 'c' ); ?>">📅 <?php echo get_the_date( 'd/m/Y' ); ?></time>
				<span>•</span>
				<span>⏱️ <?php echo esc_html( $read_time ); ?></span>
			</div>

			<?php if ( $thumb_src ) : ?>
				<div class="single-post-img-box">
					<img class="single-post-featured-img" src="<?php echo esc_url( $thumb_src ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" itemprop="image" />
				</div>
			<?php endif; ?>

			<div class="single-post-content" itemprop="articleBody">
				<?php the_content(); ?>
			</div>

			<!-- Back to Blog Button -->
			<div style="margin-top: 40px; padding-top: 25px; border-top: 1px solid #edf2f7; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
				<a href="<?php echo esc_url( home_url( '/articles/' ) ); ?>" style="text-decoration: none; font-weight: 700; color: #e30613; display: inline-flex; align-items: center; gap: 6px;">
					&larr; Xem tất cả bài viết
				</a>
				<span style="font-size: 13px; color: #888;">Chia sẻ bài viết này nếu bạn thấy hữu ích!</span>
			</div>
		</article>
		<?php
	endwhile;
	?>
</div>
</div>
</div>

<?php
get_footer();
