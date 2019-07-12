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
        //check if form were sent
        if(isset($io->post->email)){
            $form = new Auth($io->post);
            $result = login($api, $form); //connect to API requesting login method
            if($result->success){ //if the API return result
                $auth = $result->response;
                Session::logIn($auth); //save login data to session
                Nav::gotoHome(); //redirect to profile page
            }else{
                $io->output($result);
            }
        }else{
            Nav::gotoHome(); //return to home page
        }
    }

    function login($api, $form){
        //real login
        /*$url = $api->getURL(API::$apiLogin, 'login', $form);
        $result = $api->get($url);
        return $result;*/

        //mock login
        $auth = new Auth(NULL);
        $auth->username = "Wilhelm";
        $auth->email = "wilhelm@gmail.com";
        $result = new Result();
        $result->setResult(TRUE, $auth, NULL);
        return $result;
    }