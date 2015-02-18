<?php

/**
 * [medtech_class description]
 * @param  boolean $echo [description]
 * @return [type]        [description]
 */
if ( ! function_exists('medtech_class'))
{
	
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
}

if ( ! function_exists('underscore'))
{
	/**
	 * Underscore
	 *
	 * Takes multiple words separated by spaces and underscores them
	 *
	 * @param	string	$str	Input string
	 * @return	string
	 */
	function underscore($str)
	{
		return preg_replace('/[\s]+/', '_', trim( strtolower($str)));
	}
}