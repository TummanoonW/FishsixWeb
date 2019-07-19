<?php
    class FunAdminCategory{
        public static function getCategories($api){
            $url = $api->getURL(API::$apiAdminCategory, 'all', NULL);
            $result = $api->get($url);
            return $result;
        }
    }