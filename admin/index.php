<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_home.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', Nav::$rootURL),
        new Path(TRUE, 'Admin Panel', $dir . Nav::$pageAdminPanel)
    );

    if(Session::checkUserAdmin()){
        Header::initHeader($dir, App::$name . " - Admin Panel"); 
        AdminHomeView::initView($dir, $paths);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome();
    }
?>
    