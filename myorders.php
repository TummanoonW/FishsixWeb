<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_myorders.php');
    Includer::include_fun($dir, 'fun_order.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, 'คำสั่งซื้อของฉัน', '')
    );

    if($sess->checkUserExisted()){

        $result = FunOrder::getByAuthID($api, $auth->ID);
        $orders = $result->response;

        Header::initHeader($dir, $auth->username . " - คอร์สของฉัน"); 
        MyOrdersView::initView($dir, $sess, $paths, $orders);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
