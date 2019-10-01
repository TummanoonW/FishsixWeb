<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_checkout.php');
    Includer::include_fun($dir, 'fun_mycart.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if(Session::checkUserExisted()){
        $result = FunMyCart::countByAuthID($api, $auth->ID);
        $count = $result->response;

        if($count > 0){
            $paths = array(
                new Path(FALSE, 'หน้าหลัก', $dir),
                new Path(TRUE, 'ชำระสินค้า', '')
            );

            Header::initHeader($dir, "ชำระสินค้า"); 
            CheckOutView::initView($dir, $paths);
            Footer::initFooter($dir); 
        }else{
            Nav::gotoHome($dir);
        }
    }else{
        Nav::gotoHome($dir);
    }