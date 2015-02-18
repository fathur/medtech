<?php

/**
 * Get In Touch Widget
 */

add_action('widgets_init', 'register_widget_get_in_touch');
function register_widget_get_in_touch() {
	register_widget('Get_In_Touch');
}

class Get_In_Touch extends WP_Widget {

	private $title = 'Get in Touch';
	private $description = 'This widget just show in page About Us, page Membership, archive Events, and archive Jobs.';

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
		if( is_page('about-us') ||
			is_page('membership') ||
			is_post_type_archive('events') ||
			is_post_type_archive('jobs') ):

			$title = apply_filters('widget_title', $instance['title']);

		?>
		
		<div class="row item get-touch">
			<h2><img src="<?php echo get_template_directory_uri(); ?>/img/balloon.png"> <?php echo $title; ?></h2>

			<p><b>MedTech Flanders vzw</b>
			<br/>
			Gaston Crommenlaan 8/102 9050 Gent</p>

			<ul class="list-unstyled">
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png"> 
					<a href="#">@MedTechFlanders</a>
				</li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/img/linkedin.png"> 
					<a href="#">MedTechFlanders</a>
				</li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/img/mail.png"> 
					<a href="#">mail us</a>
				</li>
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
}