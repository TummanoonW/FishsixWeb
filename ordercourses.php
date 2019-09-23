<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_ordercourses.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(FALSE, 'My Cart', $dir . App::$pageMyCart),
        new Path(FALSE, 'Pay', $dir . App::$pageCheckOut),
        new Path(TRUE, 'Order Courses', $dir . App::$pageOrderCourses)
    );

    if(Session::checkUserExisted()){
            
        Header::initHeader($dir,"Order Courses"); 

        OrderCoursesView::initView($dir, $paths);

        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
