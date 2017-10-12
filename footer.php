<?php
/**
 * Footer template.
 *
 * @package x-theme
 * @since 1.0.0
 *
 */

$footer = true;
if ( is_page() ) {
	$meta_data = get_post_meta( get_the_ID(), 'x_theme_page_options', true );
	if ( isset( $meta_data['page_footer'] ) && $meta_data['page_footer'] === false ) {
		$footer = false;
	}
} ?>

	<?php if ( $footer ): ?>

		<!-- START FOOTER -->
		<footer class="x-theme-footer">
			
			<!-- FOOTER SIDEBAR -->
			<div class="container">
				<div class="row">
					<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar('footer-sidebar') ); ?>
				</div>
			</div>
			 
		</footer>
		<!-- END FOOTER -->

	<?php endif; ?>

	<?php if ( x_theme_get_options('page_scroll_up') ): ?>
		<!-- SCROLL TOP BUTTON -->
		<div class="x-theme-scroll-top"></div>
		<!-- END SCROLL TOP BUTTON -->
	<?php endif; ?>

	<?php wp_footer(); ?>
	</body>
</html>
