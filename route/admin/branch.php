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

                if($_FILES['thumbnail']['error'] == 0){
                    $file = new File($dir, 'uploads/branches/thumbnails/');
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
                    else $form->thumbnail = '';
                }
                if($form->thumbnail == '') unset($form->thumbnail);

                if($_FILES['map']['error'] == 0){
                    $file = new File($dir, 'uploads/maps/');
                    $option = new FileOption();
                    $option->set(
                        TRUE,
                        TRUE,
                        TRUE,
                        'thumb',
                        1 * 1000 * 1000,
                        ['jpg', 'jpeg', 'png', 'gif']
                    );

                    $result = $file->upload('map', $option);
                    if($result->success) $form->map = $result->response->downloadURL;
                    else $form->map = '';
                }
                if($form->map == '') unset($form->map);


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