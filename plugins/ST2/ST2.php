<?php
/**
 * Plugin Name:       Simple Truth 2.0 Functionality
 * Description:       This plugin houses the non theme specific functionality of the site.
 * Version:           1.0.0
 * Author:            Leoland
 * Author URI:        http://twitter.com/leoland
 */


// Register Custom Post Type
function st2_clients() {

	$labels = array(
		'name'                  => 'Clients',
		'singular_name'         => 'Client',
		'menu_name'             => 'Clients',
		'name_admin_bar'        => 'Client',
		'archives'              => 'Client Archives',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Clients',
		'add_new_item'          => 'Add New Client',
		'add_new'               => 'Add New',
		'new_item'              => 'New Client',
		'edit_item'             => 'Edit Client',
		'update_item'           => 'Update Client',
		'view_item'             => 'View Client',
		'search_items'          => 'Search Clients',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
		$rewrite = array(
		'slug'                  => 'clients',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => 'Client',
		'description'           => 'Simple Truth\'s Cients',
		'labels'                => $labels,
		'supports'              => array( 'title', 'revisions' ),
		'taxonomies'            => array( 'client_tags' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-businessman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite'               => $rewrite,
	);
	register_post_type( 'clients', $args );

}
add_action( 'init', 'st2_clients', 0 );

// Change title placeholder.

function st2_change_title_placeholder( $title ){
    $screen = get_current_screen();
    if ( 'clients' == $screen->post_type ){
        $title = 'Organization\'s Name';
    }
    return $title;
}
add_filter( 'enter_title_here', 'st2_change_title_placeholder' );




/*
 *  Taxonomy for clients
 */
// Register Custom Taxonomy
function capability() {

	$labels = array(
'name'              => _x( 'Capabilities', 'taxonomy general name' ),
		'singular_name'     => _x( 'Capability', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Capabilities' ),
		'all_items'         => __( 'All Capabilities' ),
		'parent_item'       => __( 'Parent Capability' ),
		'parent_item_colon' => __( 'Parent Capability:' ),
		'edit_item'         => __( 'Edit Capability' ),
		'update_item'       => __( 'Update Capability' ),
		'add_new_item'      => __( 'Add New Capability' ),
		'new_item_name'     => __( 'New Capability Name' ),
		'menu_name'         => __( 'Capabilities' ),
	);
	
	$rewrite = array(
		'slug'                       => 'capabilities',
		'with_front'                 => false,
		'hierarchical'               => false,
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'rewrite'               => $rewrite,
	);
	register_taxonomy( 'capability', array( 'clients' ), $args );

}
add_action( 'init', 'capability', 0 );



//remove the standard tagging functionality from blog posts

// Remove tags support from posts
function st2_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'st2_unregister_tags');



function add_query_vars($var) {
$var[] = "user_id"; // represents the name of the product category as shown in the URL
return $var;
}
 
// hook add_query_vars function into query_vars
add_filter('query_vars', 'add_query_vars');


function st2_url_rewrite_templates() {
 
    if ( get_query_var( 'user_id' )) {
        add_filter( 'template_include', function() {
            return get_template_directory() . '/single_people.php';
        });
    }
}
 
add_action( 'template_redirect', 'st2_url_rewrite_templates' );
