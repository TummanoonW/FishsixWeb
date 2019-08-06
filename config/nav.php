<?php

    class Nav{

        //refresh page
        public static function refresh(){
            header("Refresh:0");
        }


        /* --- navigate to Home // echo Home URL // return Home url string ---- */
        function gotoHome($dir){
            header( "location: " . $dir);
            exit();
        }
        public static function echoHome($dir){
            echo $dir;
        }
        public static function getHome($dir){
            return $dir;
        }
        /* --- navigate to Home // echo Home URL // return Home url string ---- */


        /* --- navigate to previous URL // echo previous URL // return previous URL string --- */ 
        public static function goBack(){
	        header("Location: {$_SERVER['HTTP_REFERER']}");
	        exit();
        }
        public static function echoPrevious(){
            echo $_SERVER['HTTP_REFERER'];
        }
        public static function getPrevious(){
            return $_SERVER['HTTP_REFERER'];
        }
        /* --- navigate to previous URL // echo previous URL // return previous URL string --- */ 


        /* --- navigate to specific URL // echo specific URL // return specific URL --- */
        public static function goto($dir, $url){
            header( "location: " .  $dir . $url );
            exit();
        }
        public static function echoURL($dir, $file){
            echo $dir . $file;
        }
        public static function getURL($dir, $file){
            return $dir . $file;
        } 
        /* --- navigate to specific URL // echo specific URL // return specific URL --- */


    }