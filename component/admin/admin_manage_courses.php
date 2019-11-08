<?php
    class AdminManageCoursesView{
        public static function initView($dir, $paths, $pages, $courses, $count, $search, $categories){
            $auth = Session::getAuth();
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

                                    <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                                        <div class="flex mb-2 mb-sm-0">
                                            <h1 class="h2">จัดการคอร์ส</h1>
                                        </div>
                                        <a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor) ?>" class="btn btn-success">+ เพิ่มคอร์ส</a>
                                    </div>

                                    <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                                        <form action="#">
                                            <div class="d-flex flex-wrap2 align-items-center mb-headings">                                              
                                                <div class="flex search-form ml-3 search-form--light">
                                                    <input id="query" type="text" class="form-control" placeholder="Search courses" id="searchSample02" value="<?php echo $search->query ?>">
                                                    <button onclick="searchQuery()" class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                </div>
                                            </div>

                                            <div class="form-inline pl-3 pb-3">
                                                <div class="form-group mr-2">
                                                    <select id="custom-select" class="form-control custom-select" style="width: 180px" onchange="searchCategory(this)">
                                                        <?php 
                                                            $s_cat = $search->category;
                                                        ?>
                                                            <option value="" <?php if($s_cat == '') echo 'selected' ?>>ทุกหมวดหมู่</option>
                                                        <?php
                                                            foreach ($categories as $key => $category) {
                                                                ?>
                                                                    <option value="<?php echo $category->ID ?>" <?php if($s_cat == $category->ID) echo 'selected' ?>><?php echo $category->title ?></option>
                                                                <?
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group mr-2">
                                                    <select id="published01" class="form-control custom-select" style="width: 180px" onchange="searchPublic(this)">
                                                        <?php 
                                                            $s_public = $search->public;
                                                        ?>
                                                        <option value="1" <?php if($s_public == 1) echo 'selected' ?>>เผยแพร่แล้ว</option>
                                                        <option value="0" <?php if($s_public == 0) echo 'selected' ?>>ยังไม่เผยแพร่</option>
                                                        <option value="" <?php if($s_public == '') echo 'selected' ?>>ทุกคอร์ส</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-column flex-sm-row align-items-sm-center" style="white-space: nowrap">
                                                <small class="flex text-muted text-uppercase mr-3 mb-2 mb-sm-0">แสดงผลลัพธ์ <?php echo count($courses) ?> จาก <?php echo $count ?> รายการ</small>
                                                <div class="w-auto ml-sm-auto table d-flex align-items-center mb-0">
                                                    <small class="text-muted text-uppercase mr-3 d-none d-sm-block">จัดเรียงโดย</small>
                                                    <?php 
                                                          if($search->desc){ 
                                                    ?>
                                                            <a href="#" onclick="searchDesc(false)" class="sort small text-uppercase ml-2">Z - A</a>
                                                    <?php }else{ 
                                                    ?>
                                                            <a href="#" onclick="searchDesc(true)" class="sort small text-uppercase ml-2">A - Z</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="row">
                                        <?php self::initCards($dir, $courses, $categories) ?>
                                    </div>
                                </div>
                                    <!-- Pagination -->
                                    <?php Pagination::initPagination($dir, $pages) ?>
                                    
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir) ?>
                        </div>
                    </div>
                </div>   
                <?php Script::initScript($dir) ?> 
                
                
                <script id="q">
                    <?php echo json_encode($search) ?>
                </script>
                <script>
                    var q = JSON.parse(document.querySelector('#q').innerHTML);

                    function search(){
                        let param = JSON.stringify(q);
                        window.location = "<?php Nav::echoURL($dir, App::$pageAdminManageCourses) ?>" + "?q=" + param;
                    }

                    function searchCategory(element){
                        q.category = element.value;
                        search();
                    }

                    function searchPublic(element){
                        q.public = element.value;
                        search();
                    }

                    function searchQuery(){
                        let element = document.querySelector('#query');
                        q.query = element.value;
                        search();
                    }

                    function searchDesc(isDesc){
                        q.desc = isDesc;
                        search();
                    }

                    var input = document.querySelector('#query');
                    input.addEventListener("keyup", function(event) {
                        // Number 13 is the "Enter" key on the keyboard
                        if (event.keyCode === 13) {
                          // Cancel the default action, if needed
                          event.preventDefault();
                          // Trigger the button element with a click
                          searchQuery();
                        }
                    });
                </script>
<?
        }

        private static function initCards($dir, $courses, $categories){
            foreach ($courses as $key => $course) {
                $id = $course->ID;
            ?>
                <!-- Course Card -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-sm-row">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor . "?id=$id") ?>" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                    <?php
                                        if($course->thumbnail == ''){
                                    ?>
                                            <img src="<?php Asset::echoThumb($dir, $course->thumbnail) ?>" alt="<?php $course->title ?>" class="avatar-img rounded">
                                    <?php 
                                        }else{
                                    ?>
                                        <img src="<?php echo $course->thumbnail ?>" alt="<?php $course->title ?>" class="avatar-img rounded">
                                    <?php
                                        }
                                    ?>
                                </a>
                                <div class="flex" style="min-width: 200px;">
                                    <!-- <h5 class="card-title text-base m-0"><a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor . "?id=$id") ?>"><strong>Learn Vue.js</strong></a></h5> -->
                                    <h4 class="card-title mb-1"><a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor . "?id=$id") ?>"><?php echo $course->title ?></a></h4>
                                    <p class="text-black-70"><?php echo $course->content ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-end">
                            <div class="d-flex flex flex-column mr-3">
                                <div class="d-flex align-items-center py-1">
                                    <small class="text-secondary mr-2">
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
                                    </small>
                                    <small class="text-secondary">
                                        <strong>
                                        <?php
                                            if($course->public == 0)echo 'ยังไม่เผยแพร่';
                                            else echo 'เผยแพร่';
                                        ?>
                                        </strong>
                                    </small>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor . "?id=$id") ?>" class="btn btn-primary btn-sm float-right"><i class="material-icons btn__icon--left">edit</i>แก้ไข</a>
                                <button onclick="return confirmDelete('<?php echo App::$routeAdminCourse . '?m=delete&id=' . $id ?>');" class="btn btn-default btn-sm float-right" style="margin-right:8px;" ><i class="material-icons btn__icon--left">delete_forever</i>ลบ</button>
                            </div>
                        </div>
                        <div class="card__options dropdown right-0 pr-2">
                            <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor . "?id=$id") ?>">แก้ไขคอร์ส</a>
                                <a class="dropdown-item" href="#">ดูคอร์ส</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#" onclick="return confirmDelete('<?php echo App::$routeAdminCourse . '?m=delete&id=' . $id ?>');">ลบคอร์ส</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
    }