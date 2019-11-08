<?php
    class Console{
        public static function log($label, $objArr){
            if(App::$debuggingMode){
                echo '<script>json = ' . json_encode($objArr) . '; console.log("' . $label . '", json);</script>';
            }
        }
    }