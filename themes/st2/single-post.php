<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SimpleTruth2.0
 */

get_header(); ?>
<header class="page-header entry-header">
	<div class="inner">
		<h1><a href="<?php echo home_url( '/blog' ); ?>">Truth Talk</a></h1>
	</div>
</header>

<div class="'inner-wrapper">
	<div class='sticky-holder'>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) :
				the_post(); ?>
				<div class="post_header">

					<?php
					$image = get_field( 'single_post_featured_image' );
					$size  = 'large'; // (thumbnail, medium, large, full or custom size)
					if ( $image ) :
						echo wp_get_attachment_image( $image, $size );
					else : the_post_thumbnail();
					endif; ?>

					<div class="post-title--wrapper">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<p>
							<?php the_field( 'post_subtitle' ); ?>
						</p>
					</div>
				</div>
				<div class="entry-meta">
					<?php st2_authors(); ?>
				</div>


				<!-- .entry-header -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<!-- .entry-header -->

					<div class="entry-content">
						<?php
						the_content();
						?>
					</div>
					<!-- .entry-content -->

					<footer class="entry-footer">
						<?php $coauthors = get_coauthors();
						foreach ( $coauthors as $coauthor ) {
							$author_id = $coauthor->ID;
							$fname     = get_the_author_meta( 'first_name', $author_id );
							$lname     = get_the_author_meta( 'last_name', $author_id );
							$size      = 'sq_thumbnail';
							$image     = get_field( 'picture', 'user_' . $author_id );

							$img_src = wp_get_attachment_image_url( $image, $size );
							?>
							<div class="post-author">
								<a href="<?php echo get_author_posts_url( $author_id ); ?>">
									<div class="post-author--inner">
										<img class="author-picture" src="<?php echo esc_url( $img_src ); ?>"/>
										<div class="entry-footer-inner">


											<h2 class="author-name">

												<?php echo trim( "$fname $lname" ); ?>

											</h2>


											<p class="author-job">
												<?php the_field( 'job_title', 'user_' . $author_id ); ?>
											</p>
										</div>
									</div>
								</a>
							</div>

						<?php };

						//						categories meta
						?>
						<?php st2_posted(); ?>


					</footer>
					<!-- .entry-footer -->
				</article>

			</main>

			<!-- #main -->
		</div>
		<?php get_sidebar( 'primary' ); ?>
	</div>

	<div class="other-posts">
		<h1 class="other-posts--title">You might also like...</h1>
		<?php $post_objects = get_field( 'related_posts' );
		if ( $post_objects ) : ?>
			<?php foreach ( $post_objects as $post ): // variable must be called $post (IMPORTANT)
				setup_postdata( $post );
				$post_type = get_post_type( $post->ID ); //check which post type it is to determine which content to show.
				?>
				<div class="other-post">
					<a href="<?php the_permalink(); ?>">
						<?php if ( 'clients' == $post_type ): ?>
							<div class='other-post-thumb shadow'>
								<?php
								$image = get_field( 'thumbnail_image' );
								$size  = 'sq_thumbnail'; // (thumbnail, medium, large, full or custom size)
								if ( $image ) :
									echo wp_get_attachment_image( $image, $size );
								endif; ?>
							</div>
							<div class="other-post-inner client">
								<p class="client__intro">
									<?php the_field( 'client_intro_sentence' ); ?>
								</p>
								<h1 class="client__name">    <?php the_title(); ?></h1>
							</div>

						<?php elseif ( 'post' == $post_type ): ?>
							<div class="other-post-thumb shadow">
								<?php echo get_the_post_thumbnail( $post->ID, 'sq_thumbnail' ); ?>
							</div>
							<div class="other-post-inner article">
								<h1><?php echo get_the_title( $post->ID ); ?></h1>
								<p><?php the_field( 'post_subtitle' ); ?></p>
							</div>
						<?php endif; ?>

					</a>
				</div>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
		endif;
		?>

		<div class="contact-cta">
			<a href="/contact">
				<div class="other-post-inner contact">
					<div class="centering-wrapper">
						<h1>Let's chat</h1>
						<p>Whether You're looking to build a great brand or a great career, we're here.</p>
					</div>
				</div>
		</div>
		</a>

		<?php
		endwhile; // End of the loop.
		?>
	</div>

	<!-- #primary -->
</div>

<?php
get_footer();

?>

<script>
	$("#mc4wp_form_widget-2").stick_in_parent({
		parent: ".sticky-holder",
		bottoming: true
	});
	$("#a2a_share_save_widget-2").stick_in_parent({
		parent: ".sticky-holder",
		bottoming: true,
		offset_top: 180,
	});

	$(document.body).trigger("sticky_kit:recalc");
	//
	//some JS

	/*


	 window.onresize = function () {
	 var content = document.querySelector('.entry-content'),
	 newsletter = document.querySelector('.widget_mc4wp_form_widget'),
	 sidebar = document.querySelector('#secondary'),
	 social = document.querySelector('.widget widget_a2a_share_save_widget');
	 if
	 (window.innerWidth <=
	 800
	 ) {
	 content.appendChild(newsletter);
	 }
	 ;
	 if (window.innerWidth > 800) {
	 sidebar.insertBefore(newsletter, social);
	 }
	 }

	 window.onresize();

	 */

</script>