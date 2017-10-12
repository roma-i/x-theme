<?php
/**
 * 404 Page template.
 *
 * @package x-theme
 * @since 1.0.0
 *
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="title"><?php esc_html_e( '404', 'x-theme' ); ?></h1>
			<?php if ( x_theme_get_options('error_title') ): ?>
				<h2 class="subtitle"><?php echo esc_html( x_theme_get_options('error_title') ); ?></h2>
			<?php endif; ?>
			<?php if (  x_theme_get_options('error_btn_text') ): ?>
				<a href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo esc_html( x_theme_get_options('error_btn_text') ); ?></a>
			<?php endif; ?>
			<?php get_search_form( true ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
