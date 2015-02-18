<?php


/**
 * Upcoming_Events
 */

add_action('widgets_init', 'register_widget_upcoming_events');
function register_widget_upcoming_events() {
	register_widget('Upcoming_Events');
}

class Upcoming_Events extends WP_Widget {

	public function __construct()
	{
		parent::__construct(
			'Upcoming_Events', // ID
			'MedTech - Upcoming Events', // Display Name
			array(
				'description'	=> 'Widget description'
			)
		);
	}

	public function widget()
	{
		if( is_page('about-us') || 
			is_page('membership') ||
			is_singular('events') || 
			is_singular('jobs') || 
			is_singular('post') ||  // Muncul di news
			is_post_type_archive('jobs') ||
			is_front_page() ):

			$query = new WP_Query(array(
				'post_type'	=> 'events'
			));

			if ($query->have_posts()) {

		?>

		<div class="row item events">
			<h2>Upcoming event</h2>
			<ul class="list-unstyled">

				<?php  while($query->have_posts()): $query->the_post(); ?>

				<li>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<date class="date"><?php echo date("d.m.y", types_render_field('event-date', array( 'raw' => "true" ))); ?></date>
					<div class="desc"><?php echo get_the_excerpt(); ?></div>
				</li>
				<?php endwhile; ?>

			</ul>

			<a href="<?php echo get_post_type_archive_link('events'); ?>" class="view-all">View all events</a>

		</div>
		
		<?php

			}

			wp_reset_postdata();

		endif;
	}

	public function update()
	{

	}

	public function form()
	{

	}
} // End Upcoming_Events