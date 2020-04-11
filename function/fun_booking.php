<?php
    class FunBooking{
        public static function book($api, $form){
            $url = $api->getURL(App::$apiBooking, 'book', NULL);
            $result = $api->post($url, $form);
            return $result;
        }

        public static function count($api){
            $url = $api->getURL(App::$apiBooking, 'count', NULL);
            $result = $api->get($url);
            return $result;
        }

        public static function getSingleFull($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiBooking, 'singleFull', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function getFiltered($api, $filter){
            $url = $api->getURL(App::$apiBooking, 'filter', $filter);
            $result = $api->get($url);
            return $result;
        }

        public static function getFilteredFull($api, $filter){
            $url = $api->getURL(App::$apiBooking, 'filterFull', $filter);
            $result = $api->get($url);
            return $result;
        }

        public static function getFilteredFull2($api, $filter){
            $url = $api->getURL(App::$apiBooking, 'filterFull2', $filter);
            $result = $api->get($url);
            return $result;
        }

        public static function countFiltered2($api, $filter){
            $url = $api->getURL(App::$apiBooking, 'countFiltered2', $filter);
            $result = $api->get($url);
            return $result;
        }

        public static function safeDelete($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiBooking, 'safeDelete', $query);
            $result = $api->get($url);
            return $result;
        }
    }