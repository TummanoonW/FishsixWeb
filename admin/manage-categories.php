<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_categories.php');
    Includer::include_fun($dir, 'fun_admin_category.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', Nav::$rootURL),
        new Path(FALSE, 'Admin Panel', $dir . Nav::$pageAdminPanel),
        new Path(TRUE, 'Manage Categories', $dir . Nav::$pageAdminManageCategories)
    );

    if(Session::checkUserAdmin()){

        $result = FunAdminCategory::getCategories($api);
        $categories = $result->response;

        Header::initHeader($dir, "Admin - Manage Categories"); 
        AdminManageCategoriesView::initView($dir, $paths, $categories);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome();
    }