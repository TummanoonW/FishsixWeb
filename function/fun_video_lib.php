<?php
    class FunVideoLib{
        public static function add($api, $form){
            $url = $api->getURL(App::$apiVidLib, 'add', NULL);
            $result = $api->post($url, $form);
        }

        public static function edit($api, $id, $form){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiVidLib, 'edit', $query);
            $result = $api->post($url, $form);
        }

        public static function getSingle($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiVidLib, 'singleFull', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function getByCategoryIDLimit($api, $id, $limit){
            $query = array('id' => $id, 'limit' => $limit);
            $url = $api->getURL(App::$apiVidLib, 'byCategoryIDLimit', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function getByCategoryID($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiVidLib, 'byCategoryID', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function getLatestLimit($api, $limit){
            $query = array('limit' => $limit);
            $url = $api->getURL(App::$apiVidLib, 'latestLimit', $query);
            $result = $api->get($url);
            return $result;
        }

        public static function countFiltered($api, $filter){
            $url = $api->getURL(App::$apiVidLib, 'countFiltered', $filter);
            $result = $api->get($url);
        }

        public static function getFiltered($api, $filter){
            $url = $api->getURL(App::$apiVidLib, 'filtered', $filter);
            $result = $api->get($url);
        }

        public static function delete($api, $id){
            $query = array('id' => $id);
            $url = $api->getURL(App::$apiVidLib, 'delete', NULL);
            $result = $api->post($url, $query);
        }
    }