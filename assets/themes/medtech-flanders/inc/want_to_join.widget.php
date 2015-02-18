<?php

/**
 * Get In Touch Widget
 */

add_action('widgets_init', 'register_widget_want_to_join');
function register_widget_want_to_join() {
	register_widget('Want_To_Join');
}

class Want_To_Join extends WP_Widget {

	private $title = 'Want to Join';
	private $description = 'This widget just show in archive Member List.';


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
		if( is_post_type_archive('member-list') ):

			$title = apply_filters('widget_title', $instance['title']);
		?>
		
		<div class="row item bg-white">
			<h2 class="text-blue"><img src="<?php echo get_template_directory_uri(); ?>/img/balloon.png"> <?php echo $title; ?></h2>

			<?php echo $instance['content']; ?>

		</div>

		<?php
		endif;
	}

	public function update($new, $old)
	{
		$instance = array();

		$instance['title'] = ( !empty($new['title'])) ? strip_tags($new['title']) : '' ;
		$instance['content'] = ( !empty($new['content'])) ? $new['content'] : '' ;

		return $instance;
	}

	public function form($instance)
	{
		if (isset($instance['title'])) {
			$title = $instance['title'];
			$content = $instance['content'];
		} else {
			$title = 'Want to Join';
			$content = '';
		}

		?>
		<p>This widget just show in member list archive</p>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>

			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('content'); ?>">Html Content</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo $content; ?></textarea>
		</p>
		<?php
	}
}