<?php
    //automatically encode UTF8 when Includer is loaded
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: text/html; charset=utf-8');

    class Includer{
        //Include all files within 'config' directory
        public static function include_config($dir){
            foreach (glob($dir . "config/*.php") as $filename){
                include_once $filename;
            }
        }

        //Include all files within 'structure' directory
        public static function include_structure($dir){
            foreach (glob($dir . "structure/*.php") as $filename){
                include_once $filename;
            }
        }


        //Include all files within 'component/layout' directory
        public static function include_layout($dir){
            foreach (glob($dir . "component/layout/*.php") as $filename){
                include_once $filename;
            }
        }

        //Include Proto-Framework Infamodel
        public static function include_proto($dir){
            if(!isset($dir)){
                $dir = "./";
            }

            self::include_config($dir);
            self::include_structure($dir);
            self::include_layout($dir);
        }

        //Include specific component view given by file name
        public static function include_view($dir, $file){
            if(!isset($dir)){
                $dir = "./";
            }

            $arr = explode(".", $file);
            $lenght = count($arr);
            if($lenght == 1) $file = $file . ".php";
            
            include_once $dir . 'component/view/' . $file;
        }

        public static function include_admin($dir, $file){
            if(!isset($dir)){
                $dir = "./";
            }

            $arr = explode(".", $file);
            $lenght = count($arr);
            if($lenght == 1) $file = $file . ".php";

            include_once $dir . 'component/admin/' . $file;
        }

        public static function include_analytics($dir, $file){
            if(!isset($dir)){
                $dir = "./";
            }

            $arr = explode(".", $file);
            $lenght = count($arr);
            if($lenght == 1) $file = $file . ".php";

            include_once $dir . 'component/analytics/' . $file;
        }

        public static function include_teacher($dir, $file){
            if(!isset($dir)){
                $dir = "./";
            }

            $arr = explode(".", $file);
            $lenght = count($arr);
            if($lenght == 1) $file = $file . ".php";

            include_once $dir . 'component/teacher/' . $file;
        }

        public static function include_forum($dir, $file){
            if(!isset($dir)){
                $dir = "./";
            }

            $arr = explode(".", $file);
            $lenght = count($arr);
            if($lenght == 1) $file = $file . ".php";

            include_once $dir . 'component/forum/' . $file;
        }

        public static function include_fun($dir, $file){
            if(!isset($dir)){
                $dir = "./";
            }

            $arr = explode(".", $file);
            $lenght = count($arr);
            if($lenght == 1) $file = $file . ".php";

            include_once $dir . 'function/' . $file;
        }

    }