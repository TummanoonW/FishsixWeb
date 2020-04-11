<?php
    class ForumSingleView{
        public static function initView($dir, $sess, $paths, $api, $forum, $comments, $myVote){
            $auth = $sess->getAuth();
            $id = $forum->ID;
            $data = (object)array(
                'auth' => $auth,
                'forum' => $forum,
                'myVote' => $myVote
            );
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
                                        <div class="col-md-12">
                                            <h1 class="h2 mb-2"><?php echo $forum->title ?></h1>
                                            <p class="text-muted d-flex align-items-center mb-4">
                                                <a href="<?php Nav::echoURL($dir, App::$pageForums) ?>" class="mr-3">กลับไปหน้าบทความ</a>
                                                <?php if($sess->checkUserAdmin() || $auth->ID == $forum->authorID){ ?>
                                                    <a href="#" onclick="confirmDelete('<?php Nav::echoURL($dir, App::$routeForum . '?m=delete&id=' . $id) ?>')" class="text-black-50" style="text-decoration: underline;">ลบ</a>
                                                <?php } ?>
                                                <?php if(isset($auth->ID))if($auth->ID == $forum->authorID){ ?>
                                                    <a href="<?php Nav::echoURL($dir, App::$pageEditForum . "?id=$id") ?>" class="text-black-50 ml-3" style="text-decoration: underline;">แก้ไข</a>
                                                <?php } ?>
                                            </p>

                                            <div class="card card-body">
                                                <div class="d-flex">
                                                    <a href="" class="avatar avatar-online mr-3">
                                                        <img src="<?php Asset::echoIcon($dir, $forum->author->profile_pic) ?>" alt="<?php echo $forum->author->username ?>" class="avatar-img rounded-circle">
                                                    </a>
                                                    <div class="flex">
                                                        <p class="d-flex align-items-center mb-2">
                                                            <a href="#" class="text-body mr-2"><strong><?php $forum->author->username ?></strong></a>
                                                            <small class="text-muted"><?php echo $forum->date ?></small>
                                                        </p>
                                                        <p><?php echo $forum->content ?></p>
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" onclick="upvoteForum()" class="text-black-50 d-flex align-items-center text-decoration-0"><i id="upvote-icon" class="material-icons mr-1" style="font-size: inherit;">thumb_up</i> <span id="upvote"><?php echo $forum->upvote ?></span></a>
                                                            <a href="#" onclick="downvoteForum()" class="text-black-50 d-flex align-items-center text-decoration-0 ml-3"><i id="downvote-icon" class="material-icons mr-1" style="font-size: inherit;">thumb_down</i> <span id="downvote"><?php echo $forum->downvote ?></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($sess->checkUserExisted()){ ?>
                                                <div class="d-flex mb-4">
                                                    <a href="#" class="avatar mr-3">
                                                        <img src="<?php Asset::echoIcon($dir, $auth->profile_pic) ?>" alt="" class="avatar-img rounded-circle">
                                                    </a>
                                                    <div class="flex">
                                                        <div class="form-group">
                                                            <label for="comment" class="form-label">แสดงความคิดเห็น</label>
                                                            <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="กรอกความคิดเห็นของคุณตรงนี้ ..."></textarea>
                                                        </div>
                                                        <button onclick="postComment('#comment')" class="btn btn-success">ส่งความคิดเห็น</button>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="pt-3">
                                                <h4 id="comment"><?php echo count($comments) ?> ความคิดเห็น</h4>
                                                <div id="comments-sec">
                                                    <?php self::initComments($dir, $comments, $sess) ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--<h4>ผู้ตั้งกระทู้ยอดนิยม</h4>
                                            <p class="text-black-70">People who started the most discussions on LearnPlus.</p>
                                            <div class="mb-4">
                                                <div class="d-flex align-items-center mb-2">
                                                    <a href="fixed-student-profile.html" class="avatar avatar-xs mr-3">
                                                        <img src="assets/images/people/50/guy-1.jpg" alt="course" class="avatar-img rounded-circle">
                                                    </a>
                                                    <a href="fixed-student-profile.html" class="flex mr-2 text-body"><strong>Luci Bryant</strong></a>
                                                    <span class="text-black-70 mr-2">105</span>
                                                    <i class="text-muted material-icons font-size-16pt">forum</i>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <a href="fixed-student-profile.html" class="avatar avatar-xs mr-3">
                                                        <img src="assets/images/people/50/guy-2.jpg" alt="course" class="avatar-img rounded-circle">
                                                    </a>
                                                    <a href="fixed-student-profile.html" class="flex mr-2 text-body"><strong>Magnus Goldsmith</strong></a>
                                                    <span class="text-black-70 mr-2">93</span>
                                                    <i class="text-muted material-icons font-size-16pt">forum</i>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <a href="fixed-student-profile.html" class="avatar avatar-xs mr-3">
                                                        <img src="assets/images/people/50/woman-1.jpg" alt="course" class="avatar-img rounded-circle">
                                                    </a>
                                                    <a href="fixed-student-profile.html" class="flex mr-2 text-body"><strong>Katelyn Rankin</strong></a>
                                                    <span class="text-black-70 mr-2">55</span>
                                                    <i class="text-muted material-icons font-size-16pt">forum</i>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <a href="fixed-student-profile.html" class="avatar avatar-xs mr-3">
                                                        <img src="assets/images/256_rsz_nicolas-horn-689011-unsplash.jpg" alt="course" class="avatar-img rounded-circle">
                                                    </a>
                                                    <a href="fixed-student-profile.html" class="flex mr-2 text-body"><strong>Jenell D. Matney</strong></a>
                                                    <span class="text-black-70 mr-2">32</span>
                                                    <i class="text-muted material-icons font-size-16pt">forum</i>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <a href="fixed-student-profile.html" class="avatar avatar-xs mr-3">
                                                        <img src="assets/images/256_rsz_sharina-mae-agellon-377466-unsplash.jpg" alt="course" class="avatar-img rounded-circle">
                                                    </a>
                                                    <a href="fixed-student-profile.html" class="flex mr-2 text-body"><strong>Sherri J. Cardenas</strong></a>
                                                    <span class="text-black-70 mr-2">21</span>
                                                    <i class="text-muted material-icons font-size-16pt">forum</i>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <a href="fixed-student-profile.html" class="avatar avatar-xs mr-3">
                                                        <img src="assets/images/256_rsz_karl-s-973833-unsplash.jpg" alt="course" class="avatar-img rounded-circle">
                                                    </a>
                                                    <a href="fixed-student-profile.html" class="flex mr-2 text-body"><strong>Joseph S. Ferland</strong></a>
                                                    <span class="text-black-70 mr-2">16</span>
                                                    <i class="text-muted material-icons font-size-16pt">forum</i>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
                
                <script id="data"><?php echo json_encode($data) ?></script>

                <?php Script::customScript($dir, 'common.js') ?>
                <?php Script::customScript($dir, 'viewforum.js') ?>
                
<?php
        }

        private static function initComments($dir, $comments, $sess){
            foreach ($comments as $key => $value) {
                if(isset($value->author)) $author = $value->author;
                else $author = (object)array(
                    'profile_pic' => '',
                    'username' => 'ผู้ใช้ที่ไม่รู้จัก'
                );
?>
                <div class="d-flex ml-1 mt-3 border rounded p-3 bg-light mb-3">
                    <a href="#" class="avatar avatar-xs mr-3">
                        <img src="<?php Asset::echoIcon($dir, $author->profile_pic) ?>" alt="<?php echo $author->username ?>" class="avatar-img rounded-circle">
                    </a>
                    <div class="flex">
                        <div class="media">
                            <div class="media-body">
                                <a href="#" class="text-body"><strong><?php echo $author->username ?></strong></a>
                            </div>
                            <div class="media-right text-right">
                                <?php if($value->authorID == $auth->ID || $sess->checkUserAdmin()){ ?>
                                    <a href="#" onclick="confirmDelete('<?php Nav::echoURL($dir, App::$routeForum . '?m=deleteComment&id=' . $id) ?>')" class="text-black-50" style="text-decoration: underline;">ลบ</a>
                                <?php } ?>
                            </div>
                        <div>
                        <span class="text-black-70"><?php echo $value->content ?></span><br>
                        <div class="d-flex align-items-center">
                            <small class="text-black-50 mr-2"><?php echo $value->date ?></small>
                        </div>
                    </div>
                </div>
<?php
            }
        }
    }