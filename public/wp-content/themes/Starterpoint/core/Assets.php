<?php
namespace Starterpoint;
use Starterpoint\Base;

class Assets extends Base{
    private $styles;
    private $scripts;
   
    public function register($styles, $scripts){
        foreach ($styles as $style => $values) {
            $this->register_style($style, $values);
        }

        foreach ($scripts as $script => $values) {
            $this->register_script($script, $values);
        }
    }

    public function enqueue(){
        if(!empty($this->styles)) {
            foreach ($this->styles as $style => $values) {
                wp_enqueue_style($style);
            }
        }
        if(!empty($this->scripts)){
            foreach ($this->scripts as $script => $values) {
                wp_enqueue_script($script);
            }
        }
    }

    private function register_style($style, $values){
        $this->styles[$style] = $values;
        wp_register_style($style, $values['src'], $values['deps'], $values['ver'], $values['media'] );
    }
    
    private function register_script($script, $values){
        $this->scripts[$script] = $values;
        wp_register_script($script, $values['src'], $values['deps'], $values['ver'], $values['args'] );
    }

    public function remove_styles($styles){
        foreach ($styles as $style) {
            if(wp_style_is($style, 'enqueued'));
            wp_deregister_style($style);
        }
    }

    public function remove_scripts($scripts){
        foreach ($scripts as $script) {
            if(wp_script_is($script, 'enqueued'))
                wp_deregister_script($script);
        }
    }
    
}