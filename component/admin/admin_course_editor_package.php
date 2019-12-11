<?php
    class AdminCourseEditorPackageView{

        public static function initView($dir, $paths, $sPackage, $isNew){
            $auth = SESSION::getAuth();
            $urls = array(
                'back' => Nav::getPrevious()
            );
            $data = array(
                'sPackage'   => $sPackage,
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
                                        <?php if($isNew) echo 'เพิ่มชุดราคา'; else echo 'แก้ไขชุดราคา' ?>
                                    </h1>

                                    <div class="card">
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form class="form-horizontal">

                                                    <div class="form-group row">
                                                        <label for="cPrice" class="col-sm-3 col-form-label form-label">ราคา (บาท)</label>
                                                        <div class="col-sm-8">
                                                            <div class="input-group">
                                                                <input type="number" id="cPrice" class="form-control" placeholder="กรอกราคา" min="1" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="cCredit" class="col-sm-3 col-form-label form-label">จำนวน credit (ชม.)</label>
                                                        <div class="col-sm-8">
                                                            <div class="input-group">
                                                                <input type="number" id="cCredit" class="form-control" placeholder="กรอกจำนวน credit" min="1" required>
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

                
                

                <?php Script::customScript($dir, 'admin-course-editor-package.js') ?>
<?php
        }

    }