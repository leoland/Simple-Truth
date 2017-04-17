<?php
/**
 * The template for displaying archive pages.
 * Not in use, only around for reference
 *
¯\_(ツ)_/¯
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SimpleTruth2.0
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<a href="<?php the_permalink();?>" rel="bookmark">
						<?php if( get_the_post_thumbnail() ):?>
							<div class="featured-image">
								<?php the_post_thumbnail(); ?>
							</div>
							<?php endif; ?>

								<div class="post-wrapper">
									<header class="entry-header">
										<?php the_title( '<h2 class="entry-title">', '</h2>' );?>

											<div class="entry-subtitle">
												<?php	the_field('post_subtitle');
								 ?>
											</div>
									</header>
									<!-- .entry-header -->

									<div class="entry-content">
										<?php the_excerpt();
//wp_trim_excerpt(); 
						?>
									</div>
									<!-- .entry-content -->
					</a>
					<div class="entry-meta">
						<?php st2_full_meta(); ?>
					</div>
					<!-- .entry-meta -->
					</div>
				</article>
				<!-- #post-## -->

				<?php	// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
?>


					<?php	endwhile; // End of the loop.?>

						<?php if( get_previous_posts_link() || get_next_posts_link()  ) :?>
							<div class="feed-pagination">
								<?php 
						if( get_previous_posts_link() ) :?><span class="newer"><?php previous_posts_link( 'Newer posts'); ?></span>
									<?php endif;
						if( get_next_posts_link() ) : ?><span class="older"><?php next_posts_link( 'Older posts');?></span>
										<?php endif; 
						?>
							</div>
							<?php endif; ?>



		</main>
		<!-- #main -->
	</div>
	<!-- #primary -->

	<?php
get_sidebar();
get_footer();
