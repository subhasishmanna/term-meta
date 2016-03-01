<?php
/**
 * @package metabox
 * @version 1.0
 */
/*
Plugin Name: Metaboxxxxxxxx
Plugin URI: #
Description: this is a test plugin
Author: Subhasish Manna
Version: 1.0
Author URI: http://subhasish.com//
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$plugin_dir = plugin_dir_path(__FILE__);
require_once ( $plugin_dir . 'fields.php' );
require_once ( $plugin_dir . 'enqueuue.php' );
require_once ( $plugin_dir . 'taxomonyfield.php' );
//CREATE POSTTYPE METABOX


function subhasish_metabox_register_post_type() {
	
	$singular = 'Metabox';
	$plural = 'Metaboxes';
	$slug = str_replace( ' ', '_', strtolower( $singular ) );
	$labels = array(
		'name' 			=> $plural,
		'singular_name' 	=> $singular,
		'add_new' 		=> 'Add New',
		'add_new_item'  	=> 'Add New ' . $singular,
		'edit'		        => 'Edit',
		'edit_item'	        => 'Edit ' . $singular,
		'new_item'	        => 'New ' . $singular,
		'view' 			=> 'View ' . $singular,
		'view_item' 		=> 'View ' . $singular,
		'search_term'   	=> 'Search ' . $plural,
		'parent' 		=> 'Parent ' . $singular,
		'not_found' 		=> 'No ' . $plural .' found',
		'not_found_in_trash' 	=> 'No ' . $plural .' in Trash'
		);
	$args = array(
		'labels'              => $labels,
	        'public'              => true,
	        'publicly_queryable'  => true,
	        'exclude_from_search' => false,
	        'show_in_nav_menus'   => true,
	        'show_ui'             => true,
	        'show_in_menu'        => true,
	        'show_in_admin_bar'   => true,
	        'menu_position'       => 70,
	        'menu_icon'           => plugin_dir_url( __FILE__ ) . 'images/favicon.ico',
	        'can_export'          => true,
	        'delete_with_user'    => false,
	        'hierarchical'        => false,
	        'has_archive'         => true,
	        'query_var'           => true,
	        'capability_type'     => 'post',
	        'map_meta_cap'        => true,
	        // 'capabilities' => array(),
	        'rewrite'             => array( 
	        	'slug' => $slug,
	        	'with_front' => true,
	        	'pages' => true,
	        	'feeds' => true,
	        ),
	        'supports'            => array( 
	        	'title', 
	        	 
	        )
	);
	register_post_type( $slug, $args );
	
}
add_action( 'init', 'subhasish_metabox_register_post_type' );


function metbox_register_taxonomy() {
	$singular = 'Place';
	$plural = 'Places';
	$slug = str_replace( ' ', '_', strtolower( $singular ) );
	$labels = array(
		'name'                       => $plural,
        'singular_name'              => $singular,
        'search_items'               => 'Search ' . $plural,
        'popular_items'              => 'Popular ' . $plural,
        'all_items'                  => 'All ' . $plural,
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => 'Edit ' . $singular,
        'update_item'                => 'Update ' . $singular,
        'add_new_item'               => 'Add New ' . $singular,
        'new_item_name'              => 'New ' . $singular . ' Name',
        'separate_items_with_commas' => 'Separate ' . $plural . ' with commas',
        'add_or_remove_items'        => 'Add or remove ' . $plural,
        'choose_from_most_used'      => 'Choose from the most used ' . $plural,
        'not_found'                  => 'No ' . $plural . ' found.',
        'menu_name'                  => $plural,
	);
	$args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => $slug )
        );
	register_taxonomy( $slug, 'metabox', $args );
}
add_action( 'init', 'metbox_register_taxonomy' );