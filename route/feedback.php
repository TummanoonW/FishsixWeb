<?php

    $dir = "../";
    include_once $dir . 'includer/includer.php'; //include Includer file to operate

    //include Proto Framework Architecture with retracked directory path
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_feedback.php');

    $sess = new Sess();
    $apiKey = $sess->getAPIKey(); //get secret API Key
    $auth = $sess->getAuth();
    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data 
    
    switch($io->method){
        case 'submit':
            if(isset($io->get->err)){
                $error_code = $io->get->err;
            }else{
                $error_code = NULL;
            }
            
                $form = $io->post;
                $form->err = $error_code;
                if($sess->checkUserExisted()){
                    $form->authID = $auth->ID;
                    $form->isGuest = 0;
                }else{
                    $form->authID = NULL;
                    $form->isGuest = 1;
                }
                $result = FunFeedback::send($api, $form);
                if($result->success){
                    InfoPage::initPage($dir, 'รายงานข้อผิดพลาดเสร็จสิ้น');
                    Console::log('Result', $result);
                }else{
                    //ErrorPage::initPage($dir, $result);
                    Console::log('Result', $result);
                }
            
            break;
        default:
            Nav::gotoHome($dir); //return to home page
            break;
    }
    