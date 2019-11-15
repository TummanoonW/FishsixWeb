<?php
    class FunFeedback{
        public static function send($api, $form){
            $url = $api->getURL(App::$apiFeedback, 'submit', NULL);
            $result = $api->post($url, $form);

            return $result;
        }
    }