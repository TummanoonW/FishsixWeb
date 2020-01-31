<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Keep Sess Running
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    } 

    class App{
        public static $name = "FISHSIX";
        public static $framework = "Proto-Framework Plus";
        public static $version = "4";
        public static $platform = ["PHP", "HTML5"];
        
        public static $debuggingMode = TRUE;

        public static $hostName = "Fishsix. co, ltd.";
        public static $hostAddress = "129/56 ถนนแจ้งวัฒนา เขตคลองสามวา กรุงเทพมหานคร 11010";

        public static $pageLogin = "login.php";
        public static $pageRegister = "register.php";
        public static $pageProfile = "profile.php";
        public static $pageMyCourses = "mycourses.php";
        public static $pageCourseView = "viewcourse.php";
        public static $pageCourses = "courses.php";
        public static $pageMyCart = "mycart.php";
        public static $pageCheckOut = "checkout.php";
        public static $pageBookClass = "bookclass.php";
        public static $pageMySchedule = "myschedule.php";
        public static $pageRegisterSucceed = "registersucceed.php";
        public static $pageRegisterErorr = "registererror.php";
        public static $pageForgotPassword = "forgotpassword.php";
        public static $pageResetPassword = "resetpassword.php";
        public static $pageResetPasswordSucceed = "resetpasswordsucceed.php";
        public static $pageOrderCourses = "ordercourse.php";
        public static $pageViewOrder = "vieworder.php";
        public static $pageMyOrders = "myorders.php";
        public static $pageViewBranch = "viewbranch.php";
        public static $pageViewBooking = "viewbooking.php";
        public static $pageFeedback = "feedback.php";
        public static $pageBranches = "courses.php";
        public static $pageAbout = "about.php";
        public static $pageContact = "contact.php";
        public static $pagePrivacy = "privacy-policy.php";
        public static $pageTerm = "terms-and-conditions.php";
        public static $pageBranch = "branches.php";
        public static $pageTeachers = "teachers.php";
        public static $pageViewTeacher = "viewteacher.php";
        public static $pageHelpCenter = "help-center.php";
        public static $pageError = "error.php";
        public static $pageReview = "review.php";
        public static $pageVideoLibrary = "video-library.php";
        public static $pageVideoPlaylist = "video-playlist.php";
        public static $pageVideoView = "video-view.php";
        public static $pageWriteForum = "forum/write.php";
        public static $pageEditForum = "forum/edit.php";
        public static $pageForums = "forum/index.php";
        public static $pageForumSingle = "forum/view.php";
        public static $pageMyForums = "forum/myforums.php";
        public static $pageTutor = "tutor.php";

        public static $pageDashboard = "dashboard.php";
        public static $pageViewScore = "viewscore.php";
       
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
        public static $pageAdminManageOrders = "admin/manage-orders.php";
        public static $pageAdminAddUser = "admin/add-user.php";
        public static $pageAdminEditUser = "admin/edit-user.php";
        public static $pageAdminAddBranch = "admin/add-branch.php";
        public static $pageAdminEditBranch = "admin/edit-branch.php";
        public static $pageAdminViewOrder = "admin/view-order.php";
        public static $pageAdminViewBooking = "admin/view-booking.php";
        public static $pageAdminManageBookings = "admin/manage-bookings.php";
        public static $pageAdminManageFeedbacks = "admin/manage-feedbacks.php";
        public static $pageAdminViewFeedback = "admin/view-feedback.php";
        public static $pageAdminManageInfo = "admin/manage-info.php";
        public static $pageAdminManageClassrooms = "admin/manage-classrooms.php";
        public static $pageAdminManageOwnerships = "admin/manage-ownerships.php";
        public static $pageAdminViewClassroom = "admin/view-classroom.php";
        public static $pageAdminManageVideos = "admin/manage-videos.php";
        public static $pageAdminEditVideo = "admin/edit-video.php";
        public static $pageAdminEditOwnership = "admin/edit-ownership.php";

        public static $pageAnalytics = "analytics/";

        public static $pageTeacherPanel = "teacher/index.php";
        public static $pageTeacherManageStudent = "teacher/manage-students.php";
        public static $pageTeacherScoring = "teacher/scoring.php";

        public static $routeRecovery= "route/login-register/recovery.php";
        public static $routeLogIn = "route/login-register/login.php";
        public static $routeLogOut = "route/login-register/logout.php";
        public static $routeRegister = "route/login-register/register.php";
        public static $routeMyCart = "route/mycart.php";
        public static $routeProfile = "route/profile.php";
        public static $routeCheckOut = "route/checkout.php";
        public static $routeBookClass = "route/bookclass.php";
        public static $routeFeedback = "route/feedback.php";
        public static $routeForum = "route/forum.php";

        public static $routeAdminCategory = "route/admin/category.php";
        public static $routeAdminBranch = "route/admin/branch.php";
        public static $routeAdminUser = "route/admin/user.php";
        public static $routeAdminCourse = "route/admin/course.php";
        public static $routeAdminOrder = "route/admin/order.php";
        public static $routeAdminFeedback = "route/admin/feedback.php";
        public static $routeAdminVideoLib = "route/admin/video-lib.php";
        public static $routeAdminOwnership = "route/admin/ownership.php";


        public static $routeTeacherScoring = "route/teacher/scoring.php";

        public static $apiURL = "http://64483892-20161210152018.webstarterz.com/fishsix.online/api/"; //base URL to call API
        //public static $apiURL = "https://www.trialation.com/fishsix-api/"; //base URL to call API
        //public static $apiURL = "https://192.168.64.3/fishsix-api/"; //base URL to call API
        
        public static $apiAuth = "apiAuth.php";
        public static $apiLogin = "index.php";
        public static $apiProfile = "profile.php";
        public static $apiCourse = "apiCourse.php";
        public static $apiCategory = "category.php";
        public static $apiBranch = "branch.php";
        public static $apiTeacher = "teacher.php";
        public static $apiOrder = "order.php";
        public static $apiMyCart = "mycart.php";
        public static $apiOwnership = "ownership.php";
        public static $apiBooking = "booking.php";
        public static $apiSchedule = "schedule.php";
        public static $apiFeedback = "feedback.php";
        public static $apiDashboard = "dashboard.php";
        public static $apiClassroom = "classroom.php";
        public static $apiForum = "forum.php";
        public static $apiQA = "qa.php";
        public static $apiVidLib = "vid-lib.php";
        public static $apiVidHis = "vid-his.php";

        public static $apiAdminCourse = "admin-course.php";
        public static $apiAdminCategory = "admin-category.php";
        public static $apiAdminBranch = "admin-branch.php";
        public static $apiAdminAuth = "admin-auth.php";
        public static $apiAdminOrder = "admin-order.php";
        public static $apiAdminFeedback = "admin-feedback.php";


        public static $apiTeacherCourse = "teacher-course.php";
        public static $apiTeacherStudent = "teacher-student.php";
        public static $apiTeacherScoring = "teacher-scoring.php";

    }
?>