<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_user.php');
    Includer::include_fun($dir, 'fun_auth.php');

    $auth = SESSION::getAuth(); 
    $apiKey = SESSION::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'จัดการผู้ใช้', $dir . App::$pageAdminManageUser)
    );

    if(SESSION::checkUserAdmin()){

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

        Header::initHeader($dir, "แอดมิน - จัดการผู้ใช้"); 
        AdminManageUserView::initView($dir, $paths, $pages, $auths, $count, $search);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }

?>
    