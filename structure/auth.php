<?php

    class Auth extends Doc{

        public $email;
        public $password;
        public $password_hash;
        public $username;
        public $profile_pic;
        public $apiKey;
        public $type;
        
        //construct both itself and the parent class it extends
        function __construct($obj){
            parent::__construct($obj);
            $this->parseJSON($obj);
        }

        //savely initialize data for each variables
        //if certain variables is not set at the first place, it will be initialize as NULL or some default value
        public function parseJSON($obj){
            if(isset($obj->email))$this->email = $obj->email;
            if(isset($obj->password))$this->password = $obj->password;
            if(isset($obj->password_hash)){
                $this->password_hash = $obj->password_hash;
            }else{
                if(isset($obj->password))$this->password_hash = md5($obj->password);
            }
            if(isset($obj->username))$this->username = $obj->username;
            if(isset($obj->profile_pic))$this->profile_pic = $obj->profile_pic;
            if(isset($obj->apiKey)){
                $this->apiKey = $obj->apiKey;
            }else{
                if(isset($this->email))$this->apiKey = md5($this->email);
            }
            if(isset($obj->type)){
                $this->type = $obj->type;
            }else{
                $this->type = "user";
            }
        }

        //return this object as JSON string
        public function toJSON(){
            return json_encode($this);
        }

        //check if certain variables are fullfil
        public function validate(){
            return ($this->email != NULL && $this->password_hash != NULL && $this->username != NULL);
        }

        //generate query script for insertion
        public function getInsertIntoQuery($table){
            return "INSERT INTO " . $table . " (ID, email, password_hash, username, profile_pic, apiKey, type) VALUES (NULL, '" . $this->email . "', '" . $this->password_hash . "', '" . $this->username . "', '" . $this->profile_pic . "', '" . $this->apiKey . "', '" . $this->type . "')";
        }

        //generate query script for update
        public function getUpdateQuery($table){
            return "UPDATE " . $table . " SET username='" . $this->username . "', profile_pic='" . $this->profile_pic . "' WHERE ID=" . $this->ID;
        }
    }