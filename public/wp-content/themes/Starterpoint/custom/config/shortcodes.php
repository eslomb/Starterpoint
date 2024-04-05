<?php
// ================================
// shortcodes
// ================================
$starterpoint->shortcodes->add([
    'active' => false,
    'tag' => 'shortcode_tag',
    'func' => 'fn_shortcode_tag',
    'required_scripts' => array(
        'vue_posts' => array(
            'src' => get_stylesheet_directory_uri() . '/assets/js/shortcode.js',
            'deps' => array(),
            'ver' => '1.0',
            'in_footer' => true
        ),
    )    
]);


function fn_shortcode_tag($atts){
    $html = '';
    return $html; 
}



