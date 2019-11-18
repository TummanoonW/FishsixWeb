<?php
    class FunFeedback{
        public static function send($api, $form){
            $url = $api->getURL(App::$apiFeedback, 'add', NULL);
            $result = $api->post($url, $form);

            return $result;
        }

        public static function getSingleFull($api, $id){
            $query = (object)array(
                'id' => $id
            );
            $url = $api->getURL(App::$apiFeedback, 'singleFull', $query);
            $result = $api->get($url);

            return $result;
        }

        public static function getFiltered($api, $filter){
            $url = $api->getURL(App::$apiFeedback, 'getFiltered', $filter);
            $result = $api->get($url);

            return $result;
        }

        public static function count($api){
            $url = $api->getURL(App::$apiFeedback, 'count', NULL);
            $result = $api->get($url);

            return $result;
        }
    }