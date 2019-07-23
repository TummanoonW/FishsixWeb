<?php
    class IO{
        public $id;
        public $query;
        public $method;
        public $post;
        public $input;
        public $page;

        function __construct(){
            //use method 'GET' protocol 'q' as JSON to query anything
            if(isset($_GET['q'])){
                $q = $_GET['q'];
                $this->query = json_decode($q);
            }else{
                $this->query = new StdClass();
            }

            if(isset($_GET['m'])){
                $this->method = $_GET['m'];
            }else{
                $this->method = NULL;
            }

            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $this->id = $id;
            }else{
                $this->id = NULL;
            }

            if(isset($_GET['page'])){
                $page = $_GET['page'];
                $this->page = $page;
            }else{
                $this->page = NULL;
            }

            $p = $_POST;
            $this->post = (object)$p;

            //use method 'POST/PUT' (aka 'input') as JSON to post anything
            $i = file_get_contents('php://input');
            $this->input = json_decode($i);


        }

        //echo a given Object or Array in JSON format as string
        public function output($obj){
            echo json_encode($obj);
        }

    }