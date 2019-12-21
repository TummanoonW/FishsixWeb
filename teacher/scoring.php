<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_teacher($dir, 'teacher_scoring.php');
    Includer::include_fun($dir, 'fun_teacher_scoring.php');
    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_booking.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserTeacher()){
        $tid = $io->get->tid;
        $bid = $io->get->bid;

        $result = FunCourse::getTeacher($api, $tid);
        $teacher = $result->response;
        if($teacher->teacherID == $auth->ID){
            $result = FunTeacherScoring::getByBookingID($api, $bid);
            if($result->response != NULL){
                $isNew = FALSE;
                $score = $result->response;
                $booking = $score->booking;
                $student = $score->student;

                $result = FunCourse::get($api, $score->courseID);
                $course = $result->response;  

                $result = FunCourse::getClass($api, $booking->classID);
                $class = $result->response;  

                $result = FunCourse::getBranch($api, $booking->courseBranchID);
                $courseBranch = $result->response;  
            }else{
                $result = FunBooking::getSingleFull($api, $bid);
                
                $isNew = TRUE;
                $score = NULL;
                $booking = $result->response;
                $student = $booking->owner;
                $course = $booking->course;

                $result = FunCourse::getClass($api, $booking->classID);
                $class = $result->response;  

                $result = FunCourse::getBranch($api, $booking->courseBranchID);
                $courseBranch = $result->response;  
            }

            Console::log('scoring', $score);
            Console::log('booking', $booking);
            Console::log('student', $student);
            Console::log('course', $course);
            Console::log('class', $course);
            Console::log('courseBranch', $courseBranch);

            $paths = array(
                new Path(FALSE, 'หน้าหลัก', $dir),
                new Path(FALSE, 'ระบบการสอน', $dir . App::$pageTeacherPanel),
                new Path(FALSE, "ประเมินนักเรียน - $course->title", $dir . App::$pageTeacherManageStudent . "?id=$tid"),
                new Path(TRUE, "ประเมิน - $student->username", '')
            );


            Header::initHeader($dir, "ประเมิน - $student->username"); 
            TeacherScoringView::initView($dir, $sess, $paths, $isNew, $student, $booking, $course, $score, $class, $courseBranch, $tid);
            Footer::initFooter($dir); 
        }else{
            //Nav::gotoHome($dir);
        }
    }else{
        Nav::gotoHome($dir);
    }
?>
    