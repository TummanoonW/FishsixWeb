<?php
    $dir = '../';
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_categories.php');
    Includer::include_fun($dir, 'fun_admin_category.php');
    Includer::include_fun($dir, 'fun_category.php');
    Includer::include_fun($dir, 'fun_course.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(FALSE, 'Admin Panel', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'Manage Categories', $dir . App::$pageAdminManageCategories)
    );

    if(Session::checkUserAdmin()){
        $result = FunCategory::count($api);
        $count = $result->response;

        if(isset($io->query->limit)) $limit = $io->query->limit;
        else $limit = 20;

        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }

        $pages = Path::genPages($dir, App::$pageAdminManageCategories, $limit, $c_page, $count);
        $pages[$c_page]->active = TRUE;

        $offset = ($c_page * $limit);        
        $filter = (object)array(
            'limit' => $limit,
            'offset' => $offset
        );

        $result = FunCategory::getFiltered($api, $filter);
        $categories = $result->response;

        Header::initHeader($dir, "Admin - Manage Categories"); 
        AdminManageCategoriesView::initView($dir, $paths, $pages, $categories, $count, $api);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }