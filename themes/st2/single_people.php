<?php
/**
* singl user page when there is no JS.
 */

get_header(); ?>


	<header class="page-header">
		<div class="inner">
			<h1 class="people__title"><?php the_field('big_sentence','7'); ?></h1>
			<?php the_field('little_sentence','7'); ?>
				<?php  $id = get_query_var( 'user_id');   ?>
					<?php $user = get_user_by('id', $id );  ?>
		</div>
	</header>

	<div id="primary" class="content-area">
		<main id="main" class="site-main single-teammate-main" role="main">


			<section class="single-teammate">
				<div class="single-teammate__picture">
					<?php

$image = get_field('picture', 'user_'.$id);
$size = 'medium'; // (thumbnail, medium, large, full or custom size)



?>

					<img class="single-teammate__picture-1" src="<?php if( $image ) {

						echo wp_get_attachment_image_url( $image, $size );

					} ?>" alt="Picture of <?php echo $user->display_name; ?>" />
					<?php if( get_field('linkedin_url', 'user_'.$id) ){ ?>
						<a class="teammate__linkedin" href="<?php the_field('linkedin_url', 'user_'.$id);?> "><?php echo file_get_contents( get_stylesheet_directory_uri().'/img/linkedin.svg'); ?></a>

						<?php } ?>
				</div>
				<div class="single-teammate__info">
				<div class="single-teammate__info-wrapper">
				<div class="single-teammate__info-inner">
					<h2 class="single-teammate__name"> <?php echo $user->display_name; ?> </h2>

					<p class="single-teammate__job-title">
						<?php the_field('job_title', 'user_'.$id); ?>
					</p>
					<p class="single-teammate__anthem">
						<?php the_field('anthem', 'user_'.$id); ?>
					</p>
					<div class="single-teammate__description">
						<?php if(get_field('is_partner','user_'.$id)){
	the_field('partner_description', 'user_'.$id);
}
						else{
							the_field('description', 'user_'.$id);
						}?>
					</div>

				</div>
				</div>
				</div>
				
			</section>
			

	</main>
		<div class="outro">
				<p>For more about us check out the rest of <a href="http://yoursimpletruth.com/people/">our people</a>.</p>
			</div>
	<!-- #main -->
	</div>
	<!-- #primary -->

	<?php
get_footer();
