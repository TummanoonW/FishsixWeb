<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_branch.php');
    Includer::include_fun($dir, 'fun_branch.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'จัดการสาขา', $dir . App::$pageAdminManageBranch)
    );

    if(Session::checkUserAdmin()){
        $result = FunBranch::count($api);
        $count = $result->response;

        if(isset($io->query->limit)) $limit = $io->query->limit;
        else $limit = 20;

        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }

        $pages = Path::genPages($dir, App::$pageAdminManageBranch, $limit, $c_page, $count);
        $pages[$c_page]->active = TRUE;

        $offset = ($c_page * $limit);        
        $filter = (object)array(
            'limit' => $limit,
            'offset' => $offset
        );

        $result = FunBranch::getFiltered($api, $filter);
        $branches = $result->response;

        Header::initHeader($dir, "แอดมิน - จัดการสาขา"); 
        AdminManageBranchView::initView($dir, $paths, $pages, $branches, $count);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }

    