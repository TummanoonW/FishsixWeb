<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_home.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, 'ระบบจัดการ', $dir . App::$pageAdminPanel)
    );

    if($sess->checkUserAdmin()){
        Header::initHeader($dir, App::$name . " - ระบบจัดการ"); 
        AdminHomeView::initView($dir, $sess, $paths);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }
?>
    