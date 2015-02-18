<?php

/**
 *
 * 
 */

get_header(); ?>

<div class="fluid-container header header-content">
	<div class="circle" 
		style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/circle.png');
		background-repeat: no-repeat; 
		background-position: center -140px;">
	</div>


	<div class="image" style="background-image: url('<?php echo home_url(); ?>/assets/uploads/2015/02/aboutus.jpg');
		background-repeat: no-repeat; 
		background-position: center -30px;
		background-size: cover;">
	</div>
</div>

<div class="container body">
	<div class="row">

		
		<div class="col-sm-9 content">
			<div class="row <?php medtech_class(); ?>">
				<div class="col-xs-12">

					<h1>Jobs</h1>

					<?php if ( have_posts() ) : ?>


						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'jobs' ); ?>

						<?php endwhile; ?>
					<?php else: ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; 

 					wp_reset_postdata();
 					wp_reset_query(); ?>
					
				</div>
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>