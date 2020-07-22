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

function is_mobile()
{
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
      return true;
    }
    return false;
}