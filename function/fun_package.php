<?php 
    class FunPackage{

        public static function getAll(){
            $packages = array(
                new Package(NULL),
                new Package(NULL),
                new Package(NULL)
            );
            return $packages;
        }
    }