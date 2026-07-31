<?php
/**
 * Main Index Template
 *
 * @package VascoTheme
 */

get_header();
?>

<div class="container my-5">
	<div class="row">
		<div class="col-12">
			<?php if ( have_posts() ) : ?>
				<header class="page-header mb-4">
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
				<div class="posts-list row">
					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<div class="col-md-6 col-lg-4 mb-4">
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'card h-100 shadow-sm' ); ?>>
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'medium_large', array( 'class' => 'card-img-top' ) ); ?>
									</a>
								<?php endif; ?>
								<div class="card-body">
									<h2 class="card-title h5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="card-text text-muted mb-3"><?php the_excerpt(); ?></div>
									<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">Đọc tiếp</a>
								</div>
							</article>
						</div>
					<?php endwhile; ?>
				</div>
				<?php the_posts_pagination(); ?>
			<?php else : ?>
				<p>Không tìm thấy bài viết nào.</p>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php
get_footer();
