<?php
    $dir = "../../";

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_video_lib.php');

    $sess = new Sess();
    $apiKey = $sess->getAPIKey();
    $auth = $sess->getAuth();

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserAdmin()){
        switch($io->method){
            case 'add':
                $form = $io->post;
                if(isset($form->isHeader))$form->header = 1;
                else $form->header = 0;
                $result = FunVideoLib::add($api, $form);
                
                if($result->success) Nav::goto($dir, App::$pageAdminManageVideos);
                else ErrorPage::showError($dir, $result);
                break;

            case 'edit':
                $form = $io->post;
                $id = $form->ID;
                if(isset($form->isHeader))$form->header = 1;
                else $form->header = 0;
                $result = FunVideoLib::edit($api, $id, $form);

                if($result->success) Nav::goto($dir, App::$pageAdminManageVideos);
                else ErrorPage::showError($dir, $result);
                break;

            case 'delete':
                $id = $io->id;
                $result = FunVideoLib::delete($api, $id);

                if($result->success) Nav::goBack();
                else ErrorPage::showError($dir, $result);
                break;

            default:
                Nav::gotoHome($dir);
                break;
        }   
    }else{
        Nav::gotoHome($dir); 
    }