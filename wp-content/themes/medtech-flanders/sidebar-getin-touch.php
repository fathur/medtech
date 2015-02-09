
<?php if (is_page('about-us') || is_post_type_archive('events') ) : ?>
	
<div class="row get-touch">
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
<?php endif; ?>