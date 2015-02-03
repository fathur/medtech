<div class="col-sm-3 sidebar">
	
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
	<?php if (is_home() || is_front_page()) : ?>
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
	<?php if (is_home() || is_front_page()) : ?>
	<div class="row events">
		<h2>Upcoming event</h2>
		<ul class="list-unstyled">
			<li>
				<h3><a href="#">MedAntwep</a></h3>
				<date class="date">01.12.14</date>
				<div class="desc">2 lines of information about the event can be here</div>
			</li>
			<li>
				<h3>MedAntwep</h3>
				<date class="date">01.12.14</date>
				<div class="desc">2 lines of information about the event can be here</div>
			</li>
			<li>
				<h3>MedAntwep</h3>
				<date class="date">01.12.14</date>
				<div class="desc">2 lines of information about the event can be here</div>
			</li>
		</ul>

		<a href="#" class="view-all">View all events</a>

	</div>
	<?php endif; ?>

	<!-- home, -->
	<?php if (is_home() || is_front_page()) : ?>
	<div class="row members">
		<h2>Members</h2>

		<div id="members" class="carousel slide" data-ride="carousel">

			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<a href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/img/ex-barco.jpg">
					</a>
				</div>

				<div class="item">
					<a href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/img/ex-barco.jpg">
					</a>
				</div>	
			</div>

			<a class="left carousel-control" href="#members" role="button" data-slide="prev">
				<img src="<?php echo get_template_directory_uri(); ?>/img/arrow-gray-left.png">
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#members" role="button" data-slide="next">
				<img src="<?php echo get_template_directory_uri(); ?>/img/arrow-gray-right.png">
				<span class="sr-only">Next</span>
			</a>

			
		</div>
	</div>
	<?php endif; ?>
	
</div>