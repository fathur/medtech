<article class="row item">
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

		<div class="day-date"><?php echo date("l d.m.y", get_post_meta(
			get_the_ID(), 
			'wpcf-event-date', 
			true
		) ) ; ?></div>
		
		<div class="place"><?php echo get_post_meta(get_the_ID(), 'wpcf-event-location', true); ?></div>

		<div class="isi">
			<?php the_excerpt(); ?>
		</div>

		<a href="<?php the_permalink(); ?>" class="readmore">Read more</a>
	</div>
</article>
