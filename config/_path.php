<?php 
    class Path{
        public $label;
        public $url;

        function __construct($label, $url){
            $this->label = $label;
            $this->url = $url;
        }
    }