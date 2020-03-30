<?php
    class AdminCourseEditorView{
        public static function initView($dir, $sess, $paths, $isNew, $course, $categories, $branches){
            $auth = $sess->getAuth();
            $obj = array(
                'isNew' => $isNew, 
                'dir' => $dir,
                'branches' => $branches
            ); 
            $urls = array(
                'def_thumb'                     => $dir . Asset::$thumb_def,
                'def_user'                      => $dir . Asset::$icon_def,
                'pageAdminManageCourses'        => Nav::getURL($dir, App::$pageAdminManageCourses),
                'pageAdminCourseEditor'         => Nav::getURL($dir, App::$pageAdminCourseEditor),
                'pageAdminCourseEditorLesson'   => Nav::getURL($dir, App::$pageAdminCourseEditorLessons),
                'routeAdminCourse'              => Nav::getURL($dir, App::$routeAdminCourse),
                'pageAdminCourseEditorBranch'   => Nav::getURL($dir, App::$pageAdminCourseEditorBranch),
                'pageAdminCourseEditorPackage'  => Nav::getURL($dir, App::$pageAdminCourseEditorPackage),
                'pageAdminCourseEditorTeacher'  => Nav::getURL($dir, App::$pageAdminCourseEditorTeacher),
                'pageAdminCourseEditorClass'    => Nav::getURL($dir, App::$pageAdminCourseEditorTime)
            );
?>
       
            <body class="layout-fluid">
                 <!-- Flatpickr -->
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/flatpickr.css') ?>"  rel="stylesheet">
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/flatpickr.rtl.css') ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/flatpickr-airbnb.css') ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/flatpickr-airbnb.rtl.css') ?>" rel="stylesheet">

                <!-- Quill Theme -->
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/quill.css') ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/quill.rtl.css') ?>" rel="stylesheet">

                <!-- Nestable -->
                <link rel="stylesheet" href="<?php Nav::echoURL($dir, 'assets/css/nestable.css') ?>">
                <link rel="stylesheet" href="<?php Nav::echoURL($dir, 'assets/css/nestable.rtl.css') ?>">

                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir, '', $sess) ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div id="loading" class="progress m-4 height32" height="32">
                                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
                                </div>

                                <div id="page" class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                    <div class="media align-items-center mb-headings">
                                        <div class="media-body">
                                            <h1 class="h2" id="pageTitle">คอร์สใหม่</h1>
                                        </div>
                                        <div class="media-right">
                                            <span class="mr-3">อัพเดทล่าสุด: <span id="cEditedDate"></span></span>
                                            <button id="btn-publish" class="btn mr-2">เผยแพร่เลย</button>
                                            <button id="btn-save" class="btn btn-info">บันทึก</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">ข้อมูลเบื้องต้น</h4>
                                                </div>
                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label class="form-label" for="cTitle">Title</label>
                                                        <input type="text" id="cTitle" class="form-control" placeholder="กรอกหัวเรื่อง" value="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label" for="cContent">คำอธิบายย่อ (สูงสุด 100 ตัวอักษร)</label>
                                                        <textarea id="cContent" class="form-control" placeholder="กรอกคำอธิบายย่อ" maxlength="100" rows="3" value=""></textarea>
                                                    </div>

                                                    <div class="form-group mb-0">
                                                        <label class="form-label">คำอธิบายเต็ม (สูงสุด 1000 ตัวอักษร)</label>
                                                        <div id="cDescription" style="height: 300px" data-toggle="quill" data-quill-placeholder="กรอกคำอธิบายเต็ม" data-quill-modules-toolbar='[["bold", "italic"], ["link", "blockquote", "code"], [{"list": "ordered"}, {"list": "bullet"}]]'>
                                                            <p></p>    
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">บทเรียน</h4>
                                                </div>
                                                <div class="card-body">
                                                    <p><a id="btn-add-lesson" class="btn btn-primary text-light">เพิ่มบทเรียน <i class="material-icons">add</i></a></p>
                                                    <div class="nestable" id="nestable-handles-primary">
                                                        <ul id="cLessons" class="nestable-list">
                                                            <!-- LESSON ITEMS -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">ชุดราคา</h4>
                                                </div>
                                                <div class="card-body">
                                                    <p><a id="btn-add-package" class="btn btn-primary text-light">เพิ่มชุดราคา <i class="material-icons">add</i></a></p>
                                                    <div class="nestable" id="nestable-handles-primary">
                                                        <ul id="cPackages" class="nestable-list">
                                                            <!-- PACKAGE ITEMS -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">สาขา</h4>
                                                </div>
                                                <div class="card-body">
                                                    <p><a id="btn-add-branch" class="btn btn-primary text-light">เพิ่มสาขา <i class="material-icons">add</i></a></p>
                                                    <div class="nestable" id="nestable-handles-primary">
                                                        <ul id="cBranches" class="nestable-list">
                                                            <!-- BRANCH ITEMS -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                           
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">รอบเรียน</h4>
                                                </div>
                                                <div class="card-body">
                                                    <p><a id="btn-add-class" class="btn btn-primary text-light">เพิ่มรอบเรียน<i class="material-icons">add</i></a></p>
                                                    <div class="nestable" id="nestable-handles-primary">
                                                        <ul id="cClasses" class="nestable-list">
                                                            <!-- CLASS ITEMS -->
                                                        </ul>
                                                        <!--<table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>วัน</th>
                                                                    <th>เวลาเริ่ม</th>
                                                                    <th></th>
                                                                    <th>เวลาจบ</th>
                                                                    <th>สาขา</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="cClasses" class="list">
                                                                
                                                            </tbody>
                                                        </table> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div id="thumbForm" class="card">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <img id="cThumb" src="<?php Asset::echoThumb($dir, '') ?>" alt="" width="100%" class="embed-responsive-item">
                                                </div>
                                                <div class="card-body">
                                                    <label class="mb-2"><h5 class="card-title">ภาพตัวอย่าง</h5></label> 
                                                    <div class="custom-file" style="width: auto;">
                                                        <input type="file" id="cThumbnail" class="custom-file-input" accept="image/*" onchange="uploadToPicture(this, 768, 432, '#cThumb', '#cThumbnail2')">
                                                        <label for="cThumbnail" class="custom-file-label">อัพโหลดไฟล์</label>
                                                        <small class="text-secondary">ขนาดที่แนะนำ: 768x432 px</small>
                                                    </div>
                                                </div>
                                                <input name="thumbnail" id="cThumbnail2" style="visibility: collapse; height: 1px;" value="">
                                            </div>

                                            <div class="card">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe id="cYoutube" class="embed-responsive-item" src="" allowfullscreen=""></iframe>
                                                </div>
                                                <div class="card-body">
                                                    <label class="mb-2"><h5 class="card-title">วิดีโอตัวอย่าง (id วิดีโอ Youtube)</h5></label> 
                                                    <input id="cPreview" type="text" class="form-control" value="" onpaste="onPreviewChange(this, '#cYoutube')" onchange="onPreviewChange(this, '#cYoutube')"/>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header">
                                                   <label for="picture"><h4 class="card-title">ภาพประกอบ</h4></label> 
                                                </div>
                                                <div class="card-body">
                                                    <div class="custom-file" style="width: auto;">
                                                        <input name="picture" type="file" id="cPicture" class="custom-file-input" accept="image/*" onchange="onUploadToPicture(this, 1080, 720, '#cPicture2')">
                                                        <label for="cPicture" class="custom-file-label">อัพโหลดไฟล์</label>
                                                        <small class="text-secondary">ขนาดที่แนะนำ: 1080x720 px</small>
                                                    </div>
                                                    <div class="nestable" id="nestable-handles-primary" style="margin-top:10px;">
                                                        <ul id="cPictures" class="nestable-list">
                                                            <!-- PICTURE ITEMS -->
                                                        </ul>
                                                    </div>
                                                </div>
                                                <input name="picture2" id="cPicture2" style="visibility: collapse; height: 1px;" value="">
                                            </div>


                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">ครูผู้สอน</h4>
                                                </div>
                                                <div class="card-body"><!-- แก้ -->
                                                    <p><a id="btn-add-teacher" class="btn btn-primary text-light">เพิ่มครู<i class="material-icons">add</i></a></p>
                                                    <div class="nestable" id="nestable-handles-primary">
                                                    <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>ครู</th>
                                                                    <th style="width: 24px;"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="cTeachers" class="list">
                                                                <!-- TEACHER ITEMS -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">หมวดหมู่</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label class="form-label" for="category">หมวดหมู่</label>
                                                        <select id="cCategory" class="custom-select form-control" value="">
                                                                <option value="">-</option>
                                                            <?php foreach ($categories as $key => $value) { ?>
                                                                <option value="<?php echo $value->ID ?>"><?php echo $value->title ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">เพิ่มเติม</h4>
                                                    <p class="card-subtitle">ข้อมูลเพิ่มเติม </p>
                                                </div>
                                                <form class="card-body" action="#">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cStartDate">วันที่เริ่มคอร์ส</label>
                                                        <input id="cStartDate" type="date" class="form-control" placeholder="วันที่เริ่มคอร์ส" data-toggle="flatpickr">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="cEndDate">วันที่จบคอร์ส</label>
                                                        <input id="cEndDate" type="date" class="form-control" placeholder="วันที่จบคอร์ส" data-toggle="flatpickr">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="cLineGroup"><img src="<?php Asset::embedIcon($dir, 'line-icon.png') ?>" alt="Avatar" class="rounded-circle" width="20">กลุ่ม LINE</label>
                                                        <input id="cLineGroup" type="text" class="form-control" placeholder="URL" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="category">คอร์สแนะนำ</label>
                                                        <select id="cRecommended" class="custom-select form-control" value="0">
                                                            <option value="0">-</option>
                                                            <option value="1">คอร์สแนะนำ</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>              
                            </div>
                            <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>

                <?php Script::initScript($dir) ?>


                <!-- Nestable -->
                <script src="<?php Nav::echoURL($dir, 'assets/vendor/jquery.nestable.js') ?>"></script>
                <script src="<?php Nav::echoURL($dir, 'assets/js/nestable.js') ?>"></script>
                <!-- Quill -->
                <script src="<?php Nav::echoURL($dir, 'assets/vendor/quill.min.js') ?>"></script>
                <script src="<?php Nav::echoURL($dir, 'assets/js/quill.js') ?>"></script>
                <!-- Flatpickr -->
                <script src="<?php Nav::echoURL($dir, 'assets/vendor/flatpickr/flatpickr.min.js') ?>"></script>
                <script src="<?php Nav::echoURL($dir, 'assets/js/flatpickr.js') ?>"></script>


                <!-- PHP-Javascript Interaction -->
                <script id="obj-basic">
                    <?php echo json_encode($obj); ?>
                </script>
                <script id="obj-course"><?php echo json_encode($course) ?></script>
                <script id="obj-urls"><?php echo json_encode($urls) ?></script>

                
                <!-- Custom -->
                <?php Script::customScript($dir, 'common.js') ?>
                <?php Script::customScript($dir, 'admin-course-editor.js') ?>

<?php
        }

        private static function initLessonItems($dir, $lessons){
            ?>
                <li class="nestable-item nestable-item-handle" data-id="2">
                    <div class="nestable-handle"><i class="material-icons">menu</i></div>
                    <div class="nestable-content">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <img src="<?php Asset::echoThumb($dir, 'vuejs.png') ?>" alt="" width="100" class="rounded">
                            </div>
                            <div class="media-body">
                                <h5 class="card-title h6 mb-0">
                                    <a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditorLessons) ?>">Awesome Vue.js with SASS Processing</a>
                                </h5>
                                <small class="text-muted">updated 1 month ago</small>
                            </div>
                            <div class="media-right">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor) ?>" onclick="return confirm('Are you sure?');" class="btn btn-white btn-sm"><i class="material-icons">delete_forever</i></a>
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditorLessons) ?>" class="btn btn-primary btn-sm"><i class="material-icons">edit</i></a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php
        }

        private static function initPackageItems($dir, $packages){
            ?>
                <li class="nestable-item nestable-item-handle" data-id="2">
                    <div class="nestable-handle"><i class="material-icons">menu</i></div>
                    <div class="nestable-content">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <label> ราคา (บ.)
                                    <input type="text" id="duration" class="form-control" placeholder="Price" value="399" >
                                </label>
                            </div>
                            <div class="media-body">
                                <label> จำนวนเครดิต (ชม.)
                                    <input type="text" id="duration" class="form-control" placeholder="No. of Hours" value="2" >
                                </label>
                            </div>
                            <div class="media-right">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor) ?>" onclick="return confirm('Are you sure?');" class="btn btn-white btn-sm"><i class="material-icons">delete_forever</i></a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php
        }

        private static function initBranchItems($dir, $branches){
            ?>
                <li class="nestable-item nestable-item-handle" data-id="2">
                    <div class="nestable-handle"><i class="material-icons">menu</i></div>
                    <div class="nestable-content">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <img src="<?php Asset::echoThumb($dir, 'vuejs.png') ?>" alt="" width="100" class="rounded">
                            </div>
                            <div class="media-body">
                                <h5 class="card-title h6 mb-0">
                                    <a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditorBranch) ?>">Major Trauma Cinegon</a>
                                </h5>
                                <small class="text-muted">updated 1 month ago</small>
                            </div>
                            <div class="media-right">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor) ?>" onclick="return confirm('Are you sure?');" class="btn btn-white btn-sm"><i class="material-icons">delete_forever</i></a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php
        }

        private static function initTeacherItems($dir, $teachers){
            ?>
                <tr>
                    <td>
                        <div class="media align-items-center">
                            <div class="avatar avatar-sm mr-3">
                                <img src="../assets/images/thumbs/def.png" alt="Avatar" class="avatar-img rounded-circle">
                            </div>
                            <div class="media-body">
                                <span class="js-lists-values-employee-name">Helen Mcdaniel</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor) ?>" onclick="return confirm('Are you sure?');" class="btn btn-white btn-sm">
                            <i class="material-icons">delete_forever</i>
                        </a>
                    </td>
                </tr>
            <?php
        }

        private static function initClassItems($dir, $classes){
            ?>
                <tr>
                    <td>
                        <div class="media align-items-center">
                            
                            <div class="media-body">
                                <span class="js-lists-values-employee-name">Monday</span>
                            </div>
                        </div>
                    </td>
                    <td><span>10:00</span></td>
                    <td>To</td>
                    <td><span>19:00</span></td>
                    <td><a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor) ?>" onclick="return confirm('Are you sure?');" class="btn btn-white btn-sm"><i class="material-icons">delete_forever</i></a></td>
                </tr>
            <?php
        }

        private static function initPicturesItems($dir, $pictures){
            ?>
                <li class="nestable-item nestable-item-handle" data-id="2">
                    <div class="nestable-handle"><i class="material-icons">menu</i></div>
                    <div class="nestable-content">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <p><img src="<?php Asset::echoThumb($dir, 'vuejs.png') ?>" alt="" width="100" class="rounded"></p>
                                <small class="text-muted">
                                    <input type="text" id="duration" class="form-control" placeholder="caption" value="" width="100">
                                </small>
                            </div>
                            <div class="media-right">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor) ?>" onclick="return confirm('Are you sure?');" class="btn btn-white btn-sm"><i class="material-icons">delete_forever</i></a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php
        }
    }