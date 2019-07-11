<?php
    class IO{
        public $id;
        public $query;
        public $post;
        public $input;

        function __construct(){
            //use method 'GET' protocol 'q' as JSON to query anything
            if(isset($_GET['q'])){
                $q = $_GET['q'];
                $this->query = json_decode($q);
            }else{
                $this->query = NULL;
            }

            if(isset($_GET['id'])){
                $q = $_GET['id'];
                $this->id = $id;
            }else{
                $this->id = NULL;
            }

            $p = $_POST;
            $this->post = (object)$p;

            //use method 'POST/PUT' (aka 'input') as JSON to post anything
            if(file_get_contents('php://input') != NULL){
                $i = file_get_contents('php://input');
                $this->input = json_decode($i);
            }else{
                $this->input = NULL;
            }


        }

        //echo a given Object or Array in JSON format as string
        public function output($obj){
            echo json_encode($obj);
        }

    }