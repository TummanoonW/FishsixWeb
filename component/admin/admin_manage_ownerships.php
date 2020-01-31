<?php
    class AdminManageOwnershipsView{
        public static function initView($dir, $sess, $paths, $pages, $filter, $ownerships, $courses, $count){
            $urls = array(
                'pageAdminManageOwnerships' => Nav::getURL($dir, App::$pageAdminManageOwnerships)
            );
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
                                            <h1 class="h2">จัดการความเป็นเจ้าของ</h1>
                                        </div> 
                                        <a href="<?php Nav::echoURL($dir, App::$pageAdminEditOwnership) ?>" class="btn btn-success">+ เพิ่มความเป็นเจ้าของ</a>
                                    </div>

                                    <?php if(count($ownerships) > 0){ ?>
                                        <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                                            <form action="#">
                                                <div class="form-inline pl-3 pb-3">
                                                    <div class="form-group mr-2">
                                                        <select id="published01" class="form-control custom-select" style="width: 180px" onchange="searchIsExpired(this)">
                                                            <option value="" <?php if($filter->isExpired == 'null') echo 'selected' ?>>ทุกสถานะ</option>
                                                            <option value="0" <?php if($filter->isExpired == '0') echo 'selected' ?>>ยังไม่หมดอายุ</option>
                                                            <option value="1" <?php if($filter->isExpired == '1') echo 'selected' ?>>หมดอายุ</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group mr-2">
                                                        <select id="courseID" name="courseID" class="form-control custom-select" style="width: 180px" onchange="searchCourseID(this)">
                                                            <option value="" <?php if($filter->isExpired == 'null') echo 'selected' ?>>ทุกคอร์ส</option>
                                                            <?php self::initCourses($dir, $courses, $filter->courseID) ?>
                                                        </select>
                                                    </div>

                                                    <div class="search-form search-form--light">
                                                        <input name="ownerID" id="ownerID" type="text" class="form-control" placeholder="ค้นหาจาก ownerID" id="searchSample02" value="<?php if($filter->ownerID != "null" )echo $filter->ownerID ?>">
                                                        <button onclick="searchOwnerID()" class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-column flex-sm-row align-items-sm-center" style="white-space: nowrap">
                                                    <small class="flex text-muted text-uppercase mr-3 mb-2 mb-sm-0">แสดงผลลัพธ์ <?php echo count($ownerships) ?> จาก <?php echo $count ?> รายการ</small>
                                                    <div class="w-auto ml-sm-auto table d-flex align-items-center mb-0">
                                                        <small class="text-muted text-uppercase mr-3 d-none d-sm-block">จัดเรียงโดย</small>
                                                        <?php 
                                                              if($filter->desc){ 
                                                        ?>
                                                                <a href="#" onclick="searchDesc(false)" class="sort small text-uppercase ml-2">ล่าสุด - เก่าสุด</a>
                                                        <?php }else{ 
                                                        ?>
                                                                <a href="#" onclick="searchDesc(true)" class="sort small text-uppercase ml-2">เก่าสุด - ล่าสุด</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="card table-responsive" data-toggle="lists" data-lists-values='["ID", "owner", "course", "credit", "isExpired", "expiration"]'>
                                            <table class="table mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="ID">รหัส</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="owner">ชื่อผู้ใช้</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="course">คอร์ส</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="credit">เครดิต</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="isExpired">สถานะ</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="expiration">วันหมดอายุ</a>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <? self::initItems($dir, $ownerships, $courses) ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php }else{ 
                                        Alert::initAlert($dir, "คุณไม่มีรายการให้แสดง");
                                    } ?>

                                    <!-- Pagination -->
                                    <?php Pagination::initPagination($dir, $pages) ?>
                                </div>
                            </div>
                            <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div> 

                <script id="filter"><?php echo json_encode($filter) ?></script>
                <script id="urls"><?php echo json_encode($urls) ?></script>
                <script id="ownerships"><?php echo json_encode($ownerships) ?></script>

                <?php Script::customScript($dir, 'common.js') ?>  
                <?php Script::customScript($dir, 'admin-manage-ownerships.js') ?>
                <?php Script::initScript($dir) ?> 
                

<?php
        }

        private static function initCourses($dir, $courses, $courseID){
            foreach ($courses as $key => $value) {
                ?>
                    <option value="<?php echo $value->ID ?>" <?php if($courseID == $value->ID) echo 'selected' ?>><?php echo $value->title ?></option>
                <?php
            }
        }

        private static function initItems($dir, $ownerships, $courses){
            foreach ($ownerships as $key => $item) {
                $id = $item->ID;
                if(isset($item->auth->username))$username = $item->auth->username;
                else $username = "";
                foreach ($courses as $key2 => $value) {
                    if($item->courseID == $value->ID) $item->course = $value;
                }
                ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminEditOwnership . "?id=$id") ?>" class="text-body small">#<span class="ID"><? echo $id ?></span></a>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminEditOwnership . "?id=$id") ?>" class="text-body small"><span class="owner"><? echo $username ?></span></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminEditOwnership . "?id=$id") ?>" class="text-body small"><span class="course"><? echo $item->course->title ?></span></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminEditOwnership . "?id=$id") ?>" class="text-body small"><span class="credit"><? echo $item->credit ?></span></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminEditOwnership . "?id=$id") ?>" class="text-body small"><span class="isExpired"><? echo self::echoExpired($item->isExpired) ?></span></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminEditOwnership . "?id=$id") ?>" class="text-body small"><span class="expiration"><? echo $item->expiration ?></span></a>
                            </div>
                        </td>
                        <td>
                            <div class="input-group-append">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">จัดการ</button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$routeAdminOwnership . "?m=days30&id=$id") ?>">ต่ออายุ 30 วัน</a>
                                <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$pageAdminEditOwnership . "?id=$id") ?>">แก้ไขเพิ่ม</a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" onclick="confirmDelete('<?php Nav::echoURL($dir, App::$routeAdminOwnership . '?m=delete&id='. $id) ?>')">ลบ</a>
                              </div>
                            </div>
                        </td>
                    </tr>
                <?php
            }
        }

        private static function echoExpired($exp){
            if($exp == "1") echo 'หมดอายุแล้ว';
            else 'ยังไม่หมดอายุ';
        }
    }