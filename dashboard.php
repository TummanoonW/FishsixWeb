<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_dashboard.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'คอร์สของฉัน', $dir . App::$pageMyCourses),
        new Path(TRUE, 'แดชบอร์ด', $dir)
    );

   if(Session::checkUserExisted()){
        Header::initHeader($dir, "แดชบอร์ด"); 
        DashboardView::initView($dir, $paths);
        Footer::initFooter($dir); 
   }else{
        Nav::gotoHome();
    }
    
?>