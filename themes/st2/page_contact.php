<?php
/**
 * Template Name: Contact
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SimpleTruth2.0
 */

get_header(); ?>

    <header class="page-header">
        <div class="inner">
            <h1 class="page-header__title">Let's talk</h1>

    </header>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="contact-wrapper">
                <div class="contact-partner">
					<?php
					//image sizes
					$size  = 'full'; // (thumbnail, medium, large, full or custom size)
					$user  = get_field( 'partner' );
					$id    = $user['ID'];
					$image = get_field( 'picture', 'user_' . $id );
					$title = get_field( 'job_title', 'user_' . $id );
					$email = $user['user_email'];

					$img_src    = wp_get_attachment_image_url( $image, $size );
					$img_srcset = wp_get_attachment_image_srcset( $image, $size );
					?>
                    <div class="partner-picture">
                        <img src="<?php echo esc_url( $img_src ); ?>"
                             srcset="<?php echo esc_attr( $img_srcset ); ?>"
                             sizes="(max-width: 800px) 50vw,(max-width: 1140px) 33.33vw, (min-width: 1140px) 25vw, 1024px"
                             alt="<?php echo $user['display_name']; ?>">
                    </div>
                    <div class="partner-details">
                        <h2><?php echo $user['display_name']; ?></h2>
                        <p class="title"><?php echo $title; ?></p>

                        <p><span class="label">Email</span><?php echo $email; ?></p>
                        <p><span class="label">Office</span>+1 (312) 477 3453</p>
                        <a class="contact__cta" href="mailto:<?php echo $email; ?>">
                            <span class="client__cta button">Email <?php echo $user['user_firstname']; ?></span>
                        </a>


                    </div>
                </div>
                <div class="contact-st">
                    <address class="vcard">
                        <span class="fn org" style="display: none;">Simple Truth</span>
                        <span class="adr">
                            <h2>Address</h2>
    <span class="street-address">314 West Superior Street</span>
 <div class="extended-address">Suite 300</div>
    <span class="locality">Chicago</span>,
    <span class="region">Illinois</span>
    <span class="postal-code">60654</span>
  </span>
                    </address>
                    <div class="secondary-contact">
                    <span class="tel">
 <span class="type">Phone</span>
			<span class="value mobile-number">
				<a href="tel:+1-312-376-0360">+1 (312) 376-0360</a>
				</span>
				<span class="value desktop-number">+1 (312) 376-0360
				</span>
			</span>
                        <span class="tel">
 <span class="type">Fax</span>
			<span class="value">+1 (312) 376-0366</span>
			</span>
                        <span class="email">
 <span class="type">Email</span>
                            <span class="value"><a
                                        href="mailto:info@yoursimpletruth.com">info@yoursimpletruth.com</a></span>
			</span>
                    </div>
                    <div class="job-link">
                    </div>
                </div>
            </div>

            <div class="contact-map">
                <a target="_blank" href="https://www.google.com/maps/place/Simple+Truth/@41.8958535,-87.6387918,17z/data=!4m5!3m4!1s0x880fd34acdc5335b:0x12b74081aff4c384!8m2!3d41.8958535!4d-87.6365978"><img
                            src="<?php echo get_stylesheet_directory_uri(); ?>/img/mini-st-entry.png">
                    <p>Open in google maps</p></a>

            </div>

        </main>
        <div class="contact-newsletter">
            <div class="wrapper">
                <h2>Sign up for our quarterly updates</h2>
			    <?php echo do_shortcode( '[mc4wp_form id="1282"]' ); ?>
            </div>
        </div>
        <!-- #main -->
        <script>
            $(document).ready(function () {
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    // run our other content here
                    $('.contact-st').addClass('is-phone');
                }
            })
        </script>
    </div>
<?php
get_footer(); ?>
    </div>
    <!-- #primary -->


