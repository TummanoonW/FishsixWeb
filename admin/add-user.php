<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_edit_user.php');
    Includer::include_fun($dir, 'fun_auth');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(FALSE, 'Admin Panel', $dir . App::$pageAdminPanel),
        new Path(FALSE, 'Manage User', $dir . App::$pageAdminManageUser),
        new Path(TRUE, 'User Editor', $dir . App::$pageAdminAddUser)
    );

    if(Session::checkUserAdmin()){
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

        Header::initHeader($dir, "Admin - User Editor"); 
        AdminAddUserView::initView($dir, $paths, $isNew, $auth, $user);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    