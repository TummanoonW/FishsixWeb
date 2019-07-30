<?php
    $dir = "../../";

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_admin_category.php');

    $apiKey = Session::getAPIKey();
    $auth = Session::getAuth();

    $api = new API($apiKey);
    $io = new IO(); 

    if(Session::checkUserAdmin()){
        switch($io->method){
            case 'edit':
                $category = new Category($io->input);
                $result = FunAdminCategory::editCategory($api, $category->ID, $category);

                if($result->success) Nav::goto($dir, App::$pageAdminManageCategories);
                else ErrorPage::showError($dir, $result);
                break;

            case 'create':
                $category = new Category($io->input);
                $result = FunAdminCategory::createCategory($api, $category);
                
                if($result->success) Nav::goto($dir, App::$pageAdminManageCategories);
                else ErrorPage::showError($dir, $result);
                break;

            case 'delete':
                $id = $io->input->id;
                $result = FunAdminCategory::deleteCategory($api, $id);

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