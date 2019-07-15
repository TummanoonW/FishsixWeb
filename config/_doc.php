<?php

    //a parent class for being extended to other classes as data model
    class Doc{
        public $ID;

        //initialize ID once the object is constructed
        function __construct($obj){
            if(isset($obj->ID))$this->ID = $obj->ID;
        }

        //return this object as JSON string
        public function toJSON(){
            return json_encode($this);
        }
    }