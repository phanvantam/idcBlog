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
        <div class="col-xl-6 col-sm-6 mb-4 mb-xl-0">
        <form class="form-contact contact_form" action="<?php echo API_SUBMIT_CONTACTS; ?>" method="post" id="contactForm" novalidate="novalidate">
           <div class="row">
            <div class="col-sm-6">
                 <div class="form-group">
                    <input class="form-control" name="fullname" type="text" placeholder="Họ & Tên">
                    <p class="text-danger fullname-error"></p>
                 </div>
              </div>
              <div class="col-sm-6">
                 <div class="form-group">
                    <input class="form-control" name="email" type="email" placeholder="Địa chỉ Email">
                    <p class="text-danger email-error"></p>
                 </div>
              </div>
              <div class="col-12">
                 <div class="form-group">
                    <textarea class="form-control w-100" name="message" cols="30" rows="9" placeholder="Nội dung"></textarea>
                    <p class="text-danger message-error"></p>
                 </div>
              </div>
              
           </div>
           <div id="captcha-contacts"></div>
            <p class="text-danger captcha_code-error"></p>
           <div class="form-group mt-lg-3">
              <button type="submit" onclick="return validation_captcha()" class="button button-contactForm">Gửi thông tin</button>
           </div>
        </form>
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
<script type="text/javascript">
  var onloadCallback = function() {
    grecaptcha.render('captcha-contacts', {
          'sitekey' : '<?php echo CAPTCHA_SITE_KEY; ?>'
        });
  };
  function validation_captcha() {
        if (grecaptcha.getResponse().length == 0) {
            alert('Vui lòng chọn "Tôi không phải là người máy".');
            return false;
        }
        $(".message-error").text('');
        $(".title-error").text('');
        $(".fullname-error").text('');
        $(".email-error").text('');
        $(".captcha_code-error").text('');
        $.ajax({
          url: $("#contactForm").attr("action"),
          type: 'post',
          dataType: 'json',
          data: $("#contactForm").serialize(),
          success: function(result) {
            if('errors' in result) {
              if('message' in result.errors)
                $(".message-error").text(result.errors.message);
              if('title' in result.errors)
                $(".title-error").text(result.errors.title);
              if('fullname' in result.errors)
                $(".fullname-error").text(result.errors.fullname);
              if('email' in result.errors)
                $(".email-error").text(result.errors.email);
              if('captcha_code' in result.errors) 
                $(".captcha_code-error").text(result.errors.captcha_code);
            } else if(result.success == 1) {
              alert("Tin nhắn của bạn đã được gửi đến bộ phận chuyên trách");
            }
          }
        });
        return false;
    }
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
    var Tawk_API=Tawk_API||{},Tawk_LoadStart=new Date();(function(){var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];s1.async=true;s1.src='https://embed.tawk.to/5423d8fad788df513200062b/default';s1.charset='UTF-8';s1.setAttribute('crossorigin','*');s0.parentNode.insertBefore(s1,s0);})();
  </script>
  <!--End of Tawk.to Script-->
</body>
</html>k.to/5423d8fad788df513200062b/default';s1.charset='UTF-8';s1.setAttribute('crossorigin','*');s0.parentNode.insertBefore(s1,s0);})();
  </script>
  <!--End of Tawk.to Script-->
</body>
</html>