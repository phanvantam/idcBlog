<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package idc_blog
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

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

$recent_posts = wp_get_recent_posts(array(
        'numberposts' => 4, // Number of recent posts thumbnails to display
        'post_status' => 'publish' // Show only the published posts
    ));
?>

<div class="col-lg-4">
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
      <?php if(is_array($recent_posts) && !empty($recent_posts)): ?>
      <aside class="single_sidebar_widget popular_post_widget">
         <h3 class="widget_title">Bài viết gần đây</h3>
          <?php foreach($recent_posts as $item): ?>
          <div class="media post_item">
            <a href="<?php echo get_permalink($item['ID']) ?>" title="<?php echo $item["post_title"]; ?>"><?php echo get_the_post_thumbnail($item['ID'], 'thumbnail'); ?></a>
            <div class="media-body">
               <a href="<?php echo get_permalink($item['ID']) ?>" title="<?php echo $item["post_title"]; ?>">
                  <h3><?php echo $item["post_title"]; ?></h3>
               </a>
               <p><?php echo $item["post_date"]; ?></p>
            </div>
          </div>
          <?php endforeach; wp_reset_query(); ?>
      </aside>
      <?php endif; ?>
      <aside class="single_sidebar_widget tag_cloud_widget">
         <h4 class="widget_title">Từ khóa nổi bật</h4>
         <?php the_tags( '<ul class="list"><li>', '</li><li>', '</li></ul>' ); ?>
      </aside>
   </div>
</div>