<?php
/**
 * idc_blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package idc_blog
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'idc_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function idc_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on idc_blog, use a find and replace
		 * to change 'idc_blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'idc_blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'idc_blog' ),
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
		add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'idc_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function idc_blog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'idc_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'idc_blog_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function idc_blog_scripts() {
	wp_enqueue_style( 'idc_blog-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_script('idc_blog-jquery', get_template_directory_uri().'/js/jquery-3.2.1.min.js', array(), _S_VERSION );
	wp_enqueue_script('idc_blog-bootstrap', get_template_directory_uri().'/js/bootstrap.bundle.min.js', array(), _S_VERSION );
	wp_enqueue_script('jquery.ajaxchimp', get_template_directory_uri().'/js/jquery.ajaxchimp.min.js', array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'idc_blog_scripts' );

if ( !function_exists( 'wp_get_cat_postcount' ) ) {
	function wp_get_cat_postcount($id) {
	    $cat = get_category($id);
	    $count = (int) $cat->count;
	    $taxonomy = 'category';
	    $args = array(
	        'child_of' => $id,
	    );
	    $tax_terms = get_terms($taxonomy,$args);
	    foreach ($tax_terms as $tax_term) {
	        $count +=$tax_term->count;
	    }

	    return $count;
	}
}


if ( ! function_exists( 'twentyten_comment' ) ) :

function twentyten_comment( $comment, $args, $depth ) {
    ?>
    <div class="comment-list <?php comment_class(); ?>" id="li-comment-<?php comment_ID() ?>">
      <div class="single-comment justify-content-between d-flex">
         <div class="user justify-content-between d-flex">
            <div class="thumb">
               <?php echo get_avatar($comment,$size='80'); ?>
            </div>
            <div class="desc">
               <p class="comment"><?php comment_text(); ?></p>
               <?php if ( $comment->comment_approved == '0' ) : ?>
                <em><?php _e( 'Bình luận của bạn đang chờ kiểm duyệt.', 'twentyten' ); ?></em>
	                <br />
	            <?php endif; ?>
               <div class="d-flex justify-content-between">
                  <div class="d-flex align-items-center">
                     <h5>
                        <a href="#"><?php echo get_comment_author(); ?></a>
                     </h5>
                     <p class="date"><?php printf(/* translators: 1: date and time(s). */ esc_html__('%1$s lúc %2$s' , '5balloons_theme'), get_comment_date(),  get_comment_time()) ?></p>
                  </div>
                  <div class="reply-btn">
                  	<a href="#" class="btn-reply text-uppercase"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

<?php } endif; ?>
