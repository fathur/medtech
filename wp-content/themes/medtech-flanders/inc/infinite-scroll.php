<?php

/**
 * 
 */

// Mendaftarkan fungsi ke dalam AJAX wordpress.
// Baik dalam halaman yang membutuhkan privilege atau tidak.
add_action('wp_ajax_load_infinite_scroll','load_infinite_scroll');
add_action('wp_ajax_nopriv_load_infinite_scroll','load_infinite_scroll');

function load_infinite_scroll() {

	// Mendapatkan file yang dipanggiil saat di loop.
	$loop_file	= $_GET['loop_file']; 

	// Mendapatkan post type content
	// untuk dimasukan dalam WP_Query.
	$post_type	= $_GET['post_type'];

	// Mendapatkan halaman pagination.
	// Validasi bahwa halaman adalah berbentuk integer.
	$paged		= intval($_GET['page_no']);

	// Mengambil option dari setting
	// jumlah halaman yang akan ditampilkan
	$posts_per_page	= get_option('posts_per_page');

	// WP_Query in action, mengambil artikel
	// sesuai dengan yang diinginkan.
	$query = new WP_Query( array(
		'post_type' 		=> $post_type,
		'posts_per_page' 	=> $posts_per_page,
		'paged'				=> $paged
	) );
	
	// Menampilkan hasil konten, hasil ajax request
	if ( $query->have_posts() ) : 
		 while ( $query->have_posts() ) : $query->the_post(); 
			get_template_part( 'content', $loop_file ); 
		 endwhile; 
 	endif; 

 	wp_reset_postdata();
 	wp_reset_query();

 	// Mematikan action ajax, 
 	// agar tidak memunculkan angka 0 saat request.
	exit;
}