<?php

/**
 * 
 */
add_action('wp_ajax_load_infinite_scroll','load_infinite_scroll');
add_action('wp_ajax_nopriv_load_infinite_scroll','load_infinite_scroll');

function load_infinite_scroll() {

	$loop_file	= $_GET['loop_file']; // nggak aman nih
	$post_type	= $_GET['post_type'];
	$paged		= intval($_GET['page_no']); // belum di validasi
	$posts_per_page	= get_option('posts_per_page');

	$query = new WP_Query( array(
		'post_type' => $post_type,
		'posts_per_page' => $posts_per_page,
		'paged'	=> $paged
	) );
	

	if ( $query->have_posts() ) : 
		 while ( $query->have_posts() ) : $query->the_post(); 
			get_template_part( 'content', $loop_file ); 
		 endwhile; 
 	endif; 

	exit;
}