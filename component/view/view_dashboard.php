<?php
    class DashboardView{
        public static function initView($dir, $sess, $paths, $ownership, $schedules, $dashboard){
            $auth = $sess->getAuth();
            $course = $dashboard->course;
            $lessons = $dashboard->lessons;
            $teachers = $dashboard->teachers;
            $classes = $dashboard->classes;
            $scores = $dashboard->scores;
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

                                    <div class="row">
                                        <div class="col-12 col-sm-7">
                                            <h1 class="h2" id="pageTitle">แดชบอร์ด <?php echo $course->title; ?></h1>
                                        </div>
                                        <div class="col-12 col-sm-5 text-right pt-3">
                                            <!-- ขวา -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"><i class="fas fa-poll"></i> &nbsp;คะแนนและผลการประเมิณ</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="chart">
                                                        <canvas id="ordersChart" class="chart-canvas"></canvas>
                                                    </div>
                                                    <p></p>
                                                    <div class="row">
                                                        <?php self::initScoreItems($dir, $scores) ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Lessons -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"><i class="fas fa-graduation-cap"></i> &nbsp;บทเรียน</h4>
                                                </div>
                                                <div class="card-body p-0">
                                                    <ul class="list-group list-group-fit">
                                                        <?php self::initLessonItems($dir, $lessons) ?>
                                                    </ul>
                                                </div>
                                            </div>

                                            <!--<div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"><i class="fas fa-question-circle"></i> &nbsp;ถามตอบ</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAsk" aria-expanded="false" aria-controls="collapseAsk">
                                                                ถาม คำถามใหม่ 
                                                            </button>
                                                        </div>
                                                        <div class="media-body">
                                                            <form class="search-form d-none d-md-flex" action="" method="GET">
                                                                <input name="search" type="text" class="form-control" id="askSearch" placeholder="ค้นหาคำถาม" value>
                                                                <button type="submit" class="btn">
                                                                    <i class="material-icons font-size-24pt">search</i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="media-right">
                                                            
                                                        </div>
                                                    </div>
                                                    <p></p>
                                                    <div class="collapse" id="collapseAsk">
                                                        <div class="card card-body">
                                                            <form>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="askTitle" placeholder="คำถาม">
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea type="text" class="form-control" id="askDetails" placeholder="รายละเอียด" rows="3"></textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">ตั้งคำถาม</button>
                                                                <a class="btn btn-light" data-toggle="collapse" href="#collapseAsk" role="button" aria-expanded="false" aria-controls="collapseAsk">
                                                                    ยกเลิก
                                                                </a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="accordion" id="accordionQuestion">
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                    <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                        <h3 class="mb-0">Missing Prefabs</h3>
                                                                    </button>
                                                            </div>
                                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionQuestion">
                                                                <div class="card-body">
                                                                    <p class="text-black-70">
                                                                    Checked through the forum and didn't see anything about this one.
                                                                    This has happened twice now, on two new machines that have not had the project on it, 
                                                                    when pulling down from the cloud, all the prefabs are broken throughout the project and a few other goofy things.
                                                                    Seems to only happen on windows machines?
                                                                    </p>
                                                                    <div class="card-footer">
                                                                        <div class="media">
                                                                            <div class="media-left">
                                                                                <img src="./assets/images/icons/user.svg" alt="" width="48" class="rounded-circle">
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h4>&nbsp; KanyeWest</h4>
                                                                                <p class="text-black-70">
                                                                                Sorry to hear that you're running into these issues. 
                                                                                Before we try to figure out what went wrong I was hoping I could get some more details from you.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="headingTwo">
                                                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                    <h3 class="mb-0">How can I fix my loop steps</h3>
                                                                </button>
                                                            </div>
                                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionQuestion">
                                                                <div class="card-body">
                                                                    <p class="text-black-70">
                                                                    Hi, I'm new to Unity so I apologize if my question is posed poorly.
                                                                    I want to use a loop to execute the following until a condition is met:
                                                                    </p>
                                                                    <div class="card-footer">
                                                                        <form>
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <img src="./assets/images/icons/user.svg" alt="" width="48" class="rounded-circle">
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="form-group">
                                                                                        <textarea type="text" class="form-control" id="yourAnswer" placeholder="ตอบคำถาม" rows="3"></textarea>
                                                                                    </div>
                                                                                    <button type="submit" class="btn btn-primary">ตอบคำถาม</button>
                                                                                    <a class="btn btn-light" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">
                                                                                        ยกเลิก
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="text-muted">2 คำถามในคลาสนี้</p>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="card">
                                                <a href="<?php Nav::echoURL($dir, App::$pageBookClass . "?id=$ownership->ID") ?>" class="btn btn-primary btn-block ml-auto">จองรอบเรียน<i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"><i class="far fa-calendar-alt"></i> &nbsp;ตารางเรียนของฉัน</h4>
                                                </div>
                                                <div class="card-body p-2">
                                                    <table class="table mb-0">
                                                        <thead class="text-muted">
                                                            <tr>
                                                                <th>วัน</th>
                                                                <th>สาขา</th>
                                                                <th>เวลา</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="list">
                                                            <?php self::initBookingItems($dir, $schedules) ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"><i class="far fa-calendar-alt"></i> &nbsp;รอบเรียน</h4>
                                                </div>
                                                <div class="card-body p-2">
                                                    <table class="table mb-0">
                                                        <thead class="text-muted">
                                                            <tr>
                                                                <th>วัน</th>
                                                                <th>ที่นั่ง</th>
                                                                <th>เวลา</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="list">
                                                            <?php self::initClassItems($dir, $classes) ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"><i class="fas fa-hourglass-half"></i> &nbsp;ชม.ที่เหลือ <span class="badge badge-primary" style="font-size:20px;"><?php echo $dashboard->credit ?></span></h4>
                                                </div>
                                                <div class="card-footer bg-white">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <p class="text-muted">วันที่หมดอายุ: <?php echo $dashboard->expiration ?></p>
                                                        </div>
                                                        <div class="media-body">
                                                        </div>
                                                        <div class="media-right">
                                                            <!-- ขวา -->
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"><i class="fas fa-chalkboard-teacher"></i> &nbsp;ครูผู้สอน</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php self::initTeacherItems($dir, $teachers) ?>
                                                </div>
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

                <!-- Global Settings -->
                <script src="assets/js/settings.js"></script>

                <!-- Chart.js Library -->
                <script src="assets/vendor/Chart.min.js"></script>

                <!-- Chart.js Wrapper -->
                <script src="assets/js/chartjs-rounded-bar.js"></script>
                <script src="assets/js/chartjs.js"></script>

                <script id="obj-scores"><?php echo json_encode($scores) ?></script>
                <?php Script::customScript($dir, 'dashboard.js') ?>

<?php
        }

        public static function initScoreItems($dir, $scores){
            $i = 0;
            foreach ($scores as $key => $s) {
                $i++;
                ?>
                    <div class="col-sm-4">
                        <div class="card bg-primary">
                        <a href="<?php Nav::echoURL($dir, App::$pageViewScore . "?id=$s->ID") ?>" target="_blank" class="btn">
                                <h4 class="card-title text-white">รอบที่ <?php echo $i ?></h4>
                            </a>
                            <a href="<?php Nav::echoURL($dir, App::$pageViewScore . "?id=$s->ID") ?>" target="_blank" class="btn">
                                <h1 class="text-center text-white"><?php echo $s->score ?></h1>
                            </a>
                        </div>
                    </div>
                <?php
            }
        }

        public static function initLessonItems($dir, $lessons){
            foreach ($lessons as $key => $l) {
                ?>
                    <li class="list-group-item" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                        <div class="media">
                            <div class="media-left">
                                <div class="text-muted"><?php echo (int)$key+1?>.</div>
                            </div>
                            <div class="media-body">
                                <a href="#multiCollapseExample1"><?php echo $l->title ?></a>
                            </div>
                            <div class="media-right">
                                <small class="text-muted-light"><?php echo $l->duration ?> นาที</small>
                            </div>
                        </div>
                        <div class="collapse multi-collapse mt-2" id="multiCollapseExample1">
                          <div class="card card-body">
                            <?php echo $l->content ?>
                          </div>
                        </div>
                    </li>
                <?php
            }
        }

        public static function initBookingItems($dir, $bookings){
            foreach ($bookings as $key => $c) {
                ?>
                    <tr>
                        <td><?php if(isset($c->class->day))echo self::properDay($c->class->day); else echo '-' ?></td>
                        <td><?php if(isset($c->courseBranch->branch->title))echo $c->courseBranch->branch->title; else  echo '-' ?></td>
                        <td class="pr-0"><?php if(isset($c->class->startTime))echo self::properTime($c->class->startTime) . ' - ' . self::properTime($c->class->endTime); else echo '-'; ?></td>
                    </tr>
                <?php
            }
        }

        public static function initClassItems($dir, $classes){
            foreach ($classes as $key => $c) {
                ?>
                    <tr>
                        <td><?php if(isset($c->day))echo self::properDay($c->day) ?></td>
                        <td><?php if(isset($c->seats))echo $c->seats ?></td>
                        <td class="pr-0"><?php if(isset($c->startTime))echo self::properTime($c->startTime) . ' - ' . self::properTime($c->endTime) ?></td>
                    </tr>
                <?php
            }
        }

        private static function properTime($time){
            $x = explode(':', $time);
            return $x[0] . ':' . $x[1];
        }

        private static function properDay($day){
            switch($day){
                case 'mon':
                    return 'จันทร์';
                    break;
                case 'tue':
                    return 'อังคาร';
                    break;
                case 'wed':
                    return 'พุธ';
                    break;
                case 'thu':
                    return 'พฤหัส';
                    break;
                case 'fri':
                    return 'ศุกร์';
                    break;
                case 'sat':
                    return 'เสาร์';
                    break;
                case 'sun':
                    return 'อาทิตย์';
                    break;
                default:
                    return '-';
                    break;
            }
        }

        public static function initTeacherItems($dir, $teachers){
            foreach ($teachers as $key => $t) {
                ?>
                    <div class="media align-items-center mb-3">
                        <div class="media-left">
                            <img src="<?php Asset::echoIcon($dir, $t->teacher->profile_pic) ?> " alt="<?php echo $t->teacher->username ?>" width="48" class="rounded-circle">
                        </div>
                        <div class="media-body">
                            <h4 class="card-title"><a href="#"><?php echo $t->teacher->username ?></a></h4>
                        </div>
                    </div>
                <?php
            }
        }
    }
?>