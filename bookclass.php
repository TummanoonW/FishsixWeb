<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_bookclass.php');
    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_ownership.php');
    Includer::include_fun($dir, 'fun_schedule.php');

    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserExisted()){
        $paths = array(
            new Path(FALSE, 'หน้าหลัก', $dir),
            new Path(FALSE, 'คอร์สของฉัน', $dir . App::$pageMyCourses),
            new Path(TRUE, 'จองรอบเรียน', $dir . App::$pageBookClass)
        );

        $id = $io->id;
        $result = FunOwnership::getSingle($api, $id);
        if($result->success){
            if($result->response != NULL){
                if($result->response->isExpired != TRUE){
                    $ownership = $result->response;
                    
                    $result = FunCourse::get($api, $ownership->courseID);
                    if($result->response != NULL){
                        $course = $result->response;

                        $result = FunCourse::getClassesByCourseID($api, $course->ID);
                        $classes = $result->response;

                        $result = FunCourse::getBranchesByCourseID($api, $course->ID);
                        $branches = $result->response;

                        $after = CustomDate::getDateNow()->format('Y-m-d');
                        $result = FunSchedule::getAfterByCourseID($api, $after, $course->ID);
                        $schedules = $result->response;

                        Header::initHeader($dir, "จองรอบเรียน - $course->title"); 
                        BookingClass::initView($dir, $sess, $paths, $ownership, $course, $classes, $branches, $schedules);
                        Footer::initFooter($dir);
                    }else{
                        $result->err = Err::$ERR_COURSE_EXPIRED;
                        ErrorPage::showError($dir, $result); 
                    }
                }else{
                    $result->err = Err::$ERR_NO_DATA;
                    ErrorPage::showError($dir, $result);
                }
            }else{
                ErrorPage::showError($dir, $result);
            }
        }else{
            Nav::gotoHome($dir);
        }
    }
    