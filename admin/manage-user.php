<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_user.php');
    Includer::include_fun($dir, 'fun_auth.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(FALSE, 'Admin Panel', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'Manage User', $dir . App::$pageAdminManageUser)
    );

    if(Session::checkUserAdmin()){

        if(!isset($io->query->type)) $search = (object)array(
            'type' => '',
            'query' => '',
            'desc' => FALSE,
            'limit' => 20,
            'offset' => 0
        );
        else $search = $io->query;
        
        $limit = $search->limit;

        $result = FunAuth::countFiltered($api, $search);
        $count = $result->response;

        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }

        $pages = Path::genPages($dir, App::$pageAdminManageUser, $limit, $c_page, $count);
        $pages[$c_page]->active = TRUE;

        $offset = ($c_page * $limit);        
        $search->offset = $offset;

        $result = FunAuth::getFiltered($api, $search);
        $auths = $result->response;

        Header::initHeader($dir, "Admin - Manage User"); 
        AdminManageUserView::initView($dir, $paths, $pages, $auths, $count, $search);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }

?>
    