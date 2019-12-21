<?php
    class AdminViewClassroom{
        public static function initView($dir, $sess, $paths, $classroom){
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

                                    <div class="container-fluid page__container p-0">
                                        <div class="row m-0">
                                            <div class="col-lg container-fluid page__container">

                                                <!-- Navigation Paths -->
                                                <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                                <?php if($classroom != NULL){ ?>
                                                    <div id="invoice">
                                                        <div class="card">
                                                            <div class="card-header media align-items-center">
                                                                <div class="media-body">
                                                                    <h1 class="card-title h2">รายชื่อผู้ลงเรียน คอร์ส: <?php echo $classroom->course->title; ?></h1>
                                                                    <div class="card-subtitle">รอบวันที่ <?php echo $classroom->startDate ?></div>
                                                                </div>
                                                                <div class="media-right d-flex align-items-center">
                                                                    <a href="javascript:window.print()" class="btn btn-flush text-primary d-print-none mr-3"><i class="material-icons font-size-24pt">print</i></a>
                                                                    <?php //self::initBtnStatus($dir, $classroom->status, $classroom->ID) ?>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <h3 class="mb-1">สาขา <?php echo $classroom->branch->title ?></h3>
                                                                <h5 class="mb-1">รอบเรียนวันที่ <?php self::echoTimeRange($classroom->class)?> <?php echo $classroom->startDate?></h5>
                                                                <div class="mt-4 text-black-50">
                                                                    <table class="w-100" style="border-collapse: inherit; border: black solid 1px;">
                                                                        <thead>
                                                                            <tr class="text-center">
                                                                              <th>ลำดับที่</th>
                                                                              <th>ชื่อผู้ใช้</th>
                                                                              <th>ชื่อจริง</th> 
                                                                              <th>นามสกุล</th>
                                                                              <th>เบอร์โทร</th>
                                                                              <th>รหัสการจอง</th>
                                                                              <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php self::initItems($dir, $classroom->students) ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php 
                                                    }else{ 
                                                        Alert::initAlert($dir, "ขออภัย! เราไม่พบรายชื่อที่คุณต้องการ");
                                                    } 
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php Sidemenu::initSideMenu($dir, $sess) ?>
                            </div>
                        </div>
                    </div>
                    <?php Script::customScript($dir, 'common.js') ?>
                    <?php Script::initScript($dir) ?>
            <?
        }

        private static function initItems($dir, $students){
            foreach ($students as $key => $item) {
                $index = $key;
                $ID = $item->ID;
                $username = $item->student->username;
                $fname = $item->student->fname;
                $lname = $item->student->lname;
                $phone = $item->student->phone;
                $email = $item->student->email;
                ?>
                    <tr class="text-center">
                        <td><?php echo $index ?></td>
                        <td><?php echo $username ?></td>
                        <td><?php echo $fname ?></td>
                        <td><?php echo $lname ?></td>
                        <td><?php echo $phone ?></td>
                        <td>#<?php echo $ID ?></td>
                        <td><i class="material-icons">check_box_outline_blank</i></td>
                    </tr>
                <?php
            }
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

        
    }