<?php

/**
 * Reasons_Join
 */

add_action('widgets_init', 'register_widget_reason_join');
function register_widget_reason_join() {
	register_widget('Reasons_Join');
}

class Reasons_Join extends WP_Widget {

	private $title = 'Reasons to Join';
	private $description = 'This widget just show in front page, page About Us, archive Events, and archive Jobs.';

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
			is_post_type_archive('events') ||
			is_post_type_archive('jobs') ||
			is_front_page() ):

			$title = apply_filters('widget_title', $instance['title']);
		
		?>
		
		<div class="row item reasons-join">
			<h2><?php echo $title; ?></h2>

			<ul class="list-unstyled">
				
				<ul class="list-unstyled">
					<li>Connect with others medtech company</li>
					<li>Stay up-to-date</li>
					<li>Share infrastructure and lower overhead costs</li>
				</ul>

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
} // End Reasons_Join