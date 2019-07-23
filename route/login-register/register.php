<?php
    $dir = "../../";
    
    include_once $dir . 'includer/includer.php'; //include Includer file to operate

    //include Proto Framework Architecture with retracked directory path
    Includer::include_proto($dir); 

    $apiKey = Session::getAPIKey(); //get secret API Key

    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data 

    //check if user exists
    if(Session::checkUserExisted()){
        Nav::gotoHome();
    }else{
        if($io->post->email != NULL){
            $form = new Auth($io->post);
            $result = register($api, $form);
            if($result->success){
                $auth = $result->response;
                Session::logIn($auth); //save login data to session
                Nav::gotoHome(); //redirect to profile page
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