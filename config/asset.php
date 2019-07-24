<?php
    class Asset{

        public static $iconURL = "assets/images/logo/primary.svg";
        public static $iconURL2 = "assets/images/logo/white.svg";

        public static $icon_def = "assets/images/icons/def.png";
        public static $image_def = "assets/images/def.png";
        public static $thumb_def = "assets/images/thumbs/def.png";

        public static function printThumb($dir, $file){
            $arr = explode("://", $file);
            if(count($arr) == 1) $url = $dir . $file;
            else $url = $file;

            if(file_exists($url)){
                echo $url;
            }else{
                echo $dir . self::$thumb_def;
            }
        }
        
        public static function printImage($dir, $file){
            $arr = explode("://", $file);
            if(count($arr) == 1) $url = $dir . $file;
            else $url = $file;

            if(file_exists($url)){
                echo $url;
            }else{
                echo $dir . self::$image_def;
            }
        }

        public static function printIcon($dir, $file){
            $arr = explode("://", $file);
            if(count($arr) == 1) $url = $dir . $file;
            else $url = $file;

            if(file_exists($url)){
                echo $url;
            }else{
                echo $dir . self::$icon_def;
            }
        }
    }