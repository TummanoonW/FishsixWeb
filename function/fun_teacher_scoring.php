<?php
    class FunTeacherScoring{

        public static function getByBookingID($api, $bid){
            $query = (object)array('id' => $bid);
            $url = $api->getURL(App::$apiTeacherScoring, 'getByBookingID', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function scoreStudent($api, $form){
            $url = $api->getURL(App::$apiTeacherScoring, 'scoreStudent', NULL);
            $result = $api->post($url, $form);
            return $result;
        }


    }