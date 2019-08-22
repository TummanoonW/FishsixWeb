<?php
    $dir = "../../";

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_admin_auth.php');

    $apiKey = Session::getAPIKey();
    $auth = Session::getAuth();

    $api = new API($apiKey);
    $io = new IO(); 

    if(Session::checkUserAdmin()){
        switch($io->method){
            case 'edit':
                $form = $io->post;
                if(isset($form->ID)){
                    $result = FunAdminAuth::edit($api, $form);
                }else{
                    $result = FunAdminAuth::create($api, $form);
                }

                //echo json_encode($result);
                if($result->success) Nav::goto($dir, App::$pageAdminManageUser);
                else ErrorPage::showError($dir, $result);
                break;

            case 'delete':
                $id = $io->id;
                $result = FunAdminAuth::delete($api, $id);

                if($result->success) Nav::goto($dir, App::$pageAdminManageUser);
                else ErrorPage::showError($dir, $result);
                break;

            default:
                Nav::gotoHome($dir);
                break;
        }   
    }else{
        Nav::gotoHome($dir); 
    }