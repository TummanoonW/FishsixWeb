<?php
    $dir = "../../";

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_admin_auth.php');

    $sess = new Sess();
    $apiKey = $sess->getAPIKey();
    $auth = $sess->getAuth();

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserAdmin()){
        switch($io->method){
            case 'edit':
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
                }

                if(isset($form->ID)){
                    $result = FunAdminAuth::edit($api, $form);
                }else{
                    $result = FunAdminAuth::create($api, $form);
                }

                //echo json_encode($result);
                if($result->success) Nav::goto($dir, App::$pageAdminManageUser);
                else ErrorPage::showError($dir, $result);
                break;

            case 'delete':
                $id = $io->id;
                $result = FunAdminAuth::delete($api, $id);

                if($result->success) Nav::goto($dir, App::$pageAdminManageUser);
                else ErrorPage::showError($dir, $result);
                break;

            default:
                Nav::gotoHome($dir);
                break;
        }   
    }else{
        Nav::gotoHome($dir); 
    }