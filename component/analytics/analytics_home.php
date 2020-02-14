
<?php
    class AnalyticsHomeView{
        public static function initView($dir, $sess, $paths){
            $auth = $sess->getAuth();
            $urls = array(
                'dir' => $dir
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

                                    <div class="media align-items-center mb-headings">
                                        <div class="media-body">
                                            <h1 class="h2">Analytics</h1>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                                        <form action="#">
                                            <div class="form-inline pl-3 pb-3">
                                                <div class="form-group mr-2">
                                                    <label class="mr-2">คัดกรองข้อมูล</label>
                                                    <select id="selectDay" class="form-control custom-select" style="width: 180px" onchange="DoPlotByTime(this.value)">
                                                            <option value="28">28 วันที่ผ่านมา</option>
                                                            <option value="14">14 วันที่ผ่านมา</option>
                                                            <option value="7">7 วันที่ผ่านมา</option>
                                                            <option value="365" selected>1 ปีที่ผ่านมา</option>
                                                            <option value="0">ทุกช่วงเวลา</option>
                                                    </select>
                                                </div>
                                                <!--<div class="form-group mr-2">
                                                    <select id="selectMonth" class="form-control custom-select" style="width: 180px" onchange="DoPlotByMonth(this.value)">
                                                        <option value="01">มกราคม</option>
                                                        <option value="02">กุมภาพันธ์</option>
                                                        <option value="03">มีนาคม</option>
                                                        <option value="04">เมษายน</option>
                                                        <option value="05">พฤษภาคม</option>
                                                        <option value="06">มิถุนายน</option>
                                                        <option value="07">กรกฎาคม</option>
                                                        <option value="08">สิงหาคม</option>
                                                        <option value="09">กันยายน</option>
                                                        <option value="10">ตุลาคม</option>
                                                        <option value="11">พฤศจิกายน</option>
                                                        <option value="12">ธันวาคม</option>
                                                    </select>
                                                </div>-->
                                            </div>
                                        </form>
                                    </div>

                                    <h3 id="title">สถิติ</h3>
                                    <div class="row">
                                        <div class="col-lg-4 col-12 text-center mt-3">
                                            <h4 class="text-muted">รายได้ภาพรวม</h4>
                                            <h2 id="totalRev" class="text-primary"></h2>
                                            <br>
                                            <h4 class="text-muted">ยอดลูกค้า</h4>
                                            <h2 id="totalCus" class="text-info"></h2>
                                        </div>
                                        <div class="col-lg-8 col-12">
                                            <div class="chart">
                                              <canvas id="performanceChart" class="chart-canvas"></canvas>
                                            </div>
                                        </div>
                                        <div class="mt-4 col-lg-8 col-12">
                                            <h4 class="text-muted">รายการซื้อที่ผ่านมา</h4>
                                            <!-- Wrapper -->
                                            <div class="table-responsive" data-toggle="lists" data-lists-values='["date"]'>        
                                                <!-- Search -->
                                                <div class="search-form search-form--light mb-3">
                                                  <input type="text" class="form-control search" placeholder="ค้นหาโดยวันที่">
                                                  <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                </div>
                                                <!-- Table -->
                                                <table class="table">
                                                  <thead>
                                                    <tr>
                                                      <th>วันที่</th>
                                                      <th>วิธีการชำระ</th>
                                                      <th>รายได้</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody id="transList" class="list">
                                                  </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="mt-4 col-lg-4 col-12 text-center">
                                            <h4 class="text-muted">คอร์สยอดนิยม</h4>
                                            <h2 id="totalCourse" class="text-primary"></h2>
                                            <br>
                                            <h4 class="text-muted">แพคเกจยอดนิยม</h4>
                                            <h2 id="totalPackage" class="text-primary"></h2>
                                        </div>
                                        <div class="mt-4 col-12 text-center">
                                            <h4 class="text-muted">จำนวนนักเรียนในสาขา</h4>
                                            <div id="studentByBranches" class="card-deck">

                                            </div>
                                        </div>
                                        <div class="mt-4 col-12 text-center">
                                            <h4 class="text-muted">จำนวนนักเรียนแต่ละรอบเรียน</h4>
                                            <div id="studentBranches" class="card-deck"></div>
                                            <!-- Wrapper -->
                                            <div class="table-responsive" data-toggle="lists" data-lists-values='["class", "total", "branch"]'>        
                                                <!-- Search -->
                                                <div class="search-form search-form--light mb-3">
                                                  <input type="text" class="form-control search" placeholder="ค้นหา">
                                                  <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                </div>
                                                <!-- Table -->
                                                <table class="table">
                                                  <thead>
                                                    <tr>
                                                      <th>รอบเรียน</th>
                                                      <th>จำนวนนักเรียน</th>
                                                      <th>สาขา</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody id="classList" class="list">
                                                  </tbody>
                                                </table>
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
                <script src="<?php Nav::echoURL($dir, 'assets/js/settings.js') ?>"></script>

                <!-- Chart.js Library -->
                <script src="<?php Nav::echoURL($dir, 'assets/vendor/Chart.min.js') ?>"></script>

                <!-- Chart.js Wrapper -->
                <script src="<?php Nav::echoURL($dir, 'assets/js/chartjs.js') ?>"></script>

                <script>
                  Charts.init()
                </script>

                <script id="urls"><?php echo json_encode($urls) ?></script>
                <?php Script::customScript($dir, 'analytics-fun.js') ?>
                <?php Script::customScript($dir, 'analytics-home.js') ?>
                <script>
                    DoPlotByTime('365');
                </script>
                <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>-->

<?php
        }
    }



