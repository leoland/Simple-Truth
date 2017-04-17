<?php
/**
 *  Archive for the client-tags
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
				'walker'           => null
			);
			?>

			<input type="checkbox" id="checkbox_toggle">
			<label class="capabilities__label" for="checkbox_toggle">
				<span><?php single_cat_title(); ?></span>
			</label>
			<ul>
				<?php wp_list_categories( $args );
				?>
			</ul>
		</div>
		<main id="main" class="site-main" role="main">


			<?php
			//Define afunction to prepare custom query

			//Hook the function


			if ( have_posts() ) : ?>


			<div class="clients__not-featured">
				<ul class="clients__not-featured-list">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post(); ?>
						<?php if ( ! post_password_required() ) { ?>
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

							<?php
						};
					endwhile;

					//the_posts_navigation();


					endif; ?>


					<?php wp_reset_query();     // Restore global post data stomped by the_post(). ?>


			</div>
			<!--clients__not-featured-->


		</main>
		<!-- #main -->
	</div>
	<!-- #primary -->

<?php
get_footer();
