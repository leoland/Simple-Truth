<?php
/**
 * Template Name: Blog
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SimpleTruth2.0
 */

get_header(); ?>
	<header class=" page-header">
		<div class="inner">
			<h1><a href="<?php echo home_url( '/blog' ); ?>"><?php the_field( 'blog-header-title', 8 ); ?> </a></h1>
			<!--	Not used in comp for now	--><?php /*the_field( 'blog-header-subtitle', 8 );*/


			?>

		</div>
	</header>

<?php
if ( ! is_paged() ) {
	$latest_post = new WP_Query( "showposts=1" );
	if ( $latest_post->have_posts() ) :
		?>
		<div class="inner-wrapper">

		<?php
		while ( $latest_post->have_posts() ):
			$latest_post->the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'latest-post clearfix' ); ?>>
				<a class='link-all' href="<?php the_permalink(); ?>" rel="bookmark">
				</a>
				<a href="<?php the_permalink(); ?>" rel="bookmark">

					<?php if ( get_the_post_thumbnail() ): ?>
						<div class="featured-image">
							<?php the_post_thumbnail(); ?>
						</div>
					<?php endif; ?>

					<div class="post-wrapper">
						<header class="entry-header">
							<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

							<div class="entry-subtitle">
								<?php the_field( 'post_subtitle' );
								?>
							</div>
						</header>
						<!-- .entry-header -->

						<div class="entry-content">
							<?php
							the_excerpt();

							?>
						</div>
						<!-- .entry-content -->
				</a>
				<span class="cat-links">
				<?php the_category( ', ' ) ?>
				</span>
				<!-- .entry-meta -->

			</article></div>
			</article>
		<?php endwhile ?>

	<?php endif;
};

?>
	</div>
	<!--
	<div class="blog__categories">

		<?php
	/*		$args = array(
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
				'taxonomy'         => 'category',
				'walker'           => null
			);
			*/ ?>

		<input type="checkbox" id="checkbox_toggle">
		<label class="categories__label" for="checkbox_toggle"><span class="sort-by">Sort by: </span><span>latest
				<?php /*single_cat_title(); */ ?></span>
		</label>
		<ul>
			<?php /*wp_list_categories( $args );
			*/ ?>
		</ul>
	</div>-->
	<!-- End of categories dropdown-->
	<div class="inner-wrapper">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php

				//check to see if this is the first page of the archive

				$i = 0;
				while ( have_posts() ) :
				the_post();
				if ( ! is_paged() && $i == 0 ):
				else :
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<a class='link-all' href="<?php the_permalink(); ?>" rel="bookmark">
					</a>
					<a href="<?php the_permalink(); ?>" rel="bookmark">

						<?php if ( get_the_post_thumbnail() ): ?>
							<div class="featured-image">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>

						<div class="post-wrapper">
							<header class="entry-header">
								<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

								<div class="entry-subtitle">
									<?php the_field( 'post_subtitle' );
									?>
								</div>
							</header>
							<!-- .entry-header -->

							<!--	<div class="entry-content">
						<?php the_excerpt();
							?>
					</div>
					-->
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
		<!-- #post-## -->
		<?php endif; ?>


		<?php $i ++; ?>
		<?php endwhile; // End of the loop.?>

		<?php if ( get_previous_posts_link() || get_next_posts_link() ) : ?>
			<div class="feed-pagination">
				<?php
				if ( get_previous_posts_link() ) :?><span
					class="newer"><?php previous_posts_link( 'Newer posts' ); ?></span>
				<?php endif;
				if ( get_next_posts_link() ) : ?><span class="older"><?php next_posts_link( 'Older posts' ); ?></span>
				<?php endif;
				?>
			</div>
		<?php endif; ?>


		</main>
		<!-- #main -->
	</div>
	<!-- #primary -->
<?php get_sidebar( 'primary' );
?>

	<div class="clearfix"></div>
<?php
if ( get_previous_posts_link() || get_next_posts_link() ) : ?>
	<div class="feed-pagination feed-pagination-2 clearfix">
		<?php
		if ( get_previous_posts_link() ) :?><span class="newer"><?php previous_posts_link( 'Newer posts' ); ?></span>
		<?php endif;
		if ( get_next_posts_link() ) : ?><span class="older"><?php next_posts_link( 'Older posts' ); ?></span>
		<?php endif;
		?>
	</div>
<?php endif; ?>



<?php
get_footer();
?>

<script>
 $("#mc4wp_form_widget-2").stick_in_parent({
			parent: ".inner-wrapper",
			bottoming: true
		});
		$("#a2a_share_save_widget-2").stick_in_parent({
			parent: ".inner-wrapper",
			bottoming: true,
			offset_top: 180,
		});

	$(document.body).trigger("sticky_kit:recalc");
	</script>
