<?php
/**
 * Single Blog Post Template with GEO & Schema Optimization
 *
 * @package VascoTheme
 */

global $post;
$slug = $post ? $post->post_name : '';

$article_custom_template        = VASCO_THEME_DIR . '/templates/articles/page-articles-' . $slug . '.php';
$article_custom_template_direct = VASCO_THEME_DIR . '/templates/articles/page-' . $slug . '.php';

if ( file_exists( $article_custom_template ) ) {
	include $article_custom_template;
	return;
} elseif ( file_exists( $article_custom_template_direct ) ) {
	include $article_custom_template_direct;
	return;
}

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
    width: 100% !important;
    height: 440px !important;
    object-fit: cover !important;
    object-position: center center !important;
    display: block !important;
    margin: 0 auto 35px auto !important;
    border-radius: 16px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.06);
}
.single-post-content {
    font-size: 16px;
    line-height: 1.8;
    color: #2d3748;
}
.single-post-content h2 {
    font-size: 24px;
    font-weight: 700;
    margin-top: 35px;
    margin-bottom: 16px;
    color: #1a202c;
    line-height: 1.4;
    border-bottom: 2px solid #f0f4f8;
    padding-bottom: 8px;
}
.single-post-content h3 {
    font-size: 20px;
    font-weight: 700;
    margin-top: 28px;
    margin-bottom: 14px;
    color: #2d3748;
}
.single-post-content p {
    margin-bottom: 20px;
}
.single-post-content img {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
    margin: 20px 0;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}
.single-post-content ul, .single-post-content ol {
    margin-bottom: 24px;
    padding-left: 24px;
}
.single-post-content li {
    margin-bottom: 8px;
}
.single-post-content blockquote {
    border-left: 4px solid #e30613;
    background: #fff8f8;
    padding: 16px 24px;
    margin: 24px 0;
    border-radius: 0 12px 12px 0;
    font-style: italic;
    color: #4a5568;
}
.single-post-content table {
    width: 100%;
    border-collapse: collapse;
    margin: 25px 0;
}
.single-post-content th, .single-post-content td {
    border: 1px solid #e2e8f0;
    padding: 12px 16px;
    text-align: left;
}
.single-post-content th {
    background: #f7fafc;
    font-weight: 700;
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
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-wrapper' ); ?> itemscope itemtype="https://schema.org/BlogPosting">
			<meta itemprop="mainEntityOfPage" content="<?php the_permalink(); ?>">
			<meta itemprop="inLanguage" content="vi-VN">
			<?php if ( has_post_thumbnail( $post_id ) ) : ?>
				<meta itemprop="image" content="<?php echo esc_url( get_the_post_thumbnail_url( $post_id, 'full' ) ); ?>">
			<?php endif; ?>

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

			<?php if ( has_post_thumbnail( $post_id ) ) : ?>
				<div class="single-post-featured-image-wrapper">
					<?php the_post_thumbnail( 'full', array( 'class' => 'single-post-featured-img', 'itemprop' => 'image' ) ); ?>
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
