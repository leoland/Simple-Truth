<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SimpleTruth2.0
 */

get_header(); ?>


	<header class="page-header">
		<div class="inner">
			<h1 class="people__title"><?php the_field( 'big_sentence' ); ?></h1>
			<?php the_field( 'little_sentence' ); ?>
		</div>

	</header>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="partners">
				<h2 class="partners__title">Partners</h2>

				<?php
				// WP_User_Query arguments
				$args = array(
					'fields'   => 'all_with_meta',
					'orderby'  => 'meta_value',
					'meta_key' => 'last_name',
				);

				// The User Query
				$user_query = new WP_User_Query( $args );

				// The User Loop
				if ( ! empty( $user_query->results ) ) {
					?>
					<ul class="team__list">
						<?php
						foreach ( $user_query->results as $user ) {
							$id = $user->ID;
							if ( get_field( 'is_partner', 'user_' . $id ) && get_field( 'show', 'user_' . $id ) ) {
								?>
								<li class="team__teammate team__partner teammate-<?php echo $id ?>">
									<a onclick="return false;"
									   href="<?php echo site_url() . '/people/?user_id=' . $id ?>">
										<h3 class="teammate__name"> <?php echo $user->display_name; ?> </h3>

										<img src="<?php the_field( 'picture', 'user_' . $id ); ?>"
										     alt="Picture of <?php echo $user->display_name; ?>"
										     class="teammate__picture--1"/>

									</a>

									<div class='teammate__full'>
										<div class='teammate__full-inner'>
											<img src="<?php the_field( 'picture_2', 'user_' . $id ); ?>"
											     alt="Alternative Picture of <?php echo $user->display_name; ?>"
											     class="teammate__picture--2"/>
											<img src="<?php the_field( 'picture', 'user_' . $id ); ?>"
											     alt="Picture of <?php echo $user->display_name; ?>"
											     class="teammate__picture--1"/>


											<div class='teammate__name-title-wrapper'>
												<div class='teammate__name-title'>
													<h2 class="single-teammate__name"> <?php echo $user->display_name; ?> </h2>

													<p class="single-teammate__job-title">
														<?php the_field( 'job_title', 'user_' . $id ); ?>
													</p>
													<?php if ( get_field( 'linkedin_url', 'user_' . $id ) ) { ?>
														<a class="teammate__linkedin" target='_blank'
														   href="<?php the_field( 'linkedin_url', 'user_' . $id ); ?> ">
															<?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/linkedin.svg' ); ?>
														</a>

													<?php } ?>
												</div>

											</div>

											<div class="single-teammate__info">
												<div class="single-teammate__info-wrapper">
													<div class="single-teammate__info-inner">

														<p class="single-teammate__anthem">
															<?php the_field( 'anthem', 'user_' . $id ); ?>
														</p>
														<div class="single-teammate__description">
															<?php if ( get_field( 'is_partner', 'user_' . $id ) ) {
																the_field( 'partner_description', 'user_' . $id );
															} else {
																the_field( 'description', 'user_' . $id );
															} ?>
														</div>


													</div>
												</div>
												<span class="close-button"></span>
											</div>


										</div>
									</div>

								</li>
								<?php
							}

						}
						?>
						<li class="partners__blurb">
							<a onclick="return false;" href="<?php echo site_url() . '?p=417' ?>">
								<img src="<?php echo get_stylesheet_directory_uri() . '/img/blurb-bg.png'; ?>">
							</a>
							<div class="partners__blurb-wrapper">
								<div class="partners__blurb--inner-wrapper">
									<div class="partners__blurb--inner">

										<div class='partners__blurb--teaser'>
											<h3 class="partners__blurb--title"><?php the_field( 'partners_title' ); ?></h3>
											<?php the_field( 'partners_blurb_teaser' ); ?>
										</div>
									</div>
								</div>
							</div>

							<div class="partners__blurb--full-wrapper">
								<div class="partners__blurb--full-inner">
									<div class='partners__blurb--full'>
										<h3 class="partners__blurb--title"><?php the_field( 'partners_title' ); ?></h3>
										<?php the_field( 'partners_blurb' ); ?>
										<span class="close-button"></span>
									</div>
								</div>
							</div>


						</li>
					</ul>
					<?php
				} else {
					// no users found
				}
				?>


			</div>
			<div class="team">
				<h2 class="team__title">Team</h2>

				<?php


				// The User Loop
				if ( ! empty( $user_query->results ) ) {
					?>
					<ul class="team__list">
						<?php
						foreach ( $user_query->results as $user ) {
							$id = $user->ID;
							if ( ! get_field( 'is_partner', 'user_' . $id ) && get_field( 'show', 'user_' . $id ) ) {
								?>
								<li class="team__teammate">

									<a onclick="return false;"
									   href="<?php echo site_url() . '/people/?user_id=' . $id ?>">
										<h3 class="teammate__name"> <?php echo $user->display_name; ?> </h3>

										<img src="<?php if ( get_field( 'picture', 'user_' . $id ) ) {
											the_field( 'picture', 'user_' . $id );
										}
										//else {echo'http://placehold.it/1078x1024/E9E9E9/E9E9E9';};
										?>" alt="Picture of <?php echo $user->display_name; ?>"
										     class="teammate__picture--1"/>

									</a>

									<div class='teammate__full'>
										<div class='teammate__full-inner'>
											<img src="<?php the_field( 'picture_2', 'user_' . $id ); ?>"
											     alt="Alternative Picture of <?php echo $user->display_name; ?>"
											     class="teammate__picture--2"/>
											<img src="<?php the_field( 'picture', 'user_' . $id ); ?>"
											     alt="Picture of <?php echo $user->display_name; ?>"
											     class="teammate__picture--1"/>


											<div class='teammate__name-title-wrapper'>
												<div class='teammate__name-title'>
													<h2 class="single-teammate__name"> <?php echo $user->display_name; ?> </h2>

													<p class="single-teammate__job-title">
														<?php the_field( 'job_title', 'user_' . $id ); ?>
													</p>
													<?php if ( get_field( 'linkedin_url', 'user_' . $id ) ) { ?>
														<a class="teammate__linkedin" target="_blank"
														   href="<?php the_field( 'linkedin_url', 'user_' . $id ); ?> ">
															<?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/linkedin.svg' ); ?>
														</a>

													<?php } ?>
												</div>

											</div>

											<div class="single-teammate__info">
												<div class="single-teammate__info-wrapper">
													<div class="single-teammate__info-inner">

														<p class="single-teammate__anthem">
															<?php the_field( 'anthem', 'user_' . $id ); ?>
														</p>
														<div class="single-teammate__description">
															<?php if ( get_field( 'is_partner', 'user_' . $id ) ) {
																the_field( 'partner_description', 'user_' . $id );
															} else {
																the_field( 'description', 'user_' . $id );
															} ?>
														</div>


													</div>
												</div>
												<span class="close-button"></span>
											</div>


										</div>
									</div>


								</li>
								<?php
							}

						}
						?>
					</ul>
					<?php
				} else {
					// no users found
				}
				?>

			</div>

		</main>
		<div class="outro">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


				<?php the_content(); ?>

			<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<!-- #main -->
	</div>
	<!-- #primary -->
	<script>
		//var selector = 'li.team__teammate';

		$('.team__list li').not('.active').on('click', function (event) {
			$('.team__list li').removeClass('active');
			$(this).addClass('active');
			console.log('open');
		});


		$('.team__list li .close-button').click(function (event) {

			$(this).closest('.team__list li').removeClass('active');
			event.stopPropagation();
		});

		$(".team__list .teammate__full").on('click', function (event) {
			console.log('close');
			$(this).closest('.team__list li').removeClass('active');
			event.stopPropagation();
		});

		$(".team__list .partners__blurb--full-wrapper").on('click', function (event) {
			console.log('close');
			$(this).closest('.team__list li').removeClass('active');
			event.stopPropagation();
		});


	</script>
<?php
get_footer();
