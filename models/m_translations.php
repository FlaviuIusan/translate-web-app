<?php

class Translations{

    private $apostrof = "'";

    function __construct()
    {
        
    }

    public function translate($textToTranslate){

        return $textToTranslate." Translated";
    }
}

?>