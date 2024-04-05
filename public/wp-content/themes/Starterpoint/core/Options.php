<?php

namespace Starterpoint;

class Options{

    public function getOption($name, $default_val=null){
        if (function_exists('ot_get_option')){
            if(ot_get_option( $name, $default_val )){
                return ot_get_option($name);
            }
        }
        return;
    }

    public function getFormattedOption($name, $format, $default_val=null){
        if (function_exists('ot_get_option')){
            if(ot_get_option( $name, $default_val )){
                return sprintf($format, ot_get_option($name));
            }
        }
        return;
    }
}