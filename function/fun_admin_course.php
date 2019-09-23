<?php
    class FunAdminCourse{

        public static function getFiltered($api, $filter){
            $url = $api->getURL(App::$apiAdminCourse, 'filter', $filter);
            $result = $api->get($url);
            return $result;
        }

        public static function countFiltered($api, $filter){
            $url = $api->getURL(App::$apiAdminCourse, 'countFiltered', $filter);
            $result = $api->get($url);
            return $result;
        }

        public static function createCourse($api, $course){
            $url = $api->getURL(App::$apiAdminCourse, 'create', NULL);
            $result = $api->post($url, $course);
            return $result;
        }

        public static function delete($api, $id){
            $query = array(
                'id' => $id
            );
            $url = $api->getURL(App::$apiAdminCourse, 'delete', NULL);
            $result = $api->post($url, $query);
            return $result;
        }

        public static function setCourse($api, $course){
            $url = $api->getURL(App::$apiAdminCourse, 'set', NULL);
            $result = $api->post($url, array('course' => $course));
            return $result;
        }

        public static function setTeachers($api, $teachers){
            $url = $api->getURL(App::$apiAdminCourse, 'setTeachers', NULL);
            $result = $api->post($url, array('teachers' => $teachers));
            return $result;
        }

        public static function setBranches($api, $branches){
            $url = $api->getURL(App::$apiAdminCourse, 'setBranches', NULL);
            $result = $api->post($url, array('branches' => $branches));
            return $result;
        }

        public static function setClasses($api, $classes){
            $url = $api->getURL(App::$apiAdminCourse, 'setClasses', NULL);
            $result = $api->post($url, array('classes' => $classes));
            return $result;
        }

        public static function setLessons($api, $lessons){
            $url = $api->getURL(App::$apiAdminCourse, 'setLessons', NULL);
            $result = $api->post($url, array('lessons' => $lessons));
            return $result;
        }

        public static function setPackages($api, $packages){
            $url = $api->getURL(App::$apiAdminCourse, 'setPackages', NULL);
            $result = $api->post($url, array('packages' => $packages));
            return $result;
        }

        public static function setPictures($api, $pictures){
            $url = $api->getURL(App::$apiAdminCourse, 'setPictures', NULL);
            $result = $api->post($url, array('pictures' => $pictures));
            return $result;
        }
    }