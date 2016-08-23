<?php
/**
 * POST TYPES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_post_type
 */

// Add your custom post types here...
// Register Custom Post Type
function novels() {

	$labels = array(
		'name'                  => _x( 'novels', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'novel', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Novels', 'text_domain' ),
		'name_admin_bar'        => __( 'Novels', 'text_domain' ),
		'archives'              => __( 'Novels Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Novels:', 'text_domain' ),
		'all_items'             => __( 'All Novels', 'text_domain' ),
		'add_new_item'          => __( 'Add New Novel', 'text_domain' ),
		'add_new'               => __( 'Add New Novel', 'text_domain' ),
		'new_item'              => __( 'New Novel', 'text_domain' ),
		'edit_item'             => __( 'Edit Novel', 'text_domain' ),
		'update_item'           => __( 'Update Novel', 'text_domain' ),
		'view_item'             => __( 'View Novel', 'text_domain' ),
		'search_items'          => __( 'Search Novel', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Novel', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Novel', 'text_domain' ),
		'items_list'            => __( 'Novels list', 'text_domain' ),
		'items_list_navigation' => __( 'Novels list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Novels list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'novel', 'text_domain' ),
		'description'           => __( 'List of published work', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'novels', $args );

}
add_action( 'init', 'novels', 0 );

// Register Custom Post Type
function current_info() {

	$labels = array(
		'name'                  => _x( 'Activities', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Activity', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Activity', 'text_domain' ),
		'name_admin_bar'        => __( 'Activity', 'text_domain' ),
		'archives'              => __( 'Activity Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Activity:', 'text_domain' ),
		'all_items'             => __( 'All Activities', 'text_domain' ),
		'add_new_item'          => __( 'Add New Activity', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Activity', 'text_domain' ),
		'edit_item'             => __( 'Edit Activity', 'text_domain' ),
		'update_item'           => __( 'Update Activity', 'text_domain' ),
		'view_item'             => __( 'View Activity', 'text_domain' ),
		'search_items'          => __( 'Search Activity', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Activity', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Activity', 'text_domain' ),
		'items_list'            => __( 'Activities list', 'text_domain' ),
		'items_list_navigation' => __( 'Activities list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter activities list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Activity', 'text_domain' ),
		'description'           => __( 'Information about the author', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-edit',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'information', $args );

}
add_action( 'init', 'current_info', 0 );
