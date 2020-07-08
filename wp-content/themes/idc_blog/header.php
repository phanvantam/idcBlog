<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package idc_blog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_enqueue_style ('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css'); ?>
  <?php wp_enqueue_style ('themify-icons', get_template_directory_uri().'/css/themify-icons.css'); ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
  $current_user = wp_get_current_user();
  $is_login = $current_user->ID > 0;
?>
  <section class="top_header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="nav nav-pills pull-left">
                        <li><a href="tel:+842473006452"><i class="icon-call-out"></i> 024-7300-6452</a></li>
                        <li class="login_none"><a href="mailto:info@idconline.vn"><i class="ti-email"></i> info@ idconline.vn</a></li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <ul class="nav nav-pills pull-right">
                        <li class="chat_login_none"><a href="javascript:void(Tawk_API.toggle())"><i class="ti-comments"></i> Live Chat</a></li>
                        <?php if($is_login): ?>
                        <li class="login_none">
                          <a href="<?php echo get_logout_url(); ?>"><i class="ti-new-window"></i> Đăng xuất</a>
                        </li>
                        <li class="login_none">
                          <a href="/wp-admin"><i class="ti-user"></i> <?php printf( __( '%s', 'textdomain' ), esc_html( $current_user->display_name ) ); ?></a>
                        </li>
                        <?php else: ?>
                        <li class="login_none">
                          <a href="<?php echo get_register_url(); ?>"><i class="ti-new-window"></i> Đăng ký</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<!--================ Header Menu Area start =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <?php 
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
          ?>  
          <a class="navbar-brand logo_h" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo $image[0];?>" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <?php
              wp_nav_menu( array(
               'theme_location' => 'menu-1',
               'container' => '',
               'container_class' => '',
               'menu_class' => 'nav navbar-nav menu_nav justify-content-end',
               'link_class'        => 'nav-link',
               'list_item_class'   => 'nav-item'
              ) );
             ?>
              <?php
                if(!$is_login):
              ?>
              <div class="nav-right text-center text-lg-right py-4 py-lg-0">
                <a class="button button-outline button-small" href="<?php echo get_login_url(); ?>">Đăng nhập</a>
              </div>
              <?php endif; ?>
          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->