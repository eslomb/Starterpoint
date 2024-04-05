<?php
namespace Starterpoint;


class Sidebars{
    public $sidebars_list;

    function __construct(){
        $this->sidebars_list = array();
    }

    public function register(){
        foreach($this->sidebars_list as $sidebar){
            register_sidebar($sidebar);
        }  
    }

    public function add($sidebar){
        $this->sidebars_list[] = $sidebar;
    }

}