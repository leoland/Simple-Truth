<?php
/**
* Template Name: Blog
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SimpleTruth2.0
 */

get_header(); ?>
	<header class="blog__intro page-header">
		<div class="inner">
			<h1><a href="<?php echo home_url( '/blog' ); ?>">Truth Talk</a></h1>
		</div>

	</header>
	<div class="blog__categories">

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
	'taxonomy'           => 'category',
	'walker'             => null
    );
				?>

			<input type="checkbox" id="checkbox_toggle">
			<label class="categories__label" for="checkbox_toggle">
				<span><?php single_cat_title(); ?></span>
			</label>
			<ul>
				<?php   wp_list_categories( $args ); 
?>
			</ul>
	</div>
	<!-- End of categories dropdown-->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<?php if ( ! post_password_required() ) { ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<a class='link-all' href="<?php the_permalink();?>" rel="bookmark">
						</a>
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
									<!--
									<div class="entry-content">
										<?php //the_excerpt();
//wp_trim_excerpt(); 
						?>
									</div>
									<!-- .entry-content -->
					</a>
						<div class="entry-meta">
							<?php /* st2_full_meta();*/ ?>
							<span class="cat-links">
				<?php the_category( ', ' ) ?>
				</span>
						</div>
					<!-- .entry-meta -->
					</div>
				</article>
					<?php };?>
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
get_footer();
