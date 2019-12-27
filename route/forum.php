<?php

    $dir = "../";
    include_once $dir . 'includer/includer.php'; //include Includer file to operate

    //include Proto Framework Architecture with retracked directory path
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_forum.php');

    $sess = new Sess();
    $apiKey = $sess->getAPIKey(); //get secret API Key
    $auth = $sess->getAuth();
    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data 
    
    switch($io->method){
        case 'submit':
     
            
                $form = $io->post;
              
                if($sess->checkUserExisted()){
                    $form->authorID = $auth->ID;                
                } 
                $result = FunForum::post($api, $form);
                if($result->success){
                    InfoPage::initPage($dir, 'เขียนบทความสำเร็จ');
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
    