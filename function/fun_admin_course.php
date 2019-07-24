<?php
    class FunAdminCourse{

        public static function createCourse($api, $course){
            $url = $api->getURL(App::$apiAdminCourse, 'create', NULL);
            $result = $api->post($url, $course);
            return $result;
        }
    }