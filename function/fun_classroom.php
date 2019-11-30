<?php
    class FunClassroom{

        public static function countFilterd($api){
            $url = $api->getURL(App::$apiCourse, 'getWhatIOwned', $query);
            $result = $api->get($url);

            return $result;
        }
    }