<?php

/**
 * Save_Date
 */

add_action('widgets_init', 'register_widget_save_date');
function register_widget_save_date() {
	register_widget('Save_Date');
}

class Save_Date extends WP_Widget {

	private $title = 'Save Date';
	private $description = 'This widget just show in front page.';


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
		if( is_front_page() ): 

			$title = apply_filters('widget_title', $instance['title']);
			

			$query = new WP_Query(array(
				'post_type'	=> 'events'
			));

			if ($query->have_posts()) {
		?>

		<div class="row item save-date">
			<h2><?php echo $title; ?></h2>

			<?php  

			while($query->have_posts()): $query->the_post();

				$featured = types_render_field('event-featured', array( 'raw' => "true" ));

				
				if ($featured) :
			?>

			<div class="img-wrapper">
						

				<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
					<?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive')); ?>
				<?php else: ?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/no-image.jpg" class="img-responsive">
				<?php endif; ?>

				<figcaption class="caption">
					<date class="date"><?php echo date("d.m.y", types_render_field('event-date', array( 'raw' => "true" ))); ?></date>
					<span class="caption-title"><?php the_title(); ?></span>
				</figcaption>
			</div>

			<a href="<?php the_permalink(); ?>" class="view-all">View Details</a>

			<?php 

				endif;

			endwhile; ?>
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
} // End Save_Date