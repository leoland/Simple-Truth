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
			<p class="client__colored-block--intro">
				<?php	echo get_field( 'client_intro_sentence' ); ?>
			</p>
			<?php echo get_field( 'client_intro_text' ); ?>

		</div>
	</header>
	<div id="primary" class="content-area">
		<div class="client__capability">
			<?php 
				if (the_terms( $post->ID, 'capability',' ', ' ' ))
				?>
		</div>
		<main id="main" class="site-main" role="main">
	
			
		<?php		if( have_rows('slider') ): $a = 0; 
	// loop through rows (parent repeater)
					while( have_rows('slider') ): the_row(); $a++; ?>
					<div class="client__section">
						<h3><?php the_sub_field('slider_title'); ?></h3>
						<?php the_sub_field('slider_intro_text'); ?>
							<?php 

							// check for slides
							if( have_rows('slide') ): $b = 0;  ?>
								<ul class="slider">
									<?php
								// loop through slides
								while( have_rows('slide') ): the_row(); $a++;
								?>

										<?php
									if (get_sub_field('slide_type') == 'Image'){
										?>
											<li class="slide slide__image ">
												<?php
        // display a sub field value
							
              $image = get_sub_field('large_image');
              $size = 'full'; // (thumbnail, medium, large, full or custom size)
 
              if( $image ) {
                echo wp_get_attachment_image( $image, $size );
              }

	 } 
	elseif (get_sub_field('slide_type') == 'Quote'){
        // display a sub field value
			?>
													<li class="slide slide__quote ">
														<?php
		 echo 'Quote';
    
											?>
															<p>
																<?php the_sub_field('quote_text'); ?>
															</p>
															<p>
																<?php the_sub_field('quotes_source'); echo ' | '; the_sub_field('quotees_title'); echo ', '; the_sub_field('quotees_company');
		?>
															</p>


															<?php
		
	 }
	elseif (get_sub_field('slide_type') == 'Video'){
			?>
																<li class="slide slide__video ">

																	<?php
		 the_sub_field('vimeo_url');
   
	 }
	elseif (get_sub_field('slide_type') == 'Statement'){
			?>
																		<li class="slide slide__statement">
																			<?php
        // display a sub field value
		 the_sub_field('statement_text');
		 $image = get_sub_field('statement_image');
              $size = 'full'; // (thumbnail, medium, large, full or custom size)
 
              if( $image ) {
                echo wp_get_attachment_image( $image, $size );
              }
		
   
	 };
									if (get_sub_field('caption')):?>
																			<div class="slide__caption  <?php echo 'section-'.$a.'-'.$b.' '; the_sub_field('caption_position');?>" style="color:<?php the_sub_field('text_color');?> !important; ">
																				<style>
																					.slide__caption.section-<?php echo $a.'-'.$b;?> a {
																						color: <?php the_sub_field('text_color');?>;
																						border-bottom-color: <?php the_sub_field('text_color');?>;
																					}</style>
																				<p class="">
																					<?php the_sub_field('caption'); ?>
																				</p>
																			</div>
																				<?php endif;

		?>
																		</li>
																		<?php endwhile; ?>


																			<?php endif; //if( get_sub_field('items') ): ?>
								</ul>

<script>
						$(document).ready(function () {
    //initialize swiper when document ready  
    var mySwiper = new Swiper ('.swiper-container', {
      // Optional parameters
      direction: 'horizontal',
      loop: true
    })        
  });
						</script>
								<?php endwhile;


				 endif; ?>
					</div>
					<?php
		
		$post_objects = get_field('other_clients');

if( $post_objects ){ ?>
						<div class="more-clients">
							<h1>More client stories</h1>
							<ul class="more-clients__list">
								<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
									<?php setup_postdata($post); ?>
										<li class="more-client">
											<a href="<?php the_permalink(); ?>">
					<?php		
              $image = get_field('thumbnail_image');
              $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
 
              if( $image ) {
                echo wp_get_attachment_image( $image, $size );
              }
									?>
												<div class="stuff">
           <p class="client__intro"><?php the_field('client_intro_sentence'); ?></p>
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
get_footer();
