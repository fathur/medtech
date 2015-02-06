<?php

/**
 * [medtech_class description]
 * @param  boolean $echo [description]
 * @return [type]        [description]
 */
function medtech_class($echo = true) {
	
	global $post;
	
	if (is_page()) 
	{
		$class = get_post( $post )->post_name;
	} 
	elseif (is_single()) 
	{
		$class = get_post_type();
	} 
	elseif (is_archive()) 
	{
		$class = get_post_type();
	}

	if ($echo) {
		echo $class;
	} else {
		return $class;
	}
}