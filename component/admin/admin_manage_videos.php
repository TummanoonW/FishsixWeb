<?php
    class AdminManageVideosView{
        public static function initView($dir, $sess, $paths, $pages, $videos, $categories, $count, $search){
            $urls = (object)array(
                'pageAdminManageVideos' => Nav::getURL($dir, App::$pageAdminManageVideos)
            );
?>
            <body class=" layout-fluid">
                <style>
                    .avatar-xlg{
                        width: 5.33rem;
                        height: 5.33rem;
                    }

                    .min-width{
                        min-width: 10rem;
                    }
                </style>
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

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                    <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                                        <div class="flex mb-2 mb-sm-0">
                                            <h1 class="h2">จัดการคลังวิดีโอ</h1>
                                        </div> 
                                        <a href="<?php Nav::echoURL($dir, App::$pageAdminEditVideo) ?>" class="btn btn-success">+ เพิ่มวิดีโอ</a>
                                    </div>

                                    <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                                        <form action="#">
                                            <div class="d-flex flex-wrap2 align-items-center mb-headings">
                                                <select name="category" id="custom-select" class="form-control custom-select" style="width: 120px" onchange="searchCategory(this)">
                                                    <option value="">ทุกหมวดหมู่</option>
                                                    <?php
                                                        foreach ($categories as $key => $value) {
                                                            ?>
                                                                <option value="<?php $value->ID ?>" <?php if($search->category == $value->ID) echo 'selected' ?>><?php echo $value->title ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                                <div class="flex search-form ml-3 search-form--light">
                                                    <input name="query" id="query" type="text" class="form-control" placeholder="ค้นหา" id="searchSample02" value="<?php echo $search->query ?>">
                                                    <button onclick="searchQuery()" class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-column flex-sm-row align-items-sm-center" style="white-space: nowrap">
                                                <small class="flex text-muted text-uppercase mr-3 mb-2 mb-sm-0">แสดงผลลัพธ์ <?php echo count($videos) ?> จาก <?php echo $count ?> รายการ</small>
                                                <div class="w-auto ml-sm-auto table d-flex align-items-center mb-0">
                                                    <small class="text-muted text-uppercase mr-3 d-none d-sm-block">จัดลำดับโดย</small>
                                                    <?php 
                                                          if($search->desc){ 
                                                    ?>
                                                            <a href="#" onclick="searchDesc(false)" class="sort small text-uppercase ml-2">Z - A</a>
                                                    <?php }else{ 
                                                    ?>
                                                            <a href="#" onclick="searchDesc(true)" class="sort small text-uppercase ml-2">A - Z</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Alert -->
                                    <?php if(count($videos) == 0)Alert::initAlert($dir, "ขออภัย! คุณไม่มีรายการวิดีโอให้แสดง") ?>
                                    <!-- User Card -->
                                    <div class="row">
                                        <?php self::initCards($dir, $videos, $categories) ?>
                                    </div>
                                    <!-- Pagination -->
                                    <?php Pagination::initPagination($dir, $pages) ?>
                                    
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>   
                <?php Script::customScript($dir, 'common.js') ?>
                <?php Script::initScript($dir) ?> 

                <script id="urls"><?php echo json_encode($urls) ?></script>
                <script id="q"><?php echo json_encode($search) ?></script>
                <?php Script::customScript($dir, 'admin-manage-videos.js') ?>

<?php
        }

        private static function initCards($dir, $videos, $categories){
            foreach ($videos as $key => $value) {
                $id = $value->ID;
?>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-sm-row">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminEditVideo . "?id=$id") ?>" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                    <img src="https://i1.ytimg.com/vi/<?php echo $value->youtube_id ?>/mqdefault.jpg" alt="<?php $value->title ?>" class="avatar-img rounded">
                                </a>
                                <div class="flex" style="min-width: 200px;">
                                    <!-- <h5 class="card-title text-base m-0"><a href="<?php Nav::echoURL($dir, App::$pageAdminEditVideo . "?id=$id") ?>"><strong>Learn Vue.js</strong></a></h5> -->
                                    <h4 class="card-title mb-1"><a href="<?php Nav::echoURL($dir, App::$pageAdminEditVideo . "?id=$id") ?>"><?php echo $value->title ?></a></h4>
                                    <p class="text-black-70"><?php echo $value->content ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-end">
                            <div class="d-flex flex flex-column mr-3">
                                <div class="d-flex align-items-center py-1">
                                    <small class="text-secondary mr-2">
                                        <strong>
                                        <?php 
                                            $category = "None";
                                            foreach ($categories as $key => $value2) {
                                                if($value->categoryID == $value2->ID){
                                                    $category = $value2->title;
                                                }
                                            }
                                            echo $category;
                                        ?>
                                        </strong>
                                    </small>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminEditVideo . "?id=$id") ?>" class="btn btn-primary btn-sm float-right"><i class="material-icons btn__icon--left">edit</i>แก้ไข</a>
                                <button onclick="return confirmDelete('<?php echo App::$routeAdminVideoLib . '?m=delete&id=' . $id ?>');" class="btn btn-default btn-sm float-right" style="margin-right:8px;" ><i class="material-icons btn__icon--left">delete_forever</i>ลบ</button>
                            </div>
                        </div>
                    </div>
                </div>
<?php
            }
        }
    }

            