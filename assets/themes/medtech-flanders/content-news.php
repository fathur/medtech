<article class="row item" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="col-sm-4 col-xs-4">
		<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
			<?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive img-featured')); ?>
		<?php else: ?>
			<img src="<?php echo get_template_directory_uri(); ?>/img/no-image.jpg" class="img-responsive img-featured">
		<?php endif; ?>
	</div>

	<div class="col-sm-8 col-xs-8">
		
		<?php if ( is_single() ) : ?>
			<h3><?php the_title(); ?></h3>
		<?php else: ?>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php endif; ?>

		<?php edit_post_link( 'edit', '<span class="edit-link glyphicon glyphicon-pencil">', '</span>' ); ?>
		

		<div class="isi">
			<span class="date-hidden hide"><?php echo get_the_date('d.m.y'); ?></span> 
			<?php the_excerpt(); ?>
		</div>

		<a href="<?php the_permalink(); ?>" class="readmore">Read more</a>
	</div>
</article>