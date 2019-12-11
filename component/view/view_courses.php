<?php
    class CoursesView{
        public static function initView($dir, $paths, $pages, $courses, $categories, $count, $query){
            $auth = SESSION::getAuth();
            $urls = array(
                'pageCourses' => $dir . App::$pageCourses
            );
?>
            <body class="layout-fluid">
                <?php Style::customStyle($dir, 'main.css') ?>

                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir, $query->search) ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content" style="padding-top: 64px">

                    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                        <div class="mdk-drawer-layout__content page ">
                            <div class="container-fluid page__container">
                                <!-- Navigation Paths -->
                                <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>
                                
                                <h1 class="h2">คำค้นหา: <?php echo $query->search ?></h1>
                                <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                                    <div>
                                        <div class="d-flex flex-wrap2 align-items-center mb-headings row">
                                            <div class="col-md-3 col-sm-12 mt-2">                                       
                                                <select id="custom-select" class="flex form-control custom-select" onchange="searchCategory(this)">
                                                    <?php 
                                                        $s_cat = $query->category;
                                                    ?>
                                                        <option value="" <?php if($s_cat == '') echo 'selected' ?>>ทุกหมวดหมู่</option>
                                                    <?php
                                                        foreach ($categories as $key => $category) {
                                                            ?>
                                                                <option value="<?php echo $category->ID ?>" <?php if($s_cat == $category->ID) echo 'selected' ?>><?php echo $category->title ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="flex search-form ml-2 search-form--light col-md-9 col-sm-12 mt-2">
                                                <input id="search" type="text" class="form-control" placeholder="คำค้นหา" id="searchSample02" value="<?php echo $query->search ?>">
                                                <button onclick="searchQuery()" class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                            </div>
                                        </div>
                                        <div class="form-inline pl-3 pb-3">
                                            
                                        </div>
                                        <div class="d-flex flex-column flex-sm-row align-items-sm-center" style="white-space: nowrap">
                                            <small class="flex text-muted text-uppercase mr-3 mb-2 mb-sm-0">แสดงผลลัพธ์ <?php echo count($courses) ?> จาก <?php echo $count ?> รายการ</small>
                                            <div class="w-auto ml-sm-auto table d-flex align-items-center mb-0">
                                                <small class="text-muted text-uppercase mr-3 d-none d-sm-block">จัดเรียงโดย</small>
                                                <?php 
                                                    if($query->sort == 'popular'){
                                                      if($query->desc){ 
                                                ?>
                                                        <a href="#" onclick="searchPopular(false)" class="sort small text-uppercase ml-2">ความนิยม น้อย - มาก</a>
                                                <?php }else{ 
                                                ?>
                                                        <a href="#" onclick="searchPopular(true)" class="sort small text-uppercase ml-2">ความนิยม มาก - น้อย</a>
                                                <?php }
                                                    }else{
                                                ?>
                                                        <a href="#" onclick="searchPopular(true)" class="sort small text-uppercase text-muted ml-2">ความนิยม มาก - น้อย</a>
                                                <?php        
                                                    }
                                                    
                                                    if($query->sort == 'char'){
                                                      if($query->desc){ 
                                                ?>
                                                        <a href="#" onclick="searchChar(false)" class="sort small text-uppercase ml-2">Z - A</a>
                                                <?php }else{ 
                                                ?>
                                                        <a href="#" onclick="searchChar(true)" class="sort small text-uppercase ml-2">A - Z</a>
                                                <?php } 
                                                    }else{
                                                ?>
                                                        <a href="#" onclick="searchChar(true)" class="sort small text-uppercase text-muted ml-2">A - Z</a>
                                                <?php
                                                    }
                                                ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <h3>คอร์สเรียน</h3>
                                <div class="row">
                                    <?php self::initCard($dir, $courses, $categories) ?>
                                </div>
                                
                                <!--<hr>
                                <h3>บทความ</h3>

                                <hr>
                                <h3>ขอความช่วยเหลือ</h3> -->
                            </div>
                            <?php Sidemenu::initSideMenu($dir) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
                
                <script id="obj-query"><?php echo json_encode($query) ?></script>
                <script id="obj-urls"><?php echo json_encode($urls) ?></script>

                
                
                <?php Script::customScript($dir, 'courses.js') ?>

<?php
        }

        public static function initCard($dir, $courses, $categories){
            foreach ($courses as $key => $course) {
                $id = $course->ID;
                ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                            <div class="card-header" style="padding: 0; height: 16vh;">
                                <a href="<?php Nav::echoURL($dir, App::$pageCourseView . "?id=$id") ?>" class="mb-3 w-xs-plus-down-100 mr-sm-3">
                                    <?php if($course->thumbnail == ''){ ?>
                                            <img src="<?php Asset::echoThumb($dir, $course->thumbnail) ?>" alt="<?php echo $course->title ?>" class="w-100 h-100" style="background: black;">
                                    <?php }else{ ?>
                                            <img src="<?php echo $course->thumbnail ?>" alt="<?php echo $course->title ?>" class="w-100 h-100" style="background: black;">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <a href="<?php Nav::echoURL($dir, App::$pageCourseView . "?id=$id#comments") ?>">
                                        <?php self::initRating($dir, $course->ratingScore, $course->ratingCount) ?>
                                        <span class="pl-1">(<?php echo $course->ratingCount ?>)</span>
                                    </a>
                                </div>
                                <div class="d-flex flex-column flex-sm-row">   
                                    <div class="flex" style="min-width: 200px;">
                                        <h4 class="card-title mb-1 h4-5"><a href="<?php Nav::echoURL($dir, App::$pageCourseView . "?id=$id") ?>"><?php echo $course->title ?></a></h4>
                                        <span class="text-black-50"><?php echo $course->content ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-end py-2">
                                <div class="d-flex flex flex-column mr-3">
                                    <div class="d-flex align-items-center py-1">
                                        <span class="text-secondary mr-2">
                                            <strong>
                                            <?php 
                                                $category = "None";
                                                foreach ($categories as $key => $value) {
                                                    if($course->categoryID == $value->ID){
                                                        $category = $value->title;
                                                    }
                                                }
                                                echo $category;
                                            ?>
                                            </strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <span class="h4-5 text-success">฿<?php echo $course->minPrice . '-' . $course->maxPrice ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
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
    }
?>