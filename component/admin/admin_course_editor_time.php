<?php
    class AdminCourseEditorTimeView{

        public static function initView($dir, $sess, $paths, $sClass, $isNew, $branches, $index){
            $auth = $sess->getAuth();
            
            $urls = array(
                'back' => Nav::getPrevious()
            );
            $data = array(
                'sClass' => $sClass,
                'isNew' => $isNew,
                'index' => $index
            );
?>
            <body class=" layout-fluid">
               

                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <?php Toolbar::initToolbar($dir, '', $sess) ?>

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
                                        <?php if($isNew) echo 'เพิ่มรอบเรียน'; else echo 'แก้ไขรอบเรียน' ?>
                                    </h1>

                                    <div class="card">
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form class="form-horizontal">

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label form-label" for="cSeats">จำนวนที่นั่ง</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="number" id="cSeats" class="form-control" placeholder="จำนวนที่นั่ง" min="0" value="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label form-label" for="cCredit">จำนวน Credit ที่ใช้</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="number" id="cCredit" class="form-control" placeholder="จำนวน credit ที่ใช้" min="0" value="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label form-label" for="cDay">วัน</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                 <select id="cDay" class="form-control custom-select" required>
                                                                     <?php self::initItems($dir, $sClass, $isNew) ?>
                                                                 </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label form-label" for="cStartTime">เวลาที่เริ่ม</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="time" id="cStartTime" class="form-control" placeholder="00:00" value="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label form-label" for="cEndTime">เวลาที่จบ</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="time" id="cEndTime" class="form-control" placeholder="00:00" value="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label form-label" for="cEndTime">สาขา</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <select id="cBranches" class="form-control custom-select" required>
                                                                        <?php //self::initBranchItems($dir, $branches, $sClass, $isNew) ?>
                                                                    </select>
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
                            <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::customScript($dir, 'common.js') ?>
                <?php Script::initScript($dir) ?>

                <script id="obj-data"><?php echo json_encode($data) ?></script>
                <script id="obj-urls"><?php echo json_encode($urls) ?></script>

                
                

                <?php Script::customScript($dir, 'admin-course-editor-class.js') ?>
                    
<?php
        }

        private static function initBranchItems($dir, $branches, $sClass, $isNew){
            ?>
                <option value="" selected>-</option>
            <?php foreach ($branches as $key => $b) { ?>
                <option value="<?php echo $b->ID ?>" <?php if(!$isNew)if($b->ID == $sClass->branchID) echo 'selected' ?>>สาขา <?php echo $b->title ?></option>
            <?php }
        }

        private static function initItems($dir, $sClass, $isNew){
            if($isNew){
                ?>
                    <option value="" selected>-</option>
                    <option value="mon">Monday</option>
                    <option value="tue">Tuesday</option>
                    <option value="wed">Wednesday</option>
                    <option value="thu">Thurday</option>
                    <option value="fri">Friday</option>
                    <option value="sat">Saturday</option>
                    <option value="sun">Sunday</option>
                <?php
            }else{
                $day = $sClass->day;
                ?>
                    <option value="" <?php if($day == '') echo 'selected' ?>>-</option>
                    <option value="mon" <?php if($day == 'mon') echo 'selected' ?>>Monday</option>
                    <option value="tue" <?php if($day == 'tue') echo 'selected' ?>>Tuesday</option>
                    <option value="wed" <?php if($day == 'wed') echo 'selected' ?>>Wednesday</option>
                    <option value="thu" <?php if($day == 'thu') echo 'selected' ?>>Thurday</option>
                    <option value="fri" <?php if($day == 'fri') echo 'selected' ?>>Friday</option>
                    <option value="sat" <?php if($day == 'sat') echo 'selected' ?>>Saturday</option>
                    <option value="sun" <?php if($day == 'sun') echo 'selected' ?>>Sunday</option>
                <?php
            }
            ?>

            <?php
        }

    }