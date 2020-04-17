<?php
    class AdminVideoEditorView{

        public static function initView($dir, $sess, $paths, $isNew, $label, $video, $categories){
            if($isNew) $method = 'add';
            else $method = 'edit';
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

                                    <h1 class="h2">โปรแกรม<?php echo $label ?>วิดีโอ</h1>

                                    <div class="card">
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form action="<?php Nav::echoURL($dir, App::$routeAdminVideoLib . "?m=$method") ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                    <?php if(!$isNew){ ?>
                                                        <div class="form-group row">
                                                            <label for="id" class="col-sm-3 col-form-label form-label">ID</label>
                                                            <div class="col-sm-8">
                                                                <input name="ID" type="text" id="id" class="form-control" placeholder="" value="<?php if(!$isNew) echo $video->ID; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <div class="form-group row">
                                                            <label for="title" class="col-sm-3 col-form-label form-label">หัวเรื่องวิดีโอ</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                <input name="title" type="text" id="title" class="form-control" placeholder="กรอกหัวเรื่องวิดีโอ" value="<?php if(!$isNew) echo $video->title ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="content" class="col-sm-3 col-form-label form-label">คำอธิบาย</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <textarea name="content" id="content" rows="4" type="text" class="form-control" placeholder="กรอกคำอธิบาย"><?php if(!$isNew) echo $video->content ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="picture" class="col-sm-3 col-form-label form-label">ID วิดีโอ Youtube</label>
                                                        <div class="col-sm-9">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <div class="rounded bg-transparent">
                                                                        <a href="https://www.youtube.com/watch?v=<?php if(!$isNew) echo $video->youtube_id ?>" id="thumb_link" target="_blank"><img id="thumb" class="w-100 h-auto" src="<?php if(!$isNew) echo "https://i1.ytimg.com/vi/$video->youtube_id/mqdefault.jpg" ?>"></a>
                                                                    </div>
                                                                </div>
                                                                <div class="media-right">
                                                                    <input name="youtube_id" type="text" id="youtube_id" class="form-control" placeholder="ตัวอย่างเช่น x3XFE0nuczc" value="<?php if(!$isNew) echo $video->youtube_id ?>" onchange="updateYoutube(this)" required>
                                                                    <small class="text-secondary">กด Enter เพื่อดูผลลัพธ์การเปลี่ยนแปลง</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label form-label" for="categoryID">หมวดหมู่</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <select name="categoryID" id="categoryID" class="form-control custom-select">
                                                                        <option value="">เลือกหมวดหมู่</option>
                                                                        <?php foreach ($categories as $key => $value) { ?>
                                                                            <option value="<?php echo $value->ID ?>" <?php if(!$isNew)if($video->categoryID == $value->ID) echo 'selected' ?>><?php echo $value->title ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                            <label for="isHeader" class="col-sm-3 col-form-label form-label">วิดีโอที่แนะนำ</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                <input name="isHeader" type="checkbox" id="isHeader" class="form-control" placeholder="กรอกหัวเรื่องวิดีโอ" <?php if(!$isNew){if($video->header == 1) echo 'checked="true"'; } ?>" value="วิดีโอที่แนะนำ">
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