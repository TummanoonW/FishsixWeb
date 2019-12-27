<?php
    class ForumSingleView{
        public static function initView($dir, $sess, $paths, $api){
            $auth = $sess->getAuth();
           
?>  
            <body class="layout-fluid">
                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir, '', $sess) ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content" style="padding-top: 64px">

                    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                        <div class="mdk-drawer-layout__content page ">
                            <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>
                                    
                                    <div class="media mb-headings align-items-center">
                                    <div class="row">
                        <div class="col-md-8">

                            <h1 class="h2 mb-2">Can someone help me with the basic setup of a Vue.js and Vuex project using Nuxt?</h1>
                            <p class="text-muted d-flex align-items-center mb-4">
                                <a href="fixed-student-forum.html" class="mr-3">Back to Community</a>
                                <a href="#" class="mr-2 text-black-50">Mute</a>
                                <a href="#" class="mr-2 text-black-50">Report</a>
                                <a href="#" class="text-black-50" style="text-decoration: underline;">Edit</a>
                            </p>

                            <div class="card card-body">
                                <div class="d-flex">
                                    <a href="" class="avatar avatar-online mr-3">
                                        <img src="assets/images/256_rsz_nicolas-horn-689011-unsplash.jpg" alt="people" class="avatar-img rounded-circle">
                                    </a>
                                    <div class="flex">
                                        <p class="d-flex align-items-center mb-2">
                                            <a href="fixed-student-profile.html" class="text-body mr-2"><strong>Jenell D. Matney</strong></a>
                                            <small class="text-muted">2 min ago</small>
                                        </p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores beatae quisquam iste maiores libero, corrupti totam saepe itaque quidem perspiciatis?</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos culpa commodi consequuntur! Optio labore corporis quo a quia, incidunt unde soluta velit ad, eius exercitationem sequi ab laborum! Nostrum voluptate earum sit aperiam quaerat unde, vel excepturi quisquam nihil reprehenderit in minus laudantium eligendi odio iusto nemo, aspernatur, optio soluta!</p>
                                        <div class="d-flex align-items-center">
                                            <a href="" class="text-black-50 d-flex align-items-center text-decoration-0"><i class="material-icons mr-1"  >arrow_drop_up</i> 30</a>
                                            <a href="" class="text-black-50 d-flex align-items-center text-decoration-0 ml-3"><i class="material-icons mr-1" >arrow_drop_down</i> 130</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex mb-4">
                                <a href="fixed-student-profile.html" class="avatar mr-3">
                                    <img src="assets/images/people/50/guy-6.jpg" alt="people" class="avatar-img rounded-circle">
                                </a>
                                <div class="flex">
                                    <div class="form-group">
                                        <label for="comment" class="form-label">Your reply</label>
                                        <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Type here to reply to Matney ..."></textarea>
                                    </div>
                                    <button class="btn btn-success">Post comment</button>
                                </div>
                            </div>
                            <div class="pt-3">
                                <h4>2 Comments</h4>
                                <div class="d-flex mb-3">
                                    <a href="fixed-student-profile.html" class="avatar avatar-xs mr-3">
                                        <img src="assets/images/256_rsz_karl-s-973833-unsplash.jpg" alt="people" class="avatar-img rounded-circle">
                                    </a>
                                    <div class="flex">
                                        <a href="fixed-student-profile.html" class="text-body"><strong>Joseph S. Ferland</strong></a>
                                        <span class="text-black-70">How can I load Charts on a page?</span><br>
                                        <span class="text-black-50">on <a href="fixed-student-take-course.html" class="text-black-50" style="text-decoration: underline;">Data Visualization With Chart.js</a></span><br>
                                        <div class="d-flex align-items-center">
                                            <small class="text-black-50 mr-2">27 min ago</small>
                                            <a href="" class="text-black-50"><small>Liked</small></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex ml-sm-32pt mt-3 border rounded p-3 bg-light mb-3">
                                    <a href="#" class="avatar avatar-xs mr-3">
                                        <img src="assets/images/people/110/guy-6.jpg" alt="Guy" class="avatar-img rounded-circle">
                                    </a>
                                    <div class="flex">
                                        <div class="d-flex align-items-center">
                                            <a href="fixed-student-profile.html" class="text-body"><strong>FrontendMatter</strong></a>
                                            <small class="ml-auto text-muted">just now</small>
                                        </div>
                                        <p class="mt-1 mb-0 text-black-70">Hi Joseph,<br> Thank you for purchasing our course! <br><br>Please have a look at the charts library documentation <a href="#">here</a> and follow the instructions.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                                     
                                        
                                    </div>
                                     
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
                
<?php
        }
    }