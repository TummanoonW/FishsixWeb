<?php
    class Package extends Doc{
        public $price = 0;
        public $credit = 0;
        public $courseID = NULL;

        function __construct($obj){
            parent::__construct($obj);
            $this->parseJSON($obj);
        }

        public function parseJSON($obj){
            if(isset($obj->price))$this->price = $obj->price;
            if(isset($obj->credit))$this->credit = $obj->credit;
            if(isset($obj->courseID))$this->courseID = $obj->courseID;
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