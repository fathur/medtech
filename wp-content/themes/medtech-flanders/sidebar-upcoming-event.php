<?php if (is_home() || is_front_page() || is_page('about-us') ) : ?>

<?php

$query = new WP_Query(array(
	'post_type' => 'events'
));

?>
<div class="row events">

	<?php if ($query->have_posts()): ?>

	<h2>Upcoming event</h2>
	<ul class="list-unstyled">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>

		<li>
			<h3><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<date class="date"><?php echo date("d.m.y", types_render_field('event-date', array( 'raw' => 'true' ))); ?></date>
			<div class="desc"><?php the_excerpt(); ?></div>
		</li>

		<?php endwhile; ?>

		
	</ul>

	<a href="#" class="view-all">View all events</a>

	<?php endif; ?>
</div>
<?php endif; ?>