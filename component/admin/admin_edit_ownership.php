<?php
    class AdminOwnershipEditorView{

        public static function initView($dir, $sess, $paths, $isNew, $label, $ownership, $courses){
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

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                    <h1 class="h2">โปรแกรม<?php echo $label ?>ความเป็นเจ้าของ</h1>

                                    <div class="card">
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form action="<?php Nav::echoURL($dir, App::$routeAdminOwnership . "?m=update") ?>" method="POST" class="form-horizontal">
                                                    <?php if(!$isNew){ ?>
                                                        <div class="form-group row">
                                                            <label for="id" class="col-sm-3 col-form-label form-label">ID</label>
                                                            <div class="col-sm-8">
                                                                <input name="ID" type="text" id="id" class="form-control" placeholder="" value="<?php if(!$isNew) echo $ownership->ID; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <div class="form-group row">
                                                            <label for="ownerID" class="col-sm-3 col-form-label form-label">ownerID</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                <input name="ownerID" type="text" id="ownerID" class="form-control" placeholder="กรอก ID ผู้ใช้" value="<?php if(!$isNew) echo $ownership->ownerID ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label form-label" for="courseID">คอร์ส</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <select name="courseID" id="courseID" class="form-control custom-select">
                                                                        <option value="">เลือกคอร์ส</option>
                                                                        <?php foreach ($courses as $key => $value) { ?>
                                                                            <option value="<?php echo $value->ID ?>" <?php if(!$isNew)if($ownership->courseID == $value->ID) echo 'selected' ?>><?php echo $value->title ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                            <label for="credit" class="col-sm-3 col-form-label form-label">จำนวนเครดิต (ชม.)</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                <input name="credit" type="number" id="credit" class="form-control" value="<?php if(!$isNew) echo $ownership->ownership ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                            <label for="expiration" class="col-sm-3 col-form-label form-label">ตั้งเวลาหมดอายุคอร์ส</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                <input name="expiration" type="number" id="expiration" class="form-control" value="0">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-8 offset-sm-3">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <button type="submit" class="btn btn-success">บันทึก</button>
                                                                    <a onclick="confirmCancel('<?php Nav::echoURL($dir, App::$pageAdminManageVideos) ?>')" class="btn btn-danger text-light ml-2">ยกเลิก</a>
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
                <?php Script::initScript($dir) ?>
                <?php Script::customScript($dir, 'common.js') ?>
                <?php Script::customScript($dir, 'admin-edit-video.js') ?>
                    
<?php
        }

    }