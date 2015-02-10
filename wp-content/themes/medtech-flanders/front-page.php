<?php

/**
 *
 * 
 */

get_header(); ?>

<div class="fluid-container header header-slider">

	<div id="medtech-carousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#medtech-carousel" data-slide-to="0" class="active"></li>
			<li data-target="#medtech-carousel" data-slide-to="1"></li>
			<li data-target="#medtech-carousel" data-slide-to="2"></li>
			<li data-target="#medtech-carousel" data-slide-to="3"></li>

		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">

				<div class="layer-1">
					
					<img src="<?php echo get_template_directory_uri(); ?>/img/content/slider-1.jpg" class="img-responsive">
				</div>

				<div class="layer-2"></div>
				
				<div class="carousel-caption layer-3">
					MedTech Flander, Lorem Ipsum Dolor Sit Amet
				</div>
			</div>

			<div class="item">
				<div class="layer-1">
					
					<img src="<?php echo get_template_directory_uri(); ?>/img/content/slider-2.jpg" class="img-responsive">
				</div>

				<div class="layer-2">
					
				</div>
				
				<div class="carousel-caption layer-3">
					MedTech Flander, Lorem Ipsum Dolor Sit Amet
				</div>
			</div>
			
			<div class="item">
				<div class="layer-1">
					
					<img src="<?php echo get_template_directory_uri(); ?>/img/content/slider-3.jpg" class="img-responsive">
				</div>

				<div class="layer-2">
					
				</div>
				
				<div class="carousel-caption layer-3">
					MedTech Flander, Lorem Ipsum Dolor Sit Amet
				</div>
			</div>

			<div class="item">
				<div class="layer-1">
					
					<img src="<?php echo get_template_directory_uri(); ?>/img/content/slider-4.jpg" class="img-responsive">
				</div>

				<div class="layer-2">
					
				</div>
				
				<div class="carousel-caption layer-3">
					MedTech Flander, Lorem Ipsum Dolor Sit Amet
				</div>
			</div>
		</div>	
	</div>
</div>

<div class="container body">
	<div class="row">
		
		<div class="col-sm-9 content">
			<div class="row news">
				<div class="col-xs-12">
					<h1>Latest News</h1>

					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_type() ); ?>
						<?php endwhile; ?>
					<?php else: ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
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