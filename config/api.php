<?php
    class API{
        private $apiKey = "null";

        function __construct($apiKey){
            if(isset($apiKey)){
                $this->apiKey = $apiKey;
            }
        }

        //build URL with custom path and all the parameters provided
        public function getURL($path, $method, $query){
            $url = $this->getURLCustom($path);
            $url = $url . $this->getMethodParam($method);
            if($query != NULL){
                $url = $url . $this->getQueryParam($query);
            }
            return  $url;
        }

        //build URL with custom path
        public function getURLCustom($path){
            return App::$apiURL . $path . $this->getAPIParam();
        }

        public function getURLRoot(){
            return App::$apiURL . $this->getAPIParam();
        }

        public function getQueryParam($query){
            $json = json_encode($query);
            return '&q=' . $json;
        }

        public function getMethodParam($m){
            return '&m=' . $m;
        }

        public function getAPIParam(){
            return '?apiKey=' . $this->apiKey;
        }

        //return data from the given URL 
        public function get($url){
            $curlSess = curl_init();
            curl_setopt($curlSess, CURLOPT_URL, $url);
            curl_setopt($curlSess, CURLOPT_BINARYTRANSFER, true);
            curl_setopt($curlSess, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curlSess, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curlSess, CURLOPT_SSL_VERIFYHOST, false);

            $output = utf8_decode(curl_exec($curlSess));
            $response = json_decode($output);
            curl_close($curlSess);

            return $response;
        }

        //post data then return data from the given URL
        public function post($url, $objArr){
            $json = json_encode($objArr);
            $curlSess = curl_init();
            curl_setopt($curlSess, CURLOPT_URL, $url);
            curl_setopt($curlSess, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curlSess, CURLOPT_BINARYTRANSFER, true);
            curl_setopt($curlSess, CURLOPT_POSTFIELDS, $json);
            curl_setopt($curlSess, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curlSess, CURLOPT_SSL_VERIFYHOST, false);

            $output = utf8_decode(curl_exec($curlSess));
            $response = json_decode($output);
            curl_close($curlSess);

            return $response;
        }

        //delete data then return data from the given URL
        public function delete($url){
            $curlSess = curl_init();
            curl_setopt($curlSess, CURLOPT_URL, $url);
            curl_setopt($curlSess, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($curlSess, CURLOPT_BINARYTRANSFER, true);
            curl_setopt($curlSess, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curlSess, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curlSess, CURLOPT_SSL_VERIFYHOST, false);

            $output = utf8_decode(curl_exec($curlSess));
            $response = json_decode($output);
            curl_close($curlSess);

            return $response;
        }
    }