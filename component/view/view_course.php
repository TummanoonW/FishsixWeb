<?php
    class CourseView{
        public static function initView($dir, $paths, $course, $teachers, $comments){
            $auth = SESSION::getAuth();
            $preview = $course->preview;
            $lessons = $course->lessons;
            $pictures = $course->pictures;
            $classes = $course->classes;
            $packages = $course->packages;
            $urls = array(
                'pageMyCart' => $dir . App::$pageMyCart
            );
?>
            <body class="layout-fluid">
                <link type="text/css" rel="stylesheet" href="<?php Nav::echoURL($dir, 'assets/css/lightgallery.min.css') ?>" /> 
                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir, '') ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content" style="padding-top: 64px">

                    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                        <div class="mdk-drawer-layout__content page ">
                            <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>
                                    
                                    <div class="row">
                                        <div class="col-12 col-sm-7">
                                            <h1 class="h2" id="pageTitle"><?php echo $course->title ?></h1>
                                        </div>
                                        <div class="col-12 col-sm-5 text-right pt-3">
                                            <span class="text-muted">อัพเดทเมื่อ: <span id="cEditedDate"><?php echo $course->editedDate ?></span></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <!--<div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="<?php Asset::echoImage($dir,'https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0') ?>" allowfullscreen=""></iframe>
                                                </div> -->
                                                <!--<div class="card-header p-0">
                                                    <img style="object-fit: cover; height: 256px; width: 100%;" src="<?php Asset::echoImage($dir, $course->thumbnail) ?>">
                                                </div> -->
                                                <div class="card-header">
                                                    <div class="media align-items-center">
                                                        <div class="media-left">
                                                            <span class="col-12 col-md-6">
                                                                <i class="material-icons text-muted-light">assessment</i>
                                                                สำหรับ<?php self::echoLevel($course->level) ?>
                                                            </span>
                                                            <span class="col-12 col-md-6">
                                                            <i class="material-icons text-muted-light">schedule</i>
                                                            <?php echo ((int)$course->duration / 60)?> ชม. <?php echo ((int)$course->duration % 60)?> นาที
                                                            </span>
                                                        </div>
                                                        <div class="media-body">
                                                            
                                                        </div>
                                                        <div class="media-right">
                                                        <?php self::initRating($dir, $course->ratingScore, $course->ratingCount) ?> (<?php echo $course->ratingCount ?>)
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h4>คำอธิบายย่อ</h4>
                                                        <p class="text-black-70"><?php echo $course->content ?></p>
                                                    </div>
                                                    <div>
                                                        <h4>รายละเอียด</h4>
                                                        <p class="text-black-70"><?php echo $course->description ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if($preview != ''){ ?>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title"><i class="fas fa-play"></i> &nbsp;วิดีโอตัวอย่าง</h4>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <iframe class="embed-responsive-item" src="<?php echo $preview ?>" allowfullscreen=""></iframe>
                                                        </div>
                                                    </div>
                                            <?php } ?>

                                            <!-- Lessons -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"><i class="fas fa-graduation-cap"></i> &nbsp; บทเรียน</h4>
                                                </div>
                                                <div class="card-body p-0">
                                                    <ul class="list-group list-group-fit">
                                                        <?php self::initLessonItems($dir, $lessons) ?>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"><i class="far fa-images"></i> &nbsp;ภาพตัวอย่าง</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row" id="lightgallery">
                                                      <?php self::initPictureItems($dir, $pictures) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <!-- Pricing Card -->
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <p>
                                                        <select id="custom-select" class="flex form-control custom-select" onchange="changeCost(this)">
                                                            <?php self::initPackageItems($dir, $packages) ?>
                                                        </select>
                                                    </p>
                                                    <button onclick="buy()" class="btn btn-success btn-block flex-column">
                                                        <strong style="font-size:18px">ซื้อคอร์ส</strong>
                                                        <strong>ในราคา &#3647;<span id="price"></span></strong>
                                                    </button>
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
                                                    <h4 class="card-title"><i class="fas fa-chalkboard-teacher"></i> &nbsp;ครูผู้สอน</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php self::initTeacherItems($dir, $teachers) ?>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"><i class="far fa-comment"></i> &nbsp;ความคิดเห็น (<?php echo $course->ratingCount ?>)</h4>
                                                </div>
                                                <div class="card-body pb-0">
                                                    <div class="rating">
                                                        เรตติ้ง <?php self::initRating($dir, $course->ratingScore, $course->ratingCount) ?>
                                                        &nbsp; <small class="text-muted">ผู้ริวิว <?php echo $course->ratingCount ?> ราย</small>
                                                    </div>
                                                    <ul class="list-group mt-3">
                                                      <?php self::initCommentItems($dir, $comments) ?>
                                                    </ul>
                                                </div>
                                                <div class="card-footer p-0">
                                                    <a class="btn btn-block text-primary" href="#">ดูเพิ่มเติม</a>
                                                </div>
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
                
                <script id="obj-packages"><?php echo json_encode($packages) ?></script>
                <script id="obj-urls"><?php echo json_encode($urls) ?></script>
                
                <?php Script::customScript($dir, 'viewcourse.js') ?>
                
                <script src="<?php Nav::echoURL($dir, 'assets/js/lightgallery.min.js')?>"></script>
                <script type="text/javascript">
                    lightGallery(
                        document.getElementById('lightgallery'),
                        {
                            thumbnail:true
                        }); 
                </script>
<?php
        }

        public static function initRating($dir, $score, $count){
            if((int)$count <= 0) $count = 1;
            $rating = (int)$score / (int)$count;
            
            for ($i=0; $i < 5; $i++) { 
                if($rating < $i + 0.5) echo '<i class="text-warning far fa-star"></i>';
                elseif($rating < $i + 1) echo '<i class="text-warning fas fa-star-half-alt"></i>';
                else echo '<i class="text-warning fas fa-star"></i>';              
            }
        }

        public static function initTeacherItems($dir, $teachers){
            foreach ($teachers as $key => $t) {
                ?>
                    <div class="media align-items-center mb-3">
                        <div class="media-left">
                            <img src="<?php Asset::echoIcon($dir, $t->profile_pic) ?> " alt="<?php echo $t->username ?>" width="48" class="rounded-circle">
                        </div>
                        <div class="media-body">
                            <h4 class="card-title"><a href="#"><?php echo $t->username ?></a></h4>
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

        public static function initPictureItems($dir, $pictures){
            foreach ($pictures as $key => $p) {
                ?>
                    <a class="col-sm-6 col-md-4 col-lg-3 p-0" href="<?php echo $p->picture ?>">
                        <img class="w-100 h-auto" style="object-fit: cover; background: black;" src="<?php echo $p->picture ?>" />
                    </a>
                <?php
            }
        }

        public static function initClassItems($dir, $classes){
            foreach ($classes as $key => $c) {
                ?>
                    <tr>
                        <td><?php echo self::properDay($c->day) ?></td>
                        <td><?php echo $c->seats ?></td>
                        <td class="pr-0"><?php echo self::properTime($c->startTime) . ' - ' . self::properTime($c->endTime) ?></td>
                    </tr>
                <?php
            }
        }

        public static function initPackageItems($dir, $packages){
            foreach ($packages as $key => $p) {
                ?>
                    <option value="<?php echo $p->ID ?>" <?php if($key==0)echo 'selected'?>><?php echo $p->credit ?> ชั่วโมง - &#3647;<?php echo $p->price ?></option>
                <?php
            }
        }

        public static function initCommentItems($dir, $comments){
            foreach ($comments as $key => $c) {
                $a = $c->auth;
                ?>
                    <li class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <a href="#" class="h5 mb-1 card-title">
                                <img src="<?php Asset::echoIcon($dir, $a->profile_pic) ?> " alt="<?php echo $a->username ?>" width="32" class="rounded-circle">
                                <span class="ml-1"><?php echo $a->username ?></span>
                            </a>
                        </div>
                        <div><?php self::initRating($dir, $c->score, 1) ?></div>
                        <p class="mb-1 text-dark-75"><?php echo $c->text ?></p>
                        <small class="text-muted"><?php echo $c->date ?></small>
                    </li>
                <?php
            }
        }

        public static function echoLevel($level){
            switch($level){
                case 1:
                    echo 'ผู้เริ่มต้น';
                    break;
                case 2:
                    echo 'ผู้มีความรู้เบื้องต้น';
                    break;
                case 3:
                    echo 'ผู้เชี่ยวชาญ';
                    break;
                default:
                    echo 'ทุกคน';
                    break;
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
    }
?>