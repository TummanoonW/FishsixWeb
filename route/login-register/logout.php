<?php
    $dir = "../../";

    include_once $dir . 'includer/includer.php'; //include Includer file to operate
    
    //include Proto Framework Architecture with retracked directory path
    Includer::include_proto($dir);

    $sess = new Sess();
    $io = new IO();

    if(isset($io->method)){
        switch($io->method){
            case 'relogin':
                $sess->logOut();
                Nav::goto($dir, App::$pageLogin);
                break;
            default:
                //clear all data in Sess as log out
                $sess->logOut();
               //return to home page
                Nav::gotoHome($dir);
                break;
        }
    }else{
        $sess->logOut();
        Nav::gotoHome($dir);
    }


 