<?php
    $dir = "../../";

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_admin_branch.php');

    $apiKey = Session::getAPIKey();
    $auth = Session::getAuth();

    $api = new API($apiKey);
    $io = new IO(); 

    if(Session::checkUserAdmin()){
        switch($io->method){
            case 'edit':
                $form = $io->post;
                if(isset($form->ID)){
                    $result = FunAdminBranch::edit($api, $form);
                }else{
                    $result = FunAdminBranch::create($api, $form);
                }

                if($result->success) Nav::goto($dir, App::$pageAdminManageBranch);
                else ErrorPage::showError($dir, $result);
                break;

            case 'delete':
                $id = $io->id;
                $result = FunAdminBranch::delete($api, $id);

                if($result->success) Nav::goto($dir, App::$pageAdminManageBranch);
                else ErrorPage::showError($dir, $result);
                break;

            default:
                Nav::gotoHome($dir);
                break;
        }   
    }else{
        Nav::gotoHome($dir); 
    }