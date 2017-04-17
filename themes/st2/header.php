<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SimpleTruth2.0
 */

?>
	<!DOCTYPE html>
	<html lang='en' class='no-js'>
	<script>
		(function(H) {
			H.className = H.className.replace(/\bno-js\b/, 'js')
		})(document.documentElement)

	</script>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/fonts/fonts.css'?>">
		<?php echo '<![if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]>' . "\n"; ?>
			<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.css"> -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">

			<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.js"></script>-->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js"></script>
					<?php wp_head(); ?>
		
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/shame.css'?>">
		<!--[if gte IE 9]>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/ie9-and-up.css" />
<![endif]-->
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content">
				<?php esc_html_e( 'Skip to content', 'st2' ); ?>
			</a>

			<header id="site-header" class="site-header" role="banner">

				<a href="/" id="logo">
					<?php echo file_get_contents( get_stylesheet_directory_uri().'/img/simple-truth.svg'); ?>
				</a>
				<a href="#main-menu" class="menu-link">
					<?php echo file_get_contents( get_stylesheet_directory_uri().'/img/nav-icon.svg'); ?><span class="text">Menu</span></a>
			</header>
			<div id="main-navigation">
				<div id="city-logo"></div>
				<nav id="main-menu" class="main-navigation" role="navigation">
					<!--<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<?php esc_html_e( 'Primary Menu', 'st2' ); ?>
					</button>-->
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav>
				<!-- #site-navigation -->
				<nav id="contact-menu">
					<ul>
						<li><a href="/contact/">Contact</a></li>
					</ul>
				</nav>
			</div>

			<!-- #masthead -->

			<div id="wrapper">
				<div id="content" class="site-content">
