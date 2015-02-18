<?php

/**
 * Members
 */

add_action('widgets_init', 'register_widget_members');
function register_widget_members() {
	register_widget('Members');
}

class Members extends WP_Widget {

	private $title = 'Members';
	private $description = 'This widget just show in front page, page About Us, single Events, single Jobs, single News, archive Events, and archive Jobs.';

	
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

	public function widget()
	{
		if( is_page('about-us') || 
			is_singular('events') || 
			is_singular('jobs') || 
			is_singular('post') ||  // Muncul di news
			is_post_type_archive('events') ||
			is_post_type_archive('jobs') ||
			is_front_page() ):

			$query = new WP_Query(array(
				'post_type'	=> 'member-list',
				'orderby'	=> 'rand',
			));

			if ($query->have_posts()) {
		?>

		<div class="row item members">
			<h2>Members</h2>

			<div id="members" class="carousel slide" data-ride="carousel">

				<div class="carousel-inner" role="listbox">

					<?php $i = 1;
					while($query->have_posts()): $query->the_post(); 
						$active = ($i == 1) ? 'active' : '' ;
					?>
					<div class="item <?php echo $active; ?>">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
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
	
} // End Members