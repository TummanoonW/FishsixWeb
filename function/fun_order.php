<?php
    class FunOrder{

        public static function count($api){
            $url = $api->getURL(App::$apiOrder, 'count', NULL);
            $result = $api->get($url);
            return $result;
        }

        public static function getSingleFull($api, $id){
            $query = array(
                'id' => $id
            );
            $url = $api->getURL(App::$apiOrder, 'singleFull', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function getByAuthID($api, $id){
            $query = array(
                'id' => $id
            );
            $url = $api->getURL(App::$apiOrder, 'getByAuthID', $query);
            $result = $api->get($url);
            return $result;
        }

    }