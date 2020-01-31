<?php
    class TeacherScoringView{
        public static function initView($dir, $sess, $paths, $isNew, $student, $booking, $course, $scoring, $class, $courseBranch, $tid){
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

                                    <form class="form-horizontal" action="<?php Nav::echoURL($dir, App::$routeTeacherScoring . "?m=score&tid=$tid") ?>" method="POST">
                                        <?php if(!$isNew){ ?>
                                            <div class="form-group row">
                                                <label for="id" class="col-sm-3 col-form-label form-label">รหัสเอกสาร</label>
                                                <div class="col-sm-8">
                                                    <input name="ID" type="text" id="id" class="form-control" placeholder="" value="<?php if(!$isNew) echo $scoring->ID; ?>" readonly>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="form-group row">
                                            <label for="score" class="col-sm-3 col-form-label form-label">คะแนน (เต็ม 100)</label>
                                            <div class="col-sm-8">
                                                <input name="score" type="number" min="0" max="100" id="score" class="form-control" placeholder="0-100" value="<?php if(!$isNew) echo $scoring->score; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="comment" class="col-sm-3 col-form-label form-label">คำประเมิน (<span id="max-comment">0</span>/1000 ตัวอักษร)</label>
                                            <div class="col-sm-8">
                                                <textarea rows="10" name="comment" id="comment" class="form-control" placeholder="กรอกคำประเมินในนี้ อธิบายเหตุผลหรืองานที่ผู้เรียนทำ" maxlength="1000" onchange="updateComment(this)"><?php if(!$isNew) echo $scoring->comment; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="suggestion" class="col-sm-3 col-form-label form-label">ข้อเสนอแนะ (<span id="max-suggestion">0</span>/500 ตัวอักษร)</label>
                                            <div class="col-sm-8">
                                                <textarea rows="5" name="suggestion" id="suggestion" class="form-control" placeholder="กรอกข้อเสนอแนะให้ผู้เรียนได้ปรับปรุงตน" maxlength="500" onchange="updateSuggestion(this)"><?php if(!$isNew) echo $scoring->suggestion; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-8 offset-sm-3">
                                                <div class="media align-items-center">
                                                    <div class="media-left"></div>
                                                    <div class="media-body"></div>
                                                    <div class="media-right">
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="material-icons mr-1">save</i>
                                                            บันทึก
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input name="bookingID" value="<?php echo $booking->ID; ?>" style="visibility: collapse;">
                                        <input name="ownerID" value="<?php echo $booking->ownerID; ?>" style="visibility: collapse;">
                                        <input name="classID" value="<?php echo $booking->classID; ?>" style="visibility: collapse;">
                                        <input name="courseBranchID" value="<?php echo $booking->courseBranchID; ?>" style="visibility: collapse;">
                                        <input name="courseID" value="<?php echo $booking->courseID; ?>" style="visibility: collapse;">
                                    </form>                                   
                                </div>
                            </div>
                            <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>

                <?php Script::customScript($dir, 'teacher_scoring.js'); ?>
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