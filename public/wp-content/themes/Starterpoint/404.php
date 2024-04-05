<?php get_header(); ?>

<main id="cuerpo mb-5 mt-3">
	<div class="text-center">
		<div class="card text-center py-5">
			<div class="card-body">
				<img src="<?=$starterpoint->stylesheet_uri?>/assets/img/404.png" alt="">
				<h5 class="card-title">Algo no funciona...</h5>
				<p class="card-text">Es probable que la página solicitada haya sido movida o eliminada.</p>
				<p>
					<a href="/" class="btn btn-primary card-link">Ir al Inicio</a>
					<a href="javascript:history.back();" class="btn btn-primary card-link">Volver</a>
				</p>
				<hr>
			</div>
		</div>
	</div>
</main>

<hr class="d-none">

<?php get_footer(); ?>
