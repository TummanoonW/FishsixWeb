<?php
    class Course extends Doc{

        public $title           = "New Course";
        public $description     = "";
        public $categoryID      = NULL;
        public $pictures        = [];
        public $tags            = [];
        public $minPrice        = 0;
        public $maxPrice        = 0;
        public $public          = FALSE;
        public $video           = "";
        public $thumbnail       = "";
        public $createdDate     = "";
        public $editedDate      = "";
        public $ownerID         = NULL;
        public $groupLINE       = "";

        private $category       = NULL;
        private $teachers       = []; 
        private $branches       = []; 
        private $packages       = [];
        
        function __construct($obj){
            parent::__construct($obj);
            $this->parseJSON($obj);
        }

        public function parseJSON($obj){
            if(isset($obj->title))$this->title = $obj->title;

            if(isset($obj->description))$this->description = $obj->description;

            if(isset($obj->categoryID))$this->categoryID = $obj->categoryID;

            if(isset($obj->pictures))$this->pictures = $obj->pictures;

            if(isset($obj->tags))$this->tags = $obj->tags;

            if(isset($obj->minPrice))$this->minPrice = $obj->minPrice;

            if(isset($obj->maxPrice))$this->maxPrice = $obj->maxPrice;

            if(isset($obj->public))$this->public = $obj->public;

            if(isset($obj->video))$this->video = $obj->video;

            if(isset($obj->thumbnail))$this->thumbnail = $obj->thumbnail;

            if(isset($obj->createdDate))$this->createdDate = $obj->createdDate;
            else $this->createdDate = CustomDate::parseDateNow();

            if(isset($obj->editedDate))$this->editedDate = $obj->editedDate;
            else $this->editedDate = CustomDate::parseDateNow();

            if(isset($obj->ownerID))$this->ownerID = $obj->ownerID;

            if(isset($obj->groupLINE))$this->groupLINE = $obj->groupLINE;
        }

        //return this object as JSON string
        public function toJSON(){
            return json_encode($this);
        }

        //check if certain variables are fullfil
        public function validate(){
            $array = (array)$rec;
            $boo = TRUE;
            foreach ($array as $key => $value) {
                $boo = $boo && ($key != NULL);
            }
            return $boo;
        }

        public function recalculatePrices(){
            $prices = $this->package->minmaxPrices();
            $this->minPrice = $prices[0];
            $this->maxPrice = $prices[1];
        }
    }
    