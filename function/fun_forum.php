<?php
    class FunForum{
        public static function getFiltered($api, $filter){
            $url = $api->getURL(App::$apiForum, 'filtered', $filter);
            $result = $api->get($url);

            return $result;
        }

        public static function getMy($api, $myID){
            $query = (object)array('id' => $myID);

            $url = $api->getURL(App::$apiForum, 'getMy', $query);
            $result = $api->get($url);

            return $result;
        }

        public static function getTop($api, $limit){
            $query = array('limit' => $limit);
            $url = $api->getURL(App::$apiForum, 'getTop', $query);
            echo $url;
            $result = $api->get($url);
            return $result;
        }

        public static function getSingle($api, $id){
            $query = (object)array(
                'id' => $id
            );
            $url = $api->getURL(App::$apiForum, 'single', $query);
            $result = $api->get($url);

            return $result;
        }

        public static function getSingleFull($api, $id, $myID){
            $query = (object)array(
                'id' => $id,
                'myID' => $myID
            );
            $url = $api->getURL(App::$apiForum, 'singleFull', $query);
            $result = $api->get($url);

            return $result;
        }

        public static function countFiltered($api, $filter){
            $url = $api->getURL(App::$apiForum, 'countFiltered', $filter);
            $result = $api->get($url);

            return $result;
        }

        public static function countMy($api, $myID){
            $query = (object)array('id' => $myID);

            $url = $api->getURL(App::$apiForum, 'countMy', $query);
            $result = $api->get($url);

            return $result;
        }
        
        public static function post($api, $form){
            $url = $api->getURL(App::$apiForum, 'post', NULL);
            $result = $api->post($url, $form);

            return $result;
        }

        public static function edit($api, $id, $form){
            $query = (object)array('id' => $id);
            $url = $api->getURL(App::$apiForum, 'edit', $query);
            $result = $api->post($url, $form);

            return $result;
        }

        public static function delete($api, $id){
            $query = (object)array('id' => $id);

            $url = $api->getURL(App::$apiForum, 'delete', NULL);
            $result = $api->post($url, $query);

            return $result;
        }

        public static function setSpam($api, $id, $isSpam){
            $query = (object)array(
                'id' => $id,
                'isSpam' => $isSpam
            );
            
            $url = $api->getURL(App::$apiForum, 'setSpam', NULL);
            $result = $api->post($url, $query);

            return $result;
        }

        public static function getCommentsByForumID($api, $id){
            $query = (object)array('id' => $id);

            $url = $api->getURL(App::$apiForum, 'getCommentsByForumID', $query);
            $result = $api->get($url);

            return $result;
        }

        public static function getCommentSinglFull($api, $id){
            $query = (object)array('id' => $id);

            $url = $api->getURL(App::$apiForum, 'getCommentSinglFull', $query);
            $result = $api->get($url);

            return $result;
        }

        public static function postComment($api, $form){
            $url = $api->getURL(App::$apiForum, 'postComment', NULL);
            $result = $api->post($url, $form);

            return $result;
        }

        public static function editComment($api, $id, $form){
            $query = (object)array('id' => $id);
            $url = $api->getURL(App::$apiForum, 'editComment', $query);
            $result = $api->post($url, $form);

            return $result;
        }

        public static function deleteComment($api, $id){
            $query = (object)array('id' => $id);

            $url = $api->getURL(App::$apiForum, 'deleteComment', NULL);
            $result = $api->post($url, $query);

            return $result;
        }

        public static function setSpamComment($api, $id, $isSpam){
            $query = (object)array(
                'id' => $id,
                'isSpam' => $isSpam
            );
            
            $url = $api->getURL(App::$apiForum, 'setSpamComment', NULL);
            $result = $api->post($url, $query);

            return $result;
        }

        public static function getMyVote($api, $forumID, $myID){
            $query = (object)array(
                'forumID' => $forumID,
                'myID' => $myID
            );

            $url = $api->getURL(App::$apiForum, 'getMyVote', $query);
            $result = $api->get($url);

            return $result;
        }

        public static function addVote($api, $vote){
            $url = $api->getURL(App::$apiForum, 'addVote', NULL);
            $result = $api->post($url, $vote);

            return $result;
        }

        public static function updateVote($api, $id, $vote){
            $query = (object)array('id' => $id);
            $url = $api->getURL(App::$apiForum, 'updateVote', $query);
            $result = $api->post($url, $vote);

            return $result;
        }

        public static function deleteVote($api, $id){
            $query = (object)array('id' => $id);

            $url = $api->getURL(App::$apiForum, 'deleteVote', NULL);
            $result = $api->post($url, $query);

            return $result;
        }


    }