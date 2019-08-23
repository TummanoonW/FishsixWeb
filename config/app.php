<?php
    class App{
        public static $name = "fishsix";
        public static $framework = "Proto-Framework Plus";
        public static $version = "4";
        public static $platform = ["PHP", "HTML5"]; 

        public static $pageLogin = "login.php";
        public static $pageRegister = "register.php";
        public static $pageProfile = "profile.php";
        public static $pageBrowseCourses = "browsecourses.php";
        public static $pageMyCourses = "mycourses.php";
        public static $pageCourseView = "viewcourse.php";
        public static $pageMyCart = "mycart.php";
        public static $pageCheckOut = "checkout.php";
        public static $pageOrderCourses = "ordercourses.php";
        public static $pageMyOrder = "myorder.php";
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
        public static $pageAdminCourseEditorLessons = "admin/course-editor-lessons.php";
        public static $pageAdminCourseEditorPackage = "admin/course-editor-package.php";
        public static $pageAdminCourseEditorBranch = "admin/course-editor-branch.php";
        public static $pageAdminCourseEditorTime = "admin/course-editor-time.php";
        public static $pageAdminCourseEditorTeacher = "admin/course-editor-teacher.php";
        public static $pageAdminManageCategories = "admin/manage-categories.php";
        public static $pageAdminManageCategoriesCourses = "admin/manage-categories-courses.php";
        public static $pageAdminAddCategories = "admin/add-categories.php";
        public static $pageAdminManageUser = "admin/manage-user.php";
        public static $pageAdminManageBranch = "admin/manage-branch.php";
        public static $pageAdminManageOrder = "admin/manage-order.php";
        public static $pageAdminAddUser = "admin/add-user.php";
        public static $pageAdminEditUser = "admin/edit-user.php";
        public static $pageAdminAddBranch = "admin/add-branch.php";
        public static $pageAdminEditBranch = "admin/edit-branch.php";

        public static $routeRecovery= "route/login-register/recovery.php";
        public static $routeLogIn = "route/login-register/login.php";
        public static $routeLogOut = "route/login-register/logout.php";
        public static $routeRegister = "route/login-register/register.php";
        public static $routeMyCart = "route/mycart.php";
        public static $routeProfile = "route/profile.php";

        public static $apiURL = "https://www.trialation.com/fishsix-api/"; //base URL to call API
        
        public static $apiAuth = "apiAuth.php";
        public static $apiLogin = "index.php";
        public static $apiProfile = "profile.php";
        public static $apiCourse = "course.php";
        public static $apiAdminCourse = "admin-course.php";
        public static $apiAdminCategory = "admin-category.php";

    }
?>