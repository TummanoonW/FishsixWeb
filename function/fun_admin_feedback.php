<?php
    class FunAdminFeedback{
        public static function status($api, $id, $status){
            $data = (object)array(
                'id' => $id,
                'status' => $status
            );
            $url = $api->getURL(App::$apiAdminFeedback, 'status', NULL);
            $result = $api->post($url, $data);
            return $result;
        }

        public static function delete($api, $id){
            $query = (object)array(
                'id' => $id
            );
            $url = $api->getURL(App::$apiAdminFeedback, 'delete', $query);
            $result = $api->get($url);
            return $result;
        }
    }