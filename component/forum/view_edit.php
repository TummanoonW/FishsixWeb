<?php
    class EditForumView{
        public static function initView($dir, $sess, $paths, $forum, $isNew, $label, $categories){
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
                                            <h1 class="h2"><?php echo $label ?>บทความ</h1>
                                        </div>
                                        <div class="media-right">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="container mt-3">
                                        <div class="card">
                                            <form class="card-body" action="<?php Nav::echoURL($dir, App::$routeForum . '?m=update' ) ?>" method="POST" enctype="multipart/form-data">
                                                <?php if(!$isNew){ ?>
                                                    <div class="form-group">
                                                        <label for="ID">ID</label>
                                                        <input value="<?php echo $forum->ID;?>" type="text" name="ID" class="form-control" id="ID" placeholder="ID" readonly>
                                                    </div>
                                                <?php } ?>
                                                <div class="form-group">
                                                    <label for="exampleInputTitle">หัวเรื่อง (ความยาวไม่เกิน 100 ตัวอักษร)</label>
                                                    <input value="<?php if(!$isNew) echo $forum->title;?>" type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="โปรดระบุหัวเรื่อง" maxlength="100" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputDescription">เนื้อหา (ความยาวไม่เกิน 1000 ตัวอักษร)</label>
                                                    <textarea value=" <?php if(!$isNew) echo $forum->content;?>" name="content" class="form-control" id="exampleInputDescription" placeholder="ใส่เนื้อหาของบทความ" rows="6" maxlength="1000"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputDescription">หมวดหมู่</label>
                                                    <select class="form-control" name="categoryID">
                                                        <option>เลือกหมวดหมู่</option>
                                                        <?php foreach($categories as $key => $cat){ ?>
                                                            <option value= "<?php echo $cat->ID; ?>" <?php if(!$isNew)if($forum->categoryID == $cat->ID) echo 'selected' ?>><?php echo $cat->title; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputDescription">
                                                        <img id="thumb" class="w-100 h-auto" src="<?php if(!$isNew) Asset::echoThumb($dir, $forum->thumbnail) ?>">
                                                    </label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail" accept="image/*" onchange="uploadToPicture(this, 720, 480, '#thumb', '#thumbnail')">
                                                        <label class="custom-file-label" for="thumbnail">อัพโหลดรูปภาพปก</label>
                                                    </div>
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
                <?php Script::customScript($dir, 'common.js') ?>
                <?php Script::initScript($dir) ?>
                
<?php
        }
    }