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

					<h1>Jobs</h1>

					<?php 

					$query = new WP_Query(array(
						'post_type'	=> get_post_type()
					));

					if ( $query->have_posts() ) : ?>


						<?php while ( $query->have_posts() ) : $query->the_post(); ?>

							<?php get_template_part( 'content', 'job' ); ?>

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

<?php get_footer(); ?>