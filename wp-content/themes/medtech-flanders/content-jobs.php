<article class="row item">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-12">

				<?php if ( is_single() ) : ?>
					<h3><?php the_title(); ?></h3>
				<?php else: ?>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php endif; ?>

			</div>
		</div>

		<div class="row">

			<div class="col-xs-12 col-sm-3 pull-right">

				<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
					<?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive img-featured')); ?>
				<?php else: ?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/no-image.jpg" class="img-responsive img-featured">
				<?php endif; ?>

			</div>

			<div class="col-xs-12 col-sm-9 pull-left">
				<div class="isi">
					<?php the_excerpt(); ?>
				</div>

				<a href="<?php the_permalink(); ?>" class="readmore">Read more</a>
			</div>

			
		</div>
	</div>
</article>	