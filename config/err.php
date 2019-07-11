<?php

    class Err{
        //preset of Err
        public static $ERR_NO_DATA          = array("code" => 0, "msg" => "No Data");
        public static $ERR_WRONG_AUTH       = array("code" => 1, "msg" => "Wrong email or password");
        public static $ERR_USER_EXISTED     = array("code" => 2, "msg" => "This user is already existed");
        public static $ERR_NO_APIKEY        = array("code" => 3, "msg" => "No API Key");
        public static $ERR_UNAUTH_APIKEY    = array("code" => 4, "msg" => "Un-authorized API Key");
        public static $ERR_CONN_FAILED      = array("code" => 5, "msg" => "Connection failed");

        //allow developers to create their owner constant Err
        public static function genErr($code, $msg){
            return array("code" => $code, "msg" => $msg);
        }
    }