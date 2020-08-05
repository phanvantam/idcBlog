<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package idc_blog
 */

get_header();
?>
<!--================ Banner SM Section start =================-->
  <section class="custom-banner" style="margin-bottom: 40px;">
    <?php dynamic_sidebar( 'sidebar-4' ); ?>
  </section>
  <!--================ Banner SM Section end =================-->
<!--================ Post Section start =================-->
<section class="slider-posts">
	<div class="container posts">
		<div class="owl-carousel owl-theme">
			<?php foreach(get_random() as $item): ?>
			<div>
				<div class="card-service text-center" style="background:#fff; padding:0 0;">
					<a title="<?php echo $item["title"]; ?>" href="<?php echo $item["link"]; ?>" class="service-icon">
						<img src="<?php echo $item["img"]["url"]; ?>" style="width:100%;" alt="<?php echo $item["img"]["alt"]; ?>">
					</a>
					<div style="padding:0 20px 35px; text-align:left;">
						<h5><a href="<?php echo $item["link"]; ?>" title="<?php echo $item["title"]; ?>"><?php echo $item["title"]; ?></a></h5>
						<p><?php echo $item["excerpt"]; ?></p>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!--================ Post Section end =================-->

<?php
get_template_part('template-parts/page-list');
get_footer();