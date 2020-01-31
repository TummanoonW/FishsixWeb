<?php
    class FunOwnership{

        public static function getSingle($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiOwnership, 'getSingle', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function countByOwnerID($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiOwnership, 'countByOwnerID', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function count($api){
            $url = $api->getURL(App::$apiOwnership, 'count', NULL);
            $result = $api->get($url);
            return $result;
        }

        public static function getFilteredFull($api, $filter){
            if($filter->isExpired == "null") unset($filter->isExpired);
            if($filter->courseID == "null") unset($filter->courseID);
            if($filter->ownerID == "null") unset($filter->ownerID);
 
            $url = $api->getURL(App::$apiOwnership, 'filtered', $filter);
            $result = $api->get($url);
            return $result;
        }
            
    }