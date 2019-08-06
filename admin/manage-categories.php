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
        new Path(FALSE, 'Home', $dir),
        new Path(FALSE, 'Admin Panel', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'Manage Categories', $dir . App::$pageAdminManageCategories)
    );
    $pages = array(
        new Path(FALSE, '1', $dir . App::$pageAdminManageCategories . "?page=0"),
        new Path(FALSE, '2', $dir . App::$pageAdminManageCategories . "?page=1"),
        new Path(FALSE, '3', $dir . App::$pageAdminManageCategories . "?page=2")
    );

    if(Session::checkUserAdmin()){
        
        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }
        $pages[$c_page]->active = TRUE;

        $result = FunAdminCategory::getCategories($api);
        $categories = $result->response;

        Header::initHeader($dir, "Admin - Manage Categories"); 
        AdminManageCategoriesView::initView($dir, $paths,$categories,$pages);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }