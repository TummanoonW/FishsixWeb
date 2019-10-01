<?php
    class FunOwnership{

        public static function getSingle($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiOwnership, 'getSingle', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function countByOwnerID($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiOwnership, 'countByOwnerID', $query);
            $result = $api->get($url);
            return $result;
        }
    }