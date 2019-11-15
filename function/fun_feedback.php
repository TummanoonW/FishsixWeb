<?php
    class FunFeedback{
        public static function send($api, $form){
            $url = $api->getURL(App::$apiFeedback, 'add', NULL);
            $result = $api->post($url, $form);

            return $result;
        }
    }