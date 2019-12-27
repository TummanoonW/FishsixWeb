<?php
    class ForumView{
        public static function initView($dir, $sess, $paths, $top, $api, $forumAll){
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
                                        <div class="media-body">
                                            <h1 class="h2">บทความ</h1>
                                        </div>
                                        <div class="media-right">
                                        <div class="d-flex align-items-center mb-4">
                             
                                <a href="<?php Nav::echoURL($dir, App::$pageWriteForum); ?>" class="btn btn-success">เขียนบทความ</a>
                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="card">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h4 class="card-title">ยอดนิยม</h4>
                                       
                                        </div>
                                        <div class="media-right">
                                      
                                        </div>
                                    </div>
                                </div>


                                
                                <ul class="list-group list-group-fit">
                                   
                                    <?php if($top != null) foreach($top as $key => $topic){?>
                                    <li class="list-group-item forum-thread">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <div class="forum-icon-wrapper">
                                                    <a href="fixed-student-forum-thread.html" class="forum-thread-icon">
                                                        <i class="material-icons">description</i>
                                                    </a>
                                                    <a href="fixed-student-profile.html" class="forum-thread-user">
                                                        <img src="assets/images/people/50/guy-1.jpg" alt="" width="20" class="rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex align-items-center">
                                                     <?php 
                                                     $result = FunAuth::getUserByAuthID($api, $topic->authorID); 
                                                     $topicUser = $result->response; 
                                                     if($topicUser != null){
                                                     $name = $topicUser->fname;
                                                    }
                                                     ?>
                                                    <a href="fixed-student-profile.html" class="text-body"><strong> <?php echo $name; ?></strong></a>
                                                    <medium class="ml-auto text-muted"><?php echo $topic->date; ?></medium>
                                                    <i class="material-icons pl-3 text-muted">arrow_drop_up</i></a>
                                                    <div class="media-right text-muted"> 500 </div>
                                                    <i class="material-icons pl-3 text-muted">arrow_drop_down0</i></a>
                                                    <div class="media-right text-muted"> 500 </div>
                                                </div>
                                                <a class="text-black-70" href="fixed-student-forum-thread.html"><?php echo $topic->title; ?></a>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                    </ui>

                                     

                            <div class="card">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h4 class="card-title">ทั่วไป</h4>
                                  
                                        </div>
                                        <div class="media-right">
                                             
                                        </div>
                                    </div>
                                </div>



                                <ul class="list-group list-group-fit">

                                <?php foreach($forumAll as $key => $forum) {?>
                                    <li class="list-group-item forum-thread">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <div class="forum-icon-wrapper">
                                                    <a href="fixed-student-forum-thread.html" class="forum-thread-icon">
                                                        <i class="material-icons">description</i>
                                                    </a>
                                                    <a href="fixed-student-profile.html" class="forum-thread-user">
                                                        <img src="assets/images/256_rsz_nicolas-horn-689011-unsplash.jpg" alt="" width="20" class="rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex align-items-center">
                                                    <a href="fixed-student-profile.html" class="text-body"><strong>สุรัฐ สุวรรณสิทธิ์</strong></a>
                                                    <medium class="ml-auto text-muted">24/12/2562</medium>
                                                    <i class="material-icons pl-3 text-muted">arrow_drop_up</i></a>
                                                    <div class="media-right text-muted"> 500 </div>
                                                    <i class="material-icons pl-3 text-muted">arrow_drop_down</i></a>
                                                    <div class="media-right text-muted"> 500 </div>
                                                </div>
                                                <a class="text-black-70" href="fixed-student-forum-thread.html">เทสเทสเทส</a>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>


                                   

                                </ul>
                            </div>


                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center pagination-sm ">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true" class="material-icons">chevron_left</span>
                                            <span>Prev</span>
                                        </a>
                                    </li>

                                    <li class="page-item active">
                                        <a class="page-link" href="#" aria-label="1">
                                            <span>1</span>
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="2">
                                            <span>2</span>
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span>Next</span>
                                            <span aria-hidden="true" class="material-icons">chevron_right</span>
                                        </a>
                                    </li>

                                </ul>
                            </nav>
 
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