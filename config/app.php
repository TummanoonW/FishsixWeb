<?php
    class App{
        public static $name = "fishsix";
        public static $framework = "Proto-Framework Plus";
        public static $version = "4";
        public static $platform = ["PHP", "HTML5"]; 


        public static $rootURL = "https://www.trialation.com/fishsix";

        public static $pageLogin = "login.php";
        public static $pageRegister = "register.php";
        public static $pageProfile = "profile.php";
        public static $pageMyCourses = "mycourses.php";
        public static $pageCourseView = "viewcourse.php";
        public static $pageMyCart = "mycart.php";
        public static $pageCheckOut = "checkout.php";

        public static $pageAdminPanel = "admin/index.php";
        public static $pageAdminManageCourses = "admin/manage-courses.php";
        public static $pageAdminCourseEditor = "admin/course-editor.php";
        public static $pageAdminManageCategories = "admin/manage-categories.php";


        public static $routeLogIn = "route/login-register/login.php";
        public static $routeLogOut = "route/login-register/logout.php";
        public static $routeRegister = "route/login-register/register.php";
        public static $routeMyCart = "route/mycart.php";


        public static $apiURL = "https://www.trialation.com/fishsix-api/"; //base URL to call API
        
        public static $apiLogin = "index.php";
        public static $apiProfile = "profile.php";
        public static $apiCourse = "course.php";
        public static $apiAdminCourse = "admin-course.php";
        public static $apiAdminCategory = "admin-category.php";

    }
?>