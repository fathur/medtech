<?php

/**
 * Reasons_Join
 */

add_action('widgets_init', function() {
	register_widget('Reasons_Join');
});

class Reasons_Join extends WP_Widget {

	public function __construct()
	{
		parent::__construct(
			'Reasons_Join', // ID
			'MedTech - Reasons Join', // Display Name
			array(
				'description'	=> 'Widget description'
			)
		);
	}

	public function widget($args, $instance)
	{
		
		?>
		
		<div class="row reasons-join">
			<h2>Reasons To Join</h2>

			<ul class="list-unstyled">
				
				<ul class="list-unstyled">
					<li>Connect with others medtech company</li>
					<li>Stay up-to-date</li>
					<li>Share infrastructure and lower overhead costs</li>
				</ul>

			</ul>


		</div>

		<?php
		
		
	}

	public function update()
	{

	}

	public function form()
	{

	}
} // End Reasons_Join