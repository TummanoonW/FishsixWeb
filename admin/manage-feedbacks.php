<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_feedbacks.php');
    Includer::include_fun($dir, 'fun_feedback.php');
    Includer::include_fun($dir, 'fun_admin_feedback.php');

    $auth = SESSION::getAuth(); 
    $apiKey = SESSION::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'จัดการรายงานข้อผิดพลาด', '')
    );

    if(SESSION::checkUserAdmin()){
        $limit = 40;

        $result = FunFeedback::count($api);
        $count = $result->response;

        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }

        $pages = Path::genPages($dir, App::$pageAdminManageFeedbacks, $limit, $c_page, $count);
        $pages[$c_page]->active = TRUE;

        $offset = ($c_page * $limit);        

        $filter = (object)array(
            'limit' => $limit,
            'offset' => $offset
        );
        $result = FunFeedback::getFiltered($api, $filter);
        $feedbacks = $result->response;

        Console::log('feedbacks', $feedbacks);

        Header::initHeader($dir, "แอดมิน - จัดการคำสั่งซื้อ"); 
        AdminManageFeedbacksView::initView($dir, $paths, $pages, $feedbacks);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }

    