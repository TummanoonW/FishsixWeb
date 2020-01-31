<?php
    class AdminManageBranchView{
        public static function initView($dir, $sess, $paths, $pages, $branches, $count){
            $auth = $sess->getAuth();
?>
            <body class=" layout-fluid">
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
                                            <h1 class="h2">จัดการสาขา</h1>
                                        </div> <!-- ต้องแก้ --->
                                        <a href="<?php Nav::echoURL($dir, App::$pageAdminAddBranch) ?>" class="btn btn-success">+ เพิ่มสาขา</a>
                                    </div>

                                    <div class="row">
                                      <!--- Card Branch --->
                                      <?php self::initCards($dir, $branches) ?>
                                    </div>
                                    <!-- Pagination -->
                                    <?php Pagination::initPagination($dir, $pages) ?>
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

        private static function initCards($dir, $branches){
          foreach ($branches as $key => $branch) {
            $id = $branch->ID;
?>
            <div class="col-12 card">
              <div class="card-header row align-items-center" >
                <div class="col-md-3 col-12">
                  <a href="<?php Nav::echoURL($dir, App::$pageAdminAddBranch . "?id=$id") ?>" >
                    <img src="<?php Asset::echoThumb($dir, $branch->thumbnail) ?>" alt="สาขา<?php echo $branch->title ?>" class="rounded w-100">
                  </a>
                </div>
                <div class="col-md-9 col-12 card-body">
                  <h2 class="card-title mb-1">สาขา <?php echo $branch->title ?></h2>
                  <div class="text-secondary mt-2">
                    <label>ID: <?php echo $id ?></label><br>
                    <label>ที่อยู่: <?php echo $branch->address ?></label><br>
                    <label>สถานที่ใกล้เคียง: <?php echo $branch->nearbyPlace ?></label>
                  </div>
                  <div class="text-center">
                      <a href="<?php Nav::echoURL($dir, App::$pageAdminAddBranch . "?id=$id") ?>" class="btn btn-primary btn-sm float-right"><i class="material-icons btn__icon--left">edit</i>แก้ไข</a>
                      <button onclick="return confirmDelete('<?php Nav::echoURL($dir, App::$routeAdminBranch . '?m=delete&id=' . $id) ?>');" class="btn btn-default btn-sm float-right" style="margin-right:8px;" ><i class="material-icons btn__icon--left">delete_forever</i>ลบ</button>
                  </div>
                </div>
              </div>
            </div>
<?php
          }
        }
    }
?>
            