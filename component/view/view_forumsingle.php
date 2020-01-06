<?php
    class ForumSingleView{
        public static function initView($dir, $sess, $paths, $api, $forumSingle){
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
                             
                            <h1 class="h2 mb-2"><?php echo $forumSingle->title; ?></h1>
                            <p class="text-muted d-flex align-items-center mb-4">
                                  <a href="<?php Nav::echoURL($dir, App::$pageForums) ?>" class="mr-3">กลับไปหน้าบทความทั้งหมด</a> 
                                 <!--<a href="#" class="mr-2 text-black-50">Mute</a>
                                 <a href="#" class="mr-2 text-black-50">Report</a> 
                                <a href="#" class="text-black-50" style="text-decoration: underline;">Edit</a>-->
                            </p>

                            <div class="card card-body">
                                <div class="d-flex">
                                    <a  class="avatar mr-3">
                                        <img src="<?php Asset::echoIcon($dir, $forumSingle->thumbnail)  ?>" alt="people" class="avatar-img rounded-circle">
                                    </a>
                                    <div class="flex">
                                        <p class="d-flex align-items-center mb-2">
                                            <a  class="text-body mr-2"><strong><?php echo $forumSingle->author->username; ?></strong></a>
                                            <small class="text-muted"><?php echo $forumSingle->date; ?></small>
                                        </p>
                                        <p><?php echo $forumSingle->content; ?></p>
                                         
                                        <div class="d-flex align-items-center">
                                            <a href="" class="text-black-50 d-flex align-items-center text-decoration-0"><i class="material-icons mr-1"  >arrow_drop_up</i> <?php echo $forumSingle->upvote; ?></a>
                                            <a href="" class="text-black-50 d-flex align-items-center text-decoration-0 ml-3"><i class="material-icons mr-1" >arrow_drop_down</i><?php echo $forumSingle->downvote; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="card-body" action="<?php Nav::echoURL($dir, App::$routeForum . '?m=submitComment') ?>" method="POST">
                            <div class="d-flex mb-4">
                           
                            <input type="hidden" name="authorID" value="<?php echo $auth->ID ?>">
                            <input type="hidden" name="forumID" value="<?php echo $forumSingle->ID ?>">
                                <div class="flex">
                                    <div class="form-group">
                                        <label for="comment" class="form-label">เขียนคอมเมนต์</label>
                                        <textarea class="form-control" name="content" id="comment" rows="3" placeholder="เขียนข้อความคอมเมนต์"></textarea>
                                    </div>
                                    <button class="btn btn-success" type="submit">โพสคอมเมนต์</button>
                                </div>
                            </div>
                            </form>
                            <div class="pt-3">
                                <h4><?php echo $forumSingle->comment ?> คอมเมนต์</h4>
                                <?php 
                                $result = FunForum::getCommentsByForumID($api, $forumSingle->ID);  
                                $forumComment = $result->response;
                                Console::log("asdasdasd",$forumComment);
                                ?>
                                <?php foreach($forumComment as $key => $comment){ ?> 
                                <?php
                                     $result = FunAuth::getSingleFull($api, $comment->authorID); 
                                     $commentUser= $result->response; 
                                     Console::log("c",$commentUser);
                                    $name = $commentUser->auth->username;
                                    $pic = $commentUser->auth->profile_pic;
                                ?>
                                <div class="d-flex mb-3">
                                    <a   class="avatar avatar-xs mr-3">
                                        <img src="<?php Asset::echoIcon($dir, $pic)  ?>" alt="people" class="avatar-img rounded-circle">
                                    </a>
                                    <div class="flex">
                                        <a href="fixed-student-profile.html" class="text-body"><strong><?php echo $name; ?></strong></a>
                                        <span class="text-black-70"><?php echo $comment->content; ?></span><br>
                                       
                                        <div class="d-flex align-items-center">
                                            <small class="text-black-50 mr-2"><?php echo $comment->date; ?></small>
                                           <!-- <a href="" class="text-black-50"><small>Liked</small></a> -->
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>        
                                 
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