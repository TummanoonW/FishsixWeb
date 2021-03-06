<?php
    $dir = "../../";

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_admin_order.php');

    $sess = new Sess();
    $apiKey = $sess->getAPIKey();
    $auth = $sess->getAuth();

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserAdmin()){
        switch($io->method){
            case 'confirm':
                $id = $io->id;
                $result = FunAdminOrder::confirm($api, $id);
                if($result->success) Nav::goBack();
                else ErrorPage::showError($dir, $result);
                break;

            case 'pending':
                $id = $io->id;
                $result = FunAdminOrder::pending($api, $id);
                if($result->success) Nav::goBack();
                else ErrorPage::showError($dir, $result);
                break;

            case 'rejected':
                $id = $io->id;
                $result = FunAdminOrder::rejected($api, $id);
                if($result->success) Nav::goBack();
                else ErrorPage::showError($dir, $result);
                break;

            case 'updateNote':
                $id = $io->id;
                $note = $io->post->note;
                $result = FunAdminOrder::updateNote($api, $id, $note);
                if($result->success) Nav::goto($dir, App::$pageAdminViewOrder . "?id=$id&isUpdate=1");
                else ErrorPage::showError($dir, $result);
                break;

            default:
                Nav::gotoHome($dir);
                break;
        }   

    }else{
        Nav::gotoHome($dir); 
    }