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
    <section class="blog_area section-margin">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 mb-5 mb-lg-0">
                  <div class="blog_left_sidebar">
                    <?php if ( is_home() && ! is_front_page() ) : ?>

          <?php endif;

          /* Start the Loop */
          while ( have_posts() ) :
            #the_post();

            /*
             * Include the Post-Type-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
             */
            get_template_part( 'template-parts/item-post', the_post() );

          endwhile;

          ?>
                      <nav class="blog-pagination justify-content-center d-flex">
                        <?php the_posts_pagination([
                          'prev_text' => '<span aria-hidden="true"><span class="ti-arrow-left"></span></span>',
                'next_text' => '<span aria-hidden="true"><span class="ti-arrow-right"></span></span>',
                          'screen_reader_text'=> '&nbsp;'
                        ]); ?>
                      </nav>
                  </div>
              </div>
              <?php get_sidebar(); ?>
          </div>
      </div>
  </section>
  <!--================Blog Area =================-->

