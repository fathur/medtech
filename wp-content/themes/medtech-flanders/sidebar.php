<div class="col-sm-3 sidebar">

	<?php echo get_template_part('sidebar','getin-touch'); ?>

	<?php if (false) : ?>
	<div class="row other-jobs">
		<h2>Other Jobs</h2>
		<ul class="list-unstyled">
			<li><a href="#">System engineer - Barco</a></li>
			<li><a href="#">It Service manager - Barco</a></li>
			<li><a href="">System engineer System engineer - Barco</a></li>
			<li><a href="#">System engineer - Barco</a></li>

		</ul>
	</div>
	<?php endif; ?>

	
	<!-- home, -->
	<?php if (is_home() || is_front_page()) : ?>
	<div class="row save-date">
		<h2>Save The Date</h2>

		<div class="img-wrapper">
			
			<img src="<?php echo get_template_directory_uri(); ?>/img/ex-save-the-date.jpg" class="img-responsive">
			<figcaption class="caption">
				<date class="date">11.05.15</date>
				<span class="caption-title">MedTech Annual Conference</span>
			</figcaption>
		</div>

		<a href="#" class="view-all">View Details</a>
	</div>
	<?php endif; ?>

	<!-- home, -->
	<?php if (is_home() || is_front_page() || is_page('about-us') || is_post_type_archive('events') ) : ?>
	<div class="row reasons-join">
		<h2>Reasons To Join</h2>

		<ul class="list-unstyled">
			<li>Connect with others medtech company</li>
			<li>Stay up-to-date</li>
			<li>Share infrastructure and lower overhead costs</li>
		</ul>
	</div>
	<?php endif; ?>

	<!-- home, -->
	<?php get_template_part('sidebar','upcoming-event'); ?>

	<?php get_template_part('sidebar','members'); ?>


	
	
</div>