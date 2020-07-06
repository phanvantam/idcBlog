<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package idc_blog
 */

get_header();
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
                      <div class="blog_details">
                        <?php 
                        while (have_posts ()) {
                          the_post ();                    
                          the_content(); 
                        }
                        ?>
                      </div>
                  </div>
              </div>
              <?php get_sidebar();?>
          </div>
      </div>
  </section>
  <!--================Blog Area =================-->
<?php
get_footer();
