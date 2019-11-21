<?php
    class FunDashboard{
        public static function getDashboard($api, $id, $ownerID){
            $query = (object)array(
                'id' => $id,
                'ownerID' => $ownerID
            );
            $url = $api->getURL(App::$apiDashboard, 'dashboard', $query);
            $result = $api->get($url);

            return $result;
        }

        public static function getScore($api, $id, $ownerID){
            $query = (object)array(
                'id' => $id,
                'ownerID' => $ownerID
            );
            $url = $api->getURL(App::$apiDashboard, 'score', $query);
            $result = $api->get($url);

            return $result;
        }
    }