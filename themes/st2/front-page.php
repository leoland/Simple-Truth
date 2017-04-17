<?php
/**
 * The Front Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SimpleTruth2.0
 */

get_header(); ?>
	<header class="page-header">
		<div class="inner">

			<h1><?php the_field('large_heading');?></h1>
			<?php the_field('front_text');?>

		</div>
	</header>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="slider swiper-container featured-client__wrapper">
				<div class="faux-header-wrapper">
					<div class="faux-header">
						<div class="inner">

							<h1><?php the_field('large_heading');?></h1>
							<?php the_field('front_text');?>

						</div>
					</div>
				</div>
				<div class='swiper-wrapper'>

					<?php while( have_rows('featured_slide') ): the_row();?>
						<?php 
							if (get_sub_field('slide_text_color')){
	$text_color = get_sub_field('slide_text_color');
				 }
							 ?>
							<?php 
							if (get_sub_field('slide_color')){
	$slide_color = get_sub_field('slide_color');
				 }
							 ?>
								<div class="slide swiper-slide" style="background-color: <?php echo $slide_color; ?>; color: <?php echo $text_color; ?> ">




									<div class="home-slide-background-container" style="background: url(<?php the_sub_field('client_image')?>) no-repeat center center; -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
										<div class="slide-content">
											<h2 class="client__name" style="color: <?php echo $slide_color; ?> !important"><?php the_sub_field('client_name'); ?></h2>

											<p class="client__tag">
												<?php the_sub_field('project_tagline'); ?>
											</p>
											<a class="client__cta" href="<?php the_sub_field('button_target') ?>">
									<span class="client__cta button" style="border:2.5px solid <?php the_sub_field('slide_color') ?>; background-color: <?php the_sub_field('slide_color') ?>; "><?php the_sub_field('button_text') ?></span>
											</a>
										</div>
									</div>



								</div>
								<?php endwhile; ?>



									<div class="last-slide slide swiper-slide" style="height: 400px">
										<div class="last-slide-content">
											<h2><?php the_field('last_slide_title');?></h2>
											<?php the_field('last_slide_text');?>

												<div class="links">
													<?php while( have_rows('button') ): the_row();?>

														<a class="last-slide__cta button" href="<?php the_sub_field('button_target'); ?>">
															<?php the_sub_field('button_text'); ?>
														</a>



														<?php endwhile; ?>

												</div>

												<div class=" faux-footer site-footer" role="contentinfo">





													<nav class="social-menu">
														<ul>
				<li>
					<a target='_blank' href="https://www.linkedin.com/company/simple-truth">
						<?php echo file_get_contents( get_stylesheet_directory_uri().'/img/linkedin.svg'); ?>
					</a>
				</li>
				<li>
					<a  target='_blank' href="https://www.facebook.com/yoursimpletruth/">
						<?php echo file_get_contents( get_stylesheet_directory_uri().'/img/facebook.svg'); ?>
					</a>
				</li>
				<li>
					<a  target='_blank' href="https://twitter.com/yoursimpletruth">
						<?php echo file_get_contents( get_stylesheet_directory_uri().'/img/twitter.svg'); ?>
					</a>
				</li>
				<li>
					<a  target='_blank' href="https://www.pinterest.com/yoursimpletruth/">
						<?php echo file_get_contents( get_stylesheet_directory_uri().'/img/pinterest.svg'); ?>
					</a>
				</li>
			</ul>
													</nav>

													<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/wbenc.png" class="women-owned" width="66" height="29">
													<p class="copyright">&copy; <?php echo date('Y'); ?> Simple Truth Communication Partners. <span>All Rights Reserved.</span></p>
													<nav class="footer-menu footer-navigation" role="navigation">
														<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
													</nav>
													<!-- #site-navigation -->
												</div>
										</div>
									</div>
				</div>
				<div class="swiper-pagination"></div>


			</div>
			<!--Featured Client Wrapper-->

			<div class="slider mobile-only featured-client__wrapper">



				<?php while( have_rows('featured_slide') ): the_row();?>
					<?php 
							if (get_sub_field('slide_text_color')){
	$text_color = get_sub_field('slide_text_color');
				 }
							 ?>
						<?php 
							if (get_sub_field('slide_color')){
	$slide_color = get_sub_field('slide_color');
				 }
							 ?>
							<div class="slide " style="background-color: <?php echo $slide_color; ?>; color: <?php echo $text_color; ?> ">

								<a href="<?php the_sub_field('button_target') ?>">


								<div class="home-slide-background-container" style="background: url(<?php the_sub_field('client_image')?>) no-repeat center center; -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
									<div class="slide-content">
										<h2 class="client__name" style="color: <?php echo $slide_color; ?> "><?php the_sub_field('client_name'); ?></h2>

										<p class="client__tag">
											<?php the_sub_field('project_tagline'); ?>
										</p>
									<span class="client__cta button" style="border:2.5px solid <?php the_sub_field('slide_color') ?>; "><?php the_sub_field('button_text') ?></span>
									</div>
								</div>

</a>

							</div>
							<?php endwhile; ?>



								<div class="last-slide slide " style="height: 400px">
									<div class="last-slide-content">
										<h2><?php the_field('last_slide_title');?></h2>
										<?php the_field('last_slide_text');?>

											<div class="links">
												<?php while( have_rows('button') ): the_row();?>

													<a class="last-slide__cta button" href="<?php the_sub_field('button_target'); ?>">
														<?php the_sub_field('button_text'); ?>
													</a>



													<?php endwhile; ?>

											</div>

									</div>
								</div>



			</div>
		</main>
		<!-- #main -->
	</div>

	<!-- #primary -->




	<script>
		function injectStyles(color) {
			var div = $("<div />", {
				html: '&shy;<style> #main-navigation #main-menu ul li a:hover { color:' + color + '!important; } </style>'
			}).appendTo("body");
		}



		var mySwiper = new Swiper('.swiper-container', {
			// Optional parameters
			direction: 'vertical',
			autoHeight: true,
			loop: false,
			mousewheelControl: true,
			mousewheelReleaseOnEdges: true,
			// If we need pagination
			pagination: '.swiper-pagination',
			paginationClickable: true,
			speed: 1000,
			simulateTouch: false,
			loopedSlides: 0,
			onTransitionStart: function() {

				$('.swiper-pagination-bullet').animate({
					backgroundColor: 'white'
				});

				$('.swiper-pagination-bullet-active').animate({
					backgroundColor: 'transparent'
				});
				
				
					$('.swiper-pagination-bullet-active').attr('style', function() {
					return "border-color: " + $('.swiper-slide-active').css('background-color') + " !important;"
				});

				//	$('#main-navigation #main-menu ul li a, header#site-header a.menu-link svg *, #contact-menu ul li a').animate({color: 'white'});

				$('#site-header #logo svg *').attr('style', function() {
					return "fill:" + $('.swiper-slide-active').css('background-color') + " !important";
				});

				$('.page #main-navigation #main-menu .current_page_item a').attr('style', function() {
					return "color:" + $('.swiper-slide-active').css('background-color') + " !important";
				});

				
				
				$('.faux-header').attr('style', function() {
					return "background-color:" + $('.swiper-slide-active').css('background-color') + " !important";
				});

				//			$('.page-header, .swiper-pagination-bullet-active').animate({
				//					backgroundColor: $('.swiper-slide-active').css('background-color')
				//				}, 1000);
				var slide_color = $('.swiper-slide-active').css('background-color');
				injectStyles(slide_color);

			},
		});




			$('.swiper-pagination-bullet').animate({
					backgroundColor: 'white'
				});

				$('.swiper-pagination-bullet-active').animate({
					backgroundColor: 'transparent'
				});
				
				
					$('.swiper-pagination-bullet-active').attr('style', function() {
					return "border-color: " + $('.swiper-slide-active').css('background-color') + " !important;"
				});


		//	$('#main-navigation #main-menu ul li a, header#site-header a.menu-link svg *, #contact-menu ul li a').animate({color: 'white'});

		$('#site-header #logo svg *').attr('style', function() {
			return "fill:" + $('.swiper-slide-active').css('background-color') + " !important";
		});

		$('.page #main-navigation #main-menu .current_page_item a').attr('style', function() {
			return "color:" + $('.swiper-slide-active').css('background-color') + " !important";
		});

		$('.faux-header').attr('style', function() {
			return "background-color:" + $('.swiper-slide-active').css('background-color') + " !important";
		});

		//			$('.page-header, .swiper-pagination-bullet-active').animate({
		//					backgroundColor: $('.swiper-slide-active').css('background-color')
		//				}, 1000);
		var slide_color = $('.swiper-slide-active').css('background-color');
		injectStyles(slide_color);



		$(window).on("load resize scroll", function(e) {
			if ($(window).width() < 800) {
				$('#site-header #logo svg *').attr('style', 'fill: white !important');
				$('.page #main-navigation #main-menu .current_page_item a').attr('style', 'color: #78be20 !important');
				injectStyles('#78be20');
			}

		});

	</script>



	<?php
get_footer();
