<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_view_order.php');
    Includer::include_fun($dir, 'fun_auth.php');
    Includer::include_fun($dir, 'fun_order.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(FALSE, 'จัดการคำสั่งซื้อ', $dir . App::$pageAdminManageOrders),
        new Path(TRUE, 'ดูคำสั่งซื้อ', '')
    );

    if($sess->checkUserAdmin()){
        $id = $io->id;

        $result = FunOrder::getSingleFull($api, $id);
        $order = $result->response;

        $result = FunAuth::getSingleFull($api, $order->ownerID);
        $owner = $result->response;

        if(isset($io->get->isUpdate)){
            $isUpdate = TRUE;
        }else{
            $isUpdate = FALSE;
        }

        Header::initHeader($dir, "แอดมิน - ดูคำสั่งซื้อ"); 
        AdminViewOrder::initView($dir, $sess, $paths, $order, $owner, $isUpdate);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    