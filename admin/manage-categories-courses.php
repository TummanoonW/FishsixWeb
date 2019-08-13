<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_categories_courses.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(FALSE, 'Admin Panel', $dir . App::$pageAdminPanel),
        new Path(FALSE, 'Manage Categories', $dir . App::$pageAdminManageCategories),
        new Path(TRUE, 'View Courses', $dir . App::$pageAdminManageCategoriesCourses)
    );

    $pages = array(
        new Path(FALSE, '1', $dir . App::$pageAdminManageCourses . "?page=0"),
        new Path(FALSE, '2', $dir . App::$pageAdminManageCourses . "?page=1"),
        new Path(FALSE, '3', $dir . App::$pageAdminManageCourses . "?page=2")
    );

    if(Session::checkUserAdmin()){
        
        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }
        $pages[$c_page]->active = TRUE;

        Header::initHeader($dir, "Admin - View Course"); 
        AdminManageCategoriesCoursesView::initView($dir, $paths, $pages);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }