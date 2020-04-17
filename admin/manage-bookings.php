<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_bookings.php');
    Includer::include_fun($dir, 'fun_booking.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'จัดการการจอง', '')
    );

    if($sess->checkUserAdmin()){
        if(isset($io->get->query)) $query = $io->get->query;
        else $query = "";

        if(isset($io->query->limit)) $limit = $io->query->limit;
        else $limit = 50;

        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }

        $offset = ($c_page * $limit);        
        $filter = (object)array(
            'query' => $query,
            'limit' => $limit,
            'offset' => $offset
        );

        $result = FunBooking::countFiltered2($api, $filter);
        $count = $result->response;

        $result = FunBooking::getFilteredFull2($api, $filter);
        $bookings = $result->response;

        Console::log("count", $count);

        $pages = Path::genPages($dir, App::$pageAdminManageBookings, $limit, $c_page, $count);
        $pages[$c_page]->active = TRUE;
        foreach ($pages as $key => $value) {
            if($value != "") $value->url = $value->url . "&query=$query";
        }

        Header::initHeader($dir, "แอดมิน - จัดการการจอง"); 
        AdminManageBookingsView::initView($dir, $sess, $paths, $pages, $bookings, $count, $query);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }

    