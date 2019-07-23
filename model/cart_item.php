<?php
    class CartItem extends Doc{
        public $courseID = NULL;
        public $ownerID = NULL;
        public $credit = 0;

        function __construct($obj){
            parent::__construct($obj);
        }
    }