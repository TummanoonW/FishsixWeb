<?php
    class Result{
        public $success; //status of being completed/corrected/succeed
        public $response; //contains recieved data as an Object or an Array
        public $err; //contains ArrayObject that contains code and msg

        //initialize variables when Object is being constructed
        function __construct(){
            $this->setResult(FALSE, NULL, NULL);
        }

        //set success, response, and err values
        public function setResult($success, $response, $err){
            $this->setSuccess($success);
            $this->setResponse($response);
            $this->setErr($err);
        }

        //set boolean value into $success
        public function setSuccess($success){
            $this->success = $success;
        }

        //set recieved data into $response
        public function setResponse($response){
            $this->response = $response;
        }

        //set Err type of arrayObject into $err
        public function setErr($err){
            $this->err = $err;
        }

        //return Error code
        public function getErrCode(){
            return $this->err->code;
        }

        //return Error message
        public function getErrMsg(){
            return $this->err->msg;
        }

        //return string of JSON Format of this Object
        public function toJSON(){
            return json_encode($this);
        }

    }