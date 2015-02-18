<?php


/**
 * Upcoming_Events
 */

add_action('widgets_init', 'register_widget_upcoming_events');
function register_widget_upcoming_events() {
	register_widget('Upcoming_Events');
}

class Upcoming_Events extends WP_Widget {

	private $title = 'Upcoming Events';
	private $description = 'This widget just show in front page, page About Us, page Membership, single Event, single Job, single Post/News, and archive Jobs.';


	public function __construct()
	{
		parent::__construct(
			underscore($this->title), // ID
			$this->get_display_name(),
			array(
				'description' => $this->description
			)
		);
	}

	public function get_display_name()
	{
		return 'MedTech - ' . $this->title;
	}

	public function widget($args, $instance)
	{
		if( is_page('about-us') || 
			is_page('membership') ||
			is_singular('events') || 
			is_singular('jobs') || 
			is_singular('post') ||  // Muncul di news
			is_post_type_archive('jobs') ||
			is_front_page() ):

			$title = apply_filters('widget_title', $instance['title']);
			

			$query = new WP_Query(array(
				'post_type'	=> 'events'
			));

			if ($query->have_posts()) {

		?>

		<div class="row item events">
			<h2><?php echo $title; ?></h2>
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

	public function update($new, $old)
	{
		$instance = array();

		$instance['title'] = ( !empty($new['title'])) ? strip_tags($new['title']) : '' ;

		return $instance;
	}

	public function form($instance)
	{

		$title = (isset($instance['title'])) ? $instance['title'] : $this->title ;

		?>
		<p><i><?php echo $this->description; ?></i></p>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>

			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<?php
	}
} // End Upcoming_Events