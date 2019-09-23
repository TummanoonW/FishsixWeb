<?php
    $dir = "../";

    include_once $dir . 'includer/includer.php'; //include Includer file to operate

    //include Proto Framework Architecture with retracked directory path
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_auth.php');

    $apiKey = Session::getAPIKey(); //get secret API Key
    $auth = Session::getAuth();

    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data

    //check if user exists
    if(Session::checkUserExisted()){
        //check if form were sent
        if(isset($io->post->username)){
            $form = $io->post;

            if($_FILES['profile_pic']['error'] == 0){
                $file = new File($dir, 'uploads/profile_pics/');
                $option = new FileOption();
                $option->set(
                    TRUE,
                    TRUE,
                    TRUE,
                    "u_",
                    1 * 1000 * 1000,
                    ['jpg', 'jpeg', 'png', 'gif']
                );
                $result = $file->upload('profile_pic', $option);
                if($result->success) $form->profile_pic = $result->response->downloadURL;
                else $form->profile_pic = '';
            }


            $result = FunAuth::editProfile($api, $form, $io->id);

            if($result->success){ //if the API return result
                $auth = $result->response;
                Session::logIn($auth); //update username
                Nav::goto($dir, App::$pageProfile);
            }else{
                ErrorPage::showError($dir, $result);
            }
        }else{
            Nav::gotoHome($dir); //return to home page
        }
    }else{
        Nav::gotoHome($dir); //return to home page
    }