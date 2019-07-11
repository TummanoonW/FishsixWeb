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

            }else{
                ErrorPage::showError($result);
            }
        }
    }

    function register($api, $form){
        $url = $api->getURL(API::$apiLogin, 'register', $form);
        $result = $api->post($url);
        return $result;
    }