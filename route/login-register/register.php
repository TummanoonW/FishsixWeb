<?php
    $dir = "../../";
    include_once $dir . 'includer/includer.php'; //include Includer file to operate
    //include Proto Framework Architecture with retracked directory path
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_auth.php');

    $apiKey = SESSION::getAPIKey(); //get secret API Key

    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data 

    //check if user exists
    if(SESSION::checkUserExisted()){
        Nav::gotoHome($dir);
    }else{
        if($io->post->email != NULL){
            $result = FunAuth::register($api, $io->post);
                
            if($result->success){
                $auth = $result->response;
                SESSION::logIn($auth); //save login data to session
                Nav::goto($dir, App::$pageRegisterSucceed);
            }else{
                ErrorPage::showError($dir, $result);
            }
        }
    }

    function register($api, $form){
        //real register
        /*$url = $api->getURL(API::$apiLogin, 'register', $form);
        $result = $api->post($url);
        return $result;*/

        //mock register
        $auth = new Auth(NULL);
        $auth->username = "Herbert";
        $auth->email = "herbert@gmail.com";
        $result = new Result();
        $result->setResult(TRUE, $auth, NULL);
        return $result;
    }