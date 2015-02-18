<?php


/**
 * Other Jobs
 */

add_action('widgets_init', 'register_widget_other_jobs');
function register_widget_other_jobs() {
	register_widget('Other_Jobs');
}

class Other_Jobs extends WP_Widget {

	private $title = 'Other Jobs';
	private $description = 'This widget just show in single Jobs.';


	
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
		if( is_singular('jobs') ):

			$query = new WP_Query(array(
				'post_type'	=> 'jobs'
			));

			if ($query->have_posts()) {

		?>

		<div class="row item bg-gray">
			<h2>Other Jobs</h2>
			<ul class="list-unstyled">

				<?php  while($query->have_posts()): $query->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>

			</ul>
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
} // End Other_Jobs