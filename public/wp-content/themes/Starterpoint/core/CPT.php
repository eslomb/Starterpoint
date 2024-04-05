<?php
namespace Starterpoint;


class CPT{
    public $cpt_list;

    function __construct(){
        $this->cpt_list = array();
    }

    public function register(){
        foreach ($this->cpt_list as $cpt=>$values) {
            register_post_type($cpt, $values);
        }
		
    }
}