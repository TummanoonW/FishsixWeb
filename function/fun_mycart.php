<?php
    class FunMyCart{

        //Mock
        public static function setMyCart($api, $arr){
            Session::set('cart', $arr);
            $result = new Result();
            $result->setResult(TRUE, $arr, NULL);
            return $result;
        }

        //Mock
        public static function addToCart($api, $courseID, $ownerID){
            $item = new StdClass();
            $item->ownerID = $ownerID;
            $item->courseID = $courseID;
            $item->credit = 1;

            $result = self::getMyCart($api, $ownerID);
            $arr = $result->response;
            array_push($arr, $item);

            $result = self::setMyCart($api, $arr);
            return $result;
        }

        //Mock
        public static function getMyCart($api, $ownerID){
            $cart = Session::get('cart');
            if($cart == NULL) $cart = [];
            
            $result = new Result();
            $result->setResult(TRUE, $cart, NULL);
            return $result;
        }

        public static function getMyCartFull($api, $ownerID){
            $result = self::getMyCart($api, $ownerID);
            $arr = $result->response;
            foreach ($arr as $key => $value) {
                $r = FunCourse::getCourse($api, $value->courseID);
                $c = $r->response;
                $value->course = $c;
            }
            return $result;
        }
    }