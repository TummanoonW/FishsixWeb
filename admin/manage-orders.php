<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_orders.php');
    Includer::include_fun($dir, 'fun_order.php');
    Includer::include_fun($dir, 'fun_admin_order.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'จัดการคำสั่งซื้อ', '')
    );

    if(Session::checkUserAdmin()){
        $limit = 40;

        $result = FunOrder::count($api);
        $count = $result->response;

        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }

        $pages = Path::genPages($dir, App::$pageAdminManageOrders, $limit, $c_page, $count);
        $pages[$c_page]->active = TRUE;

        $offset = ($c_page * $limit);        

        $filter = (object)array(
            'limit' => $limit,
            'offset' => $offset
        );
        $result = FunAdminOrder::getFiltered($api, $filter);
        $orders = $result->response;

        Header::initHeader($dir, "แอดมิน - จัดการคำสั่งซื้อ"); 
        AdminManageOrdersView::initView($dir, $paths, $pages, $orders);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }

    