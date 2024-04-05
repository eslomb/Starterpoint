<?php
// ================================
// Sidebars
// ================================
$starterpoint->sidebars->add(
    array(
        'name' => __('Sidebar lateral'),
        'id' => 'sidebar-lateral',
        'description' => 'Barra lateral',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    )
);

$starterpoint->sidebars->add(
    array(
        'name' => __('Menu Mobile'),
        'id' => 'menu-mobile',
        'description' => 'Menu que se despliega en un dispositivo movil',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    )    
);

$starterpoint->sidebars->add(
    array(
        'name' => __('Footer 1'),
        'id' => 'footer-sidebar-1',
        'description' => 'Area footer 1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    )
);

$starterpoint->sidebars->add(
    array(
        'name' => __('Footer 2'),
        'id' => 'footer-sidebar-2',
        'description' => 'Area footer 2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    )
);
