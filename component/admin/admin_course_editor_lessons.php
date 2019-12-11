<?php
    class AdminCourseEditorLessonView{

        public static function initView($dir, $paths, $sLesson, $isNew){
            $auth = SESSION::getAuth();
            $urls = array(
                'back' => Nav::getPrevious()
            );
            $data = array(
                'sLesson'   => $sLesson,
                'isNew' => $isNew
            );
?>
            <body class=" layout-fluid">
               

                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <?php Toolbar::initToolbar($dir, '') ?>

                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div id="loading" class="text-center m-5">
                                    <div class="spinner-border" role="status" style="height: 3rem; width: 3rem;"></div>
                                    <div class="align-middle" style=""><h3 class="mt-2">กำลังโหลด...</h3></div>
                                </div>

                                <div id="page" class="container-fluid page__container">

                                    <h1 class="h2">
                                        <a onclick="window.history.back()"><i class="fas fa-arrow-left mr-2"></i></a>
                                        <?php if($isNew) echo 'เพิ่มบทเรียน'; else echo 'แก้ไขบทเรียน' ?>
                                    </h1>

                                    <div class="card">
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form class="form-horizontal">

                                                    <div class="form-group row">
                                                            <label for="title" class="col-sm-3 col-form-label form-label">หัวเรื่อง (สูงสุด 50 ตัวอักษร)</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                <input type="text" id="cTitle" class="form-control" placeholder="เพิ่มหัวเรื่อง" value="" maxlength="50" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="cContent" class="col-sm-3 col-form-label form-label">เนื้อหาย่อ</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <textarea id="cContent" type="text" class="form-control" placeholder="กรอกเนื้อหาย่อ" value="" maxlength="100" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-8 offset-sm-3">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <a onclick="save()" class="btn btn-success text-light">บันทึก</a>
                                                                    <a onclick="window.history.back()" style="margin-left:8px;" class="btn btn-danger text-light">ยกเลิก</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir) ?>
                        </div>
                    </div>
                </div>
                <?php Script::customScript($dir, 'common.js') ?>
                <?php Script::initScript($dir) ?>

                <script id="obj-data"><?php echo json_encode($data) ?></script>
                <script id="obj-urls"><?php echo json_encode($urls) ?></script>

                
                

                <?php Script::customScript($dir, 'admin-course-editor-lesson.js') ?>
                    
<?php
        }

    }