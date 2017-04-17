<?php
/**
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SimpleTruth2.0
 */

get_header(); ?>


	<header class="clients__intro page-header">
		<div class="inner">
			<h1><?php the_field( 'big_intro', 6 ); ?> </h1>
			<?php the_field( 'intro_paragraph', 6 );


			?>

		</div>
	</header>
	<div id="primary" class="content-area">
		<div class="client__capabilities">

			<?php
			$args = array(
				'show_option_all'  => 'All',
				'orderby'          => 'title',
				'order'            => 'asc',
				'style'            => 'list',
				'feed'             => '',
				'feed_type'        => '',
				'feed_image'       => '',
				'exclude'          => '',
				'exclude_tree'     => '',
				'include'          => '',
				'hierarchical'     => 1,
				'title_li'         => null,
				'show_option_none' => __( '' ),
				'number'           => null,
				'echo'             => 1,
				'depth'            => 0,
				'current_category' => 0,
				'pad_counts'       => 0,
				'taxonomy'         => 'capability',
				'walker'           => null,
			);
			?>

			<input type="checkbox" id="checkbox_toggle">
			<label class="capabilities__label" for="checkbox_toggle"><span class="sort-by">Sort by: </span><span>All
					<?php single_cat_title(); ?></span>
			</label>
			<ul>
				<?php wp_list_categories( $args );
				?>
			</ul>
		</div>
		<main id="main" class="site-main" role="main">

			<div class="clients__featured">


				<?php

				// args for featured client loop
				$args = array(
					'posts_per_page' => 3,
					'post_type'      => 'clients',
					'meta_key'       => 'featured_client',
					'meta_value'     => true,
					'orderby'        => 'menu_order',
					'order'          => 'asc',
					'has_password' => false,
				);


				// query
				$the_query = new WP_Query( $args );

				?>
				<?php if ( $the_query->have_posts() ): ?>
					<ul class="clients__featured-list">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<li class="featured-client">
								<a href="<?php the_permalink(); ?>">
									<div class="featured-client__info">
										<div class="info-container">
											<h1 class="featured-client__name"><?php the_title(); ?></h1>
											<p class="featured-client__intro">
												<?php the_field( 'client_intro_sentence' ); ?>
											</p>


											<div class="client__tags">
												<?php

												if ( get_the_terms( $post->id, 'capability' ) ) {
													$terms = get_the_terms( $post->id, 'capability' );

													$output = "";

													//If there are any terms associated with the $post_id
													if ( count( $terms ) > 0 ) {
														$output .= "<ul>";
														foreach ( $terms as $term ) {
															$output .= "<li class='client__tag'>" . $term->name;
															$output .= "</li>";
														}
														$output .= "</ul>";
														echo $output;
													}
												} ?>
											</div>

										</div>
									</div>
									<div class="featured-client__image-container"
									     style="background-image: url(<?php the_field( 'featured_image' ) ?>)"></div>

								</a>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>

				<?php wp_reset_query();     // Restore global post data stomped by the_post(). ?>


			</div>
			<!--clients__featured-->
			<div class="clients__not-featured">


				<?php

				// args for featured client loop
				$args      = null;
				$the_query = null;
				$args      = array(

					'post_type'        => 'clients',
					'meta_key'         => 'featured_client',
					'meta_value'       => 0,
					'posts_per_page'   => - 1,
					'suppress_filters' => true,
					'has_password' => false,
				);


				// query
				$the_query = new WP_Query( $args );

				?>
				<?php if ( $the_query->have_posts() ): ?>
					<ul class="clients__not-featured-list">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<li class="not-featured-client">
								<a href="<?php the_permalink(); ?>">
									<div class='shadow'>
										<?php
										$image = get_field( 'thumbnail_image' );
										$size  = 'sq_thumbnail'; // (thumbnail, medium, large, full or custom size)

										if ( $image ) {
											echo wp_get_attachment_image( $image, $size );
										}
										?>


									</div>
									<div class="stuff">
										<p class="not-featured-client__intro">
											<?php the_field( 'client_intro_sentence' ); ?>
										</p>
										<h1 class="not-featured-client__name"><?php the_title(); ?></h1>


									</div>


								</a>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>

				<?php wp_reset_query();     // Restore global post data stomped by the_post(). ?>


			</div>
			<!--clients__not-featured-->


		</main>
		<!-- #main -->
	</div>
	<!-- #primary -->

<?php
get_footer();
