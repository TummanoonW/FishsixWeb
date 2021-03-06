<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_edit_user.php');


    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(FALSE, 'จัดการผู้ใช้', $dir . App::$pageAdminManageUser),
        new Path(TRUE, 'Edit User', $dir . App::$pageAdminEditUser)
    );

    if($sess->checkUserAdmin()){
        

        Header::initHeader($dir, "Admin - Edit User"); 
        AdminEditUserView::initView($dir, $sess, $paths);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    