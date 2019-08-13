<?php
    class FunAdminCategory{
        public static function getCategories($api){
            $url = $api->getURL(App::$apiAdminCategory, 'all', NULL);
            $result = $api->get($url);
            return $result;
            
        }

        public static function editCategory($api, $id, $category){
            $url = $api->getURL(App::$apiAdminCategory, 'edit', NULL);
            $result = $api->post($url, $category);
            return $result;
        }
    
        public static function createCategory($api, $category){
            $url = $api->getURL(App::$apiAdminCategory, 'create', NULL);
            $result = $api->post($url, $category);
            return $result;
        }
    
        public static function deleteCategory($api, $id){
            $query = new StdClass();
            $query->id = $id;

            $url = $api->getURL(App::$apiAdminCategory, 'delete', NULL);
            $result = $api->post($url, $query);
            return $result;
        }
    }