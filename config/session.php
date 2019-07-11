<?php
    class Session{

        //check if there's user in session
        public static function checkUserExisted(){
            return self::getAuth() != NULL;
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

        
    }