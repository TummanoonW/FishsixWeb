<?php
    class AdminCourseEditorView{
        public static function initView($dir, $paths, $course, $categories){
            $auth = Session::getAuth();
?>
       
            <body class=" layout-fluid">
                 <!-- Flatpickr -->
                <link type="text/css" href="<?php Nav::printURL($dir, 'assets/css/flatpickr.css'); ?>"  rel="stylesheet">
                <link type="text/css" href="<?php Nav::printURL($dir, 'assets/css/flatpickr.rtl.css'); ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::printURL($dir, 'assets/css/flatpickr-airbnb.css'); ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::printURL($dir, 'assets/css/flatpickr-airbnb.rtl.css'); ?>" rel="stylesheet">

                <!-- Quill Theme -->
                <link type="text/css" href="<?php Nav::printURL($dir, 'assets/css/quill.css'); ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::printURL($dir, 'assets/css/quill.rtl.css'); ?>" rel="stylesheet">

                <!-- Nestable -->
                <link rel="stylesheet" href="<?php Nav::printURL($dir, 'assets/css/nestable.css'); ?>">
                <link rel="stylesheet" href="<?php Nav::printURL($dir, 'assets/css/nestable.rtl.css'); ?>">

                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir); ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir); ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php NavPath::initNavPath($dir, $paths); ?>

                                    <div class="media align-items-center mb-headings">
                                        <div class="media-body">
                                            <h1 class="h2">Edit Course - <?php echo $course->title ?></h1>
                                        </div>
                                        <div class="media-right">
                                            <span style="margin-right: 8px;">Last updated: 13 Oct 2019</span>
                                            <a href="#" class="btn btn-info" style="margin-right: 4px;">PUBLISH</a>
                                            <a href="#" class="btn btn-success">SAVE</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Basic Information</h4>
                                                </div>
                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label class="form-label" for="title">Title</label>
                                                        <input type="text" id="title" class="form-control" placeholder="Write a title" value="<?php echo $course->title; ?>">
                                                    </div>

                                                    <div class="form-group mb-0">
                                                        <label class="form-label">Description</label>
                                                        <div style="height: 150px;" data-toggle="quill" data-quill-placeholder="Quill WYSIWYG editor" data-quill-modules-toolbar='[["bold", "italic"], ["link", "blockquote", "code", "image"], [{"list": "ordered"}, {"list": "bullet"}]]'>
                                                            <p><?php echo $course->description; ?></p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Lessons</h4>
                                                </div>
                                                <div class="card-body">
                                                    <p><a href="instructor-lesson-add.html" class="btn btn-primary">Add Lesson <i class="material-icons">add</i></a></p>
                                                    <div class="nestable" id="nestable-handles-primary">
                                                        <ul class="nestable-list">
                                                            <li class="nestable-item nestable-item-handle" data-id="2">
                                                                <div class="nestable-handle"><i class="material-icons">menu</i></div>
                                                                <div class="nestable-content">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-left">
                                                                            <img src="<?php Nav::printURL($dir, 'assets/images/vuejs.png'); ?>" alt="" width="100" class="rounded">
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <h5 class="card-title h6 mb-0">
                                                                                <a href="instructor-lesson-add.html">Awesome Vue.js with SASS Processing</a>
                                                                            </h5>
                                                                            <small class="text-muted">updated 1 month ago</small>
                                                                        </div>
                                                                        <div class="media-right">
                                                                            <a href="instructor-lesson-add.html" class="btn btn-white btn-sm"><i class="material-icons">edit</i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="nestable-item nestable-item-handle" data-id="1">
                                                                <div class="nestable-handle"><i class="material-icons">menu</i></div>
                                                                <div class="nestable-content">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-left">
                                                                            <img src="<?php Nav::printURL($dir, 'assets/images/nodejs.png'); ?>" alt="" width="100" class="rounded">
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <h4 class="card-title h6 mb-0">
                                                                                <a href="instructor-lesson-add.html">Github Webhooks for Beginners</a>
                                                                            </h4>
                                                                            <small class="text-muted">updated 1 month ago</small>
                                                                        </div>
                                                                        <div class="media-right">
                                                                            <a href="instructor-lesson-add.html" class="btn btn-white btn-sm"><i class="material-icons">edit</i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="nestable-item nestable-item-handle" data-id="2">
                                                                <div class="nestable-handle"><i class="material-icons">menu</i></div>
                                                                <div class="nestable-content">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-left">
                                                                            <img src="<?php Nav::printURL($dir, 'assets/images/gulp.png'); ?>" alt="" width="100" class="rounded">
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <h4 class="card-title h6 mb-0">
                                                                                <a href="instructor-lesson-add.html">Browserify: Writing Modular JavaScript</a>
                                                                            </h4>
                                                                            <small class="text-muted">updated 1 month ago</small>
                                                                        </div>
                                                                        <div class="media-right">
                                                                            <a href="instructor-lesson-add.html" class="btn btn-white btn-sm"><i class="material-icons">edit</i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Packages</h4>
                                                </div>
                                                <div class="card-body">
                                                    <p><a href="instructor-lesson-add.html" class="btn btn-primary">Add Package <i class="material-icons">add</i></a></p>
                                                    <div class="nestable" id="nestable-handles-primary">
                                                        <ul class="nestable-list">
                                                            <li class="nestable-item nestable-item-handle" data-id="2">
                                                                <div class="nestable-handle"><i class="material-icons">menu</i></div>
                                                                <div class="nestable-content">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-left">
                                                                            <label> ราคา (บ.)
                                                                                <input type="text" id="duration" class="form-control" placeholder="Price" value="399">
                                                                            </label>
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <label> จำนวนเครดิต (ชม.)
                                                                                <input type="text" id="duration" class="form-control" placeholder="No. of Hours" value="2">
                                                                            </label>
                                                                        </div>
                                                                        <div class="media-right">
                                                                            <a href="instructor-lesson-add.html" class="btn btn-white btn-sm"><i class="material-icons">delete_forever</i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Branches</h4>
                                                </div>
                                                <div class="card-body">
                                                    <p><a href="instructor-lesson-add.html" class="btn btn-primary">Add Branch <i class="material-icons">add</i></a></p>
                                                    <div class="nestable" id="nestable-handles-primary">
                                                        <ul class="nestable-list">
                                                            <li class="nestable-item nestable-item-handle" data-id="2">
                                                                <div class="nestable-handle"><i class="material-icons">menu</i></div>
                                                                <div class="nestable-content">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-left">
                                                                            <img src="<?php Nav::printURL($dir, 'assets/images/vuejs.png'); ?>" alt="" width="100" class="rounded">
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <h5 class="card-title h6 mb-0">
                                                                                <a href="instructor-lesson-add.html">Major Trauma Cinegon</a>
                                                                            </h5>
                                                                            <small class="text-muted">updated 1 month ago</small>
                                                                        </div>
                                                                        <div class="media-right">
                                                                            <a href="instructor-lesson-add.html" class="btn btn-white btn-sm"><i class="material-icons">edit</i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0" allowfullscreen=""></iframe>
                                                </div>
                                                <div class="card-body">
                                                    <input type="text" class="form-control" value="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0" />
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Pictures</h4>
                                                </div>
                                                <div class="card-body">
                                                    <p><a href="instructor-lesson-add.html" class="btn btn-primary">Add Picture <i class="material-icons">add</i></a></p>
                                                    <div class="nestable" id="nestable-handles-primary">
                                                        <ul class="nestable-list">
                                                            <li class="nestable-item nestable-item-handle" data-id="2">
                                                                <div class="nestable-handle"><i class="material-icons">menu</i></div>
                                                                <div class="nestable-content">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-body">
                                                                            <p><img src="<?php Nav::printURL($dir, 'assets/images/vuejs.png'); ?>" alt="" width="100" class="rounded"></p>
                                                                            <small class="text-muted">
                                                                                <input type="text" id="duration" class="form-control" placeholder="caption" value="" width="100">
                                                                            </small>
                                                                        </div>
                                                                        <div class="media-right">
                                                                            <a href="instructor-lesson-add.html" class="btn btn-white btn-sm"><i class="material-icons">delete_forever</i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Tags</h4>
                                                </div>
                                                <div class="card-body">
                                                    <p><a href="instructor-lesson-add.html" class="btn btn-primary">Add Tags <i class="material-icons">add</i></a></p>
                                                    <div class="nestable" id="nestable-handles-primary">
                                                        <ul class="nestable-list">
                                                            <li class="nestable-item nestable-item-handle" data-id="2">
                                                                <div class="nestable-handle"><i class="material-icons">menu</i></div>
                                                                <div class="nestable-content">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-body">
                                                                            <input type="text" id="duration" class="form-control" placeholder="tag" value="" width="100">
                                                                        </div>
                                                                        <div class="media-right">
                                                                            <a href="instructor-lesson-add.html" class="btn btn-white btn-sm"><i class="material-icons">delete_forever</i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Meta</h4>
                                                    <p class="card-subtitle">Extra Options </p>
                                                </div>
                                                    
                                                <form class="card-body" action="#">
                                                    <div class="form-group">
                                                        <label class="form-label" for="category">Category</label>
                                                        <select id="category" class="custom-select form-control" value="<?php echo $course->categoryID; ?>">
                                                            <?php foreach ($categories as $key => $value) { ?>
                                                                <option value="<?php echo $value->ID; ?>"><?php echo $value->title; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="duration">Expire Credit After (days)</label>
                                                        <input type="text" id="duration" class="form-control" placeholder="No. of Days" value="60">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="start">Start Date</label>
                                                        <input id="start" type="text" class="form-control" placeholder="Start Date" data-toggle="flatpickr" value="01/28/2016">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="end">End Date</label>
                                                        <input id="end" type="text" class="form-control" placeholder="Start Date" data-toggle="flatpickr" value="01/28/2016">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="duration"><img src="<?php Nav::printURL($dir, 'assets/images/line-icon.png'); ?>" alt="Avatar" class="rounded-circle" width="20"> LINE Group</label>
                                                        <input type="text" id="duration" class="form-control" placeholder="URL" value="">
                                                    </div>
                                                    
                                                    <div class="form-group mb-0">
                                                        <label class="form-label" for="option1">Completion Badge</label>
                                                        <div>
                                                            <div data-toggle="buttons">
                                                                <label class="btn btn-primary btn-circle active">
                                                                    <input type="radio" class="d-none" name="options" id="option1" checked>
                                                                    <i class="material-icons">person</i>
                                                                </label>
                                                                <label class="btn btn-danger btn-circle">
                                                                    <input type="radio" class="d-none" name="options" id="option2">
                                                                    <i class="material-icons">star</i>
                                                                </label>
                                                                <label class="btn btn-success btn-circle">
                                                                    <input type="radio" class="d-none" name="options" id="option3">
                                                                    <i class="material-icons">shop</i>
                                                                </label>
                                                                <label class="btn btn-warning btn-circle">
                                                                    <input type="radio" class="d-none" name="options" id="option4">
                                                                    <i class="material-icons">monetization_on</i>
                                                                </label>
                                                                <label class="btn btn-info btn-circle">
                                                                    <input type="radio" class="d-none" name="options" id="option5">
                                                                    <i class="material-icons">enhanced_encryption</i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                    
                                <div class="modal fade" id="editLesson">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            // Edit Lesson
                                        </div>
                                    </div>
                                </div>
                                                    
                            </div>
                            <?php Sidemenu::initSideMenu($dir); ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir); ?>


                <!-- Nestable -->
                <script src="<?php Nav::printURL($dir, 'assets/vendor/jquery.nestable.js'); ?>"></script>
                <script src="<?php Nav::printURL($dir, 'assets/js/nestable.js'); ?>"></script>
                <!-- Quill -->
                <script src="<?php Nav::printURL($dir, 'assets/vendor/quill.min.js'); ?>"></script>
                <script src="<?php Nav::printURL($dir, 'assets/js/quill.js'); ?>"></script>
                <!-- Flatpickr -->
                <script src="<?php Nav::printURL($dir, 'assets/vendor/flatpickr/flatpickr.min.js'); ?>"></script>
                <script src="<?php Nav::printURL($dir, 'assets/js/flatpickr.js'); ?>"></script>
<?php
        }
    }