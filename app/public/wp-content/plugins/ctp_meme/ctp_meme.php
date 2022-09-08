<?php
/*
Plugin Name: Meme plugin
Plugin URI: https://site-du-plugin.fr
Description: Ce plugin WordPress sert a generer des mêmes 
Author: Stuckens | Menu | Ouali
Version: 1.0
Author URI: https://mon-site.fr
*/


// Register Custom Post Type Custom Post
function create_custompost_cpt() {

	$labels = array(
		'name' => _x( 'Meme', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Meme', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Custom Meme', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Custom Meme', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Custom Post Meme', 'textdomain' ),
		'attributes' => __( 'Custom Post Meme', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Custom Meme:', 'textdomain' ),
		'all_items' => __( 'All Custom Meme', 'textdomain' ),
		'add_new_item' => __( 'Add New Custom Meme', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Custom Meme', 'textdomain' ),
		'edit_item' => __( 'Edit Custom Meme', 'textdomain' ),
		'update_item' => __( 'Update Custom Meme', 'textdomain' ),
		'view_item' => __( 'View Custom Meme', 'textdomain' ),
		'view_items' => __( 'View Custom Memes', 'textdomain' ),
		'search_items' => __( 'Search Custom Meme', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Custom Post', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Custom Post', 'textdomain' ),
		'items_list' => __( 'Custom Posts list', 'textdomain' ),
		'items_list_navigation' => __( 'Custom Posts list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Custom Posts list', 'textdomain' ),
	); 
	$args = array(
		'label' => __( 'Custom Post', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => '',
		'supports' => array('title', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'custompost', $args );

}
	function my_awesome_func() {
	
		$args = [
	
			'numberposts' => 99999,
			'post_type' => 'custompost', 
			'orderby' => 'rand'

			];
	
	$posts = get_posts($args);
	$data = [];
	$i = 0;
	
	
		$data['id'] = $posts[0]->ID;
		$data['title'] = $posts[0]->post_title;
		$data['featured_image'] = get_the_post_thumbnail_url($posts[0]->ID);
 		return $data;
	
	}

	function my_awesome_func_custompost($slug) {

		return $slug['slug'];
	}

	function shortcode(){

		$json = wp_remote_get('http://localhost:10018/wp-json/memeplugin/v1/posts/');
		$data = json_decode($json['body'], true);
	
		return '<img src="' . $data['featured_image'] . '"/>';
	}

	add_shortcode('meme_plugin','shortcode');
	




	

add_action( 'init', 'create_custompost_cpt');

add_action( 'rest_api_init', function () {
	register_rest_route( 'memeplugin/v1', 'posts', [
		'methods' => 'GET',
		'callback' => 'my_awesome_func',
 ] );

 register_rest_route( 'memeplugin/v1', 'posts/(?P<slug>[a-zA-Z0-9-]+)', [
	'methods' => 'GET',
	'callback' => 'my_awesome_func_custompost',
] );
} );
