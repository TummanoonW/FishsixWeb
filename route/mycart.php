<?php
     $dir = "../";
     include_once $dir . 'includer/includer.php'; 
     Includer::include_proto($dir); 
     Includer::include_fun($dir, 'fun_mycart.php');
 
     $apiKey = SESSION::getAPIKey(); 
     $auth = SESSION::getAuth();
 
     $api = new API($apiKey); 
     $io = new IO(); 
 
     if(SESSION::checkUserExisted()){
        switch($io->method){
            case 'delete':
                $id = $io->query->id;
                $result = FunMyCart::delete($api, $id);
                echo 'success';
                break;
            case 'deleteS':
                $index = $io->query->index;
                $s_carts = SESSION::get('mycart');
                array_splice($s_carts, $index, 1);
                SESSION::set('mycart', $s_carts);
                echo 'success';
                break;
            case 'add':
                $ownerID = $auth->ID;
                if($io->id != NULL){
                    $result = FunMyCart::addToCart($api, $io->id, $ownerID);
                    if($result->success) Nav::goto($dir, App::$pageMyCart);
                    else ErrorPage::showError($dir, $result);
                }else{
                    Nav::goBack();
                }
                break;
            default:
                Nav::goBack();
                break;
        }
     }else{
         Nav::goBack();
     }   