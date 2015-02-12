<div class="col-sm-3 sidebar">

	<?php if (is_active_sidebar('sidebar-1')) : ?>
	<div id="sidebar-1">
		<?php dynamic_sidebar('sidebar-1'); ?>
	</div>
	<?php endif; ?>

	<?php if (is_active_sidebar('sidebar-2')) : ?>
	<div id="sidebar-2">
		<?php dynamic_sidebar('sidebar-2'); ?>
	</div>
	<?php endif; ?>

</div>