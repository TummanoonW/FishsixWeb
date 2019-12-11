<?php
    $dir = "../../";

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_admin_course.php');

    $apiKey = SESSION::getAPIKey();
    $auth = SESSION::getAuth();

    $api = new API($apiKey);
    $io = new IO(); 

    if(SESSION::checkUserAdmin()){
        $result = new Result();

        switch($io->method){
            case 'delete':
                $id = $io->id;
                $result = FunAdminCourse::delete($api, $id);
                if($result->success) Nav::goto($dir, App::$pageAdminManageCourses);
                else ErrorPage::initPage($dir, $result);
                break;

            case 'courseN':
                $course = $io->post->course;
                
                if($course['meta'] == 'add'){
                    unset($course['ID']);
                    $course['ownerID'] = $auth->ID;
                }

                if(strlen($course['thumbnail']) > 200){
                    $t = $course['thumbnail'];
                    $result = base64_to_jpeg($dir, 'uploads/thumbs/', $t);
                    if($result->success){
                        $course['thumbnail'] = $result->response->downloadURL;
                    }
                }

                $result = FunAdminCourse::setCourse($api, $course);
                $io->output($result);
                break;

            case 'teachersN':
                $courseID = $io->id;
                $teachers = $io->post->teachers;
                $n_teachers = [];

                //polishing data step1
                foreach ($teachers as $key => $t) {
                    $nt = (object)$t;
                    if($nt->meta == 'add'){
                        unset($nt->ID);
                        $nt->courseID = $courseID;
                    }
                    unset($nt->teacher);
                    array_push($n_teachers, $nt);
                }

                $result = FunAdminCourse::setTeachers($api, $n_teachers);
                $io->output($result);
                break;

            case 'branchesN':
                $courseID = $io->id;
                $branches = $io->post->branches;
                $n_branches = [];

                foreach ($branches as $key => $b) {
                    $nb = (object)$b;
                    if($nb->meta == 'add'){
                        unset($nb->ID);
                        $nb->courseID = $courseID;
                    }
                    unset($nb->branch);
                    array_push($n_branches, $nb);
                }

                $result = FunAdminCourse::setBranches($api, $n_branches);
                $io->output($result);
                break;

            case 'classesN':
                $courseID = $io->id;
                $classes = $io->post->classes;
                $n_classes = [];

                foreach ($classes as $key => $c) {
                    $nc = (object)$c;
                    if($nc->meta == 'add'){
                        unset($nc->ID);
                        $nc->courseID = $courseID;
                    }
                    array_push($n_classes, $nc);
                }

                $result = FunAdminCourse::setClasses($api, $n_classes);
                $io->output($result);
                break;

            case 'lessonsN':
                $courseID = $io->id;
                $lessons = $io->post->lessons;
                $n_lessons = [];

                foreach ($lessons as $key => $l) {
                    $nl = (object)$l;
                    if($nl->meta == 'add'){
                        unset($nl->ID);
                        $nl->courseID = $courseID;
                    }
                    array_push($n_lessons, $nl);
                }

                $result = FunAdminCourse::setLessons($api, $n_lessons);
                $io->output(result);
                break;

            case 'packagesN':
                $courseID = $io->id;
                $packages = $io->post->packages;
                $n_packages = [];

                foreach ($packages as $key => $p) {
                    $np = (object)$p;
                    if($np->meta == 'add'){
                        unset($np->ID);
                        $np->courseID = $courseID;
                    }
                    array_push($n_packages, $np);
                }

                $result = FunAdminCourse::setPackages($api, $n_packages);
                $io->output($result);
                break;

            case 'picturesN':
                $courseID = $io->id;
                $pictures = $io->post->pictures;
                $n_pictures = [];

                foreach ($pictures as $key => $p) {
                    $np = (object)$p;
                    if($np->meta == 'add'){
                        unset($np->ID);
                        $np->courseID = $courseID;
                    }

                    if(strlen($np->picture) > 200){
                        $t = $np->picture;
                        $result = base64_to_jpeg($dir, 'uploads/pictures/', $t);
                        if($result->success){
                            $np->picture = $result->response->downloadURL;
                        }
                    }

                    array_push($n_pictures, $np);
                }
                
                $result = FunAdminCourse::setPictures($api, $n_pictures);
                $io->output($result);
                break;

            default:
                Nav::gotoHome($dir);
                break;
        }
    }

    function base64_to_jpeg($dir, $path, $base64_string) {
        $result = new Result();

        $file = $path . CustomDate::timeStamp() . '.png';
        $uri = '/' . explode('/', $_SERVER['REQUEST_URI'])[1] . '/';
        $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $uri;
        $downloadURL = $url . $file;


        $r = file_put_contents($dir . $file, file_get_contents($base64_string));

        if($r) $result->setResult(TRUE, (object)array('downloadURL' => $downloadURL), NULL);
        else $result->setResult(FALSE, NULL, Err::$ERR_FILE_FAILED);

        return $result;
    }