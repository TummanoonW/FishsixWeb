<?php 
    class FunTeacherStudent{

        public static function getMyStudentsFiltered($api, $filter){
            $url = $api->getURL(App::$apiTeacherStudent, 'mystudentsFiltered', $filter);
            $result = $api->get($url);
            return $result;
        }

    }