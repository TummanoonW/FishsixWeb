<?php
    class AdminManageBookingsView{
        public static function initView($dir, $paths, $pages, $bookings, $count){
            ?>
                <body class=" layout-fluid">
                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">
                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir, '') ?>
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
                                            <h1 class="h2">จัดการการจอง</h1>
                                        </div> 
                                        <!--<a href="<?php Nav::echoURL($dir, App::$pageAdminAddUser) ?>" class="btn btn-success">+ เพิ่มผู้ใช้</a>-->
                                    </div>

                                    <?php if(count($bookings) > 0){ ?>
                                        <div class="card table-responsive" data-toggle="lists" data-lists-values='[
                                            "js-lists-values-document"
                                            "js-lists-values-owner", 
                                            "js-lists-values-startdate",
                                            "js-lists-values-branch",
                                            "js-lists-values-course",
                                            "js-lists-values-credit"
                                            ]' data-lists-sort-by="js-lists-values-startdate" data-lists-sort-desc="true">
                                            <table class="table mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-document">รหัสการจอง</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-owner">ผู้เรียน</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-startdate">วันที่เรียน</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-branch">สาขา</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-course">คอร์ส</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-credit">จำนวนชม.</a>
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <? self::initItems($dir, $bookings) ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php }else{ 
                                        Alert::initAlert($dir, "คุณไม่มีรายการคำสั่งซื้อให้แสดง");
                                    } ?>

                                    <!-- Pagination -->
                                    <?php Pagination::initPagination($dir, $pages) ?>
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir) ?>
                        </div>
                    </div>
                </div>   
                <?php Script::initScript($dir) ?> 


<?php
        }

        private static function initItems($dir, $bookings){
            foreach ($bookings as $key => $item) {
                $id = $item->ID;
                $owner = $item->owner;
                $branch = $item->courseBranch->branch;
                $course = $item->course;
                $startDate = explode(" ", $item->startDate)[0];
                ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="#" class="text-body small">#<span class="js-lists-values-document"><? echo $id ?></span></a>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="#" class="text-body small"><span class="js-lists-values-owner"><? echo $owner->user->fname . " " . $owner->user->lname ?></span></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <small class="text-uppercase"><span class="js-lists-values-startdate"><?php echo $startDate ?></span></small>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <small class="text-uppercase"><span class="js-lists-values-branch"><?php echo $branch->title ?></span></small>
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="d-flex align-items-center text-right">
                                <small class="text-uppercase js-lists-values-course"><? echo $course->title ?></small>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center text-right">
                                <small class="text-uppercase js-lists-values-credit"><? echo $item->creditUsed ?></small>
                            </div>
                        </td>
                        <td>
                           <a class="btn btn-primary btn-sm" href="<?php Nav::echoURL($dir, App::$pageViewBooking . "?id=$item->ID") ?>">
                                <i class="far fa-eye"></i>
                           </a>
                        </td>
                    </tr>
                <?
            }
        }
    }