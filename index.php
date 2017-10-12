<?php
/**
 * The main template file.
 *
 * @package x-theme
 * @since 1.0.0
 *
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12 zip-post-page-title">
			<h3 class="zic-orange-h3">Blog</h3>
		</div>
		<?php if ( have_posts() ): ?>
			<div class="col-md-12 zic-blog-page-wrap">
			<?php while ( have_posts() ): the_post(); ?>
				<div class="col-md-4 col-sm-12 zic-blog-item">
					<?php $first_post_image = x_theme_catch_that_image($post); ?>
					<?php if ( has_post_thumbnail() || $first_post_image) { 
            			$img_url = wp_get_attachment_url( get_post_thumbnail_id() );
            			$img_url = $img_url ? $img_url : $first_post_image;
            			 ?> 
            			 <a href="<?php the_permalink(); ?>"><div class="zic-blog-img" style="background-image: url('<?php print $img_url; ?>');"></div></a>
				    <?php } ?>
					<div class="zic-b-post-info">
						<h4 class="zic-post-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h4>
						<div class="post-excerpt"><?php the_excerpt(); ?></div>
					</div>
				</div>
			<?php endwhile; ?>
			</div>

			<?php if ( $paginate_links = paginate_links() ): ?>
				<div class="x-theme-pager">
					<?php echo $paginate_links; ?>
				</div>
			<?php endif; ?>

		<?php else: ?>
			<div id="x-theme-empty-result">
				<p><?php esc_html_e('Sorry, no posts matched your criteria.', 'x-theme' ); ?></p>
				<?php get_search_form( true ); ?>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
