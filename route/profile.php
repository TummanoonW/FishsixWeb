<?php
    $dir = "../";

    include_once $dir . 'includer/includer.php'; //include Includer file to operate

    //include Proto Framework Architecture with retracked directory path
    Includer::include_proto($dir); 

    $apiKey = Session::getAPIKey(); //get secret API Key
    $auth = Session::getAuth();

    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data

    //check if user exists
    if(Session::checkUserExisted()){
        //check if form were sent
        if(isset($io->post->username)){
            $form = new Auth($io->post);
            $form->ID = $auth->ID;
            $result = editProfile($api, $form);

            if($result->success){ //if the API return result
                $auth->username = $io->post->username;
                Session::logIn($auth); //update username
                Nav::goto($dir, "profile.php");
            }else{
                ErrorPage::showError($dir, $result);
            }
        }else{
            Nav::gotoHome(); //return to home page
        }
    }else{
        Nav::gotoHome(); //return to home page
    }

    function editProfile($api, $form){
        //real edit profile
        /*$url = $api->getURL(API::$apiProfile, 'edit', NULL);
        $result = $api->post($url, $form);
        return $result;*/

        $result = new Result();
        $result->setResult(TRUE, $form, NULL);
        return $result;
    }