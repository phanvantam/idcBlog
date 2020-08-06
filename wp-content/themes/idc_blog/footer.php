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
				<div class="col-xl-6 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div>
			</div>
			<div class="footer-bottom row align-items-center text-center text-lg-left">
				<p class="footer-text m-0 col-lg-8 col-md-12">Copyright Colorlib ©2020 All rights reserved by IDC Online. <a href="https://idconline.vn/terms.html" target="_blank" rel="noopener">Chính sách dịch vụ </a><i class="ti-anchor"></i><a href="https://idconline.vn/privacy.html" target="_blank" rel="noopener"> Quy định sử dụng</a></p>
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

  <?php wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', false, _S_VERSION); ?>
  
<?php wp_footer(); ?>
  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
    var Tawk_API=Tawk_API||{},Tawk_LoadStart=new Date();(function(){var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];s1.async=true;s1.src='https://embed.tawk.to/5423d8fad788df513200062b/default';s1.charset='UTF-8';s1.setAttribute('crossorigin','*');s0.parentNode.insertBefore(s1,s0);})();
  </script>
  <!--End of Tawk.to Script-->
</body>
</html>