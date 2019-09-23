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
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, 'ตะกร้าสินค้า ของฉัน', $dir . App::$pageMyCart)
    );
    
    $carts = [];    
    if(Session::checkUserExisted()){
        $authID = Session::getAuth()->ID;

        if(isset($io->query->ID)){
            $package = $io->query;
            $cart = (object)array(
                'ownerID' => $authID,
                'packageID' => $package->ID
            );
            $result = FunMyCart::add($api, $cart);
        }

        $result = FunMyCart::getByAuthID($api, $authID);
        $response = $result->response;
        array_merge($carts, $response);

        $isLoggedIn = TRUE;
    }else{
        $isLoggedIn = FALSE;
    }

    $s_carts = Session::get('mycart');
    if($s_carts == NULL) $s_carts = [];

    if(isset($io->query->ID)){
        $package = $io->query;
        $cart = (object)array(
            'ID' => NULL,
            'ownerID' => NULL,
            'packageID' => $package->ID,
            'courseID' => $package->courseID,
            'package' => $package
        );
        array_push($s_carts, $cart);
        Session::set('mycart', $s_carts);
    }

    $cartsS = [];
    foreach ($s_carts as $key => $c) {
        $result = FunCourse::get($api, $c->courseID);
        $c->course = $result->response;
        array_push($cartsS, $c);
    }

    Header::initHeader($dir, "ตระกร้าสินค้า ของฉัน"); 
    MyCartView::initView($dir, $paths, $carts, $cartsS, $isLoggedIn);
    Footer::initFooter($dir); 
