<?php
/**
 * Single Blog Post Template
 *
 * @package VascoTheme
 */

get_header();
?>

<div class="container my-5 py-3">
	<div class="row">
		<div class="col-lg-8 mx-auto">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-blog-article' ); ?>>
					<h1 class="entry-title font-weight-bold mb-3"><?php the_title(); ?></h1>
					<div class="text-muted small mb-4">
						<?php vasco_posted_on(); ?> | Tác giả: <?php the_author(); ?>
					</div>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="featured-image mb-4">
							<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid rounded shadow-sm' ) ); ?>
						</div>
					<?php endif; ?>
					<div class="article-body lh-lg">
						<?php the_content(); ?>
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
