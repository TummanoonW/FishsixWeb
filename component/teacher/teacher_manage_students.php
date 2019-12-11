<?php
    class TeacherManageStudentView{
        public static function initView($dir, $paths, $id, $courseTeacher, $course, $branches, $classes, $students, $search){
            $auth = SESSION::getAuth();
            $urls = array(
                'pageTeacherManageStudent' => Nav::getURL($dir, App::$pageTeacherManageStudent . "?id=" . $id)
            );
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
                                            <h1 class="h2">ประเมินนักเรียน - <?php echo $course->title ?></h1>
                                        </div>
                                        <div class="media-right">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                                        <form action="#">
                                            <div class="d-flex flex-wrap2 align-items-center mb-headings row">
                                                <div class="col-md-6 mb-2">
                                                    <select name="branch" id="custom-select" class="form-control custom-select w-auto" onchange="searchBranch(this)">
                                                        <option value="">ทุกสาขา</option>
                                                        <?php foreach ($branches as $key => $b) { ?>
                                                            <option value="<?php echo $b->ID ?>" <?php if($search->courseBranchID == $b->ID) echo 'selected'; ?>><?php echo $b->branch->title ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <select name="class" id="custom-select" class="form-control custom-select ml-2 w-auto" onchange="searchClass(this)">
                                                        <option value="">ทุกรอบเรียน</option>
                                                        <?php foreach ($classes as $key => $c) { ?>
                                                            <option value="<?php echo $c->ID ?>" <?php if($search->classID == $c->ID) echo 'selected'; ?>><?php self::echoTimeRange($c) ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="search-form search-form--light">
                                                        <input name="date" id="date" type="date" class="form-control" placeholder="YYYY-MM-DD" id="searchSample02" value="<?php echo $search->startDate ?>">
                                                        <button onclick="searchDate()" class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-column flex-sm-row align-items-sm-center" style="white-space: nowrap">
                                                <small class="flex text-muted text-uppercase mr-3 mb-0 mb-sm-0">แสดงผลลัพธ์ <?php echo count($students) ?> รายการ</small>
                                            </div>
                                        </form>
                                    </div>

                                    <?php if(count($students) > 0){ ?>
                                        <div class="card table-responsive" data-toggle="lists" data-lists-values='["score", "username", "branch", "class", "date"]'>
                                            <table class="table mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="score">คะแนน</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="username">ชื่อ</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="branch">สาขา</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="class">รอบเรียน</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="date">วันที่เรียน</a>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <? self::initItems($dir, $id, $students, $classes, $branches) ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php }else{ 
                                        Alert::initAlert($dir, "คุณไม่มีรายการนักเรียนให้แสดง");
                                    } ?>
                                </div>

                            </div>
                            <?php Sidemenu::initSideMenu($dir) ?>
                        </div>
                    </div>
                </div> 
                <?php Script::initScript($dir) ?>

                <script id="urls"><?php echo json_encode($urls) ?></script>
                <script id="q"><?php echo json_encode($search) ?></script>
                
                <?php Script::customScript($dir, 'teacher-manage-students.js'); ?>
<?php
        }

        private static function initItems($dir, $tid, $students, $classes, $branches){
            foreach ($students as $key => $item) {
                $id = $item->ID;
                $student = $item->student;
                $startDate = $item->startDate;
                $branch = self::getBranch($item->courseBranchID, $branches);
                $class = self::getClass($item->classID, $classes);
                ?>
                
                    <tr>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageTeacherScoring . "?tid=$tid&bid=$id") ?>" class="text-body small"><span class="score"><?php echo $item->score ?>/100</span></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageTeacherScoring . "?tid=$tid&bid=$id") ?>" class="text-body small"><span class="username"><?php echo $student->username ?></span></a>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageTeacherScoring . "?tid=$tid&bid=$id") ?>" class="text-body small"><span class="branch"><?php echo $branch->branch->title ?></span></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageTeacherScoring . "?tid=$tid&bid=$id") ?>" class="text-body small"><span class="class"><?php self::echoTimeRange($class) ?></span></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageTeacherScoring . "?tid=$tid&bid=$id") ?>" class="text-body small"><span class="date"><?php self::echoDate($startDate) ?></span></a>
                            </div>
                        </td>
                        <td>
                            <div class="input-group-append">
                              <!--<button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ประเมิน</button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$routeAdminOrder . "?m=confirm&id=$id") ?>">ประเมิน</a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="<?php Nav::echoURL($dir, App::$pageTeacherScoring . "?tid=$tid&bid=$id") ?>">ยกเลิก</a>
                              </div>-->
                              <a href="<?php Nav::echoURL($dir, App::$pageTeacherScoring . "?tid=$tid&bid=$id") ?>" class="btn btn-success">
                                <i class="material-icons">edit</i>
                              </a>
                            </div>
                        </td>
                    </tr>
                <?php
            }
        }

        private static function getBranch($courseBranchID, $branches){
            $result = NULL;

            foreach ($branches as $key => $b) {
                if($b->ID == $courseBranchID) $result = $b;
            }

            return $result;
        }

        private static function getClass($classID, $classes){
            $result = NULL;

            foreach ($classes as $key => $c) {
                if($c->ID == $classID) $result = $c;
            }

            return $result;
        }

        private static function echoTimeRange($class){
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

        private static function echoDate($datetime){
            $x = explode(' ', $datetime);
            echo $x[0];
        }
    }