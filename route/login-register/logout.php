<?php
    $dir = "../../";

    include_once $dir . 'includer/includer.php'; //include Includer file to operate
    
    //include Proto Framework Architecture with retracked directory path
    Includer::include_proto($dir);

    $io = new IO();

    if(isset($io->method)){
        switch($io->method){
            case 'relogin':
                Session::logOut();
                Nav::goto($dir, App::$pageLogin);
                break;
            default:
                //clear all data in session as log out
                Session::logOut();
               //return to home page
                Nav::gotoHome($dir);
                break;
        }
    }else{
        Session::logOut();
        Nav::gotoHome($dir);
    }


 