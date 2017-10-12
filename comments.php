<?php
/**
 * Comment template
 *
 * @package x-theme
 * @since 1.0.0
 *
 */

if ( post_password_required() ) { return; } ?>

<div class="row">
	<div class="col-md-12">
		<h3><?php esc_html_e( 'All Comments', 'x-theme' ); ?></h3>
		<div class="x-theme-comments-list" id="comments">
			<ul><?php wp_list_comments( array( 'callback' => 'x_theme_comment' ) ); ?></ul>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
					<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'x-theme' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'x-theme' ) ); ?></div>
				</nav>
			<?php endif; ?>
		</div>

		<h3 class="x-theme-comments-form-title"><?php esc_html_e( 'Write a Comment', 'x-theme' ); ?></h3>
		<?php comment_form(
			array(
				'id_form'              => 'x-theme-comment-form',
				'fields'               => array(
					'author'            => '<input name="author"  type="text"  placeholder="'. esc_html__( 'Your name', 'x-theme') .'" required />',
					'email'             => '<input name="email"   type="email" placeholder="'. esc_html__( 'Your email', 'x-theme') .'" required />',
					'subject'           => '<input name="subject" type="text"  placeholder="'. esc_html__( 'Subject', 'x-theme') .'" />',
				),
				'comment_field'        => '<textarea cols="30"  name="comment" rows="10" placeholder="'. esc_html__( 'Message', 'x-theme') .'" required></textarea>',
				'must_log_in'          => '',
				'logged_in_as'         => '',
				'comment_notes_before' => '',
				'comment_notes_after'  => '',
				'title_reply'          => '',
				'title_reply_to'       => esc_html__('Leave a Reply to %s', 'x-theme' ),
				'cancel_reply_link'    => esc_html__('Cancel', 'x-theme' ),
				'label_submit'         => esc_html__('Send message', 'x-theme' ),
				'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s-btn" value="%4$s" />',
				'submit_field'         => '%1$s %2$s',
			)
		); ?>
	</div>
</div>
