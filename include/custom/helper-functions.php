<?php
/**
 * Helper functions
 *
 * @package x-theme
 * @since 1.0.0
 *
 */


/**
 * Custom menu
 */
if ( ! function_exists( 'x_theme_custom_menu' ) ) {
	function x_theme_custom_menu()
	{
		if ( has_nav_menu( 'top-menu' ) ) {
			wp_nav_menu(
				array(
					'container'      => '',
					'items_wrap'     => '<ul class="main-menu">%3$s</ul>',
					'theme_location' => 'top-menu',
					'depth'          => 3
				)
			);
		} else {
			echo '<div class="no-menu">' . esc_html__( 'Please register Top Navigation from', 'x-theme' ) . ' <a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" target="_blank">' . esc_html__( 'Appearance &gt; Menus', 'x-theme' ) . '</a></div>';
		}
	}
}

/**
 * Get social links list
 */
if ( ! function_exists( 'x_theme_get_social' ) ) {
	function x_theme_get_social( $position )
	{

		if ( x_theme_get_options($position . '_social') && x_theme_get_options($position . '_social_links') ) {
			$output  = '<div class="x-theme-social-list">';
			foreach ( x_theme_get_options($position . '_social_links') as $social ) {
				$output .= '<a href="' . $social[$position . '_social_link'] . '" class="' . $social[$position . '_social_icon'] . '"></a>';
			}
			$output .= '</div>';
			echo $output;
		}
	}
}


/**
 * Replaces the excerpt "more" text by a link
 */
if ( ! function_exists( 'x_theme_excerpt_more' ) ) {
	function x_theme_excerpt_more()
	{
	    global $post;

		return '<a class="moretag" href="'. get_permalink($post->ID) .'">'. esc_html__( 'Read more', 'x-theme' ) .'</a>';
	}
	add_filter('excerpt_more', 'x_theme_excerpt_more');
}

/**
 * Filter the except length to 20 characters.
 */
if ( ! function_exists( 'x_theme_custom_excerpt_length' ) ) {
	function x_theme_custom_excerpt_length()
	{
	    return 20;
	}
	add_filter( 'excerpt_length', 'x_theme_custom_excerpt_length', 999 );
}
 

/**
 * Comments template
 **/
if ( ! function_exists( 'x_theme_comment' ) ) {
	function x_theme_comment( $comment, $args, $depth )
	{
		$GLOBALS['comment'] = $comment;

		switch ( $comment->comment_type ):
			case 'pingback':
			case 'trackback': ?>
				<div class="pingback">
					<?php esc_html_e( 'Pingback:', 'x-theme' ); ?> <?php comment_author_link(); ?>
					<?php edit_comment_link( esc_html__( '(Edit)', 'x-theme' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
				<?php
				break;
			default: ?>
				<li <?php comment_class('ct-part'); ?> id="li-comment-<?php comment_ID(); ?>">
					<div class="comm-block" id="comment-<?php comment_ID(); ?>">
						<div class="comm-img">
							<?php echo get_avatar( $comment, 80 ); ?>
						</div>
						<div class="comm-txt">
							<h5><?php comment_author(); ?></h5>
							<div class="date-post">
								<span class="fa fa-calendar"></span>
								<h6><?php comment_date( get_option('date_format') );?></h6>
							</div>
							<?php comment_text(); ?>
							<?php comment_reply_link(
								array_merge( $args,
									array(
										'reply_text' => esc_html__( 'Reply', 'x-theme' ),
										'after' 	 => '',
										'depth' 	 => $depth,
										'max_depth'  => $args['max_depth']
									)
								)
							); ?>
						</div>
					</div>
			<?php
			break;
		endswitch;
	}
}
