<?php
    class FunAdminOwnership{

        public static function days30($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiOwnership, 'days30', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function delete($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiOwnership, 'delete', NULL);
            $result = $api->post($url, $query);
            return $result;
        }

        public static function update($api, $form){
            $url = $api->getURL(App::$apiOwnership, 'update', NULL);
            $result = $api->post($url, $form);
            return $result;
        }

        
            
    }