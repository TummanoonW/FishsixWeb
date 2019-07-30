<?php

    class Nav{

        public static $rootURL = "http://localhost:8080/protoweb";

        public static $pageLogin = "login.php";
        public static $pageRegister = "register.php";
        public static $pageProfile = "profile.php";
        public static $pageMyCourses = "mycourses.php";
        public static $pageCourseView = "viewcourse.php";
        public static $pageMyCart = "mycart.php";
        public static $pageCheckOut = "checkout.php";
        public static $pageBookClass = "bookclass.php";
        public static $pageMySchedule = "myschedule.php";
        public static $pageRegisterSucceed = "registersucceed.php";
        public static $pageRegisterErorr = "registererror.php";
        public static $pageForgotPassword = "forgotpassword.php";
        public static $pageResetPassword = "resetpassword.php";
        public static $pageResetPasswordSucceed = "resetpasswordsucceed.php";

        public static $pageAdminPanel = "admin/index.php";
        public static $pageAdminManageCourses = "admin/manage-courses.php";
        public static $pageAdminCourseEditor = "admin/course-editor.php";
        public static $pageAdminManageCategories = "admin/manage-categories.php";

        public static $routeLogIn = "route/login-register/login.php";
        public static $routeLogOut = "route/login-register/logout.php";
        public static $routeRegister = "route/login-register/register.php";

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