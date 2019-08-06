<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_add_categories.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(FALSE, 'Admin Panel', $dir . App::$pageAdminPanel),
        new Path(FALSE, 'Manage Categories', $dir . App::$pageAdminManageCategories),
        new Path(TRUE, 'Add Categories', $dir . App::$pageAdminAddCategories)
    );

    if(Session::checkUserAdmin()){
        Header::initHeader($dir, "Admin - Add Categories"); 
        AdminAddCategoriesView::initView($dir, $paths);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }