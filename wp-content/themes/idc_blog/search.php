<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package idc_blog
 */

get_header();
?>
        <!--================ Banner SM Section start =================-->
  <section class="hero-banner hero-banner-sm text-center">
    <div class="container">
      	<h1><?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Kết quả tìm kiếm của: %s', 'idc_blog' ), '<span>' . get_search_query() . '</span>' );
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
get_template_part( 'template-parts/page-list');
get_footer();
