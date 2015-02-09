<?php

/**
 *
 * 
 */

get_header(); ?>

<div class="fluid-container header header-content">
	<div class="circle">
		<img src="img/circle.png" class="img-responsive">
	</div>

	<div class="image">
		<img src="img/content/aboutus.jpg" class="img-responsive">
	</div>
</div>

<div class="container body">
	<div class="row">
		
		<div class="col-sm-9 content">
			<div class="row <?php medtech_class(); ?>">
				<div class="col-xs-12" id="container-scroll">

					<h1>Latest News </h1>

					<?php

					$query = new WP_Query( array(
						'post_type' => 'post'
					) );
					
					?>

					<?php if ( $query->have_posts() ) : ?>
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<?php get_template_part( 'content', 'news' ); ?>
						<?php endwhile; ?>
					<?php else: ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; 

					wp_reset_postdata(); 
					wp_reset_query(); ?>
				</div>
			</div>

			<div class="row text-center">
				<div class="col-xs-12">
					
					<a href="#" class="btn btn-block btn-medtech-white" id="load">
						<img src="<?php echo get_template_directory_uri(); ?>/img/refresh.png"> scroll to load more news
					</a>

					<input type="hidden" class="hide" id="paged" value="1" />
				</div>
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>

<script>
	var paragraph = $('.content .news article .isi p');

	paragraph.each(function(i) {
		var tgl = $(this).prev('span.date-hidden').html();
		$(this).prepend('<span class="date">'+tgl+'&nbsp;&nbsp;</span>');
	});

	/**
	 * Aksi untuk meload page
	 */
	function loadArticle() {

		var paged = $('#paged').val();

		if (paged !== 0 || paged !== null || paged !== '') {
			paged++;

			$('#paged').val(paged);
		};

		$.get('<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php',{
			
			action: 'load_infinite_scroll',
			page_no: paged,
			loop_file: 'news'

		}, function(resp) {

			$('#container-scroll').append(resp);
		});
	}

	/**
	 * Load page ketika window scroll sudah sampai di bawah
	 */
	$(window).scroll(function() {
		if ($(window).scrollTop() == $(document).height() - $(window).height()) {
			loadArticle();
		};
	});

	/**
	 * Load page ketika button load more di klik
	 */
	$('#load').click(function(e) {

		e.preventDefault();

		loadArticle();
	});
</script>
<?php get_footer(); ?>