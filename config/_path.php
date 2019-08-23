<?php 
    class Path{
        public $active;
        public $label;
        public $url;

        function __construct($active, $label, $url){
            $this->active = $active;
            $this->label = $label;
            $this->url = $url;
        }


        /* --- generate pages using path --*/
        public static function genPages($dir, $page, $limit, $currentPage, $itemNumbers){
            $pages = array();
        
            $mark = 0;
            $count = 0;
            do {
                array_push($pages, new Path(($currentPage == $count), $count, $dir . $page . '?page=' . $count));
            
                $count = $count + 1;
                $mark = $mark + $limit;
            } while ($itemNumbers > $mark);
        
            return $pages;
        }
        /* --- generate pages using path --*/
    }