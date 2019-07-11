<?php
    include_once '../includer/includer.php'; //include Includer file to operate

    //include Proto Framework Architecture with retracked directory path
    Includer::include_proto("../"); 

    $apiKey = Session::getAPIKey(); //get secret API Key

    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data 

    //check if user exists
    if(Session::checkUserExisted()){
        Nav::goto("../", "profile.php");
    }else{
        //check if form were sent
        if(isset($io->post->email)){
            $form = new Auth($io->post);
            $result = login($api, $form); //connect to API requesting login method
            if($result->success){ //if the API return result
                $auth = $result->response;
                Session::logIn($auth); //save login data to session
                Nav::goto("../", "profile.php"); //redirect to profile page
            }else{
                $io->output($result);
            }
        }else{
            Nav::gotoHome(); //return to home page
        }
    }

    function login($api, $form){
        $url = $api->getURL("index.php", 'login', $form);
        $result = $api->get($url);
        return $result;
    }