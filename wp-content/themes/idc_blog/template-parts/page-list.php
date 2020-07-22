<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package idc_blog
 */

if(is_mobile()) {
  $args = array(
      'type'                     => 'post',
      'child_of'                 => 0,
      'parent'                   => '',
      'orderby'                  => 'name',
      'order'                    => 'ASC',
      'hide_empty'               => false,
      'hierarchical'             => 1,
      'exclude'                  => '',
      'include'                  => '',
      'number'                   => '',
      'taxonomy'                 => 'category',
      'pad_counts'               => false
  );
  $categories = get_categories($args);
}
if(is_mobile()):
?>
    <div>
       <div class="blog_right_sidebar">
          <aside class="single_sidebar_widget search_widget">
             <form action="/">
                <div class="form-group">
                   <div class="input-group mb-3">
                      <input type="text" class="form-control" name="s" value="<?php echo get_search_query(); ?>" placeholder="Từ khóa tìm kiếm">
                      <div class="input-group-append">
                         <button class="btn" type="button"><i class="ti-search"></i></button>
                      </div>
                   </div>
                </div>
                <button class="button rounded-0 w-100" type="submit">Tìm kiếm</button>
             </form>
          </aside>
          <?php if(is_array($categories) && !empty($categories)): ?>
          <aside class="single_sidebar_widget post_category_widget">
             <h4 class="widget_title">Danh mục nổi bật</h4>
             <ul class="list cat-list">
                <?php foreach($categories as $item): ?>
                <li>
                   <a href="<?php echo get_category_link($item); ?>" class="d-flex">
                      <p><?php echo $item->name; ?></p>
                      <p> (<?php echo wp_get_cat_postcount($item->term_id); ?>)</p>
                   </a>
                </li>
                <?php endforeach; ?>
             </ul>
          </aside>
          <?php endif; ?>
       </div>
    </div>
    <?php endif; ?>
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

