<?php
    class FunMyCart{

        public static function checkout($api, $form){
            $query = array(
                'form' => $form
            );
            $url = $api->getURL(App::$apiMyCart, 'checkout', NULL);
            $result = $api->post($url, $query);
            return $result;
        }

        public static function add($api, $cart){
            $query = array(
                'cart' => $cart
            );
            $url = $api->getURL(App::$apiMyCart, 'add', NULL);
            $result = $api->post($url, $query);
            return $result;
        }

        public static function addMultiple($api, $carts){
            $query = array(
                'carts' => $carts
            );
            $url = $api->getURL(App::$apiMyCart, 'addMultiple', NULL);
            $result = $api->post($url, $query);
            return $result;
        }

        public static function delete($api, $id){
            $query = array(
                'id' => $id
            );
            $url = $api->getURL(App::$apiMyCart, 'delete', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function getByAuthID($api, $id){
            $query = array(
                'id' => $id
            );
            $url = $api->getURL(App::$apiMyCart, 'getByAuthID', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function getMyCartFull($api, $ownerID){
            $result = self::getMyCart($api, $ownerID);
            $arr = $result->response;
            foreach ($arr as $key => $value) {
                $r = FunCourse::get($api, $value->courseID);
                $c = $r->response;
                $value->course = $c;
            }
            return $result;
        }

        public static function countByAuthID($api, $id){
            $query = array(
                'id' => $id
            );
            $url = $api->getURL(App::$apiMyCart, 'countByAuthID', $query);
            $result = $api->get($url);
            return $result;
        }
    }