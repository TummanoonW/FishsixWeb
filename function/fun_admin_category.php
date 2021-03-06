<?php
    class FunAdminCategory{
        public static function edit($api, $form){
            $url = $api->getURL(App::$apiAdminCategory, 'edit', NULL);
            $result = $api->post($url, $form);
            return $result;
        }
    
        public static function create($api, $form){
            $url = $api->getURL(App::$apiAdminCategory, 'create', NULL);
            $result = $api->post($url, $form);
            return $result;
        }
    
        public static function delete($api, $id){
            $query = new StdClass();
            $query->id = $id;

            $url = $api->getURL(App::$apiAdminCategory, 'delete', NULL);
            $result = $api->post($url, $query);
            return $result;
        }
    }