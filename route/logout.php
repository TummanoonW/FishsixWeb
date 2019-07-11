<?php

    include_once '../includer/includer.php'; //include Includer file to operate
    
    //include Proto Framework Architecture with retracked directory path
    Includer::include_proto("../");

    //clear all data in session as log out
    Session::logOut();

    //return to home page
    Nav::gotoHome();