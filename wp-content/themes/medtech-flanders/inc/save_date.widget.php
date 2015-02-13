<?php

/**
 * Save_Date
 */

add_action('widgets_init', function() {
	register_widget('Save_Date');
});

class Save_Date extends WP_Widget {

	public function __construct()
	{
		parent::__construct(
			'Save_Date', // ID
			'MedTech - Save Date', // Display Name
			array(
				'description'	=> 'Widget description'
			)
		);
	}

	public function widget()
	{
		if( is_front_page() ): 

			$query = new WP_Query(array(
				'post_type'	=> 'events'
			));

			if ($query->have_posts()) {
		?>

		<div class="row item save-date">
			<h2>Save The Date</h2>

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

	public function update()
	{

	}

	public function form()
	{

	}
} // End Save_Date