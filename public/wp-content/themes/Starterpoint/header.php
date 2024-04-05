<?php global $starterpoint;?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $starterpoint->posts->getPostDescription() ?>" />
    <title><?php the_title(); ?> - <?php bloginfo('site_name'); ?></title>

    <!-- Analytics -->
    <?= $starterpoint->options->getOption('analytics') ?>

    <!-- Facebook -->
    <meta property="og:title" content="<?php the_title(); ?>" />
    <meta property="og:site_name" content="<?php bloginfo('site_name') ?>" />
    <meta property="og:image" content="<?= $starterpoint->posts->getSocialImg() ?>" />
    <?php if ($post && $post->post_excerpt) : ?><meta property="og:description" content="<?= $post->post_excerpt ?>" /><?php endif; ?>

    <!-- Twitter -->
    <meta name="twitter:url" content="<?= get_permalink($post->ID) ?>" />
    <meta name="twitter:image:src" content="<?= $starterpoint->posts->getSocialImg() ?>" />
    <meta name="twitter:site" content="<?php bloginfo('site_name') ?>" />
    <meta name="twitter:title" content="<?php the_title(); ?>" />


    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('url') ?>/favicon.ico" />

    <?php wp_head(); ?>
</head>


<body <?= body_class() ?>>

    <div id="fb-root"></div>
    <?php get_template_part('template_parts/bodyinc'); ?>
    <?php get_template_part('template_parts/sidr'); ?>

    
    <header id="cabecera">
        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light pl-0 pr-0">
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="http://placehold.it/150x80&text=Logo" class="logo" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                </a>

                <a id="sidr-button" class="d-lg-none" href="#sidr"><i class="fas fa-bars"></i></a>

                <div id="navbarSupportedContent" class="collapse navbar-collapse justify-content-end">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header-menu',
                            'container' => 'ul',
                            'menu_class' => 'navbar-nav',
                            'depth' => 0
                        )
                    );
                    ?>

                </div>
            </nav>

        </div><!-- /.container -->
    </header> 