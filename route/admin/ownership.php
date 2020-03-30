<?php
    $dir = "../../";

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir);
    Includer::include_fun($dir, 'fun_admin_ownership.php');

    $sess = new Sess();
    $apiKey = $sess->getAPIKey();
    $auth = $sess->getAuth();

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserAdmin()){
        switch($io->method){
            case 'days30':
                $id = $io->id;
                $result = FunAdminOwnership::days30($api, $id);
                if($result->success) Nav::goBack();
                else ErrorPage::showError($dir, $result);
                break;

            case 'delete':
                $id = $io->id;
                $result = FunAdminOwnership::delete($api, $id);
                if($result->success) Nav::goBack();
                else ErrorPage::showError($dir, $result);
                break;

            case 'update':
                $form = $io->post;
                $result = FunAdminOwnership::update($api, $form);
                if($result->success) Nav::goto($dir, App::$pageAdminManageOwnerships);
                else ErrorPage::showError($dir, $result);
                break;

            default:
                Nav::gotoHome($dir);
                break;
        }   

    }else{
        Nav::gotoHome($dir); 
    }