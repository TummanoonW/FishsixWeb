<?php
    $dir = "../../";

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_admin_feedback.php');

    $sess = new Sess();
    $apiKey = $sess->getAPIKey();
    $auth = $sess->getAuth();

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserAdmin()){
        switch($io->method){
            case 'read':
                $id = $io->id;
                $result = FunAdminFeedback::status($api, $id, 'read');
                if($result->success) Nav::goBack();
                else ErrorPage::showError($dir, $result);
                break;

            case 'unread':
                $id = $io->id;
                $result = FunAdminFeedback::status($api, $id, 'unread');
                if($result->success) Nav::goBack();
                else ErrorPage::showError($dir, $result);
                break;

            case 'spam':
                $id = $io->id;
                $result = FunAdminFeedback::status($api, $id, 'spam');
                if($result->success) Nav::goBack();
                else ErrorPage::showError($dir, $result);
                break;
            
            case 'delete':
                $id = $io->id;
                $result = FunAdminFeedback::delete($api, $id);
                if($result->success) Nav::goBack();
                else ErrorPage::showError($dir, $result);
                break;

            default:
                Nav::gotoHome($dir);
                break;
        }   

    }else{
        Nav::gotoHome($dir); 
    }