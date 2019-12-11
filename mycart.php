<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_mycart.php');

    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_mycart.php');

    $auth = SESSION::getAuth(); 
    $apiKey = SESSION::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, 'ตะกร้าสินค้า ของฉัน', $dir . App::$pageMyCart)
    );
    
    $carts = [];    

    $s_carts = SESSION::get('mycart');
    if($s_carts == NULL) $s_carts = [];

    if(SESSION::checkUserExisted()){
        /*$result = FunMyCart::addMultiple($api, $s_carts);
        $s_carts = [];
        SESSION::set('mycart', $s_carts);

        if(isset($io->query->ID)){
            $package = $io->query;
            $cart = (object)array(
                'ownerID' => $auth->ID,
                'packageID' => $package->ID,
                'courseID' => $package->courseID
            );
            $result = FunMyCart::add($api, $cart);
        }

        $result = FunMyCart::getByAuthID($api, $auth->ID);
        $carts = $result->response;

        $isLoggedIn = TRUE;
    }else{*/
        if(isset($io->query->ID)){
            $package = $io->query;
            $cart = (object)array(
                'ID' => NULL,
                'ownerID' => $auth->ID,
                'packageID' => $package->ID,
                'courseID' => $package->courseID,
                'package' => $package
            );
            array_push($s_carts, $cart);
            SESSION::set('mycart', $s_carts);
        }
        $isLoggedIn = TRUE;
    }else{

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
            SESSION::set('mycart', $s_carts);
        }
        $isLoggedIn = FALSE;
    }

    $cartsS = [];
    foreach ($s_carts as $key => $c) {
        $result = FunCourse::get($api, $c->courseID);
        $c->course = $result->response;
        array_push($cartsS, $c);
    }

    Console::log('carts', $cartsS);

    Header::initHeader($dir, "ตระกร้าสินค้า ของฉัน"); 
    MyCartView::initView($dir, $paths, $carts, $cartsS, $isLoggedIn);
    Footer::initFooter($dir); 
