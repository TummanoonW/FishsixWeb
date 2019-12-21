<?php
    $dir = "../../";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_auth.php');

    $sess = new Sess();
    $apiKey = $sess->getAPIKey();
    $api = new API($apiKey);
    $io = new IO(); 

    switch($io->method){
        case 'forget':
            if(isset($io->post->email)){
                $result = FunAuth::sendEmailRecovery($api, $io->post);
                if($result->success){
                    Nav::goto($dir, App::$pageForgotPassword . "?m=show");
                }else{
                    ErrorPage::showError($dir, $result);
                }
            }else{
                Nav::gotoHome($dir); 
            }
            break;
        case 'reset':
            $tokenID = $io->id;
            $form = $io->post;
            $result = FunAuth::resetPassword($api, $form, $tokenID);
            if($result->success){
                Nav::goto($dir, App::$pageResetPasswordSucceed);
            }else{
                ErrorPage::showError($dir, $result);
            }
            break;
        default:
            Nav::gotoHome($dir); 
            break;

    }
    
