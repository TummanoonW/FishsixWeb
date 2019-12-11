<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_edit_user.php');
    Includer::include_fun($dir, 'fun_auth');

    $auth = SESSION::getAuth(); 
    $apiKey = SESSION::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(FALSE, 'จัดการผู้ใช้', $dir . App::$pageAdminManageUser),
        new Path(TRUE, 'โปรแกรมแก้ไขผู้ใช้', $dir . App::$pageAdminAddUser)
    );

    if(SESSION::checkUserAdmin()){
        $id = $io->id;
        $isNew = ($id == NULL);
        if($isNew){
            $auth = new StdClass();
            $user = new StdClass();
        }else{
            $result = FunAuth::getSingleFull($api, $id);
            $auth = $result->response->auth;
            $user = $result->response->user;
        }

        Header::initHeader($dir, "แอดมิน - โปรแกรมแก้ไขผู้ใช้"); 
        AdminAddUserView::initView($dir, $paths, $isNew, $auth, $user);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    