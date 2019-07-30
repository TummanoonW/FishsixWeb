<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_mycart.php');

    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_mycart.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(TRUE, 'My Cart', $dir . App::$pageMyCart)
    );

    if(Session::checkUserExisted()){
        $ownerID = Session::getAuth()->ID;
        $result = FunMyCart::getMyCartFull($api, $ownerID);
        if($result->success){
            $cart = $result->response;
            Header::initHeader($dir,"My Cart"); 
            MyCartView::initView($dir, $paths, $cart);
            Footer::initFooter($dir); 
        }else{
            ErrorPage::showError($dir, $result);
        }
    }else{
        Nav::gotoHome($dir);
    }
