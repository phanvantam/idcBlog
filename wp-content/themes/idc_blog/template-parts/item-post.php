<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package idc_blog
 */

?>

<article class="blog_item">
    <div class="blog_item_img">
      <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo the_title(); ?>">
        <img class="card-img rounded-0" 
        src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail')[0]; ?>" 
        alt="<?php echo get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true); ?>">
      </a>
      <a href="<?php echo esc_url(get_permalink()); ?>" class="blog_item_date" title="<?php echo the_title(); ?>">
        <h3><?php echo get_the_date('m'); ?></h3>
        <p><?php echo get_the_date('Y'); ?></p>
      </a>
    </div>

    <div class="blog_details">
        <a class="d-inline-block" href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo the_title(); ?>">
            <?php the_title('<h2>', '</h2>'); ?>
        </a>
        <p><?php the_excerpt(); ?></p>
        <ul class="blog-info-link">
          <li><a><i class="ti-calendar"></i> <?php printf(/* translators: 1: date and time(s). */ esc_html__('%1$s lúc %2$s' , '5balloons_theme'), get_the_date(),  get_the_time()) ?></a></li>
          <li><a href="<?php echo esc_url(get_permalink()); ?>#commentsArea" title="<?php echo the_title(); ?> - Bình luận"><i class="ti-comments"></i> <?php echo get_comments_number(get_the_ID()); ?> Bình luận</a></li>
        </ul>
    </div>
</article>
