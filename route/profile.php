<?php
    $dir = "../";

    include_once $dir . 'includer/includer.php'; //include Includer file to operate

    //include Proto Framework Architecture with retracked directory path
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_auth.php');

    $sess = new Sess();
    $apiKey = $sess->getAPIKey(); //get secret API Key
    $auth = $sess->getAuth();

    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data

    //check if user exists
    if($sess->checkUserExisted()){
        //check if form were sent
        if(isset($io->post->username)){
            $form = $io->post;

            if($form->profile_pic2 != ""){
                $form->profile_pic = $form->profile_pic2;
            }else{
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
            }
            unset($form->profile_pic2);

            $result = FunAuth::editProfile($api, $form, $io->id);

            if($result->success){ //if the API return result
                $auth = $result->response;
                $sess->logIn($auth); //update username
                Nav::gotoHome($dir);
            }else{
                ErrorPage::showError($dir, $result);
            }
        }else{
            Nav::gotoHome($dir); //return to home page
        }
    }else{
        Nav::gotoHome($dir); //return to home page
    }