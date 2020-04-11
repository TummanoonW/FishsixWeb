<?php
    class AdminManageClassroomsView{
        public static function initView($dir, $sess, $paths, $classrooms, $filter, $courses, $branches, $classes){
            $auth = $sess->getAuth();
            $urls = array(
                'pageAdminManageClassrooms' => Nav::getURL($dir, App::$pageAdminManageClassrooms)
            );
            $data = array(
                'filter' => $filter
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

                                    <div class="media mb-headings align-items-center">
                                        <div class="media-body">
                                            <h1 class="h2">จัดการรายชื่อผู้ลงเรียน</h1>
                                        </div>
                                        <div class="media-right">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                                        <form action="#">
                                            <div class="d-flex flex-wrap2 align-items-center mb-headings row">
                                                <div class="col-md-8 mb-2">
                                                    <select name="course" id="courses" class="form-control custom-select w-auto" onchange="searchCourse(this)">
                                                        <option value="">ทุกคอร์ส</option>
                                                        <?php foreach ($courses as $key => $c) { ?>
                                                            <option value="<?php echo $c->ID ?>" <?php if(isset($filter->courseID)) if($filter->courseID == $c->ID) echo 'selected'; ?>><?php echo $c->title ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <select name="branch" id="branches" class="form-control custom-select w-auto" onchange="searchBranch(this)">
                                                        <option value="">ทุกสาขา</option>
                                                        <?php foreach ($branches as $key => $b) { ?>
                                                            <option value="<?php echo $b->ID ?>" <?php if(isset($filter->courseBranchID)) if($filter->courseBranchID == $b->ID) echo 'selected'; ?>><?php if($b->branch != NULL) if(isset($b->branch)) echo $b->branch->title ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <select name="class" id="classes" class="form-control custom-select ml-2 w-auto" onchange="searchClass(this)">
                                                        <option value="">ทุกรอบเรียน</option>
                                                        <?php foreach ($classes as $key => $c) { ?>
                                                            <option value="<?php echo $c->ID ?>" <?php if(isset($filter->classID)) if($filter->classID == $c->ID) echo 'selected'; ?>><?php self::echoTimeRange($c) ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="search-form search-form--light">
                                                        <input name="date" id="date" type="date" class="form-control" placeholder="YYYY-MM-DD" id="searchSample02" value="<?php echo $filter->since ?>">
                                                        <button onclick="searchDate()" class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <?php if(count((array)$classrooms) > 0){ ?>
                                        <div class="card table-responsive" data-toggle="lists" data-lists-values='["startDate", "class", "branch", "course", ""]'>
                                            <table class="table mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="startDate">วันที่</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="class">รอบเรียน</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="branch">สาขา</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="course">คอร์ส</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="">รายละเอียด</a>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <? self::initItems($dir, $classrooms, $courses, $classes, $branches) ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php }else{ 
                                        Alert::initAlert($dir, "คุณไม่มีรายการนักเรียนให้แสดง");
                                    } ?>
                                </div>

                            </div>
                            <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div> 
                <?php Script::customScript($dir, 'common.js') ?>
                <?php Script::initScript($dir) ?>

                <script id="urls"><?php echo json_encode($urls) ?></script>
                <script id="data"><?php echo json_encode($data) ?></script>
                
                <?php Script::customScript($dir, 'admin-manage-classrooms.js'); ?>
<?php
        }

        private static function initItems($dir, $classrooms, $courses, $classes, $branches){
            foreach ($classrooms as $key => $item) {
                $object = $item;
                $startDate = $object->startDate;
                $course = $object->course;
                $branch = $object->branch;
                $class = $object->class;
                ?>
                
                    <tr>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <a href="<?php if(isset($course->ID) && isset($branch->ID) && isset($class->ID))Nav::echoURL($dir, App::$pageAdminViewClassroom . "?date=$startDate&course=$course->ID&branch=$branch->ID&class=$class->ID"); else echo '#' ?>" class="text-body small"><span class="startDate"><?php echo $startDate ?></span></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <a href="<?php if(isset($course->ID) && isset($branch->ID) && isset($class->ID))Nav::echoURL($dir, App::$pageAdminViewClassroom . "?date=$startDate&course=$course->ID&branch=$branch->ID&class=$class->ID"); else echo '#' ?>" class="text-body small"><span class="class"><?php self::echoTimeRange($class) ?></span></a>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="<?php if(isset($course->ID) && isset($branch->ID) && isset($class->ID))Nav::echoURL($dir, App::$pageAdminViewClassroom . "?date=$startDate&course=$course->ID&branch=$branch->ID&class=$class->ID"); else echo '#' ?>" class="text-body small"><span class="branch"><?php if(isset($branch->title)) echo $branch->title ?></span></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <a href="<?php if(isset($course->ID) && isset($branch->ID) && isset($class->ID))Nav::echoURL($dir, App::$pageAdminViewClassroom . "?date=$startDate&course=$course->ID&branch=$branch->ID&class=$class->ID"); else echo '#' ?>" class="text-body small"><span class="course"><?php if(isset($course->title)) echo $course->title ?></span></a>
                            </div>
                        </td>
                        <td>
                            <div class="input-group-append">
                              <!--<button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ประเมิน</button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$routeAdminOrder . "?m=confirm&id=$id") ?>">ประเมิน</a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="<?php if(isset($course->ID) && isset($branch->ID) && isset($class->ID))Nav::echoURL($dir, App::$pageAdminViewClassroom . "?date=$startDate&course=$course->ID&branch=$branch->ID&class=$class->ID"); else echo '#' ?>">ยกเลิก</a>
                              </div>-->
                                <?php if(isset($course->ID) && isset($branch->ID) && isset($class->ID)){ ?>
                                    <a href="<?php Nav::echoURL($dir, App::$pageAdminViewClassroom . "?date=$startDate&course=$course->ID&branch=$branch->ID&class=$class->ID") ?>" class="btn btn-success">
                                      <i class="material-icons">remove_red_eye</i>
                                    </a>
                                <?php } ?>
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
            if(isset($class->day)) $day = $class->day;
            else $day = "-";
            
            if(isset($class->startTime))$start = $class->startTime;
            else $start = "-:-";

            if(isset($class->endTime))$end = $class->endTime;
            else $end = "-:-";

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