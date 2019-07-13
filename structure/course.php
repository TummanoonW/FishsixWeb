<?php
    class Course extends Doc{

        public $title = "New Course";

        function __construct($obj){
            parent::__construct($obj);
            $this->parseJSON($obj);
        }

        public function parseJSON($obj){
            if(isset($obj->title))$this->title = $obj->title;
        }
    }
    