<?php


/**
 * Other Past_Events
 */

add_action('widgets_init', 'register_widget_past_event');
function register_widget_past_event() {
	register_widget('Past_Events');
}

class Past_Events extends WP_Widget {

	public function __construct()
	{
		parent::__construct(
			'Past_Events', // ID
			'MedTech - Past Events', // Display Name
			array(
				'description'	=> 'Display other jobs'
			)
		);
	}

	public function widget($args, $instance)
	{ 
		if( is_post_type_archive('events') ||
			is_singular('events') ):
		?>
		<div class="row item bg-gray">
			<h2>Past Event</h2>
			<ul class="list-unstyled">

				<li><a href="#">Past Events</a></li>

			</ul>
		</div>
		<?php
		endif;
	}

	public function update()
	{

	}

	public function form()
	{

	}
} // End Past_Events