<?php


/**
 * Other Jobs
 */

add_action('widgets_init', 'register_widget_other_jobs');
function register_widget_other_jobs() {
	register_widget('Other_Jobs');
}

class Other_Jobs extends WP_Widget {

	public function __construct()
	{
		parent::__construct(
			'Other_Jobs', // ID
			'MedTech - Other Jobs', // Display Name
			array(
				'description'	=> 'Display other jobs'
			)
		);
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

	public function update()
	{

	}

	public function form()
	{

	}
} // End Other_Jobs