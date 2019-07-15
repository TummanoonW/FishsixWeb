<?php 
    class Path{
        public $active;
        public $label;
        public $url;

        function __construct($active, $label, $url){
            $this->active = $active;
            $this->label = $label;
            $this->url = $url;
        }
    }