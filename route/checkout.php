<?php
     $dir = "../";
     include_once $dir . 'includer/includer.php'; 
     Includer::include_proto($dir); 
     Includer::include_fun($dir, 'fun_mycart.php');
     Includer::include_fun($dir, 'fun_auth.php');
 
     $apiKey = Session::getAPIKey(); 
     $auth = Session::getAuth();
 
     $api = new API($apiKey); 
     $io = new IO(); 
 
     if(Session::checkUserExisted()){
        switch($io->method){
            case 'checkout':
                /*$result = FunMyCart::getByAuthID($api, $auth->ID);
                $cartItems = $result->response;*/

                $cartItems = Session::get('mycart');
                if($cartItems == NULL) $cartItems = [];

                $result = FunAuth::getUserByAuthID($api, $auth->ID);
                $user = $result->response;

                $form = initForm($dir, $cartItems, $user);

                $result = FunMyCart::checkout($api, $form);
                if($result->success){
                    Session::set('mycart', NULL);
                    $id = $result->response->ID;
                    Nav::goto($dir, App::$pageViewOrder . '?id=' . $id);
                }else{
                    ErrorPage::showError($dir, $result);
                }
                break;
            default:
                Nav::gotoHome($dir);
                break;
        }
     }else{
         Nav::gotoHome($dir);
     }   


     function calPrice($orderItems){
         $total = 0;
         foreach ($orderItems as $key => $item) {
             $package = $item->package;
             $price = (int)$package->price;
             $total = $total + $price;
         }
         return $total;
     }

     function initForm($dir, $cartItems, $user){
        $form = new StdClass();
        if($_FILES['slip_pic']['error'] == 0){
            $file = new File($dir, 'uploads/slip_pics/');
            $option = new FileOption();
            $option->set(
                TRUE,
                TRUE,
                TRUE,
                "u_",
                1 * 1000 * 1000,
                []
            );
            $result = $file->upload('slip_pic', $option);
            if($result->success) $form->slip_pic = $result->response->downloadURL;
            else $form->slip_pic = '';
        }
        $form->ownerID = $user->authID;
        $form->totalPrice = calPrice($cartItems);
        $form->cartItems = $cartItems;
        $form->ownerName = $user->fname . " " . $user->lname;
        $form->ownerAddress = $user->address;
        $form->hostName = App::$hostName;
        $form->hostAddress = App::$hostAddress;
        $form->method = "b_acc";

        return $form;
     }