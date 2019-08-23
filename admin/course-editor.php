<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_course_editor.php');

    Includer::include_fun($dir, 'fun_category.php');
    Includer::include_fun($dir, 'fun_admin_course.php');
    Includer::include_fun($dir, 'fun_course.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home',            $dir),
        new Path(FALSE, 'Admin Panel',     $dir . App::$pageAdminPanel),
        new Path(FALSE, 'Manage Courses',  $dir . App::$pageAdminManageCourses),
        new Path(TRUE,  'Course Editor',   $dir . App::$pageAdminCourseEditor)
    );

    if(Session::checkUserAdmin()){
        $id = $io->id;
        $isNew = ($id == NULL);

        $result = FunCategory::get($api);
        $categories = $result->response;

        if(!$isNew){ //new course
            $result = FunCourse::getCourse($api, $io->id);
            $course = $result->response;
            $lessons = [];
            $packages = [];
            $branches = [];
            $teachers = [];
            $classes = [];
        }else{
            $course = new StdClass();
            $lessons = [];
            $packages = [];
            $branches = [];
            $teachers = [];
            $classes = [];
        }

        Header::initHeader($dir, "Admin - Course Editor"); 
        AdminCourseEditorView::initView($dir, $paths, $isNew, $course, $categories, $lessons, $packages, $branches, $teachers, $classes);
        Footer::initFooter($dir);
    }else{
        Nav::gotoHome($dir);
    }




?>
    