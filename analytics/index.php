<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_analytics($dir, 'analytics_home.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, 'Analytics', $dir . App::$pageAnalytics)
    );

    if($sess->checkUserAdmin()){
        Header::initHeader($dir, App::$name . " - Analytics"); 
        AnalyticsHomeView::initView($dir, $sess, $paths);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }
?>
    