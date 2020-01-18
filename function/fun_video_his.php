<?php
    class FunVideoHis{
        public static function add($api, $videoID, $authID){
            $form = (object)array(
                'videoID' => $videoID,
                'authID' => $authID
            );
            $url = $api->getURL(App::$apiVidHis, 'add', NULL);
            $result = $api->post($url, $form);
            return $result;
        }

        public static function getLatestLimitByAuthID($api, $limit, $authID){
            $query = array(
                'authID' => $authID, 
                'limit' => $limit
            );
            $url = $api->getURL(App::$apiVidHis, 'latestLimitByAuthID', $query);
            $result = $api->get($url);
            return $result;
        }
    }