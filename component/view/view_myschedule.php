<?php
    class MySchedule{
        public static function initView($dir, $sess, $paths, $schedules){
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

                                <div  class="container-fluid page__container ">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths); ?>

                                    <div class="media mb-headings align-items-center">
                                        <div class="media-body">
                                            <h1 class="h2">ตารางเรียน</h1>
                                        </div>
                                    </div>

                                    <div>
                                        <!-- Calendar -->
                                        <div id="calendar"></div>
                                    </div>
                                    <div class="mt-4">
                                        <h1 class="h3">ภายในสัปดาห์นี้</h1>
                                        <div class="nestable" id="nestable-handles-primary">
                                        <table class="table mb-0">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>วัน</th>
                                                    <th>คอร์ส</th>
                                                    <th>สาขา</th>
                                                    <th>เริ่ม</th>
                                                    <th>จบ</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-white">
                                                <?php self::initItemsThisWeek($dir, $schedules) ?>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h1 class="h3">ที่กำลังมาถึง</h1>
                                        <div class="nestable" id="nestable-handles-primary">
                                        <table class="table mb-0">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>วันที่</th>
                                                    <th>คอร์ส</th>
                                                    <th>สาขา</th>
                                                    <th>เริ่ม</th>
                                                    <th>จบ</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-white">
                                                <?php self::initItemsUpcoming($dir, $schedules) ?>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir, $sess); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mdk-drawer js-mdk-drawer" data-align="end" id="sidebar-calendar">
                <div class="mdk-drawer__content ">
                    <div class="sidebar sidebar-right sidebar-light bg-white o-hidden" data-perfect-scrollbar>
                        <div>
                            <a href="#" class="calendar-sidebar-header" data-toggle="sidebar" data-target="#sidebar-calendar">Close <i class="material-icons">close</i></a>
                            <div class="sidebar-block">
                                <div class="content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Add Event Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">New Event</h4>
                        </div>
                        <div class="modal-body">
                            <form action="student-ui-calendar.html">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Start</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>End</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="details" class="form-control" rows="3"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-success btn-rounded">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php Script::initScript($dir); ?>

            <!-- Required by Calendar (fullcalendar) -->
            <script src="<?php Nav::echoURL($dir, 'assets/vendor/moment.min.js') ?>"></script>

            <!-- Fullcalendar -->
            <script src="<?php Nav::echoURL($dir, 'assets/vendor/fullcalendar.min.js') ?>"></script>

            <!-- Init -->
            <!--<script src="<?php Nav::echoURL($dir, 'assets/js/fullcalendar.js') ?>"></script>-->

            <!-- Custom Script -->
            <script id="obj-schedules"><?php echo json_encode($schedules) ?></script>
            <?php Script::customScript($dir, 'myschedule.js') ?>
<?php
        }

        private static function initItemsThisWeek($dir, $items){
            foreach ($items as $key => $item) {
                $now = CustomDate::getDateNow();
                $day = strtolower($now->format('D'));

                switch($day){
                    case 'sun':
                        $pre = 0;
                        $post = 6;
                        break;
                    case 'mon':
                        $pre = 1;
                        $post = 5;
                        break;
                    case 'tue':
                        $pre = 2;
                        $post = 4;
                        break;
                    case 'wed':
                        $pre = 3;
                        $post = 3;
                        break;
                    case 'thu':
                        $pre = 4;
                        $post = 2;
                        break;
                    case 'fri':
                        $pre = 5;
                        $post = 1;
                        break;
                    case 'sat':
                        $pre = 6;
                        $post = 0;
                        break;
                    default:
                        $pre = 0;
                        $post = 0;
                        break;
                }

                $date_pre = clone $now;
                $date_pre->modify('-'. $pre .' day');

                $date_post = clone $now;
                $date_post->modify('+'. $post .' day');

                $date = CustomDate::getDate($item->startDate);

                if($date >= $date_pre && $date <= $date_post){
                    $class = $item->class;
                    $course = $item->course;
                    $branch = $item->courseBranch->branch;
                    $sTime = explode(":", $class->startTime);
                    $eTime = explode(":", $class->endTime);
    
                    switch($item->class->day){
                        case 'mon':
                            $day = "จันทร์";
                            break;
                        case 'tue':
                            $day = "อังคาร";
                            break;
                        case 'wed':
                            $day = "พุธ";
                            break;
                        case 'thu':
                            $day = "พฤหัส";
                            break;
                        case 'fri':
                            $day = "ศุกร์";
                            break;
                        case 'sat':
                            $day = "เสาร์";
                            break;
                        case 'sun':
                            $day = "อาทิตย์";
                            break;
                        default:
                            $day = "-";
                            break;
                    }
                ?>
                    <tr> 
                        <td><span><?php echo $day ?></span> </td>
                        <td><?php echo $course->title ?></td>
                        <td><a href="<?php Nav::echoURL($dir, App::$pageViewBranch . "?id=$branch->ID") ?>"><?php echo $branch->title ?></a></td>
                        <td><span><?php echo $sTime[0] . ":" . $sTime[1] ?></span></td> 
                        <td><span><?php echo $eTime[0] . ":" . $eTime[1] ?></span></td> 
                    </tr>
                <?php
                }
            }
        }

        private static function initItemsUpComing($dir, $items){
            foreach ($items as $key => $item) {
                $now = CustomDate::getDateNow();
                $day = strtolower($now->format('D'));

                switch($day){
                    case 'sun':
                        $pre = 0;
                        $post = 6;
                        break;
                    case 'mon':
                        $pre = 1;
                        $post = 5;
                        break;
                    case 'tue':
                        $pre = 2;
                        $post = 4;
                        break;
                    case 'wed':
                        $pre = 3;
                        $post = 3;
                        break;
                    case 'thu':
                        $pre = 4;
                        $post = 2;
                        break;
                    case 'fri':
                        $pre = 5;
                        $post = 1;
                        break;
                    case 'sat':
                        $pre = 6;
                        $post = 0;
                        break;
                    default:
                        $pre = 0;
                        $post = 0;
                        break;
                }

                $date_pre = clone $now;
                $date_pre->modify('-'. $pre .' day');

                $date_post = clone $now;
                $date_post->modify('+'. $post .' day');

                $date = CustomDate::getDate($item->startDate);

                if($date > $date_post){
                    $class = $item->class;
                    $course = $item->course;
                    $branch = $item->courseBranch->branch;
                    $sTime = explode(":", $class->startTime);
                    $eTime = explode(":", $class->endTime);
                    $dDate = explode(" ", $item->startDate);
                ?>
                    <tr> 
                        <td><span><?php echo $dDate[0] ?></span> </td> 
                        <td><?php echo $course->title ?></td>
                        <td><a href="<?php Nav::echoURL($dir, App::$pageViewBranch . "?id=$branch->ID") ?>"><?php echo $branch->title ?></a></td>
                        <td><span><?php echo $sTime[0] . ":" . $sTime[1] ?></span></td> 
                        <td><span><?php echo $eTime[0] . ":" . $eTime[1] ?></span></td> 
                    </tr>
                <?php
                }
            }
        }
    }
?>