<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to starkers_comment() which is
 * located in the functions.php file.
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php include ('parts/shared/theme_options_loader.php'); ?>
<div id="comments">
	<?php if ( post_password_required() ) : ?>
	<p>This post is password protected. Enter the password to view any comments</p>
</div>

	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

	<h2><?php comments_number(); ?></h2>

	<ul class="commentlist">
<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
</ul>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	
	<p>Comments are closed</p>
	
	<?php endif; ?>
	<?php 
				$commenter = wp_get_current_commenter();
				$req = get_option( 'require_name_email' );
				$aria_req = ( $req ? " aria-required='true'" : '' );
				$url_avatar = get_template_directory_uri() . '/images/noavatar.png'; ?>
	<?php $fields =  array(
	'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Your name' ) . '</label> ' . 
              '<input id="author" name="author" type="text" placeholder="Your name *" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
  'email'  => '<p class="comment-form-email">' . '<label for="email">' . __( 'Your email' ) . '</label> '  .
              '<input id="email" name="email" type="email" placeholder="Your email *" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
  'url' 	 => '<p class="comment-form-url">' . '<label for="url">' . __( 'Website' ) . '</label> ' .
	            '<input id="url" name="url" type="text" placeholder="Website" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
  
);?>
		<?php $comments_args = array(
				'fields'  => apply_filters( 'comment_form_default_fields', $fields ),
        // change the title of send button 
        'label_submit'=>(__('Send', 'fw')),
        // change the title of the reply section
        'title_reply'=>(__('Write a Comment', 'fw')),
        // remove "Text or HTML to be displayed after the set of comment fields"
        'title_reply_to'       => (__( 'Leave a <span>Reply</span> to %s', 'fw')),
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" aria-required="true" rows="8" placeholder="'.(__("your comment", "ffg-one")).' *"></textarea></p>',
);
	 comment_form($comments_args); ?>

</div><!-- #comments -->