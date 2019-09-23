<?php
    class FunBranch{
        public static function get($api){
            $url = $api->getURL(App::$apiBranch, 'all', NULL);
            $result = $api->get($url);
            return $result;
        }
        public static function getSingle($api, $id){
            $query = (object)array('id' => $id);
            $url = $api->getURL(App::$apiBranch, 'single', $query);
            $result = $api->get($url);
            return $result;
        }
        public static function getFiltered($api, $filter){
            $url = $api->getURL(App::$apiBranch, 'filter', $filter);
            $result = $api->get($url);
            return $result;
        }
        public static function count($api){
            $url = $api->getURL(App::$apiBranch, 'count', NULL);
            $result = $api->get($url);
            return $result;
        }
    }