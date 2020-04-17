<?php
    $dir = "../../";
    include_once $dir . 'includer/includer.php'; //include Includer file to operate
    //include Proto Framework Architecture with retracked directory path
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_auth.php');

    $sess = new Sess();
    $apiKey = $sess->getAPIKey(); //get secret API Key

    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data 

    //check if user exists
    if($sess->checkUserExisted()){
        Nav::gotoHome($dir);
    }else{
        switch($io->method){
            case 'login':
                //check if form were sent
                if(isset($io->post->email)){
                    $result = FunAuth::login($api, $io->post); //connect to API requesting login method

                    if($result->success){ //if the API return result
                        $auth = $result->response;
                        $result = FunAuth::checkUnlockable($api, $auth->ID);
                        $auth = $result->response;
                        $sess->logIn($auth); //save login data to Sess
                        Nav::gotoHome($dir); //redirect to profile page
                    }else{
                        ErrorPage::showError($dir, $result);
                    }
                }else{
                    Nav::gotoHome($dir); //return to home page
                }
                break;
            case 'google':
                if(isset($io->post->email)){
                    $result = FunAuth::loginGoogle($api, $io->post); //connect to API requesting login method
                    
                    if($result->success){ //if the API return result
                        $auth = $result->response;
                        $sess->logIn($auth); //save login data to Sess
                        Nav::gotoHome($dir); //redirect to profile page
                    }else{
                        ErrorPage::showError($dir, $result);
                    }
                }else{
                    Nav::gotoHome($dir); //return to home page
                }
                break;
            default:
                break;
        }
    }

    function login($api, $form){


        /*mock login
        if($form->email == 'root@localhost'){
            $auth = new Auth(NULL);
            $auth->username = "Bismarck";
            $auth->email = "root@localhost";
            $auth->apiKey = "51bd0a6070d7fbbc46963f2e2e518d73";
            $auth->type = Auth::$TYPE_ADMIN;
            $result = new Result();
            $result->setResult(TRUE, $auth, NULL);
            return $result;
        }else{
            $auth = new Auth(NULL);
            $auth->username = "Wilhelm";
            $auth->email = "wilhelm@gmail.com";
            $auth->apiKey = "51bd0a6070d7fbbc46963f2e2e518d73";
            $result = new Result();
            $result->setResult(TRUE, $auth, NULL);
            return $result;
        }*/
    }