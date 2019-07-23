<?php
    class CourseView{
        public static function initView($dir, $paths, $course){
            $auth = Session::getAuth();
?>
            <body class="layout-fluid">

                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir); ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir); ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content" style="padding-top: 64px;">

                    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                        <div class="mdk-drawer-layout__content page ">
                            <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php NavPath::initNavPath($dir, $paths); ?>
                                    
                                    <h1 class="h2"><?php echo $course->title ?></h1>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0" allowfullscreen=""></iframe>
                                                </div>
                                                <div class="card-body">
                                                    <?php echo $course->description_short; ?>
                                                </div>
                                            </div>

                                            <!-- Lessons -->
                                            <ul class="card list-group list-group-fit">
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <div class="text-muted">1.</div>
                                                        </div>
                                                        <div class="media-body">
                                                            <a href="#">Installation</a>
                                                        </div>
                                                        <div class="media-right">
                                                            <small class="text-muted-light">2:03</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item active">
                                                    <div class="media">
                                                        <div class="media-left">2.</div>
                                                        <div class="media-body">
                                                            <a class="text-white" href="#">The MVC architectural pattern</a>
                                                        </div>
                                                        <div class="media-right">
                                                            <small>25:01</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <div class="text-muted">3.</div>
                                                        </div>
                                                        <div class="media-body">
                                                            <a href="#">Database Models</a>
                                                        </div>
                                                        <div class="media-right">
                                                            <small class="text-muted-light">12:10</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <div class="text-muted">4.</div>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="text-muted-light">Database Access</div>
                                                        </div>
                                                        <div class="media-right">
                                                            <small class="badge badge-primary ">PRO</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <div class="text-muted">5.</div>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="text-muted-light">Eloquent Basics</div>
                                                        </div>
                                                        <div class="media-right">
                                                            <small class="badge badge-primary ">PRO</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <div class="text-muted">6.</div>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="text-muted-light">Take Quiz</div>
                                                        </div>
                                                        <div class="media-right">
                                                            <small class="badge badge-primary ">PRO</small>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                        <div class="col-md-4">

                                            <!-- Pricing Card -->
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <p>
                                                        <a href="#" class="btn btn-outline-danger btn-block flex-column">
                                                            <i class="material-icons">favorite</i> Add to Wish List
                                                        </a>
                                                    </p>
                                                    <div class="page-separator">
                                                        <div class="page-separator__text">OR</div>
                                                    </div>
                                                    <a href="<?php Nav::printURL($dir, Nav::$routeMyCart . "?m=add&id=$course->ID"); ?>" class="btn btn-success btn-block flex-column">
                                                        Purchase Course
                                                        <strong>starts at &#3647;<?php echo $course->minPrice; ?></strong>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="media align-items-center">
                                                        <div class="media-left">
                                                            <img src="<?php Nav::printURL($dir,'assets/images/people/110/guy-6.jpg') ?> " alt="About Adrian" width="50" class="rounded-circle">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="card-title"><a href="<?php Nav::printURL($dir,'student-profile.html'); ?> ">Adrian Demian</a></h4>
                                                            <p class="card-subtitle">Instructor</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <p>Having over 12 years exp. Adrian is one of the lead UI designers in the industry Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, aut.</p>
                                                    <a href="" class="btn btn-light"><i class="fab fa-facebook"></i></a>
                                                    <a href="" class="btn btn-light"><i class="fab fa-twitter"></i></a>
                                                    <a href="" class="btn btn-light"><i class="fab fa-github"></i></a>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <ul class="list-group list-group-fit">
                                                    <li class="list-group-item">
                                                        <div class="media align-items-center">
                                                            <div class="media-left">
                                                                <i class="material-icons text-muted-light">assessment</i>
                                                            </div>
                                                            <div class="media-body">
                                                                Beginner
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="media align-items-center">
                                                            <div class="media-left">
                                                                <i class="material-icons text-muted-light">schedule</i>
                                                            </div>
                                                            <div class="media-body">
                                                                2 <small class="text-muted">hrs</small> &nbsp; 26 <small class="text-muted">min</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Ratings</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="rating">
                                                        <i class="material-icons">star</i>
                                                        <i class="material-icons">star</i>
                                                        <i class="material-icons">star</i>
                                                        <i class="material-icons">star</i>
                                                        <i class="material-icons">star_border</i>
                                                    </div>
                                                    <small class="text-muted">20 ratings</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir); ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir); ?>

<?php
        }
    }
?>