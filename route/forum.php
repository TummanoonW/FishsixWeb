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

                if($_FILES['thumbnail']['error'] == 0){
                    $file = new File($dir, 'uploads/forums/thumbnails/');
                    $option = new FileOption();
                    $option->set(
                        TRUE,
                        TRUE,
                        TRUE,
                        'thumb',
                        1 * 1000 * 1000,
                        ['jpg', 'jpeg', 'png', 'gif']
                    );

                    $result = $file->upload('thumbnail', $option);
                    if($result->success) $form->thumbnail = $result->response->downloadURL;
                }
                if($form->thumbnail == '') unset($form->thumbnail);
              
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
        case 'submitComment':
            $form = $io->post;
            $result = FunForum::postComment($api, $form);
            if($result->success){
                InfoPage::initPage($dir, 'คอมเม้นสำเร็จ');
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
    