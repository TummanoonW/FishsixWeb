<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_edit_categories.php');
    Includer::include_fun($dir, 'fun_category.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(FALSE, 'Admin Panel', $dir . App::$pageAdminPanel),
        new Path(FALSE, 'Manage Categories', $dir . App::$pageAdminManageCategories),
        new Path(TRUE, 'Category Editor', $dir . App::$pageAdminAddCategories)
    );

    if(Session::checkUserAdmin()){
        $id = $io->id;
        $isNew = ($id == NULL);
        if($isNew){
            $category = new StdClass();
        }else{
            $result = FunCategory::getSingle($api, $id);
            $category = $result->response;
        }

        $result = FunCategory::get($api);
        $categories = $result->response;

        Header::initHeader($dir, "Admin - Category Editor"); 
        AdminAddCategoriesView::initView($dir, $paths, $isNew, $category, $categories);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }