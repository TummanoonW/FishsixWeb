<?php
    class FunVideoLib{
        public static function getByCategoryIDLimit($api, $id, $limit){
            $query = array('id' => $id, 'limit' => $limit);
            $url = $api->getURL(App::$apiVidLib, 'byCategoryIDLimit', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function getLatestLimit($api, $limit){
            $query = array('limit' => $limit);
            $url = $api->getURL(App::$apiVidLib, 'latestLimit', $query);
            $result = $api->get($url);
            return $result;
        }
    }