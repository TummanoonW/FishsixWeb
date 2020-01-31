<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_ownerships.php');
    Includer::include_fun($dir, 'fun_ownership.php');
    Includer::include_fun($dir, 'fun_course.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'จัดการความเป็นเจ้าของ', '')
    );

    if($sess->checkUserAdmin()){
        $limit = 50;

        $result = FunOwnership::count($api);
        $count = $result->response;

        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }

        $pages = Path::genPages($dir, App::$pageAdminManageOwnerships, $limit, $c_page, $count);
        $pages[$c_page]->active = TRUE;

        if(isset($io->get->isExpired)) $isExpired = $io->get->isExpired;
        else $isExpired = "null";
        if(isset($io->get->courseID)) $courseID = $io->get->courseID;
        else $courseID = "null";
        if(isset($io->get->ownerID)) $ownerID = $io->get->ownerID;
        else $ownerID = "null";
        if(isset($io->get->desc)) $desc = $io->get->desc;
        else $desc = TRUE;

        foreach ($pages as $key => $value) {
            $e = "&isExpired=" . $isExpired;
            $c = "&courseID=" . $courseID;
            $o = "&ownerID=" . $ownerID;

            $value->url = $value->url . $e . $c . $o; 
        }

        $offset = ($c_page * $limit);        

        $filter = (object)array(
            'limit' => $limit,
            'offset' => $offset,
            'isExpired' => $isExpired,
            'courseID' => $courseID,
            'ownerID' => $ownerID,
            'desc' => $desc
        );
        $filter2 = clone $filter;
        $result = FunOwnership::getFilteredFull($api, $filter2);
        $ownerships = $result->response;

        Console::log('Ownerships', $ownerships);
        Console::log('Filter', $filter);

        $result = FunCourse::getPublishedLite($api);
        $courses = $result->response;

        Header::initHeader($dir, "แอดมิน - จัดการความเป็นเจ้าของ"); 
        AdminManageOwnershipsView::initView($dir, $sess, $paths, $pages, $filter, $ownerships, $courses, $count);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }

    