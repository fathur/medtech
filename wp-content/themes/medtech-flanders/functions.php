<?php

add_theme_support( "post-thumbnails" );
add_theme_support( "title-tag" );
add_theme_support( "custom-header", array() );
add_theme_support( "custom-background", array() );

add_theme_support( 'html5', array( 'search-form', 'caption' ) );
add_theme_support( 'automatic-feed-links' );
add_filter('show_admin_bar', '__return_false');

function load_scripts() {
	
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('medtech-flanders', get_template_directory_uri() . '/css/medtech-flanders.css');

	wp_enqueue_script('jquery-1.11.1', get_template_directory_uri() . '/js/jquery-1.11.2.js', array(), '1.11.2');

	wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2-respond-1.1.0.min.js', array(), '2.6.2');
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.3');
	wp_enqueue_script('medtech-flanders', get_template_directory_uri() . '/js/medtech-flanders.min.js', array(), '1.0');
}
add_action('wp_enqueue_scripts','load_scripts');

/**
 * Adding additional default css class responsive 
 * into every image inside content
 * 
 * @reference 	http://stackoverflow.com/questions/20473004/how-to-add-automatic-class-in-image-for-wordpress-post
 * 
 */
function add_responsive_class($content){

	$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
	$document = new DOMDocument();
	libxml_use_internal_errors(true);
	$document->loadHTML(utf8_decode($content));

	$imgs = $document->getElementsByTagName('img');
	foreach ($imgs as $img) {           
		$existing_class = $img->getAttribute('class');
		$img->setAttribute('class', "$existing_class img-responsive");
	}

	$html = $document->saveHTML();
	return $html;   
}
add_filter('the_content', 'add_responsive_class');

/**
 * Add shortcode for membership page
 */
function button_view_members() {
	return "<a href='".get_post_type_archive_link('member-list')."' class='btn btn-lg btn-medtech btn-view-member'><img src='".get_template_directory_uri()."/img/handshake.png'> View Members</a>";
}
add_shortcode('btn-members', 'button_view_members');


function button_icon($attr)
{
	$icon 		= $attr['icon'];
	$url 		= $attr['url'];
	$target 	= isset($attr['target']) ? $attr['target'] : 'self';
	$text 		= $attr['text'];
	$class 		= isset($attr['class']) ? $attr['class'] : '';

	if (isset($icon) || $icon !== '') {
		$icon = "<img src='".$icon."' />&nbsp;&nbsp;";
	}

	return "<a href='".$url."' class='btn btn-medtech ".$class."' target='". $target	."'>". $icon . $text. "</a>";

}
add_shortcode('btn-icon', 'button_icon');



require get_template_directory() . '/inc/helper.php';
require get_template_directory() . '/inc/infinite-scroll.php';