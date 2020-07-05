<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
      	<h1><?php
			echo 'Danh sách bài viết cho '. get_the_archive_title(); 
		?></h1>
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
<?php
get_template_part('template-parts/page-list');
get_footer();