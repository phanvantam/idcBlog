<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package idc_blog
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div class="comments-area" id="commentsArea">
   <h4><?php echo get_comments_number($post); ?> Bình luận</h4>
   <?php
// You can start editing here -- including this comment!
if (have_comments()):
?>
		<?php
		wp_list_comments(
	    array(
	        'short_ping' => true,
	        'callback'   => 'twentyten_comment',
	    )
);
?>

<nav class="blog-pagination justify-content-center d-flex">
                      	<?php paginate_comments_links([
                      		'prev_text' => '<span aria-hidden="true"><span class="ti-arrow-left"></span></span>',
    						'next_text' => '<span aria-hidden="true"><span class="ti-arrow-right"></span></span>',
                      		'screen_reader_text'=> '&nbsp;'
                      	]); ?>
                      </nav>
<?php endif; // Check for have_comments(). ?>
<?php
	$fields = array(
		
	    'author' =>
	    '<div class="col-sm-6">
            <div class="form-group">
               <input class="form-control"  value="'. esc_attr($commenter['comment_author']) .'"  name="author" id="name" type="text" placeholder="'. __( 'Name' ) . ($req ? ' *' : '') .'">
            </div>
         </div>',
	    'email'  => '<div class="col-sm-6">
            <div class="form-group">
               <input class="form-control" value="' . esc_attr($commenter['comment_author_email']) . '" name="email" id="email" type="email" placeholder="' . __('Email') . ($req ? ' *' : '') . '">
            </div>
         </div>',
         'cookies' => '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="hidden" value="yes" />',
	);
	$args = array(
	    'id_form'              => 'commentForm',
	    'class_form'           => 'form-contact comment_form',
	    'id_submit'            => 'submit',
	    'class_submit'         => 'submit',
	    'name_submit'          => 'submit',
	    'submit_button'        => '</div><div class="form-group">
         <button type="submit" id="%2$s" class="button rounded-0 button-contactForm %3$s">%4$s</button>
      </div>',
      
	    'comment_field'=> '<div class="row"><div class="col-12">
            <div class="form-group">
               <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="'. _x( 'Comment', 'noun' ) . ($req ? ' *' : '') .'" aria-required="true"></textarea>
            </div>
         </div>',
	    'title_reply'          => '',
	    'title_reply_to'       => __('Trả lời `%s`', 'text-domain'),
	    'cancel_reply_link'    => __('Hủy bỏ', 'text-domain'),
	    'label_submit'         => __('Đăng lên', 'text-domain'),
	    'format'               => 'xhtml',
	    
	    'logged_in_as'         => '<p class="logged-in-as">' .
	    sprintf(
	        __('Bình luận với tư cách %1$s. <a href="%2$s" title="%3$s">%4$s</a>', 'text-domain'),
	        $user_identity,
	        wp_logout_url(apply_filters('the_permalink', get_permalink())),
	        __('Đăng xuất?', 'text-domain'),
	        __('Đăng xuất.', 'text-domain')
	    ) . '</p>',
	    'comment_notes_before' => '<p class="comment-notes">' . __('Địa chỉ email của bạn sẽ không được hiển thị.', 'text-domain') . '</p>',
	    'fields'               => apply_filters('comment_form_default_fields', $fields),
	);
	?>
	<div class="comment-form">
   <h4>Bình luận của bạn</h4>
	<?php 
		comment_form($args);
	?>
	</div>
</div>
