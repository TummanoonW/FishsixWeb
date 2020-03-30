<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_user.php');
    Includer::include_fun($dir, 'fun_auth.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'จัดการผู้ใช้', $dir . App::$pageAdminManageUser)
    );

    if($sess->checkUserAdmin()){
        $search = (object)array(
            'type' => '',
            'query' => '',
            'desc' => 0,
            'limit' => 24,
            'offset' => 0,
            'page' => 0
        );

        if(isset($io->get->type)) $search->type = $io->get->type;
        if(isset($io->get->query)) $search->query = $io->get->query;
        if(isset($io->get->desc)) $search->desc = $io->get->desc;
        if(isset($io->get->limit)) $search->limit = $io->get->limit;
        if(isset($io->get->offset)) $search->offset = $io->get->offset;
        if(isset($io->get->page)) $search->page = $io->get->page;
        
        $limit = $search->limit;

        $search2 = clone $search;
        if($search2->desc == 0) $search2->desc = FALSE;
        else $search2->desc = TRUE;

        $result = FunAuth::countFiltered($api, $search);
        $count = $result->response;

        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }

        $params = "&";
        foreach ($search as $key => $value) {
            if($value != 'page') $params = $params . $key . '=' . $value . "&";
        }

        $pages = Path::genPages($dir, App::$pageAdminManageUser, $limit, $c_page, $count);
        $pages[$c_page]->active = TRUE;
        foreach ($pages as $key => $value) {
            if($value != "") $value->url = $value->url . $params;
        }

        $offset = ($c_page * $limit);        
        $search->offset = $offset;

        $result = FunAuth::getFilteredFull($api, $search);
        $auths = $result->response;


        Header::initHeader($dir, "แอดมิน - จัดการผู้ใช้"); 
        AdminManageUserView::initView($dir, $sess, $paths, $pages, $auths, $count, $search);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }

?>
    