<?php
/**
 * Index Page
 *
 * @package x-theme
 * @since 1.0.0
 *
 */

get_header();

while ( have_posts() ):
	the_post();
	$content = get_the_content();

	if ( ! strpos( $content, 'vc_' ) ): ?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="zic-page-wrap">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>

	<?php else: ?>
		<div class="container">
			<?php the_content(); ?>
		</div>
	<?php endif; ?>

	<?php
		/*
		 *
		 * $meta_data = get_post_meta( get_the_ID(), 'x_theme_page_options', true );
		 *
		 * Functions for using:
		 *  has_post_thumbnail()
		 *  the_post_thumbnail()
		 *  the_excerpt()
		 *  the_title()
		 *  the_permalink()
		 *  the_content()
		 *  get_the_ID()
		 *  the_time( get_option('date_format') )
		 *
		 *  Delete this after using.
		 */
	?>

<?php endwhile; ?>

<?php get_footer(); ?>
