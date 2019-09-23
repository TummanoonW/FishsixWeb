<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_checkout.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(FALSE, 'My Cart', $dir . App::$pageMyCart),
        new Path(TRUE, 'Pay', $dir . App::$pageCheckOut)
    );

    Header::initHeader($dir, "ชำระสินค้า"); 
    CheckOutView::initView($dir, $paths);
    Footer::initFooter($dir); 
