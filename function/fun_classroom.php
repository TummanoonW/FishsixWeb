<?php
    class FunClassroom{

        public static function getFiltered($api, $filter){
            if($filter->courseID == "") unset($filter->courseID);
            if($filter->courseBranchID == "") unset($filter->courseBranchID);
            if($filter->classID == "") unset($filter->classID);

            $url = $api->getURL(App::$apiClassroom, 'filter', $filter);
            $result = $api->get($url);

            return $result;
        }

        public static function getSingle($api, $filter){
            $url = $api->getURL(App::$apiClassroom, 'single', $filter);
            $result = $api->get($url);

            return $result;
        }


    }