<?php
    class ScoreView{
        public static function initView($dir, $paths, $scores, $course){
            $auth = SESSION::getAuth();
            $booking = $scores->booking;
            $owner = $scores->owner;
            $branch = $scores->courseBranch->branch;

            Console::log('result', $scores);
            Console::log('course', $course);
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

                                <div class="container-fluid page__container p-0">
                                    <div class="container-fluid page__container">

                                            <!-- Navigation Paths -->
                                            <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div id="invoice">
                                                    <div class="card">
                                                        <div class="card-header media align-items-center">
                                                            <div class="media-body">
                                                                <h1 class="card-title h2">รายละเอียดคะแนน </h1>
                                                                <div class="card-subtitle">เรียนเมื่อวันที่ <?php echo $booking->startDate ?></div>
                                                            </div>
                                                            <div class="media-right d-flex align-items-center">
                                                                <a href="javascript:window.print()" class="btn btn-flush text-muted d-print-none mr-3"><i class="material-icons font-size-24pt">print</i></a>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <p class="text-black-70 m-0"><strong>ชื่อผู้เรียน</strong></p>
                                                                    <h3><?php echo $owner->user->fname ?> <?php echo $owner->user->lname ?></h3>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p class="text-black-70 m-0"><strong>คะแนนที่ได้รับ</strong></p>
                                                                    <h2><?php echo $scores->score ?></h2>
                                                                </div>
                                                            </div>
                                                            <p class="text-black-70 m-0"><strong>สาขาที่ลงเรียน</strong></p>
                                                            <h4><?php echo $branch->title ?></h4>
                                                        </div>
                                                    <?php if($scores->comment != "" || $scores->suggestion != "")
                                                    {
                                                        ?>
                                                        <div class="card-footer">
                                                            <?php if($scores->comment != "")
                                                            {
                                                                ?>
                                                                <p class="text-black-70 m-0"><strong>คำประเมิน</strong></p>
                                                                <h5><?php echo $scores->comment ?></h5>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php if($scores->suggestion != "")
                                                            {
                                                                ?>
                                                                <p class="text-black-70 m-0"><strong>คำแนะนำ</strong></p>
                                                                <h5><?php echo $scores->suggestion ?></h5>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h3>คอร์ส - <?php echo $course->title ?></h3>
                                                <a class="" href="<?php echo $course->thumbnail ?>" target="_blank">
                                                    <img class="" style="object-fit: cover;background: black;width: 200px;height: auto;" src="<?php echo $course->thumbnail ?>" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
            <?php
        }
    }
?>