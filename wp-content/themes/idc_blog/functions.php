<?php
/**
 * idc_blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package idc_blog
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('idc_blog_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function idc_blog_setup()
{
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on idc_blog, use a find and replace
         * to change 'idc_blog' to the name of your theme in all the template files.
         */
        load_theme_textdomain('idc_blog', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'idc_blog'),
                'menu-2' => esc_html__('Footer', 'idc_blog'),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'idc_blog_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'idc_blog_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function idc_blog_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('idc_blog_content_width', 640);
}
add_action('after_setup_theme', 'idc_blog_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function idc_blog_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('About Us', 'idc_blog'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'idc_blog'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__('Contact Info', 'idc_blog'),
            'id'            => 'sidebar-2',
            'description'   => esc_html__('Add widgets here.', 'idc_blog'),
            'before_widget' => '<div class="col-xl-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__('Newsletter', 'idc_blog'),
            'id'            => 'sidebar-3',
            'description'   => esc_html__('Add widgets here.', 'idc_blog'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
}
add_action('widgets_init', 'idc_blog_widgets_init');

/**
 * Enqueue scripts and styles.
 */

function prefix_add_footer_styles()
{
    wp_enqueue_style('idc_blog-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false);
    wp_enqueue_style('idc_blog-themify-icons', get_template_directory_uri() . '/css/themify-icons.css', false);
    wp_enqueue_style('idc_blog-style', get_stylesheet_uri(), false, _S_VERSION);
    wp_enqueue_script('idc_blog-jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', false, _S_VERSION);
    wp_enqueue_script('idc_blog-bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', false, _S_VERSION);
    wp_enqueue_script('jquery.ajaxchimp', get_template_directory_uri() . '/js/jquery.ajaxchimp.min.js', false, _S_VERSION);
};
add_action('get_footer', 'prefix_add_footer_styles');

if (!function_exists('wp_get_cat_postcount')) {
    function wp_get_cat_postcount($id)
    {
        $cat      = get_category($id);
        $count    = (int) $cat->count;
        $taxonomy = 'category';
        $args     = array(
            'child_of' => $id,
        );
        $tax_terms = get_terms($taxonomy, $args);
        foreach ($tax_terms as $tax_term) {
            $count += $tax_term->count;
        }

        return $count;
    }
}

if (!function_exists('twentyten_comment')):

    function twentyten_comment($comment, $args, $depth)
{
        ?>
	    <div <?php comment_class('comment-list');?> id="li-comment-<?php comment_ID()?>">
	      <div class="single-comment justify-content-between d-flex">
	         <div class="user justify-content-between d-flex">
	            <div class="thumb">
	               <?php echo get_avatar($comment, $size = '80'); ?>
	            </div>
	            <div class="desc">
	               <p class="comment"><?php comment_text();?></p>
	               <?php if ($comment->comment_approved == '0'): ?>
	                <em><?php _e('Bình luận của bạn đang chờ kiểm duyệt.', 'twentyten');?></em>
		                <br />
		            <?php endif;?>
               <div class="d-flex justify-content-between">
                  <div class="d-flex align-items-center">
                     <h5>
                        <a href="#"><?php echo get_comment_author(); ?></a>
                     </h5>
                     <p class="date"><?php printf( /* translators: 1: date and time(s). */esc_html__('%1$s lúc %2$s', '5balloons_theme'), get_comment_date(), get_comment_time())?></p>
                  </div>
                  <div class="reply-btn">
                  	<!-- <a href="#" class="btn-reply text-uppercase"></a> -->
                  	<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])))?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

<?php }endif;?>

<?php

/*Adding class to menu item - li tag */
function add_menu_list_item_class($classes, $item, $args)
{
    if ($args->list_item_class) {
        $classes[] = $args->list_item_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);

/*Adding class to link menu item - a tag */
function add_menu_link_class($atts, $item, $args)
{
    if ($args->link_class) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

if (!function_exists('get_register_url')) {
    function get_register_url($permalink = '')
    {
        $permalink = empty($permalink) ? get_permalink() : $permalink;
        return site_url('/wp-login.php?action=register&redirect_to=' . get_permalink());
    }
}

if (!function_exists('get_logout_url')) {
    function get_logout_url($permalink = '')
    {
        $permalink = empty($permalink) ? get_permalink() : $permalink;
        return site_url('/wp-login.php?action=logout&redirect_to=' . get_permalink());
    }
}

if (!function_exists('get_login_url')) {
    function get_login_url($permalink = '')
    {
        $permalink = empty($permalink) ? get_permalink() : $permalink;
        return site_url('/wp-login.php?redirect_to=' . get_permalink());
    }
}

// Lỗi reply cmt on seo
add_filter('wpseo_remove_reply_to_com', '__return_false');

// Hide admin bar
add_filter('show_admin_bar', '__return_false');

/*Lấy random post*/
add_action( 'rest_api_init', function () {
    register_rest_route( 'api', '/posts', array(
        'methods'   =>  'GET',
        'callback'  =>  'get_random',
    ) );
});
function get_random() {
    $result = get_posts( array( 'orderby' => 'rand', 'posts_per_page' => 6) );
    $respon = [];
    foreach ($result as $item) {
      $respon[] = [
        "title"=> $item->post_title,
        "excerpt"=> $item->post_excerpt,
        "link"=> esc_url(get_permalink($item)),
        "img"=> [
          "url"=> get_the_post_thumbnail_url($item, 'medium'),
          "alt"=> get_post_meta( get_post_thumbnail_id( $item->ID ), '_wp_attachment_image_alt', true)
        ]
      ];
    }
    return $respon;
}