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
		<div class="col-sm-12 content">
			<h1>404</h1>
			<h2>The page you requested cannot be found. It may have moved or may no longer be available.</h2>

			<h3>Suggestion: </h3>

			<ul>
				<li>Check the URL to be sure it's spelled correctly. Note: Most URLs are case sensitive.</li>
				<li>Explore the MedTech Flanders site via the main site navigation.</li>
				<li>Be sure to update your bookmarks once you find what you're looking for.</li>
			</ul>
		</div>
	</div>
</div>

<?php get_footer(); ?>