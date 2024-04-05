<?php
namespace Starterpoint;

class Shortcodes{
    public $shortcodes_list;    

    function __construct(){
        $this->shortcodes_list = [];
        $this->theme_shortcodes();
    }

    function register(){
        foreach($this->shortcodes_list as $shortcode){
            $fn = $shortcode['func'];
            if ($shortcode['active'] ){
                if( method_exists($this, $fn) ) {
                    add_shortcode($shortcode['tag'], [$this, $fn]);
                }
                if(function_exists($fn)){
                    add_shortcode($shortcode['tag'], $fn);
                }
            }
            if ( !function_exists($fn) && ! method_exists($this, $fn) ){
                $fn = array($this, 'callback_not_found');
            }
        }
        add_action('wp_footer', array($this, 'enqueue'));
    }

    public function callback_not_found(){
        return __('Shortcode function not found');
    }


    public function enqueue(){
        global $post;
        foreach ($this->shortcodes_list as $shortcode) {
            if ($shortcode['active'] && $post && has_shortcode($post->post_content, $shortcode['tag'])){
                if (isset($shortcode['required_styles'])) {
                    foreach($shortcode['required_styles'] as $style=>$values){
                        wp_enqueue_style($style, $values['src'], $values['deps'], $values['ver'], $values['media']);
                    }
                }
                if (isset($shortcode['required_scripts'])) {
                    foreach($shortcode['required_scripts'] as $script=>$values){
                        wp_enqueue_script($script, $values['src'], $values['deps'], $values['ver'], $values['in_footer']);
                    }
                }
            }
        }
    }

    
    public function add($shortcode){
        if($shortcode['active']){
            $this->shortcodes_list[] = $shortcode;
        }
    }

    private function theme_shortcodes(){
        $this->shortcodes_list[] = [
            'active' => true,
            'tag' => 'sidebar_content',
            'func' =>  'fn_sidebar_content'
        ];
        $this->shortcodes_list[] = [
            'active' => true,
            'tag' => 'grilla',
            'func' => 'fn_grilla',
        ];
    }

    
    function fn_sidebar_content($atts, $content="null"){
        extract(shortcode_atts(array('id' => ''), $atts));
        $sidebar = '';    
        ob_start();
        dynamic_sidebar($id);
        $sidebar= ob_get_contents();
        ob_end_clean();
        return $sidebar;
    }


    function fn_grilla($atts){
        $idpage = get_the_id();
        $src_folder_name = 'template_parts';

        $atts = shortcode_atts( array(
            'file' => null,
            'post_type' => 'page',
            'post_parent' => $idpage,
            'post_status' => 'publish',
            'posts_per_page' => 10,
            'categorias_paginas' => null,
        ), $atts, 'grilla' );
        
        $args = array(
            'post_type'=> $atts['post_type'],
            'post_parent' => $atts['post_parent'],
            'post_status' => $atts['post_status'],
            'posts_per_page' => $atts['posts_per_page'],
            'categorias_paginas' => !empty($atts['categorias_paginas']) ? $atts['categorias_paginas']: '',
        );

        $file = sprintf('%s\\%s\\%s.php', get_stylesheet_directory() , $src_folder_name, $atts['file'] );


        if (file_exists($file)){
            $template_slug =  sprintf('%s/%s', $src_folder_name, $atts['file']);
            ob_start();
            get_template_part($template_slug, null, $args);
            return ob_get_clean();
        }else{
            return "No se encontro el file {$atts['file']} dentro de $src_folder_name";
        }
    }

}