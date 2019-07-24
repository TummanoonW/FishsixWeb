<?php
    class Category extends Doc{
        public $title = "New Category";
        public $masterID = NULL;

        function __construct($obj){
            parent::__construct($obj);
            $this->parseJSON($obj);
        }

        public function parseJSON($obj){
            if(isset($obj->title))$this->title = $obj->title;
            if(isset($obj->masterID))$this->masterID = $obj->masterID;
        }

        //return this object as JSON string
        public function toJSON(){
            return json_encode($this);
        }

        //check if certain variables are fullfil
        public function validate(){
            $array = (array)$rec;
            $boo = TRUE;
            foreach ($array as $key => $value) {
                $boo = $boo && ($key != NULL);
            }
            return $boo;
        }
    }