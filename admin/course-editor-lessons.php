<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_course_editor_lessons.php');


    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home',            $dir),
        new Path(FALSE, 'Admin Panel',     $dir . App::$pageAdminPanel),
        new Path(FALSE, 'Manage Courses',  $dir . App::$pageAdminManageCourses),
        new Path(FALSE,  'Course Editor',   $dir . App::$pageAdminCourseEditor),
        new Path(TRUE,  'Add Lesson',   $dir . App::$pageAdminCourseEditorLessons)
    );

    if(Session::checkUserAdmin()){
        

        Header::initHeader($dir, "Admin - Add Lesson"); 
        AdminCourseEditorLessonView::initView($dir, $paths);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    