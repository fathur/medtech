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
	<div class="circle">
		<img src="<?php echo get_template_directory_uri(); ?>/img/circle.png" class="img-responsive">
	</div>

	<div class="image">
		<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
			<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
		<?php endif; ?>
	</div>

</div>

<div class="container body">
	<div class="row">
		
		<div class="col-sm-9 content">
			<div class="row <?php medtech_class(); ?>">
				<div class="col-xs-12">

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page-single' ); ?>
					<?php endwhile; ?>

				</div>
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>