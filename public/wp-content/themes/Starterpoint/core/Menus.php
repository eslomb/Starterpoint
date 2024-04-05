<?php
namespace Starterpoint;


class Menus{
    public $menus_list;

    function __construct(){
        $this->menus_list = array();
    }

    function register(){
        foreach($this->menus_list as $slug=>$title){
            register_nav_menu($slug, $title);
        } 
    }

}