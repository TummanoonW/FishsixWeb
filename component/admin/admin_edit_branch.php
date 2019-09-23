<?php
    class AdminAddBranchView{

        public static function initView($dir, $paths, $isNew, $branch){
            $auth = Session::getAuth();
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

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                    <h1 class="h2">โปรแกรมแก้ไขสาขา</h1>

                                    <div class="card">
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form action="<?php Nav::echoURL($dir, App::$routeAdminBranch . "?m=edit") ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                    <?php if(!$isNew){ ?>
                                                        <div class="form-group row">
                                                            <label for="id" class="col-sm-3 col-form-label form-label">ID</label>
                                                            <div class="col-sm-8">
                                                                <input name="ID" type="text" id="id" class="form-control" placeholder="" value="<?php if(!$isNew) echo $branch->ID; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <div class="form-group row">
                                                            <label for="title" class="col-sm-3 col-form-label form-label">หัวเรื่อง</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                <input name="title" type="text" id="title" class="form-control" placeholder="กรอกหัวเรื่อง" value="<?php if(!$isNew) echo $branch->title ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="description" class="col-sm-3 col-form-label form-label">คำอธิบาย</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <textarea name="description" id="description" rows="4" type="text" class="form-control" placeholder="กรอกคำอธิบาย" value="<?php if(!$isNew) echo $branch->description ?>"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="picture" class="col-sm-3 col-form-label form-label">ภาพตัวอย่าง</label>
                                                        <div class="col-sm-9">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <div class="rounded bg-transparent">
                                                                        <img id="thumb" class="w-100 h-auto" src="<?php if(!$isNew) Asset::echoThumb($dir, $branch->thumbnail) ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="media-right">
                                                                    <div class="custom-file" style="width: auto;">
                                                                        <!-- <input  type="file" id="picture" class="custom-file-input" accept="image/*" onchange="uploadToPicture(this, 720, 480, '#thumb', '#thumbnail')"> -->
                                                                        <input name="thumbnail" type="file" id="picture" class="custom-file-input" accept="image/*" onchange="uploadToPicture(this, 720, 480, '#thumb', '#thumbnail2')">>
                                                                        <label for="picture" class="custom-file-label">อัพโหลดไฟล์</label>
                                                                        <small class="text-secondary">ขนาดที่แนะนำ: 720x480 px</small>
                                                                    </div>
                                                                </div>
                                                                <!-- <input name="thumbnail" id="thumbnail" style="visibility: collapse;" value="<?php if(!$isNew) echo $branch->thumbnail ?>"> -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="address" class="col-sm-3 col-form-label form-label">ที่อยู่</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <textarea name="address" id="address" type="text" class="form-control" placeholder="กรอกที่อยู่"><?php if(!$isNew) echo $branch->address ?></textarea>                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="location" class="col-sm-3 col-form-label form-label">พิกัดบนแผนที่</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="location" id="location" type="text" class="form-control" placeholder="กรอกพิกัดบน Google Map" value="<?php if(!$isNew) echo $branch->location ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nearbyPlace" class="col-sm-3 col-form-label form-label">สถานที่ใกล้เคียง</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="nearbyPlace" id="nearbyPlace" type="text" class="form-control" placeholder="กรอกสถานที่ใกล้เคียงที่เป็นจุดสังเกตุ" value="<?php if(!$isNew) echo $branch->nearbyPlace ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-8 offset-sm-3">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <button type="submit" class="btn btn-success">บันทึก</button>
                                                                    <a onclick="confirmCancel('<?php Nav::echoURL($dir, App::$pageAdminManageBranch) ?>')" class="btn btn-danger text-light ml-2">ยกเลิก</a>
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
                <?php Script::initScript($dir) ?>
                    
<?php
        }

    }