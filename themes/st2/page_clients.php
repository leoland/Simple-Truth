<?php
/**
* Template Name: Clients
* 
 * This demplate is currently deprecated and exists for ACF to hook onto, styles howeever are picked up form the clients custom archive page. archive-clients.php
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SimpleTruth2.0
 */

get_header(); ?>

	
			<div class="clients__intro page-header">

				<h1><?php the_field('big_intro'); ?> </h1>
				<?php the_field('intro_paragraph');
				
				
			?>
			</div>
<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="client__tags">
				

				<?php 
    $args = array(
	'show_option_all'    => 'All',
	'orderby'            => 'count',
	'order'              => 'desc',
	'style'              => 'list',
	'feed'               => '',
	'feed_type'          => '',
	'feed_image'         => '',
	'exclude'            => '',
	'exclude_tree'       => '',
	'include'            => '',
	'hierarchical'       => 1,
	'title_li'           => null,
	'show_option_none'   => __( '' ),
	'number'             => null,
	'echo'               => 1,
	'depth'              => 0,
	'current_category'   => 0,
	'pad_counts'         => 0,
	'taxonomy'           => 'client_tags',
	'walker'             => null
    );
				?>
					<ul>
						<?php   wp_list_categories( $args ); 
?>
					</ul>
			</div>
			<div class="clients__featured">


				<?php 

// args for featured client loop
$args = array(
	'numberposts'	=> 3,
	'post_type'		=> 'clients',
	'meta_key'		=> 'featured_client',
	'meta_value'	=> true
);


// query
$the_query = new WP_Query( $args );

?>
					<?php if( $the_query->have_posts() ): ?>
						<ul>
							<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<li>
									<a href="<?php the_permalink(); ?>">
										<div class="stuff">
											<h1><?php the_title(); ?></h1>
											<?php the_field('client_intro_sentence'); ?>
									</a>
										
										<div class="client__tags">
		<?php 
				if (the_terms( $post->ID, 'client_tags','<ul><li>', '</li><li>', '</li></ul>' ));
				?>
	</div>
					
									</div>

									<a href="<?php the_permalink(); ?>">

					
								<?php		
              $image = get_field('featured_image');
              $size = 'medium'; // (thumbnail, medium, large, full or custom size)
 hello
              if( $image ) {
                echo wp_get_attachment_image( $image, $size );
              }
									?>	
									</a>

								</li>
								<?php endwhile; ?>
						</ul>
						<?php endif; ?>

							<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>


			</div> <!--clients__featured-->
				<div class="clients__not-featured">


				<?php 

// args for featured client loop
$args = array(
	'numberposts'	=> 6,
	'post_type'		=> 'clients',
	'meta_key'		=> 'featured_client',
	'meta_value'	=> 0
);


// query
$the_query = new WP_Query( $args );

?>
					<?php if( $the_query->have_posts() ): ?>
						<ul>
							<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<li>
									<a href="<?php the_permalink(); ?>">
										<div class="stuff">
											<h1><?php the_title(); ?></h1>
											<?php the_field('client_intro_sentence'); ?>
									
										
										
					
									</div>

									

					
								<?php		
              $image = get_field('thumbnail_image');
              $size = 'medium'; // (thumbnail, medium, large, full or custom size)
 
              if( $image ) {
                echo wp_get_attachment_image( $image, $size );
              }
									?>	
									</a>

								</li>
								<?php endwhile; ?>
						</ul>
						<?php endif; ?>

							<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>


			</div> <!--clients__not-featured-->


		</main>
		<!-- #main -->
	</div>
	<!-- #primary -->

	<?php
get_footer();
