<?php
    class Sess{

        //check if there's user in Sess
        public function checkUserExisted(){
            return $this->getAuth() != NULL;
        }

        public function checkUserAdmin(){
            $auth = $this->getAuth();
            if($auth != NULL){
                return ($auth->type == Auth::$TYPE_ADMIN);
            }else{
                return FALSE;
            }
        }

        public function checkUserEditor(){
            $auth = $this->getAuth();
            if($auth != NULL){
                return ($auth->type == Auth::$TYPE_EDITOR);
            }else{
                return FALSE;
            }
        }


        public function checkUserTeacher(){
            $auth = $this->getAuth();
            if($auth != NULL){
                return ($auth->type == Auth::$TYPE_TEACHER);
            }else{
                return FALSE;
            }
        }

        public function checkUserStudent(){
            $auth = $this->getAuth();
            if($auth != NULL){
                return ($auth->type == Auth::$TYPE_USER);
            }else{
                return FALSE;
            }
        }

        //save user and API Key in Sess
        public function logIn($auth){
            $this->setAuth($auth);
            $this->setAPIKey($auth->apiKey);
        }

        //clear user and API Key in Sess
        public function logOut(){
            $this->setAuth(NULL);
            $this->setAPIKey(NULL);
        }

        
        public function setAuth($auth){
            $_SESSION['auth'] = json_encode($auth);
        }

        public function getAuth(){
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