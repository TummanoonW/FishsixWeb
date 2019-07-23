<?php

    class Nav{
        //navigate to Home URL
        function gotoHome(){
            header( "location: " . App::$rootURL);
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

        //add URL text combining between directory path and file name to HTML page
        public static function printURL($dir, $file){
            echo $dir . $file;
        }

        public static function printHome(){
            echo App::$rootURL;
        }
    }