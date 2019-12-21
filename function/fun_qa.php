<?php
    class FunQA{

        public static function getSingle($api, $courseID){
            $query = array('id' => $courseID);
            $url = $api->getURL(App::$apiQA, 'single', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function question($api, $form){
            $url = $api->getURL(App::$apiQA, 'question', NULL);
            $result = $api->post($url, $form);
            return $result;
        }

        public static function answer($api, $form){
            $url = $api->getURL(App::$apiQA, 'answer', NULL);
            $result = $api->post($url, $form);
            return $result;
        }
    }