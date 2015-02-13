<?php

/**
 * Get In Touch Widget
 */

add_action('widgets_init', function() {
	register_widget('Want_To_Join');
});

class Want_To_Join extends WP_Widget {

	public function __construct()
	{
		parent::__construct(
			'Want_To_Join', // ID
			'MedTech - Want To Join', // Display Name
			array(
				'description'	=> 'Address how to contacting MedTech Flanders.'
			)
		);
	}

	public function widget()
	{
		if( is_post_type_archive('member-list') ):
		?>
		
		<div class="row item bg-white">
			<h2 class="text-blue"><img src="<?php echo get_template_directory_uri(); ?>/img/balloon.png"> Want to join?</h2>

			<p>Here are some good reasons why your company should join MedTech Flanders:</p>

			<ul class="list-unstyled">
				<li>Connect with other med-tech companies</li>
				<li>Stay up-to-date</li>
				<li>Share infrastructure and lower overhead costs</li>
			</ul>
		</div>

		<?php
		endif;
	}

	public function update()
	{
		# code...
	}

	public function form()
	{
		# code...
	}
}