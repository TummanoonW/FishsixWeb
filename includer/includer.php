<?php
    //automatically encode UTF8 when Includer is loaded
    header('Content-Type: text/html; charset=utf-8');

    class Includer{
        //Include all files within 'config' directory
        public static function include_config($dir){
            foreach (glob($dir . "config/*.php") as $filename){
                include_once $filename;
            }
        }

        //Include all files within 'structure' directory
        //Structure is obsolete and was never used
        public static function include_structure($dir){
            foreach (glob($dir . "structure/*.php") as $filename){
                include_once $filename;
            }
        }


        //Include all files within 'component' directory
        public static function include_component($dir){
            foreach (glob($dir . "component/*.php") as $filename){
                include_once $filename;
            }
        }

        //Include Proto-Framework Infastructure
        public static function include_proto($dir){
            if(!isset($dir)){
                $dir = "./";
            }

            self::include_config($dir);
            self::include_structure($dir);
            self::include_component($dir);

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            } 
        }

    }