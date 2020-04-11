<?php
    $dir = "../../";

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_booking.php');

    $sess = new Sess();
    $apiKey = $sess->getAPIKey();
    $auth = $sess->getAuth();

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserAdmin()){
        switch($io->method){
            case 'delete':
                $id = $io->id;
                $result = FunBooking::safeDelete($api, $id);
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