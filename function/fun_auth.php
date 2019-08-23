<?php
    class FunAuth{

        public static function getSingleFull($api, $id){
            $query = (object)array('id' => $id);
            $url = $api->getURL(App::$apiAuth, 'singleFull', $query);
            $result = $api->get($url);
            return $result;
        }
        public static function getFiltered($api, $filter){
            $url = $api->getURL(App::$apiAuth, 'filter', $filter);
            $result = $api->get($url);
            return $result;
        }
        public static function countFiltered($api, $filter){
            $url = $api->getURL(App::$apiAuth, 'countFiltered', $filter);
            $result = $api->get($url);
            return $result;
        }
        public static function count($api){
            $url = $api->getURL(App::$apiAuth, 'count', NULL);
            $result = $api->get($url);
            return $result;
        }

        public static function login($api, $form){
            $url = $api->getURL(App::$apiAuth, 'login', NULL);
            $result = $api->post($url, $form);
            return $result;
        }

        public static function register($api, $form){
            $url = $api->getURL(App::$apiAuth, 'register', NULL);
            $result = $api->post($url, $form);
            return $result;
        }

        public static function sendEmailRecovery($api, $form){
            $url = $api->getURL(App::$apiAuth, 'generateToken', NULL);
            $result = $api->post($url, $form);
            return $result;
        }

        public static function verifyToken($api, $tokenID){
            $form = new StdClass();
            $form->token = $tokenID;

            $url = $api->getURL(App::$apiAuth, 'verifyToken', $form);
            $result = $api->get($url);
            return $result;
        }

        public static function resetPassword($api, $form, $tokenID){
            $query = new StdClass();
            $query->token = $tokenID;

            $url = $api->getURL(App::$apiAuth, 'resetPassword', $query);
            $result = $api->post($url, $form);
            return $result;
        }

        public static function getUserByAuthID($api, $id){
            $query = new StdClass();
            $query->id = $id;

            $url = $api->getURL(App::$apiAuth, 'user', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function editProfile($api, $form, $id){
            $query = new StdClass();
            $query->id = $id;

            $url = $api->getURL(App::$apiAuth, 'editProfile', $query);
            $result = $api->post($url, $form);
            return $result;
        }
    }