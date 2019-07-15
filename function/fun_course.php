<?php
    class FunCourse{
        public static function getCourse($id){
            if($id == NULL){
                $course = new Course(NULL);
                $result = new Result();
                $result->setResult(TRUE, $course, NULL);
                return $result;
            }else{
                //real
                /*$query = new StdClass();
                $query->ID = $id;
                $url = $api->getURL(API::$apiCourse, 'getSingle', $query);
                $result = $api->get($url);
                return $result;*/
    
                //mock
                $course = new Course(NULL);
                $course->title = "Easy Chinese 101";
                $result = new Result();
                $result->setResult(TRUE, $course, NULL);
                return $result;
            }
        }
    }