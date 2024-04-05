<?php
// ================================
// Assets
// ================================
use Starterpoint\Utils;

function register_custom_assets(){
    global $starterpoint;
    // ================= DESCOMENTAR LOS ESTILOS NECESARIOS =================
    $theme_styles = [
        // 'bootstrap' => [
        //     'src' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        //     'deps' => null,
        //     'ver' => '5.3.3',
        //     'media' => 'all'
        // ],
        // 'fontawesome' => [
        //     'src' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',
        //     'deps' => null,
        //     'ver' => '6.5.2',
        //     'media' => 'all'
        // ],
    ];
    // ================= DESCOMENTAR LOS SCRIPTS NECESARIOS =================
    $theme_scripts = [
        // 'jquery-cdn' => array(
        //     'src' => 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js',
        //     'deps' => null,
        //     'ver' => '3.7.1',
        //     'args' => [
        //         'in_footer' => true,
        //     ]
        // ),
        // 'vue' => array(
        //     'src' => 'https://unpkg.com/vue@3/dist/vue.global.js',
        //     'deps' => null,
        //     'ver' => '3.4.21',
        //     'args' => [
        //         'in_footer' => false,
        //     ]
        // ),
        // 'axios' => array(
        //     'src' => 'https://unpkg.com/axios/dist/axios.min.js',
        //     'deps' => null,
        //     'ver' => '1.6.8',
        //     'args' => [
        //         'in_footer' => false,
        //         'strategy' => 'defer'
        //     ]
        // ),
        // 'bootstrap' => array(
        //     'src' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        //     'deps' => ['jquery-core'],
        //     'ver' => '5.3.3',
        //     'args' => [
        //         'in_footer' => true,
        //     ]
        // ),
        // 'social' => array(
        //     'src' => sprintf('%s/%s/js/social.js', Utils::styleSheetUri(), THEME_ASSETS_FOLDER),
        //     'deps' => null,
        //     'ver' => '1',
        //     'args' => [
        //         'in_footer' => true,
        //         'strategy' => 'defer'
        //     ]
        // ),
        // 'jquery.sidr' => array(
        //     'src' => sprintf('%s/%s/js/jquery.sidr.min.js', Utils::styleSheetUri(), THEME_ASSETS_FOLDER),
        //     'deps' => 'jquery-cdn',
        //     'ver' => '3.0.0',
        //     'args' => [
        //         'in_footer' => true,
        //         'strategy' => 'defer'
        //     ]
        // ), 
    ];
    
    $starterpoint->assets->register($theme_styles, $theme_scripts);

    $starterpoint->assets->remove_scripts(['jquery-migrate']);

    if(is_child_theme()){

    }  
}

function enqueue_custom_assets(){
    global $starterpoint;
    // DESCOMENTAR LOS ESTILOS NECESARIOS
    $additional_styles = [
        // 'starterpoint' => [
        //     'src' => sprintf('%s/%s/css/global.css', Utils::styleSheetUri(), THEME_ASSETS_FOLDER),
        //     'deps' => null,
        //     'ver' =>  Utils::themeVersion(),
        //     'media' => 'all'
        // ]
    ];
    // DESCOMENTAR LOS SCRIPTS NECESARIOS
    $additional_scripts = [
        // 'starterpoint' => [
        //     'src' => sprintf('%s/%s/js/funciones.js', Utils::styleSheetUri(), THEME_ASSETS_FOLDER),
        //     'deps' => ['jquery-core'],
        //     // 'deps' => null,
        //     'ver' => Utils::themeVersion(),
        //     'args' => [
        //         'in_footer' => true,
        //         'strategy' => 'defer'
        //     ]
        // ]
    ];

    $starterpoint->assets->register($additional_styles, $additional_scripts);

    $starterpoint->assets->enqueue();    
}