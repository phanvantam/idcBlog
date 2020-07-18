<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package idc_blog
 */

?>

    <!--================ Banner SM Section start =================-->
  <section class="hero-banner hero-banner-sm text-center">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <?php
          if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb( '<div class="breadcrumb">','</div>' );
          }
        ?>
      </nav>
    </div>
  </section>
  <!--================ Banner SM Section end =================-->

  <!--================Blog Area =================-->
  <section class="blog_area single-post-area section-margin">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 posts-list">
                  <div class="single-post">
                        <div class="feature-img">
                          <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($post); ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true); ?>">
                        </div>
                      <div class="blog_details">
                          <h2><?php the_title(); ?></h2>
                              <ul class="blog-info-link mt-3 mb-4">
                    <li><a><i class="ti-calendar"></i> <?php echo get_the_date('d/m/Y H:s'); ?></a></li>
                                <li><a href="#commentsArea"><i class="ti-comments"></i> <?php echo get_comments_number($post); ?> Bình luận</a></li>
                              </ul>
                        <?php 
                        while (have_posts ()) {
                          the_post ();                    
                          the_content(); 
                        }
                        ?>
                      </div>
                  </div>
                  <div class="navigation-top">
                    <div class="justify-content-between text-center">
                      <ul class="social-icons">
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                        <li><a href="#"><i class="ti-dribbble"></i></a></li>
                        <li><a href="#"><i class="ti-wordpress"></i></a></li>
                      </ul>
                    </div>

                    <div class="navigation-area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                              <?php 
                              $previous_post = get_previous_post(true);
                              if(!empty($previous_post)):
                            ?>
                                <div class="thumb">
                                    <a href="<?php echo esc_url(get_permalink($previous_post)); ?>">
                                        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($previous_post, 'thumbnail'); ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id( $previous_post->ID ), '_wp_attachment_image_alt', true); ?>">
                                    </a>
                                </div>
                                <div class="arrow">
                                    <a href="<?php echo esc_url(get_permalink($previous_post)); ?>">
                                        <span class="ti-arrow-left text-white"></span>
                                    </a>
                                </div>
                                <div class="detials">
                                    <a href="<?php echo esc_url(get_permalink($previous_post)); ?>">
                                        <h4><?php echo $previous_post->post_title; ?></h4>
                                    </a>
                                </div>
                            <?php endif; ?>
                            </div>
                          
                            <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                              <?php 
                              $next_post = get_next_post(true);
                              if(!empty($next_post)):
                            ?>
                                <div class="detials">
                                    <a href="<?php echo esc_url(get_permalink($next_post)); ?>">
                                        <h4><?php echo $next_post->post_title; ?></h4>
                                    </a>
                                </div>
                                <div class="arrow">
                                    <a href="<?php echo esc_url(get_permalink($next_post)); ?>">
                                        <span class="ti-arrow-right text-white"></span>
                                    </a>
                                </div>
                                <div class="thumb">
                                    <a href="<?php echo esc_url(get_permalink($next_post)); ?>">
                                        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($next_post, 'thumbnail'); ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id( $next_post->ID ), '_wp_attachment_image_alt', true); ?>">
                                    </a>
                                </div>
                              <?php endif; ?>
                            </div>
                        </div>
                    </div>
                  </div>
                  <?php 

                  // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;

                  ?>

                  
                  
              </div>
              <?php get_sidebar();?>
          </div>
      </div>
  </section>
  <!--================Blog Area =================-->