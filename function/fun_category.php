<?php
    class FunCategory{
        public static function get($api){
            $url = $api->getURL(App::$apiCategory, 'all', NULL);
            $result = $api->get($url);
            return $result;
        }
        public static function getSingle($api, $id){
            $query = (object)array('id' => $id);
            $url = $api->getURL(App::$apiCategory, 'single', $query);
            $result = $api->get($url);
            return $result;
        }
        public static function getFiltered($api, $filter){
            $url = $api->getURL(App::$apiCategory, 'filter', $filter);
            $result = $api->get($url);
            return $result;
        }
        public static function count($api){
            $url = $api->getURL(App::$apiCategory, 'count', NULL);
            $result = $api->get($url);
            return $result;
        }
    }