<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package idc_blog
 */

?>

	  <!-- ================ start footer Area ================= -->
  <footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<?php 
						dynamic_sidebar( 'sidebar-1' ); 
						$custom_logo_id = get_theme_mod( 'custom_logo' );
			            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					?>
					<a class="navbar-brand logo_h d-none d-xl-block" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo $image[0];?>" alt="">
					</a>
				</div>
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
				<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4><?php echo wp_get_nav_menu_name('menu-2'); ?></h4>
					<?php
		              wp_nav_menu( array(
		               'theme_location' => 'menu-2',
		               'container' => '',
		               'container_class' => '',
		               'menu_class' => '',
		               'link_class'        => '',
		               'list_item_class'   => ''
		              ) );
		             ?>
				</div>
				<div class="offset-xl-1 col-xl-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					
		          <?php dynamic_sidebar( 'sidebar-3' ); ?>
		          
		          <div class="form-wrap" id="mc_embed_signup">
		            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
		            method="get">
		              <div class="input-group">
		                <input type="email" class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '">
		                <div class="input-group-append">
		                  <button class="btn click-btn" type="submit">
		                    <i class="ti-arrow-right"></i>
		                  </button>
		                </div>
		              </div>
		              <div style="position: absolute; left: -5000px;">
										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
									</div>

									<div class="info"></div>
		            </form>
		          </div>
          
				</div>
			</div>
			<div class="footer-bottom row align-items-center text-center text-lg-left">
				<p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				<div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
					<a href="#"><i class="ti-facebook"></i></a>
					<a href="#"><i class="ti-twitter-alt"></i></a>
					<a href="#"><i class="ti-dribbble"></i></a>
					<a href="#"><i class="ti-linkedin"></i></a>
				</div>
			</div>
		</div>
	</footer>
  <!-- ================ End footer Area ================= -->

  <?php wp_enqueue_script('main', get_template_directory_uri().'/js/main.js'); ?>
  
<?php wp_footer(); ?>

</body>
</html>