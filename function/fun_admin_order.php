<?php
    class FunAdminOrder{

        public static function getFiltered($api, $filter){
            $url = $api->getURL(App::$apiAdminOrder, 'filter', $filter);
            $result = $api->get($url);
            return $result;
        }

        public static function getFiltered2($api, $filter){
            $url = $api->getURL(App::$apiAdminOrder, 'filter2', NULL);
            $result = $api->post($url, $filter);
            return $result;
        }

        public static function countFiltered2($api, $filter){
            $url = $api->getURL(App::$apiAdminOrder, 'countFiltered2', NULL);
            $result = $api->post($url, $filter);
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

        public static function updateNote($api, $id, $note){
            $data = array('id' => $id, 'note' => $note);
            $url = $api->getURL(App::$apiOrder, 'updateNote', NULL);
            $result = $api->post($url, $data);
            return $result;
        }
    }