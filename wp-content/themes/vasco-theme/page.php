<?php
/**
 * Default Page Template
 *
 * @package VascoTheme
 */

get_header();
?>

<div class="container my-5 py-3">
	<div class="row">
		<div class="col-12">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-content' ); ?>>
					<h1 class="entry-title font-weight-bold mb-4"><?php the_title(); ?></h1>
					<div class="content-body">
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
