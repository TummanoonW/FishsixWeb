<?php
    class FunCourse{

        public static function getWhatIOwned($api, $id, $limit, $offset){
            $query = array(
                'id' => $id,
                'limit' => $limit,
                'offset' => $offset
            );

            $url = $api->getURL(App::$apiCourse, 'getWhatIOwned', $query);
            $result = $api->get($url);

            return $result;
        }

        public static function get($api, $id){
            $query = new StdClass();
            $query->id = $id;

            $url = $api->getURL(App::$apiCourse, 'single', $query);
            $result = $api->get($url);

            return $result;
        }

        public static function getFull($api, $id){
            $query = (object)array('id' => $id);

            $url = $api->getURL(App::$apiCourse, 'singleFull', $query);
            $result = $api->get($url);

            return $result;
        }

        public static function countCourses($api){
            $url = $api->getURL(App::$apiCourse, 'count', NULL);
            $result = $api->get($url);
            return $result;
        }

        public static function getFiltered($api, $filter){
            $url = $api->getURL(App::$apiCourse, 'getFiltered', $filter);
            $result = $api->get($url);
            return $result;
        }

        public static function countFiltered($api, $filter){
            $url = $api->getURL(App::$apiCourse, 'countFiltered', $filter);
            $result = $api->get($url);
            return $result;
        }

        public static function getFilteredPublished($api, $filter){
            $url = $api->getURL(App::$apiCourse, 'getFilteredPublished', $filter);
            $result = $api->get($url);
            return $result;
        }

        public static function countFilteredPublished($api, $filter){
            $url = $api->getURL(App::$apiCourse, 'countFilteredPublished', $filter);
            $result = $api->get($url);
            return $result;
        }

        public static function getComments($api, $id, $limit, $offset){
            $query = array(
                'id' => $id,
                'limit' => $limit,
                'offset' => $offset
            );
            $url = $api->getURL(App::$apiCourse, 'getCommentsByCourseID', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function getTeacher($api, $teacherID){
            $query = array(
                'id' => $teacherID
            );
            $url = $api->getURL(App::$apiCourse, 'teacher', NULL);
            $result = $api->get($url);

            return $result;
        }

        public static function getClass($api, $classID){
            $query = array(
                'id' => $classID
            );
            $url = $api->getURL(App::$apiCourse, 'class', NULL);
            $result = $api->get($url);

            return $result;
        }

        public static function getClassSingle($api, $classID){
            $query = array(
                'id' => $classID
            );
            $url = $api->getURL(App::$apiCourse, 'classSingle', $query);
            $result = $api->get($url);

            return $result;
        }

        public static function getClassesByCourseID($api, $courseID){
            $query = array(
                'id' => $courseID
            );
            $url = $api->getURL(App::$apiCourse, 'classesByCourseID', $query);
            $result = $api->get($url);

            return $result;
        }

        public static function getBranch($api, $bID){
            $query = array(
                'id' => $bID
            );
            $url = $api->getURL(App::$apiCourse, 'branch', $query);
            $result = $api->get($url);

            return $result;
        }

        public static function getBranchesByCourseID($api, $courseID){
            $query = array(
                'id' => $courseID
            );
            $url = $api->getURL(App::$apiCourse, 'branchesByCourseID', $query);
            $result = $api->get($url);

            return $result;
        }

        public static function getPackage($api, $pID){
            $query = array(
                'id' => $pID
            );
            $url = $api->getURL(App::$apiCourse, 'package', NULL);
            $result = $api->get($url);

            return $result;
        }

        public static function getLesson($api, $lID){
            $query = array(
                'id' => $lID
            );
            $url = $api->getURL(App::$apiCourse, 'lesson', NULL);
            $result = $api->get($url);

            return $result;
        }

    }