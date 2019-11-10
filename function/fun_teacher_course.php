<?php 
    class FunTeacherCourse{

        public static function getByTeacherID($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiTeacherCourse, 'getByTeacherID', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function getSingle($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiTeacherCourse, 'single', $query);
            $result = $api->get($url);
            return $result;
        }
    }