<?php

    class Nav{

        public static $rootURL = "http://192.168.64.3/protoweb";

        //navigate to Home URL
        function gotoHome(){
            header( "location: " . self::$rootURL);
            exit();
        }

        //refresh page
        function redirect(){
            header("Refresh:0");
        }

        //navigate to previous page
        function goBack(){
	        header("Location: {$_SERVER['HTTP_REFERER']}");
	        exit();
        }

        //navigate to specific URL with target directory
        public static function goto($dir, $url){
            header( "location: " .  $dir . $url );
            exit();
        }
    }