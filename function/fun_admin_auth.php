<?php
    class FunAdminAuth{
        public static function edit($api, $form){
            $url = $api->getURL(App::$apiAdminAuth, 'editFull', NULL);
            $result = $api->post($url, $form);
            return $result;
        }
    
        public static function create($api, $form){
            $url = $api->getURL(App::$apiAdminAuth, 'createFull', NULL);
            $result = $api->post($url, $form);
            return $result;
        }
    
        public static function delete($api, $id){
            $query = new StdClass();
            $query->id = $id;

            $url = $api->getURL(App::$apiAdminAuth, 'deleteFull', NULL);
            $result = $api->post($url, $query);
            return $result;
        }
    }