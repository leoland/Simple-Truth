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
			<div class="slider swiper-wrapper featured-client__wrapper">
				<div class="faux-header-wrapper">
					<div class="faux-header">
						<div class="inner">

							<h1><?php the_field('large_heading');?></h1>
							<?php the_field('front_text');?>

						</div>
					</div>
				</div>
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
								<span class='top-check'></span>

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

								<span class='bottom-check'></span>
							</div>
							<?php endwhile; ?>



			</div>
			<!--Featured Client Wrapper-->
			<div class="last-slide slide">
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

		</main>
		<!-- #main -->
	</div>

	<!-- #primary -->
	<script>
		
		$('.faux-header').pin({containerSelector: ".featured-client__wrapper",minWidth: 600});
		
$('#main').animate({backgroundColor: $('.slide').css('background-color')});
		
		$(window).resize(function(event) {
			
			var width = $('#content').width(); 
			$(".faux-header").width(width/2);
		}
		);
	</script>


	<script type="text/javascript">
		var lastScrollTop = 0;
		//	$(window).scroll(function(event) {
		$(window).bind('scroll load', function(event) {
			var st = $(this).scrollTop();
			if (st > lastScrollTop) {
				$('.slide:not(.active) .top-check')
					.withinviewport()
					.closest('.slide').addClass('active')
					.closest('.slide').siblings().removeClass('active')
					.trigger('classChange')
					

				console.log('top was seen')
			} else {
				$('.slide:not(.active) .bottom-check')
					.withinviewport()
					.closest('.slide').addClass('active')
					.closest('.slide').siblings().removeClass('active')
					.trigger('classChange')
				
				console.log('bottom was seen')
			}
			lastScrollTop = st;
		});

	$(window).bind('classChange', function() {
			$('html, body:not(.scrolling)')

			$('#main').animate({
						backgroundColor: $('.active').css('background-color')
					}, 1000);
			

			$('body').addClass('scrolling');
			setTimeout(function() {
				$('body').removeClass('scrolling');
			}, 200);

		});



	</script>


	<?php
get_footer();
