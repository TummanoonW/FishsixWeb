<?php
    $dir = "../../";

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_admin_category.php');

    $sess = new Sess();
    $apiKey = $sess->getAPIKey();
    $auth = $sess->getAuth();

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserAdmin()){
        switch($io->method){
            case 'edit':
                $form = $io->post;
                if(isset($form->ID)){
                    $result = FunAdminCategory::edit($api, $form);
                }else{
                    $result = FunAdminCategory::create($api, $form);
                }

                if($result->success) Nav::goto($dir, App::$pageAdminManageCategories);
                else ErrorPage::showError($dir, $result);
                break;

            case 'delete':
                $id = $io->id;
                $result = FunAdminCategory::delete($api, $id);

                if($result->success) Nav::goto($dir, App::$pageAdminManageCategories);
                else ErrorPage::showError($dir, $result);
                break;

            default:
                Nav::gotoHome($dir);
                break;
        }   
    }else{
        Nav::gotoHome($dir); 
    }