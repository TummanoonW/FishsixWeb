<?php
    class FunCourse{

        public static function getCourse($api, $id){
            $query = new StdClass();
            $query->id = $id;

            $url = $api->getURL(App::$apiCourse, 'single', $query);
            $result = $api->get($url);

            if($result->response == NULL){
                $result->success = FALSE;
                $result->err = Err::$ERR_NO_DATA;
            }

            return $result;
        }

        public static function countCourses($api){
            $url = $api->getURL(App::$apiCourse, 'count', NULL);
            $result = $api->get($url);
            return $result;
        }

        public static function getCoursesFilter($api, $filter){
            $url = $api->getURL(App::$apiCourse, 'getAllCourse', $filter);
            $result = $api->get($url);
            return $result;
        }

    }