<?php


/**
 * Other Past_Events
 */

add_action('widgets_init', 'register_widget_past_event');
function register_widget_past_event() {
	register_widget('Past_Events');
}

class Past_Events extends WP_Widget {

	private $title = 'Past Events';
	private $description = 'This widget just show in archive Events, and single Event.';

	
	public function __construct()
	{
		parent::__construct(
			$this->title, // ID
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
		if( is_post_type_archive('events') ||
			is_singular('events') ):
		?>
		<div class="row item bg-gray">
			<h2>Past Event</h2>
			<ul class="list-unstyled">

				<li><a href="#">Past Events</a></li>

			</ul>
		</div>
		<?php
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
} // End Past_Events