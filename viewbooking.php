<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_booking.php');

    Includer::include_fun($dir, 'fun_booking.php');

    $auth = SESSION::getAuth(); 
    $apiKey = SESSION::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if($io->id != NULL){
        $id = $io->id;
        $result = FunBooking::getSingleFull($api, $id);
        $booking = $result->response;

        $paths = array(
            new Path(FALSE, 'หน้าหลัก', $dir),
            new Path(TRUE, 'การจอง - ' . $booking->ID, '')
        );

        Header::initHeader($dir, "การจอง - $booking->ID"); 
        ViewBooking::initView($dir, $paths, $booking);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }

