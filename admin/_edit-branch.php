<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_edit_branch.php');


    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(FALSE, 'Manage Brach', $dir . App::$pageAdminManageBranch),
        new Path(TRUE, 'Edit Bracnh', $dir . App::$pageAdminEditBranch)
    );

    if($sess->checkUserAdmin()){
        

        Header::initHeader($dir, "Admin - Edit Branch"); 
        AdminEditBranchView::initView($dir, $sess, $paths);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    