<?php
/**
 * Template Name: Author
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SimpleTruth2.0
 */

get_header(); ?>
	<header class="clients__intro page-header">
		<div class="inner">

			<h1><?php the_author() ?></h1>
			<?php $id = get_the_author_meta( 'ID' ); ?>
			<p>Find out more about <a
					href="<?php echo site_url() . '/people/?user_id=' . $id; ?>"><?php the_author_meta( 'first_name' ) ?></a>.
			</p>


		</div>
	</header>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<?php if ( ! post_password_required() ) { ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<a class='link-all' href="<?php the_permalink(); ?>" rel="bookmark">
						</a>
						<?php if ( get_the_post_thumbnail() ): ?>
							<div class="featured-image">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>
						<div class="post-wrapper">
							<header class="entry-header">
								<a href="<?php the_permalink(); ?>" rel="bookmark">
									<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
								</a>
								<div class="entry-subtitle">
									<?php the_field( 'post_subtitle' );
									?>
								</div>
							</header>
							<!-- .entry-header -->

							<!--<div class="entry-content">
								<?php //the_excerpt();
								//wp_trim_excerpt();
								?>
							</div>
							<!-- .entry-content -->
							<div class="entry-meta">
								<?php /* st2_full_meta();*/ ?>
								<span class="cat-links">
				<?php the_category( ', ' ) ?>
				</span>
							</div>
							<!-- .entry-meta -->
						</div>
					</article>
				<?php }; ?>
				<!-- #post-## -->

				<?php // If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>


			<?php endwhile; // End of the loop.?>

			<?php if ( get_previous_posts_link() || get_next_posts_link() ) : ?>
				<div class="feed-pagination">
					<?php
					if ( get_previous_posts_link() ) :?><span
						class="newer"><?php previous_posts_link( 'Newer posts' ); ?></span>
					<?php endif;
					if ( get_next_posts_link() ) : ?><span
						class="older"><?php next_posts_link( 'Older posts' ); ?></span>
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
