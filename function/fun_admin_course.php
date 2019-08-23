<?php
    class FunAdminCourse{

        public static function getFiltered($api, $filter){
            $url = $api->getURL(App::$apiAdminCourse, 'filter', $filter);
            $result = $api->get($url);
            return $result;
        }

        public static function countFiltered($api, $filter){
            $url = $api->getURL(App::$apiAdminCourse, 'countFiltered', $filter);
            $result = $api->get($url);
            return $result;
        }

        public static function createCourse($api, $course){
            $url = $api->getURL(App::$apiAdminCourse, 'create', NULL);
            $result = $api->post($url, $course);
            return $result;
        }


    }