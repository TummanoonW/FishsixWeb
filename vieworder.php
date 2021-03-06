<?php
    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_order.php');
    Includer::include_fun($dir, 'fun_order.php');

    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserExisted()){
        $id = $io->id;

        $paths = array(
            new Path(FALSE, 'หน้าหลัก', $dir),
            new Path(FALSE, 'คำสั่งซื้อของฉัน', $dir . App::$pageMyOrders),
            new Path(TRUE, "คำสั่งซื้อ - $id", '')
        );

        $result = FunOrder::getSingleFull($api, $id);
        $order = $result->response;

        if($order != NULL)if($order->ownerID != $auth->ID)$order = null;

        Header::initHeader($dir, "คำสั่งซื้อ - $id"); 
        OrderView::initView($dir, $sess, $paths, $order);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
