<?php
/**
 * Single Product Template (WooCommerce / Custom Product Detail)
 *
 * @package VascoTheme
 */

get_header();

global $post;
$slug = $post ? $post->post_name : '';

$custom_template = VASCO_THEME_DIR . '/page-' . $slug . '.php';

if ( file_exists( $custom_template ) ) {
	include $custom_template;
} else {
	// Fallback product detail markup
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			?>
			<div class="product-detail-container container py-5">
				<div class="row">
					<div class="col-md-6">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid rounded' ) ); ?>
						<?php endif; ?>
					</div>
					<div class="col-md-6">
						<h1 class="product-title"><?php the_title(); ?></h1>
						<div class="product-description my-4">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
			<?php
		endwhile;
	endif;
}

get_footer();
