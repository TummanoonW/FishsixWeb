<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_bookclass.php');
    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_ownership.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if(Session::checkUserExisted()){
        $paths = array(
            new Path(FALSE, 'หน้าหลัก', $dir),
            new Path(FALSE, 'คอร์สของฉัน', $dir . App::$pageMyCourses),
            new Path(TRUE, 'จองรอบเรียน', $dir . App::$pageBookClass)
        );

        $id = $io->id;
        $result = FunOwnership::getSingle($api, $id);
        if($result->success){
            if($result->response != NULL){
                $ownership = $result->response;
                
                $result = FunCourse::get($api, $ownership->courseID);
                if($result->response != NULL){
                    $course = $result->response;

                    $result = FunCourse::getClassesByCourseID($api, $course->ID);
                    $classes = $result->response;

                    $result = FunCourse::getBranchesByCourseID($api, $course->ID);
                    $branches = $result->response;


                    //ตย. การดูข้อมูลที่เรียกมา ด้วย console log
                    Console::log('classes', $classes);
                    Console::log('branches', $branches);

                    Header::initHeader($dir, "จองรอบเรียน - $course->title"); 
                    BookingClass::initView($dir, $paths, $ownership, $course, $classes, $branches);
                    Footer::initFooter($dir);
                }else{
                    $result->err = Err::$ERR_NO_DATA;
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
    
    