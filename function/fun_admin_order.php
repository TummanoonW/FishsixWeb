<?php
    class FunAdminOrder{

        public static function getFiltered($api, $filter){
            $url = $api->getURL(App::$apiAdminOrder, 'filter', $filter);
            $result = $api->get($url);
            return $result;
        }

        public static function confirm($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiAdminOrder, 'confirm', NULL);
            $result = $api->post($url, $query);
            return $result;
        }

        public static function pending($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiAdminOrder, 'pending', NULL);
            $result = $api->post($url, $query);
            return $result;
        }

        public static function rejected($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiAdminOrder, 'rejected', NULL);
            $result = $api->post($url, $query);
            return $result;
        }
    }