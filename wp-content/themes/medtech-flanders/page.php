<?php

/**
 * Validating:
 * 1. Is page
 * 2. Is single
 * 
 * 
 */

get_header(); ?>

<div class="fluid-container header header-content">
	<div class="circle" 
		style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/circle.png');
		background-repeat: no-repeat; 
		background-position: center -140px;">
	</div>

	<?php $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>

	<div class="image" style="background-image: url('<?php echo $thumbnail_url; ?>');
		background-repeat: no-repeat; 
		background-position: center -30px;
		background-size: cover;">
	</div>

</div>

<div class="container body">
	<div class="row">
		
		<div class="col-sm-9 content">
			<div class="row detail <?php medtech_class(); ?>">
				<article class="col-xs-12">

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page-single' ); ?>
					<?php endwhile; ?>

				</article>
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>