<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_course_editor.php');

    Includer::include_fun($dir, 'fun_category.php');
    Includer::include_fun($dir, 'fun_admin_course.php');
    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_branch.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก',            $dir),
        new Path(FALSE, 'ระบบจัดการ',     $dir . App::$pageAdminPanel),
        new Path(FALSE, 'จัดการคอร์ส',  $dir . App::$pageAdminManageCourses),
        new Path(TRUE,  'โปรแกรมแก้ไขคอร์ส',   $dir . App::$pageAdminCourseEditor)
    );

    if($sess->checkUserAdmin()){
        $id = $io->id;
        $isNew = ($id == NULL);

        $result = FunCategory::get($api);
        $categories = $result->response;

        $result = FunBranch::getLite($api);
        $branches = $result->response;

        if(!$isNew){ //new course
            $result = FunCourse::getFull($api, $io->id);
            $course = $result->response;
        }else{
            $course = (object)array(
                'title' => '',
                'content' => '',
                'description' => '',
                'public' => '0',
                'thumbnail' => '',
                'endDate' => '',
                'startDate' => '',
                'lineGroup' => '',
                'lessons' => [],
                'branches' => [],
                'classes' => [],
                'lessons' => [],
                'packages' => [],
                'teachers' => [],
                'pictures' => []
            );
        }

        Header::initHeader($dir, "แอดมิน - โปรแกรมแก้ไขคอร์ส"); 
        AdminCourseEditorView::initView($dir, $sess, $paths, $isNew, $course, $categories, $branches);
        Footer::initFooter($dir);
    }else{
        Nav::gotoHome($dir);
    }




?>
    