<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_branch.php');


    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(FALSE, 'Admin Panel', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'Manage Branch', $dir . App::$pageAdminManageBranch)
    );

    $pages = array(
        new Path(FALSE, '1', $dir . App::$pageAdminManageBranch . "?page=0"),
        new Path(FALSE, '2', $dir . App::$pageAdminManageBranch . "?page=1"),
        new Path(FALSE, '3', $dir . App::$pageAdminManageBranch . "?page=2")
    );

    if(Session::checkUserAdmin()){
        
        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }
        $pages[$c_page]->active = TRUE;

        Header::initHeader($dir, "Admin - Manage Branch"); 
        AdminManageBranchView::initView($dir, $paths, $pages);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    