<?php get_header(); ?>


<main id="cuerpo">
	<div class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>				
			
			<section>
				<?php the_content(__('(more...)')); ?>
			</section>

		<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
	</div>
</main>

<hr class="d-none">
<div class="d-none">
Core version: <?=$starterpoint->get_core_version()?><br>
Theme version: <?=$starterpoint->get_theme_version()?><br>
Stylesheet uri: <?=$starterpoint->get_stylesheet_uri()?><br> 
</div>

<?php get_footer(); ?>
