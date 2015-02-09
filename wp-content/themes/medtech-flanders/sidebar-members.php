<!-- home, -->
<?php if (is_home() || is_front_page() || is_page('about-us') || is_post_type_archive('events')) : ?>

<?php

$query = new WP_Query(array(
	'post_type' => 'member-list'
));

?>

<div class="row members">

	<?php if ($query->have_posts()): ?>

	<h2>Members</h2>

	<div id="members" class="carousel slide" data-ride="carousel">

		<div class="carousel-inner" role="listbox">

			<?php 
			$i = 1;
			while ( $query->have_posts() ) : $query->the_post(); 
			$active = ($i == 1) ? 'active' : '' ;
			?>
			<div class="item <?php echo $active; ?>">
				<a href="<?php echo the_permalink(); ?>">
					<?php echo the_post_thumbnail('full'); ?>
				</a>
			</div>
			<?php $i++; endwhile; ?>

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

	<?php endif; ?>

</div>
<?php endif; ?>