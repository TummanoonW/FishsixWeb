<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_edit_branch.php');
    Includer::include_fun($dir, 'fun_branch.php');


    $auth = Session::getAuth();
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(FALSE, 'จัดการสาขา', $dir . App::$pageAdminManageBranch),
        new Path(TRUE, 'โปรแกรมแก้ไขสาขา', $dir . App::$pageAdminAddBranch)
    );

    if(Session::checkUserAdmin()){
        $id = $io->id;
        $isNew = ($id == NULL);

        if($isNew){
            $branch = new StdClass();
        }else{
            $result = FunBranch::getSingle($api, $id);
            $branch = $result->response;
        }

        Header::initHeader($dir, "แอดมิน - โปรแกรมแก้ไขสาขา"); 
        AdminAddBranchView::initView($dir, $paths, $isNew, $branch);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    