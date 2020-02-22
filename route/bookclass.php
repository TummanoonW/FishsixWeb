<?php
     $dir = "../";
     include_once $dir . 'includer/includer.php'; 
     Includer::include_proto($dir); 
     Includer::include_fun($dir, 'fun_course.php');
     Includer::include_fun($dir, 'fun_ownership.php');
     Includer::include_fun($dir, 'fun_booking.php');
 
     $sess = new Sess();
     $apiKey = $sess->getAPIKey(); 
     $auth = $sess->getAuth();
 
     $api = new API($apiKey); 
     $io = new IO(); 
 
     if($sess->checkUserExisted()){
        switch($io->method){
            case 'book':
                $courseBranchID = $io->post->cBranchID;
                $classID = $io->post->cClassID;
                $ownershipID = $io->post->ownershipID;
                $startDate = $io->post->cDate;

                $result = FunCourse::getClassSingle($api, $classID);
                if($result->response != NULL){
                    $class = $result->response;
                    
                    $form = (object)array(
                        'ownerID' => $auth->ID,
                        'courseBranchID' => $courseBranchID,
                        'classID' => $classID,
                        'courseID' => $class->courseID,
                        'creditUsed' => $class->creditUse,
                        'startDate' => $startDate,
                        'ownershipID' => $ownershipID
                    );
                    
                    $result = FunBooking::book($api, $form);
                    if($result->success){
                        Nav::goto($dir, App::$pageMySchedule);
                    }else{
                        ErrorPage::showError($dir, $result);
                    }
                }else{
                    ErrorPage::showError($dir, $result);
                }

                break;
            default:
                Nav::goBack();
                break;
        }
     }else{
         Nav::goBack();
     }   