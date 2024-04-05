<footer id="pie">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php get_template_part('template_parts/datos' );?>
            </div>
            <div class="col-md-6">
                <?=get_template_part('template_parts/social');?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php dynamic_sidebar('footer-1' );?>
            </div>
            <div class="col-md-6">
                <?php dynamic_sidebar('footer-2' );?>
            </div>
        </div>
    </div>
</footer>

<div id="scroll-top"><a href="#" class="fas fa-angle-up"><span></span></a></div>
<?php wp_footer(); ?>
</body>
</html>