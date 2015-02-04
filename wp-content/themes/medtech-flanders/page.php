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