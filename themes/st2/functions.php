<?php
/**
 * SimpleTruth2.0 functions and definitions.
 * 
 * This file will be cleaned up before live as there are various unneeded calls.
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SimpleTruth2.0
 */

if ( ! function_exists( 'st2_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function st2_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on SimpleTruth2.0, use a find and replace
	 * to change 'st2' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'st2', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	
	/*
	 * 
	 * Add multiple image sizes for Simple Truth
	 * 
	 */
	
	update_option('large_size_w', 1024);
	update_option('large_size_h', 1024);
	update_option('medium_size_W', 800);
	update_option('medium_size_h', 800);
	add_image_size( 'small', 400 , 400);
	add_image_size( 'sq_thumbnail', 150, 	150, true); 
	update_option('thumbnail_size_w', 280);
	update_option('thumbnail_size_h', 280);



	//adds fancy responsive images to specific templates



	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'st2' ),
		'footer' => esc_html__( 'Footer', 'st2' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
*/
	// Set up the WordPress core custom background feature.
	
}
endif;
add_action( 'after_setup_theme', 'st2_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function st2_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'st2_content_width', 640 );
}
add_action( 'after_setup_theme', 'st2_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function st2_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'st2' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'st2_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function st2_scripts() {
	wp_enqueue_style( 'st2-style', get_stylesheet_uri() );

	wp_enqueue_script( 'st2-navigation', get_template_directory_uri() . '/js/min/navigation-min.js', array(), '20120206', true );
	
	wp_enqueue_script( 'st2-nav-slider', get_template_directory_uri() . '/js/min/nav-min.js', array(), '1', true );

	wp_enqueue_script( 'froogaloop','https://f.vimeocdn.com/js/froogaloop2.min.js', array(), '1', true );


	
	wp_enqueue_script( 'st2-skip-link-focus-fix', get_template_directory_uri() . '/js/min/skip-link-focus-fix-min.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if (is_front_page() || is_home()) {
			//wp_enqueue_script( 'withinviewport', get_template_directory_uri() . '/js/withinviewport.js', array('jquery'), true );

		//wp_enqueue_script( 'jquery.withinviewport', get_template_directory_uri() . '/js/jquery.withinviewport.js', array('jquery'), true );	


			//wp_enqueue_script( 'jquery.color', get_template_directory_uri() . '/js/jquery.color.js', array('jquery'), true );
		//	wp_enqueue_script( 'jquery.scrollTo', '//cdn.jsdelivr.net/jquery.scrollto/2.1.2/jquery.scrollTo.min.js', array('jquery'), true );



			}
		//wp_enqueue_script( 'jquery.pin', get_template_directory_uri() . '/js/jquery.pin.js', array('jquery'), true );

	wp_enqueue_script( 'jquery.sticky-kit.min.js', get_template_directory_uri() . '/js/min/jquery.sticky-kit.min.js', true );
	
}
add_action( 'wp_enqueue_scripts', 'st2_scripts' );

add_action( 'wp_enqueue_scripts', 'register_jquery' );
function register_jquery() {
    if (!is_admin() && $GLOBALS['pagenow'] != 'wp-login.php') {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', false, '1.11.2');
        wp_enqueue_script('jquery');
    }
}


/*
 * responsive video
 */


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*
 * custom loop for client taxonomy page
 */
function st2_capability_archive_display ( $query ) {
    if (is_tax('capability')){
         
    $query->set( 'orderby', 'title' );
    $query->set( 'posts_per_page', '-1' );
    $query->set( 'order', 'ASC' );
			 }
	
// print_r($query);die();
}

add_action( 'pre_get_posts', 'st2_capability_archive_display' );


/*
add_filter( 'wp_trim_excerpt', 'my_custom_excerpt', 10, 2 );
 
function my_custom_excerpt($text, $raw_excerpt) {
    if( ! $raw_excerpt ) {
			$content = apply_filters( 'the_content', strip_shortcodes( get_the_content() ) );
        $text = substr( $content, 0, strpos( $content, '</p>' ) + 4 );
    }
	$text = preg_replace("/<img[^>]+\>/i", "", $text);
    return $text;
}*/

function new_excerpt_more( $more ) {
	return '...';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );

function wpdocs_custom_excerpt_length( $length ) {
	return 25;
}

add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


function prefix_reset_metabox_positions(){
  delete_user_meta( 1, 'meta-box-order_post' );
  delete_user_meta( 1, 'meta-box-order_page' );
  delete_user_meta( 1, 'meta-box-order_custom_post_type' );
}
add_action( 'admin_init', 'prefix_reset_metabox_positions' );




add_action( 'init', 'st_add_editor_styles' );
/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function st_add_editor_styles() {

    add_editor_style( get_stylesheet_uri() );

}
add_action( 'pre_get_posts', 'st_exclude_password_protected_posts' );
function st_exclude_password_protected_posts( $query ) {
	if ( ! $query->is_singular() && ! is_admin() ) {
		$query->set( 'has_password', false );
	}
}


/*
 * Adds the ability to change classes to pages twith the appropiate custom field
 */


add_filter('body_class','color_field_body_class');

function color_field_body_class( $classes ) {
	global $wp_query;
	$postid = $wp_query->post->ID;
	$color = get_field('color_scheme', $postid);
	/*
	 *
	 if ( $color ) {

	}
	*/
	if (is_home()){
		$latest = get_posts("post_type=post&numberposts=1");
		$postid = $latest[0]->ID;
		$color = get_field('color_scheme', $postid);
	}
	switch ($color){
		case 'ST Orange':
			$classes[] = 'orange';
			break;
		case 'ST Green':
			$classes[] = 'green';
			break;
		case 'ST Teal':
			$classes[] = 'teal';
			break;
		case 'ST Light Blue':
			$classes[] = 'cyan';
			break;
		case 'ST Dark Blue':
			$classes[] = 'blue';
			break;
		case 'ST Purple':
			$classes[] = 'purple';
			break;
		case 'ST Magenta':
			$classes[] = 'magenta';
			break;
		case 'ST Red':
			$classes[] = 'red';
			break;
	}
	// return the $classes array
	return $classes;
}
