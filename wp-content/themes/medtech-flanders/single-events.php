<?php

/**
 *
 * 
 */

get_header(); ?>

<div class="fluid-container header header-content">
	<div class="circle">
		<img src="<?php echo get_template_directory_uri(); ?>/img/circle.png" class="img-responsive">
	</div>

	<div class="image">
		<img src="<?php echo get_template_directory_uri(); ?>/img/content/aboutus.jpg" class="img-responsive">
		
	</div>
</div>

<div class="container body">
	<div class="row">
		
		<div class="col-sm-9 content">
			<div class="row detail <?php medtech_class(); ?>">
				
				<article class="col-xs-12">
					<?php while ( have_posts() ) : the_post(); ?>
						<h1><?php the_title(); ?> <span class="date"><?php echo date("d.m.y", types_render_field('event-date', array( 'raw' => 'true' ))); ?></span></h1>

						<h3 class="introduction"><?php the_excerpt(); ?></h3>

						<?php the_content(); ?>
					<?php endwhile; ?>
				</article>

				<div class="col-xs-12">
					<ul class="list-unstyled detailed">
						<li class="calender">
							<?php echo date("l d.m.y", get_post_meta(
								get_the_ID(), 
								'wpcf-event-date', 
								true
							) ) ; ?>
						</li>
						<li class="place">
							<?php echo get_post_meta(get_the_ID(), 'wpcf-event-location', true); ?>
						</li>
						<li class="globe">
							<?php 
							$web = get_post_meta(get_the_ID(), 'wpcf-event-website', true); 
							?>
							<a href="<?php echo $web; ?>"><?php echo $web; ?></a>
						</li>
					</ul>
				</div>

				<div class="col-xs-12 register-now">
					<a href="<?php echo get_post_meta(get_the_ID(), 'wpcf-event-register-link', true); ?>" class="btn btn-medtech" target="__blank">
						<img src="img/check.png">
						Register Now
					</a>
				</div>
				
			</div>

			<div class="row">
				<div class="col-xs-12">

					<?php

					if (get_post_type() == 'post') 
					{
						$title 	= 'news';
						$href 	= get_permalink( get_page_by_path( $title ) );
					} 
					
					else 
					{
						$title 	= get_post_type();
						$href 	= get_post_type_archive_link( get_post_type() );
					}

					?>

					<a href="<?php echo $href; ?>" class="btn btn-block btn-medtech-white btn-back">back to <?php echo $title; ?></a>
				</div>
			</div>

		</div>

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>