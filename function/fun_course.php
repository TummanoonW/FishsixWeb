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

        public static function getCourses($dir){
            //mock
            $courses = array(
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL),
                new Course(NULL)
            );

            foreach ($courses as $key => $value) {
                $value->ID = $key;
                $value->title = $value->title . " ($key)";
                $value->thumbnail = "assets/images/github.png";
            }

            return $courses;
        }

        public static function getCoursesFilter($dir, $start, $end){
            //mock
            $courses = self::getCourses($dir);
            $max = count($courses);
            $n_courses = array();
            for ($i=$start; $i < $end; $i++) { 
                if($i < $max){
                    array_push($n_courses, $courses[$i]);
                }
            }
            return $n_courses;
        }

        public static function countCourses($dir){
            $courses = self::getCourses($dir);
            $count = count($courses);

            //mock
            $result = new Result();
            $result->setResult(TRUE, $count, NULL);
            return $result;
        }
    }