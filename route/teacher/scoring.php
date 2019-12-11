<?php
    $dir = "../../";

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_teacher_scoring.php');

    $apiKey = SESSION::getAPIKey();
    $auth = SESSION::getAuth();

    $api = new API($apiKey);
    $io = new IO(); 

    if(SESSION::checkUserTeacher()){
        switch($io->method){
            case 'score':
                $form = $io->post;
                $tid = $io->get->tid;
                $result = FunTeacherScoring::scoreStudent($api, $form);

                if($result->success) Nav::goto($dir, App::$pageTeacherManageStudent . "?id=$tid");
                else ErrorPage::showError($dir, $result);
                break;

            default:
                Nav::gotoHome($dir);
                break;
        }   
    }else{
        Nav::gotoHome($dir); 
    }