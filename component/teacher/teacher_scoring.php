<?php
    class TeacherScoringView{
        public static function initView($dir, $paths, $student, $booking, $course, $score, $class, $courseBranch, $tid){
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

                                    <div class="media mb-headings align-items-center">
                                        <div class="media-body">
                                            <h1 class="h2">ประเมิน - <?php echo $student->username ?></h1>
                                        </div>
                                        <div class="media-right">
                                            
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="d-flex">
                                                <a href=""<?php Asset::echoIcon($dir, $student->profile_pic) ?>" class="avatar avatar-lg avatar-4by3 mr-3" style="width:84px;height:84px;">
                                                    <img src="<?php Asset::echoIcon($dir, $student->profile_pic) ?>" alt="<?php echo $student->username ?>" class="avatar-img rounded-circle">
                                                </a>
                                                <div class="flex">
                                                    <h6 class="mb-1"><i class="material-icons">person</i> <?php echo $student->user->fname . " " . $student->user->lname ?></h6>
                                                    <h6 class="mb-1"><i class="material-icons">email</i> <?php echo $student->email ?></h6>
                                                    <h6 class="mb-1"><i class="material-icons">phone</i> <?php echo $student->user->phone ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <h6 class="mb-1"><i class="material-icons">schedule</i> เรียนเมื่อวันที่: <?php self::echoDate($booking->startDate) ?></h6>
                                            <h6 class="mb-1"><i class="material-icons">school</i> รอบเรียน: <?php self::echoClass($class) ?></h6>
                                            <h6 class="mb-1"><i class="material-icons">account_balance</i> สาขา: <?php echo $courseBranch->branch->title ?></h6>
                                        </div>
                                    </div>

                                    <form class="row" action="<?php Nav::echoURL($dir, App::$routeTeacherScoring . "?m=score&tid=$tid") ?>" method="POST">
                                        
                                    </form>                                   
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
<?php
        }

        private static function echoClass($class){
            $day = $class->day;
            $start = $class->startTime;
            $end = $class->endTime;

            $x = explode(':', $start);
            $y = explode(':', $end);

            $start = $x[0] . ":" . $x[1];
            $end = $y[0] . ":" . $y[1];

            switch($day){
                case 'sun':
                    $day = "อา.";
                    break;
                case 'mon':
                    $day = "จ.";
                    break;
                case 'tue':
                    $day = "อ.";
                    break;
                case 'wed':
                    $day = "พ.";
                    break;
                case 'thu':
                    $day = "พฤ.";
                    break;
                case 'fri':
                    $day = "ศ.";
                    break;
                case 'sat':
                    $day = "ส.";
                    break;
                default:
                    break;
            }

            echo "$day $start-$end";
        }

        private static function echoDate($date){
            $x = explode(" ", $date);
            $y = explode("-", $x[0]);

            $month = $y[1];
            switch($month){
                case '01':
                    $month = "มกราคม";
                    break;
                case '02':
                    $month = "กุมภาพันธ์";
                    break;
                case '03':
                    $month = "มีนาคม";
                    break;
                case '04':
                    $month = "เมษายน";
                    break;
                case '05':
                    $month = "พฤษภาคม";
                    break;
                case '06':
                    $month = "มิถุนายน";
                    break;
                case '07':
                    $month = "กรกฎาคม";
                    break;
                case '08':
                    $month = "สิงหาคม";
                    break;
                case '09':
                    $month = "กันยายน";
                    break;
                case '10':
                    $month = "ตุลาคม";
                    break;
                case '11':
                    $month = "พฤศจิกายน";
                    break;
                case '12':
                    $month = "ธันวาคม";
                    break;
                default:
                    break;
            }

            echo "$y[2] $month $y[0]";
        }
    }