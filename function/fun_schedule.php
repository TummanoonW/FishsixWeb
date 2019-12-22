<?php 
    class FunSchedule{

        public static function getMySchedule($api, $ownerID){
            $query = array('id' => $ownerID);
            $url = $api->getURL(App::$apiSchedule, 'mySchedule', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function getAfterByCourseID($api, $after, $courseID){
            $query = array('after' => $after, 'courseID' => $courseID);
            $url = $api->getURL(App::$apiSchedule, 'afterByCourseID', $query);
            $result = $api->get($url);
            return $result;
        }
    }