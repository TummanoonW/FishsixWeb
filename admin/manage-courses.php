<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_courses.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if(Session::checkUserAdmin()){
        Header::initHeader($dir, "Admin - Manage Courses"); 
        AdminManageCoursesView::initView($dir);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome();
    }
?>
    