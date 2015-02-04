<?php

add_theme_support( "post-thumbnails" );
add_theme_support( "title-tag" );
add_theme_support( "custom-header", array() );
add_theme_support( "custom-background", array() );

add_theme_support( 'html5', array( 'search-form' ) );
add_theme_support( 'automatic-feed-links' );
add_filter('show_admin_bar', '__return_false');

function load_scripts() {
	
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('yelloow', get_template_directory_uri() . '/css/medtech-flanders.css');

	wp_enqueue_script('jquery-1.11.1', get_template_directory_uri() . '/js/jquery-1.11.1.min.js', array(), '1.11.1');
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2-respond-1.1.0.min.js', array(), '2.6.2');
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.3');
	wp_enqueue_script('yelloow', get_template_directory_uri() . '/js/medtech-flanders.min.js', array(), '1.0');
}
add_action('wp_enqueue_scripts','load_scripts');

/**
 * Closure
 */
function medtech_class($echo = true) {
	
	global $post;
	
	if (is_page()) {

		$class = get_post( $post )->post_name;

	} elseif (is_single()) {
		$class = get_post_type();
	}

	if ($echo) {
		echo $class;
	} else {
		return $class;
	}
}