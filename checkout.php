<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_checkout.php');
    Includer::include_fun($dir, 'fun_mycart.php');

    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserExisted()){
        /*$result = FunMyCart::countByAuthID($api, $auth->ID);
        $count = $result->response;*/

        $s_carts = $sess->get('mycart');
        if($s_carts == NULL) $s_carts = [];

        if(count($s_carts) > 0){
            $paths = array(
                new Path(FALSE, 'หน้าหลัก', $dir),
                new Path(TRUE, 'ชำระสินค้า', '')
            );

            Header::initHeader($dir, "ชำระสินค้า"); 
            CheckOutView::initView($dir, $sess, $paths);
            Footer::initFooter($dir); 
        }else{
            Nav::gotoHome($dir);
        }
    }else{
        Nav::gotoHome($dir);
    }