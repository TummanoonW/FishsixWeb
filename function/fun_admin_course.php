<?php
    class FunAdminCourse{

        public static function createCourse($api, $course){
            $url = $api->getURL(API::$apiAdminCourse, 'create', NULL);
            $result = $api->post($url, $course);
            return $result;
        }
    }