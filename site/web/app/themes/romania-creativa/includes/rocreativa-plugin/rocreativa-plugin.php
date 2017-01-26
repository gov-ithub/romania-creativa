<?php
/*
 * Plugin Name: RoCreativă plugin
 * Plugin URI: https://rocreativa.ro
 * Description: Functionality for rocreativa.ro website.
 * Version: 0.1
 * Author: GovITHub
 * Author URI: http://ithub.gov.ro/
 * Text Domain: rocreativa-plugin
 * Domain Path: /languages
 */

// Plugin activation & deactivation
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );

register_activation_hook( __FILE__, 'myplugin_flush_rewrites' );
function myplugin_flush_rewrites() {
	rocreativa_plugin_register_post_types();
	flush_rewrite_rules();
}

// Register Custom Post Type
function rocreativa_plugin_register_post_types() {

	// Case study post type
	$labels = array(
		'name'                  => _x( 'Case Studies', 'Post Type General Name', 'rocreativa-plugin' ),
		'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'rocreativa-plugin' ),
		'menu_name'             => __( 'Case Studies', 'rocreativa-plugin' ),
		'name_admin_bar'        => __( 'Case Study', 'rocreativa-plugin' ),
		'archives'              => __( 'Case Study Archives', 'rocreativa-plugin' ),
		'attributes'            => __( 'Case Study Attributes', 'rocreativa-plugin' ),
		'parent_item_colon'     => __( 'Parent Case Study:', 'rocreativa-plugin' ),
		'all_items'             => __( 'All Case Studies', 'rocreativa-plugin' ),
		'add_new_item'          => __( 'Add New Case Study', 'rocreativa-plugin' ),
		'add_new'               => __( 'Add New', 'rocreativa-plugin' ),
		'new_item'              => __( 'New Case Study', 'rocreativa-plugin' ),
		'edit_item'             => __( 'Edit Case Study', 'rocreativa-plugin' ),
		'update_item'           => __( 'Update Case Study', 'rocreativa-plugin' ),
		'view_item'             => __( 'View Case Study', 'rocreativa-plugin' ),
		'view_items'            => __( 'View Case Studies', 'rocreativa-plugin' ),
		'search_items'          => __( 'Search Case Study', 'rocreativa-plugin' ),
		'not_found'             => __( 'Not found', 'rocreativa-plugin' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'rocreativa-plugin' ),
		'featured_image'        => __( 'Featured Image', 'rocreativa-plugin' ),
		'set_featured_image'    => __( 'Set featured image', 'rocreativa-plugin' ),
		'remove_featured_image' => __( 'Remove featured image', 'rocreativa-plugin' ),
		'use_featured_image'    => __( 'Use as featured image', 'rocreativa-plugin' ),
		'insert_into_item'      => __( 'Insert into case study', 'rocreativa-plugin' ),
		'uploaded_to_this_item' => __( 'Uploaded to this case study', 'rocreativa-plugin' ),
		'items_list'            => __( 'Case Studies list', 'rocreativa-plugin' ),
		'items_list_navigation' => __( 'Case Studies list navigation', 'rocreativa-plugin' ),
		'filter_items_list'     => __( 'Filter case studies list', 'rocreativa-plugin' ),
	);
	$rewrite = array(
		'slug'                  => 'case-studies',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Case Study', 'rocreativa-plugin' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-lightbulb',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'case_study', $args );

	// Contact post type
	$labels = array(
		'name'                  => _x( 'Contacts', 'Post Type General Name', 'rocreativa-plugin' ),
		'singular_name'         => _x( 'Contact', 'Post Type Singular Name', 'rocreativa-plugin' ),
		'menu_name'             => __( 'Contacts', 'rocreativa-plugin' ),
		'name_admin_bar'        => __( 'Contact', 'rocreativa-plugin' ),
		'archives'              => __( 'Contact Archives', 'rocreativa-plugin' ),
		'attributes'            => __( 'Contact Attributes', 'rocreativa-plugin' ),
		'parent_item_colon'     => __( 'Parent Contact:', 'rocreativa-plugin' ),
		'all_items'             => __( 'All Contacts', 'rocreativa-plugin' ),
		'add_new_item'          => __( 'Add New Contact', 'rocreativa-plugin' ),
		'add_new'               => __( 'Add New', 'rocreativa-plugin' ),
		'new_item'              => __( 'New Contact', 'rocreativa-plugin' ),
		'edit_item'             => __( 'Edit Contact', 'rocreativa-plugin' ),
		'update_item'           => __( 'Update Contact', 'rocreativa-plugin' ),
		'view_item'             => __( 'View Contact', 'rocreativa-plugin' ),
		'view_items'            => __( 'View Contacts', 'rocreativa-plugin' ),
		'search_items'          => __( 'Search Contact', 'rocreativa-plugin' ),
		'not_found'             => __( 'Not found', 'rocreativa-plugin' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'rocreativa-plugin' ),
		'featured_image'        => __( 'Featured Image', 'rocreativa-plugin' ),
		'set_featured_image'    => __( 'Set featured image', 'rocreativa-plugin' ),
		'remove_featured_image' => __( 'Remove featured image', 'rocreativa-plugin' ),
		'use_featured_image'    => __( 'Use as featured image', 'rocreativa-plugin' ),
		'insert_into_item'      => __( 'Insert into contact', 'rocreativa-plugin' ),
		'uploaded_to_this_item' => __( 'Uploaded to this contact', 'rocreativa-plugin' ),
		'items_list'            => __( 'Contacts list', 'rocreativa-plugin' ),
		'items_list_navigation' => __( 'Contacts list navigation', 'rocreativa-plugin' ),
		'filter_items_list'     => __( 'Filter contacts list', 'rocreativa-plugin' ),
	);
	$rewrite = array(
		'slug'                  => 'contacts',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Contact', 'rocreativa-plugin' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-email',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'contact', $args );

	// Fact post type
	$labels = array(
		'name'                  => _x( 'Facts', 'Post Type General Name', 'rocreativa-plugin' ),
		'singular_name'         => _x( 'Fact', 'Post Type Singular Name', 'rocreativa-plugin' ),
		'menu_name'             => __( 'Facts', 'rocreativa-plugin' ),
		'name_admin_bar'        => __( 'Contact', 'rocreativa-plugin' ),
		'archives'              => __( 'Fact Archives', 'rocreativa-plugin' ),
		'attributes'            => __( 'Fact Attributes', 'rocreativa-plugin' ),
		'parent_item_colon'     => __( 'Parent Fact:', 'rocreativa-plugin' ),
		'all_items'             => __( 'All Facts', 'rocreativa-plugin' ),
		'add_new_item'          => __( 'Add New Fact', 'rocreativa-plugin' ),
		'add_new'               => __( 'Add New', 'rocreativa-plugin' ),
		'new_item'              => __( 'New Fact', 'rocreativa-plugin' ),
		'edit_item'             => __( 'Edit Fact', 'rocreativa-plugin' ),
		'update_item'           => __( 'Update Fact', 'rocreativa-plugin' ),
		'view_item'             => __( 'View Fact', 'rocreativa-plugin' ),
		'view_items'            => __( 'View Facts', 'rocreativa-plugin' ),
		'search_items'          => __( 'Search Fact', 'rocreativa-plugin' ),
		'not_found'             => __( 'Not found', 'rocreativa-plugin' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'rocreativa-plugin' ),
		'featured_image'        => __( 'Featured Image', 'rocreativa-plugin' ),
		'set_featured_image'    => __( 'Set featured image', 'rocreativa-plugin' ),
		'remove_featured_image' => __( 'Remove featured image', 'rocreativa-plugin' ),
		'use_featured_image'    => __( 'Use as featured image', 'rocreativa-plugin' ),
		'insert_into_item'      => __( 'Insert into contact', 'rocreativa-plugin' ),
		'uploaded_to_this_item' => __( 'Uploaded to this fact', 'rocreativa-plugin' ),
		'items_list'            => __( 'Facts list', 'rocreativa-plugin' ),
		'items_list_navigation' => __( 'Facts list navigation', 'rocreativa-plugin' ),
		'filter_items_list'     => __( 'Filter facts list', 'rocreativa-plugin' ),
	);
	$rewrite = array(
		'slug'                  => 'facts',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Fact', 'rocreativa-plugin' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-info',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'fact', $args );

	// Add category taxonomy for events
	register_taxonomy_for_object_type( 'category', 'event' );

}
add_action( 'init', 'rocreativa_plugin_register_post_types', 10 );