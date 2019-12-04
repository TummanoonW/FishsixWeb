<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 

    $result = $io->get->result;
    ErrorPage::showError($dir, $result);


