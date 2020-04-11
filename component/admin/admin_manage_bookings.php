<?php
    class AdminManageBookingsView{
        public static function initView($dir, $sess, $paths, $pages, $bookings, $count, $query){
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
                                            <h1 class="h2">จัดการการจอง</h1>
                                        </div> 
                                        <!--<a href="<?php Nav::echoURL($dir, App::$pageAdminAddUser) ?>" class="btn btn-success">+ เพิ่มผู้ใช้</a>-->
                                    </div>

                                    <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                                            <form action="" method="GET">
                                                <div class="form-inline pl-3 pb-3">
                                                    <div class="search-form search-form--light">
                                                        <input name="query" id="query" type="text" class="form-control" placeholder="ค้นหาด้วยชื่อ" id="searchSample02" value="<?php echo $query ?>">
                                                        <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                    </div>
                                                </div>
                                            </form>
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
                                                    <? self::initItems($dir, $bookings, $auth) ?>
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
                            <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>   
                <?php Script::customScript($dir, 'common.js') ?>
                <?php Script::initScript($dir) ?> 


<?php
        }

        private static function initItems($dir, $bookings, $auth){
            foreach ($bookings as $key => $item) {
                $id = $item->ID;
                $owner = $item->owner;
                if(isset($item->courseBranch->branch))$branch = $item->courseBranch->branch;
                else $branch = (object)array('title' => "");
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
                                <a href="#" class="text-body small"><span class="owner"><? if(isset($owner->user->fname)) echo $owner->user->fname . " " . $owner->user->lname ?></span></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <small class="text-uppercase"><span class="startDate"><?php echo $startDate ?></span></small>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <small class="text-uppercase"><span class="branch"><?php if(isset($branch->title)) echo $branch->title ?></span></small>
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="d-flex align-items-center text-right">
                                <small class="text-uppercase course"><? if(isset($course->title)) echo $course->title ?></small>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center text-right">
                                <small class="text-uppercase credit"><? if(isset($item->creditUsed)) echo $item->creditUsed ?></small>
                            </div>
                        </td>
                        <td>
                        <div class="input-group-append">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">จัดการ</button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$pageAdminViewBooking . "?id=$id") ?>">ดูรายละเอียด</a>
                                <div role="separator" class="dropdown-divider"></div>
                                <?php if($auth->isRoot){ ?>
                                    <a class="dropdown-item text-danger" href="<?php Nav::echoURL($dir, App::$routeAdminBooking . "?m=delete&id=$id") ?>">ลบและคืนเครดิต</a>
                                <?php } ?>
                              </div>
                            </div>
                        </td>
                    </tr>
                <?php
            }
        }
    }