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
				<div class="col-xs-12">

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
					<?php endif; ?>
				</div>
			</div>

			<div class="row text-center">
				<div class="col-xs-12">
					
					<a href="#" class="btn btn-block btn-medtech-white">
						<img src="<?php echo get_template_directory_uri(); ?>/img/refresh.png"> scroll to load more events
					</a>
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
</script>
<?php get_footer(); ?>