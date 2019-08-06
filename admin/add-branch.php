<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_add_branch.php');


    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(FALSE, 'Admin Panel', $dir . App::$pageAdminPanel),
        new Path(FALSE, 'Manage Brach', $dir . App::$pageAdminManageBranch),
        new Path(TRUE, 'Add Bracnh', $dir . App::$pageAdminAddBranch)
    );

    if(Session::checkUserAdmin()){
        

        Header::initHeader($dir, "Admin - Add Branch"); 
        AdminAddBranchView::initView($dir, $paths);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    