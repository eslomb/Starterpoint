<?php

namespace Starterpoint;

class Base{
    protected $stylesheetUri;
    
    function __construct(){
        $this->stylesheetUri = Utils::styleSheetUri();
    }
}