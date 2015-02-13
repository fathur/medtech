<?php

/**
 * Get In Touch Widget
 */

add_action('widgets_init', function() {
	register_widget('Get_In_Touch');
});

class Get_In_Touch extends WP_Widget {

	public function __construct()
	{
		parent::__construct(
			'Get_In_Touch', // ID
			'MedTech - Get In Touch', // Display Name
			array(
				'description'	=> 'Address how to contacting MedTech Flanders.'
			)
		);
	}

	public function widget()
	{
		if( is_page('about-us') ||
			is_page('membership') ||
			is_post_type_archive('events') ||
			is_post_type_archive('jobs') ):
		?>
		
		<div class="row item get-touch">
			<h2><img src="<?php echo get_template_directory_uri(); ?>/img/balloon.png"> Get In Touch</h2>

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

	public function update()
	{
		# code...
	}

	public function form()
	{
		# code...
	}
}