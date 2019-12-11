<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_view_order.php');
    Includer::include_fun($dir, 'fun_auth.php');
    Includer::include_fun($dir, 'fun_order.php');

    $auth = SESSION::getAuth(); 
    $apiKey = SESSION::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(FALSE, 'จัดการคำสั่งซื้อ', $dir . App::$pageAdminManageOrders),
        new Path(TRUE, 'ดูคำสั่งซื้อ', '')
    );

    if(SESSION::checkUserAdmin()){
        $id = $io->id;

        $result = FunOrder::getSingleFull($api, $id);
        $order = $result->response;

        $result = FunAuth::getSingleFull($api, $order->ownerID);
        $owner = $result->response;

        Header::initHeader($dir, "แอดมิน - ดูคำสั่งซื้อ"); 
        AdminViewOrder::initView($dir, $paths, $order, $owner);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    