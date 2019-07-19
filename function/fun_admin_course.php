<?php
    class FunAdminCourse{
        public static function countCourses($api){
            $url = $api->getURL(API::$apiAdminCourse, 'count', NULL);
            $result = $api->get($url);
            return $result;
        }

        public static function getCoursesFilter($api, $filter){
            $url = $api->getURL(API::$apiAdminCourse, 'filter', $filter);
            $result = $api->get($url);
            return $result;
        }

        public static function getCourse($api, $id){
            $query = new StdClass();
            $query->id = $id;

            $url = $api->getURL(API::$apiAdminCourse, 'single', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function createCourse($api, $course){
            $url = $api->getURL(API::$apiAdminCourse, 'create', NULL);
            $result = $api->post($url, $course);
            return $result;
        }
    }