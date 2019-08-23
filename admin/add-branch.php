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
        new Path(FALSE, 'Home', $dir),
        new Path(FALSE, 'Admin Panel', $dir . App::$pageAdminPanel),
        new Path(FALSE, 'Manage Branch', $dir . App::$pageAdminManageBranch),
        new Path(TRUE, 'Branch Editor', $dir . App::$pageAdminAddBranch)
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

        Header::initHeader($dir, "Admin - Branch Editor"); 
        AdminAddBranchView::initView($dir, $paths, $isNew, $branch);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    