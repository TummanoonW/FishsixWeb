<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_courses.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path('Home', Nav::$rootURL),
        new Path('Admin Panel', $dir . Nav::$pageAdminPanel),
        new Path('Manage Courses', $dir . Nav::$pageAdminManageCourses)
    );

    if(Session::checkUserAdmin()){
        Header::initHeader($dir, "Admin - Manage Courses"); 
        AdminManageCoursesView::initView($dir, $paths);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome();
    }
?>
    