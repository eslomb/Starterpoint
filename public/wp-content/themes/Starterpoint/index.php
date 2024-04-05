<?php get_header(); ?>

<main id="cuerpo">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<?php the_content(__('(more...)')); ?>
				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
			</div>

			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>

		</div><!-- /.row -->
	</div><!-- /.container -->
</main><!-- /#cuerpo -->

<hr class="d-none">

<?php get_footer(); ?>
