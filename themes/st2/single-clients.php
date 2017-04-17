<?php
/**
 * The template for displaying Single clients.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SimpleTruth2.0
 */

get_header(); ?>


	<header class="client__colored-block page-header" style="background: url('<?php the_field('colored_image'); ?>') center / cover;">
		<div class="inner">

			<h1 class="client__colored-block--organization"><?php the_title();?></h1>
			<p class="client__colored-block--intro" <?php if( get_field( 'dark_text') ) { echo 'Style= "color: #333f48;"'; } ?>>
				<?php	echo get_field( 'client_intro_sentence' ); ?>
			</p>

			<?php echo get_field( 'client_intro_text' ); ?>
				<style>
					<?php if( get_field('dark_text')) {
						echo '.inner p { color: #333f48 !important; }';
					}
					
					?>

				</style>

		</div>
	</header>
	<div id="primary" class="content-area">
		<div class="client__capability">
			<?php 
				if (the_terms( $post->ID, 'capability',' ', ' ' ))
				?>
		</div>
		<?php if (post_password_required() ) {
		the_content();
		} ?>
		<?php if ( ! post_password_required() ) { ?>
		<main id="main" class="site-main" role="main">


			<?php




				if( have_rows('slider') ): $a = 0;
	// loop through rows (parent repeater)
			
					while( have_rows('slider') ): the_row(); $a++;?>
				<div class="client__section client__section-<?php echo $a?>">
					<?php ?>
						<h3><?php the_sub_field('slider_title'); ?></h3>
						<?php the_sub_field('slider_intro_text'); ?>
							<?php 

							// check for slides
					$slides = count(get_sub_field('slide'));
							if( have_rows('slide') ): $b = 0;
				
	
					
					?>

								<div class="slider <?php if($slides >1) {echo 'swiper-container swiper-container-'.$a;} ?>">
									<ul class="slider swiper-wrapper">
										<?php
								// loop through slides
								while( have_rows('slide') ): the_row(); $b++;
										
										
									if (get_sub_field('slide_type') == 'Image'){ ?>
											<li class="slide slide__image swiper-slide">
												<?php
        									// display a sub field value
													$image = get_sub_field('large_image');
													$size = 'full'; // (thumbnail, medium, large, full or custom size)
              						
											if( $image ) {
                echo wp_get_attachment_image( $image, $size );
              }

	 } 

	elseif (get_sub_field('slide_type') == 'Video'){
			?>
													<li class="slide slide__video swiper-slide">
														<div class='embed-container' style="background: <?php the_sub_field('video_background_color')?> url(<?php the_sub_field('video_background_image')?>) no-repeat; background-position: center; background-size: cover; ">

															<?php

// get iframe HTML
$iframe = get_sub_field('vimeo_url');


// use preg_match to find iframe src
preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];


// add extra params to iframe src
$params = array(
    'api'    => 1,
);

$new_src = add_query_arg($params, $src);

$iframe = str_replace($src, $new_src, $iframe);



// echo $iframe
echo $iframe;

?>


																<!--<?php the_sub_field('vimeo_url'); ?>-->
														</div>
														<?php }
	elseif (get_sub_field('slide_type') == 'Statement'){
			?>
															<li class="slide slide__statement swiper-slide">


																<div class='statement__wrapper'>
																	<div class='statement__inner' style='color: <?php the_sub_field(' text_color '); ?>'</div>
																		<?php the_sub_field('statement_text'); ?>
																	</div>
																</div>
																<?php
		 $image = get_sub_field('statement_image');
              $size = 'full'; // (thumbnail, medium, large, full or custom size)
 
              if( $image ) {
                echo wp_get_attachment_image( $image, $size );
              }
		
   
	 };if (get_sub_field('slide_type') != 'Statement'){
									if (get_sub_field('caption')):?>
																	<div class="slide__caption--wrapper">
																		<div class="slide__caption  <?php echo 'section-'.$a.'-'.$b.' '; the_sub_field('caption_position');?>" style="color:<?php the_sub_field('text_color');?>;">
																			<style>
																				.slide__caption.section-<?php echo $a.'-'.$b;
																				?> a {
																					color: <?php the_sub_field('text_color');
																					?>;
																					border-bottom-color: <?php the_sub_field('text_color');
																					?>;
																				}

																			</style>
																			<p class="">
																				<?php the_sub_field('caption'); ?>
																			</p>
																		</div>
																	</div>
																	<?php endif;}
										if (!get_sub_field('caption')):?>
																		<div class='no-caption'></div>
																		<?php endif;

		?>
															</li>
															<?php endwhile; ?>


																<?php endif; //if( get_sub_field('items') ): ?>
									</ul>

									<!-- If we need navigation buttons -->
									<div class="custom-pagination">
										<div class="swiper-button-prev"></div>
										<div class="swiper-pagination"></div>
										<div class="swiper-button-next"></div>
									</div>




									<!-- If we need scrollbar 
    <div class="swiper-scrollbar"></div>
-->
								</div>


								<?php
			 if (get_sub_field('quote_text')){ ?>

									<div class='quote'>
										<div class='quote-text'>
											<?php the_sub_field('quote_text'); ?>
										</div>
										<p class='quotee'>
											<?php the_sub_field('quotes_source'); ?>
										</p>
									<?php if (get_sub_field('quotees_title')){ ?>
										<p class='quotee-job'>
											 <?php the_sub_field('quotees_title');?>
												<?php if (get_sub_field('quotees_company')){?>, <?php the_sub_field('quotees_company');?><?php }?>
										</p>
										<?php }?>
									</div>

									<?php }?>
				</div>
				<?php endwhile;
				 endif; 

?>

					<?php	$post_objects = get_field('other_clients');

if( $post_objects ){ ?>
						<div class="more-clients">
							<h1>More client stories</h1>
							<ul class="more-clients__list">
								<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
									<?php setup_postdata($post); ?>
										<li class="more-client">
											<a href="<?php the_permalink(); ?>">
												<div class='shadow'>
												<?php		
              $image = get_field('thumbnail_image');
              $size = 'sq_thumbnail'; // (thumbnail, medium, large, full or custom size)
 
              if( $image ) {
                echo wp_get_attachment_image( $image, $size );
              }
									?>
													</div>
													<div class="stuff">
														<p class="client__intro">
															<?php the_field('client_intro_sentence'); ?>
														</p>
														<h1 class="client__name">	<?php the_title(); ?></h1>
													</div>
											</a>

										</li>
										<?php endforeach; ?>
							</ul>
						</div>
						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
				 };
		?>

		</main>
		<!-- #main -->
	</div>
	<!-- #primary -->

	<?php
$i =1;
	while( $i <=  $a):?>
		<script>
			function pauseAll() {
				$('iframe[src*="vimeo.com"]').each(function() {
					$f(this).api('pause');
					console.log('pause attempt')
				});
			}

			$(document).ready(function() {
				var mySwiper_<?php echo $i; ?> = new Swiper('.swiper-container-<?php echo $i; ?>', {
					// Optional parameters
					direction: 'horizontal',
					loop: true,
					speed: 500,
					//effect: 'fade',
					lazyloading: true,
					all1: true,
					autoplayDisableOnInteraction: true,
					//	autoHeight: true,
					setWrapperSize: false,

					loopedSlides: 0,
					//
					//these guys could come in handy.
					watchSlidesProgress: true,
					watchSlidesVisibility: true,
					autoplay: 0,
					// If we need pagination
					pagination: '.swiper-pagination',

					paginationType: 'fraction',
					paginationFractionRender: function(swiper, currentClassName, totalClassName) {
						return '<span class="' + currentClassName + '"></span>' +
							'/' +
							'<span class="' + totalClassName + '"></span>';
					},

					// Navigation arrows
					nextButton: '.swiper-button-next',
					prevButton: '.swiper-button-prev',
					onTransitionStart: function() {
						pauseAll();

					},


					// And if we need scrollbar

					//	onTransitionEnd: function(){
					//		if($(window).width() >= 800) {
					//			$('.slide .slide__caption').animate({opacity: '1'});
					//		}
					//	if($(window).width() <= 800) {
					//	console.log('event');

					//	$('.slide .slide__caption').animate({opacity: '0'});
					//	$('.swiper-slide-active .slide__caption').animate({opacity: '1'},200);

					//		}},

				}); // end swiper

				$('.swiper-container').on('mouseover', function() {
					// mySwiper_<?php echo $i; ?>.stopAutoplay();
				});
				$('.swiper-container').on('mouseout', function() {
					//  mySwiper_<?php echo $i; ?>.startAutoplay();
				});
				// do something with this slideActiveClass and video



			}); //doc ready end

		</script>

		<?php
$i++;
endwhile;?>
				<script>
				var tall = 0;
				$(window).on("load resize", function(e) {
					if ($(window).width() < 99999) {
tall = $('#main').width() * .60533333333333;
$('.embed-container').animate({height: tall},0);}});
			</script>


			<?php
};
get_footer();
