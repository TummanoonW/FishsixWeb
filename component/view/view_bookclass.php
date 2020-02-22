<?php
    class BookingClass{
        public static function initView($dir, $sess, $paths, $ownership, $course, $classes, $branches, $schedules){
            $auth = $sess->getAuth();
?>
            <body class=" layout-fluid">
                <!-- Vendor CSS -->
                <link rel="stylesheet" href="<?php Nav::echoURL($dir, 'assets/css/fullcalendar.css') ?>">
                
                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>
                
                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir, '', $sess); ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths); ?>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6">  
                                            <div class="media mb-headings align-items-center">
                                                <div class="media-body">
                                                    <h1 class="h2">จองรอบเรียน <?php echo $course->title; ?></h1>
                                                </div>
                                            </div>
                                            <form action="<?php Nav::echoURL($dir, App::$routeBookClass . "?m=book"); ?>" method="POST">
                                                <table class="table table-nowrap mb-0 table--elevated">
                                                    <tbody>
                                                        <tr id="hidden-thing">
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="media-body">
                                                                        <strong>OWNERSHIPID</strong>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="d-flex align-items-center">
                                                                    <input id="ownershipID" name="ownershipID" value="<?php echo $ownership->ID ?>">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="media-body">
                                                                        <strong>สาขา</strong>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="d-flex align-items-center">
                                                                    <select id="branch-select" name="cBranchID" class="form-control" onchange="changeBranches(this)">
                                                                        <option value="" selected>เลือกสาขา</option>
                                                                        <?php self::initBranches($dir, $branches); ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="media-body">
                                                                        <strong>วันที่จอง</strong>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="d-flex align-items-center">
                                                                    <input id="cDate" name="cDate" type="date" class="form-control" onchange="reRender(this)">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="media-body">
                                                                        <strong>รอบเรียน</strong>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center" id='cClass'>
                                                                <div class="d-flex align-items-center">
                                                                    <select id="cClassID" name="cClassID" class="form-control">
                                                                        <option value="" selected>เลือกรอบเรียน</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr style="visibility: collapse;">
                                                            <td></td>
                                                            <td class="text-center">
                                                                <div class="d-flex align-items-center">
                                                                    <input type="text" name="ownershipID" value="<?php echo $ownership->ID ?>" readonly>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div style="margin-top:20px; margin-bottom:15px; text-align:center">
                                                    <button type="submit" onclick="return confirm('คุณต้องการจองรอบเรียนนี้ใช่ไหม?');" class="btn btn-success btn-block ml-auto">จองรอบเรียน</button>
                                                </div>
                                            </form>
                                            <div class="card mb-4 box-shadow">
                                                <div class="card-body">
                                                <h4>ตารางเวลา</h4>
                                                <table class="table mb-0">
                                                    <thead class="bg-light text-center">
                                                        <tr>
                                                            <th>วันที่</th>
                                                            <th>เริ่ม</th>
                                                            <th>จบ</th>
                                                            <th>ที่นั่ง</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list bg-white text-center" id="Table">

                                                    </tbody>
                                                </table>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-md-6">
                                            <!-- Calendar -->
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                    <div class="py-3">
                                        <a id="thumbnailURL" href="./assets/images/thumbs/def.png" target="_blank">
                                            <img id="thumbnail" src="./assets/images/thumbs/def.png" style="height: 256px; width: 100%; object-fit: cover;">
                                        </a>
                                        <!-- Title -->
                                        <h1 class="h2">สาขา: <span id="title"></span></h1>
                                        <h4 class="mt-4">คำอธิบาย:</h4>
                                        <p class="mt-2 text-dark"><span id="description"></span><p>
                                    </div>
                                    <div class="media-left">
                                        <span class="col-12 col-md-6 text-muted">
                                            <i class="fas fa-place-of-worship mr-2"></i>
                                            จุดสังเกตุ: <span id="nearbyPlace"></span>
                                        </span>
                                        <span class="col-12 col-md-6 text-muted">
                                            <i class="fas fa-map-marker-alt mr-2"></i>
                                            <span id="address"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir, $sess); ?>
                        </div>
                    </div>
                </div>
            <?php Script::initScript($dir); ?>
                
            </div>

            <!-- Required by Calendar (fullcalendar) -->
            <script src="<?php Nav::echoURL($dir, 'assets/vendor/moment.min.js') ?>"></script>

            <!-- Fullcalendar -->
            <script src="<?php Nav::echoURL($dir, 'assets/vendor/fullcalendar.min.js') ?>"></script>

            <!-- Init -->
            <!--<script src="<?php Nav::echoURL($dir, 'assets/js/fullcalendar.js') ?>"></script>-->

            <!-- Custom Script -->
            <script id="obj-classes"><?php echo json_encode($classes) ?></script>
            <script id="obj-branches"><?php echo json_encode($branches) ?></script>
            <script id="obj-schedules"><?php echo json_encode($schedules) ?></script>
            <?php Script::customScript($dir, 'bookclass.js') ?>

<?php
        }

        private static function initBranches($dir, $branches){
            foreach ($branches as $key => $b) {
                ?>
                    <option value="<?php echo $b->ID ?>">สาขา <?php echo $b->branch->title ?></option>
                <?php
            }
        }

        private static function initClasses($dir, $classes){
            foreach ($classes as $key => $c) {
                ?>
                    <option value="<?php echo $c->ID ?>">
                    <?php 
                    if ($c->day == "mon")
                        echo 'จ.';
                    else if ($c->day == "tue")
                        echo 'อ.';
                    else if ($c->day == "wed")
                        echo 'พ.';
                    else if ($c->day == "thu")
                        echo 'พฤ.';
                    else if ($c->day == "fri")
                        echo 'ศ.';
                    else if ($c->day == "sat")
                        echo 'ส.';
                    else if ($c->day == "sun")
                        echo 'อา.';
                    ?>
                    <?php echo date("H:i", strtotime($c->startTime))?> - <?php echo date("H:i", strtotime($c->endTime))?></option>
                <?php
            }
        }
    }
?>