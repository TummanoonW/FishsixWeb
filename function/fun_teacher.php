<?php
    class FunTeacher{
        public static function get($api){
            $url = $api->getURL(App::$apiTeacher, 'all', NULL);
            $result = $api->get($url);
            return $result;
        }

        public static function getByCourseID($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiTeacher, 'getByCourseID', $query);
            $result = $api->get($url);
            return $result;
        }
    }