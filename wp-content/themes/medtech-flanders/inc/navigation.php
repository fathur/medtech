<?php

function medtech_register_menu()
{
	register_nav_menus( array(
		'main-menu'	=> 'Main Menu',
	));
}
add_action( 'init', 'medtech_register_menu' );

/**
 * Display menu
 */
function medtech_display_menu()
{
	$menu_name = 'main-menu';

	$html = '<ul class="nav navbar-nav navbar-right" role="menu">';
	
	$locations 	= get_nav_menu_locations();
	$menus 		= wp_get_nav_menu_items( $locations[$menu_name] );


	foreach ($menus as $menu) {

		$active = ( predict( $menu->url ) ) ? 'active' : '' ;
		
		$html .= '<li class="'.$active.'"><a href="'.$menu->url.'">'.$menu->title.'</a></li>';

	}

	$html .= '</ul>';
	
	echo $html;
}

/**
 * [format_url description]
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
function format_url($url) {

	if (strpos($url,'#') !== false) {
		$x_url = explode('#', $url);
		$url	= $x_url[0];
	}
	
	$url = rtrim($url, '/');
	return $url;

}

/**
 * [predict description]
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
function predict( $url ) {
	
	global $post;
	
	if ( format_url( $url )  == format_url( get_current_url() )) {
		return TRUE;
	}
	
	if ( format_url( get_post_type_archive_link( get_post_type() ) ) == format_url($url) ) {
		return TRUE;
	}

	if ( strpos(format_url(get_current_url()), format_url($url)) !== FALSE) {
		return TRUE;
	}


}

/**
 * [get_current_url description]
 * @return [type] [description]
 */
function get_current_url() {
	$protocol 	= (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$url		= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

	return $protocol . $url;
}