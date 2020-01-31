<?php
    class WriteForumView{
        public static function initView($dir, $sess, $paths, $api, $catagory){
            $auth = $sess->getAuth();
           
?>  
          <body class="layout-fluid">
                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir, '', $sess) ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content" style="padding-top: 64px">

                    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                        <div class="mdk-drawer-layout__content page ">
                            <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>
                                    
                                    <div class="media mb-headings align-items-center">
                                        <div class="media-body">
                                            <h1 class="h2">เขียนบทความ</h1>
                                        </div>
                                        <div class="media-right">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="container mt-5">
                                        <div class="card">
                                            <form class="card-body" action="<?php Nav::echoURL($dir, App::$routeForum . '?m=submit') ?>" method="POST">
                             
                                                <div class="form-group">
                                                    <label for="exampleInputTitle">หัวเรื่อง (ความยาวไม่เกิน 100 ตัวอักษร)</label>
                                                    <input value="" type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="โปรดระบุหัวเรื่อง" maxlength="100" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputDescription">เนื้อหา (ความยาวไม่เกิน 1000 ตัวอักษร)</label>
                                                    <textarea name="content" class="form-control" id="exampleInputDescription" placeholder="ใส่เนื้อหาของบทความ" rows="6" maxlength="1000"></textarea>
                                                </div>
                                                <select class="form-control" name="categoryID">
                                                    <option>เลือกหมวดหมู่</option>
                                                    <?php foreach($catagory as $key => $cat){?>
                                                    
                                                        <option value= "<?php echo $cat->ID; ?>"><?php echo $cat->title; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="pt-3">

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputTitle">แท็ก (ความยาวไม่เกิน 200 ตัวอักษร)</label>
                                                    <input value="" type="text" name="tags" class="form-control" id="exampleInputTitle" placeholder="ใส่แท็กให้กับบทความ" maxlength="200" >
                                                </div>
                                                <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="thumbnail" accept="image/*" onchange="uploadToPicture(this, 960, 960, '#mapPic', '#thumbnail')">
                                                        <label class="custom-file-label" for="customFile">อัพโหลดไฟล์รูปภาพปก</label>
                                                        <small class="text-secondary">ขนาดที่แนะนำ: 960x960 px</small>
                                                </div>
                                                <div class="pt-3">

                                                </div>
                                                <button type="submit" class="btn btn-success">โพสต์บทความ</button>
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
                
<?php
        }
    }