<?php

/**
 * Reasons_Join
 */

add_action('widgets_init', 'register_widget_other_news');
function register_widget_other_news() {
	register_widget('Other_News');
}

class Other_News extends WP_Widget {

	public function __construct()
	{
		parent::__construct(
			'Other_News', // ID
			'MedTech - Other News', // Display Name
			array(
				'description'	=> 'Widget description'
			)
		);
	}

	public function widget($args, $instance)
	{
		if( is_singular('post') ):

			global $post;

			$query = new WP_Query(array(
				'post_type'	=> 'post',
				'post__not_in' => array( $post->ID )
			));

			if ($query->have_posts()) {
		
		?>
		
		<div class="row item bg-gray">
			<h2>Other News</h2>
			
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
} // End Reasons_Join