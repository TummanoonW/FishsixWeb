<?php 
    class FunSchedule{

        public static function getMySchedule($api, $ownerID){
            $query = array('id' => $ownerID);
            $url = $api->getURL(App::$apiSchedule, 'mySchedule', $query);
            $result = $api->get($url);
            return $result;
        }
    }