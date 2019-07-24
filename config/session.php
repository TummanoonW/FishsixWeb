<?php
    //Keep Session Running
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    } 

    class Session{

        //check if there's user in session
        public static function checkUserExisted(){
            return self::getAuth() != NULL;
        }

        public static function checkUserAdmin(){
            $auth = self::getAuth();
            if($auth != NULL){
                return ($auth->type == Auth::$TYPE_ADMIN);
            }else{
                return FALSE;
            }
        }

        //save user and API Key in session
        public static function logIn($auth){
            self::setAuth($auth);
            self::setAPIKey($auth->apiKey);
        }

        //clear user and API Key in session
        public static function logOut(){
            self::setAuth(NULL);
            self::setAPIKey(NULL);
        }

        
        public static function setAuth($auth){
            $_SESSION['auth'] = json_encode($auth);
        }

        public static function getAuth(){
            if(isset($_SESSION['auth'])){
                return json_decode($_SESSION['auth']);
            }else{
                return NULL;
            }
        }

        public function setAPIKey($apiKey){
            $_SESSION['apiKey'] = $apiKey;
        }

        public function getAPIKey(){
            $apiKey = "null";
            if(isset($_SESSION['apiKey'])){
                $apiKey = $_SESSION['apiKey'];
            }
            return $apiKey;
        }

        public function set($key, $value){
            $_SESSION[$key] = $value;
        }

        public function get($key){
            if(isset($_SESSION[$key])){
                return $_SESSION[$key];
            }else{
                return NULL;
            }
        }

        public function remove($key){
            unset($_SESSION[$key]);
        }

        
    }