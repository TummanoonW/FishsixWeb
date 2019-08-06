<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_add_user.php');


    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(FALSE, 'Admin Panel', $dir . App::$pageAdminPanel),
        new Path(FALSE, 'Manage User', $dir . App::$pageAdminManageUser),
        new Path(TRUE, 'Add User', $dir . App::$pageAdminAddUser)
    );

    if(Session::checkUserAdmin()){
        

        Header::initHeader($dir, "Admin - Add User"); 
        AdminAddUserView::initView($dir, $paths);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    