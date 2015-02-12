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


	<div class="image" style="background-image: url('http://localhost/medtech-flanders/wp-content/uploads/2015/02/aboutus.jpg');
		background-repeat: no-repeat; 
		background-position: center -30px;
		background-size: cover;">
	</div>
</div>

<div class="container body">
	<div class="row">
		
		<div class="col-sm-9 content">
			<div class="row detail <?php medtech_class(); ?>">
				<div class="col-xs-12">
					<h1>Our members are an broad mix of medical technology companies.</h1>
					<h3>Meet the members.</h3>
				</div>
				<div class="col-xs-12">
					
					<div class="row members">


						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
							


						<div class="col-xs-12 col-sm-3 item">
							<?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive')); ?>

							<figcaption>
								<img src="<?php echo get_template_directory_uri(); ?>/img/arrow-gray-right.png"> <?php the_title(); ?>
							</figcaption>
						</div>

							<?php endwhile; ?>
						<?php else: ?>
							<?php get_template_part( 'content', 'none' ); ?>
						<?php endif; ?>
						
					</div>
				</div>
				<article class="col-xs-12">
					<p>Cras congue posuere accumsan. Nullam et odio odio. Aliquam pharetra, eros non posuere ullamcorper, tortor augue ullamcorper nunc, quis hendrerit neque ante vitae ante. Nam tincidunt lacinia mollis. Sed ac est velit. Donec eu pellentesque enim. Proin dapibus fringilla risus ac vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac nisi rhoncus, malesuada turpis at, blandit velit. Curabitur efficitur eget sem sed pharetra. Proin nec pretium lorem. Duis interdum at quam sed sollicitudin. Duis porttitor eleifend rhoncus. Curabitur ultricies purus vel velit lacinia commodo. Nulla cursus mollis purus, vitae convallis justo tristique ut.</p>
					<h3>Interested to join?</h3>
					<p>Cras fringilla, tellus eu molestie tempor, lacus est sagittis lectus, a vehicula leo metus vitae nibh. Duis cursus ex eu leo varius, nec semper ipsum rutrum. Vivamus nec dui quis lacus hendrerit bibendum. Sed blandit elit et sem volutpat tempor. Praesent vel magna nec justo laoreet tristique eget sed felis. Quisque et odio eget dolor fringilla volutpat non ac magna. Donec eu cursus dui, nec congue ligula. Curabitur suscipit semper lorem ac accumsan. Integer iaculis fringilla tortor vel scelerisque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed eget turpis pulvinar purus vulputate blandit.</p>
				</article>
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>