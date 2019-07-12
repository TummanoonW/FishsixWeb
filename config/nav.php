<?php

    class Nav{

        public static $rootURL = "http://192.168.64.3/protoweb";

        public static $pageLogin = "login.php";
        public static $pageRegister = "register.php";
        public static $pageProfile = "profile.php";
        public static $pageMyCourses = "mycourses.php";

        public static $routeLogIn = "route/login-register/login.php";
        public static $routeLogOut = "route/login-register/logout.php";

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

        //add URL text combining between directory path and file name to HTML page
        public static function printURL($dir, $file){
            echo $dir . $file;
        }
    }