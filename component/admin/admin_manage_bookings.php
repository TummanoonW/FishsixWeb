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
                                        <div class="card table-responsive" data-toggle="lists" data-lists-values='["ID", "owner", "startDate", "branch", "course", "credit"]'>
                                            <table class="table mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="ID">รหัสการจอง</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="owner">ผู้เรียน</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="startDate">วันที่เรียน</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="branch">สาขา</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="course">คอร์ส</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="credit">จำนวนชม.</a>
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
                <?php Script::customScript($dir, 'common.js') ?>
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
                                <a href="#" class="text-body small">#<span class="ID"><? echo $id ?></span></a>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="#" class="text-body small"><span class="owner"><? echo $owner->user->fname . " " . $owner->user->lname ?></span></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <small class="text-uppercase"><span class="startDate"><?php echo $startDate ?></span></small>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <small class="text-uppercase"><span class="branch"><?php echo $branch->title ?></span></small>
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="d-flex align-items-center text-right">
                                <small class="text-uppercase course"><? echo $course->title ?></small>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center text-right">
                                <small class="text-uppercase credit"><? echo $item->creditUsed ?></small>
                            </div>
                        </td>
                        <td>
                           <a class="btn btn-primary btn-sm" href="<?php Nav::echoURL($dir, App::$pageAdminViewBooking . "?id=$item->ID") ?>">
                                <i class="far fa-eye"></i>
                           </a>
                        </td>
                    </tr>
                <?php
            }
        }
    }