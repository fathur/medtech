<?php

/**
 *
 * 
 */

get_header(); ?>

<div class="fluid-container header header-slider">

	<div id="medtech-carousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#medtech-carousel" data-slide-to="0" class="active"></li>
			<li data-target="#medtech-carousel" data-slide-to="1"></li>
		</ol>

		<div class="carousel-inner" role="listbox">
			
			<div class="item active">


				<div class="layer l1">
					<img src="img/content/slider-1.png" class="img-responsive">
				</div>

				<div class="layer l2">
					<img src="img/circle-home.png">
				</div>

				<div class="layer l3">
					<div class="container">
						MedTech Flanders, Lorem Ipsum Rak dolor
					</div>
				</div>
				
			</div>
		
		</div>
	</div>
</div>

<div class="container body">
	<div class="row">
		<div class="col-sm-9 content">

			

			<div class="row news">
				<div class="col-xs-12">
					<h1>Latest News</h1>

					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', 'home' ); ?>
						<?php endwhile; ?>
					<?php else: ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
					
				</div>
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>