<?php
/**
 * Single Page
 *
 * @package x-theme
 * @since 1.0.0
 *
 */

get_header(); ?>

<?php while ( have_posts() ): the_post(); ?>


	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="x-theme-breadcrumbs">
					<?php x_theme_get_breadcrumb(false,true); ?>
				</div>

				<!-- Post content -->
				<div class="post-detailed">
					<div class="zip-post-page-title">
						<h3 class="zic-orange-h3"><?php the_title(); ?></h3>
					</div>
					
					<div class="zic-post-img">
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						} ?>
					</div>
					<div class="post-content">
						<?php the_content(); ?>
					</div>
					<h3 class="zic-orange-h3 zic-bottom-post-title">Read More From Our Blog</h3>
					<div class="navigation-post">
						<!-- End post content -->
						<?php echo get_previous_post_link('%link','<span> &laquo; </span> %title');  ?>
						<?php echo get_next_post_link('%link','%title <span> &raquo; </sspan>');  ?>
					</div>

				</div>
				 
			</div>
		</div>
	</div>

	<?php
		/*
		 * Template for blog post item.
		 *
		 * Functions for using:
		 *  has_post_thumbnail()
		 *  the_post_thumbnail()
		 *
		 *  the_excerpt()
		 *  the_title()
		 *  the_permalink()
		 *  get_the_ID()
		 *  the_content()
		 *  the_time( get_option('date_format') )
		 *
		 *  has_tag()
		 *  the_tags()
		 *
		 *  has_category()
		 *  the_category( ', ' )
		 *
		 *  get_previous_post()
		 *  get_next_post()
		 *
		 *  wp_get_post_categories( $prev_post->ID )
		 *  $img_url = wp_get_attachment_url( get_post_thumbnail_id( $prev_post->ID ) )
		 *
		 *  Delete this after using.
		 */
	?>

<?php endwhile; ?>

<?php get_footer(); ?>
