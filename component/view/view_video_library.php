<?php
    class VideoLibraryView{
        public static function initView($dir, $sess, $paths, $latest, $categories, $isAllowed){
			$auth = $sess->getAuth();
			$first = $latest[0];
            ?>
            	<body>
		<div >
            
        <?php Toolbar::initToolbarSKRN($dir, '', $sess) ?>
		

	
		<main>

			<div class="flexslider progression-studios-dashboard-slider">
		      	<ul class="slides">
			  		<?php self::initSlide($dir, $latest) ?>		
				</ul>
			</div><!-- close .progression-studios-slider - See /js/script.js file for options -->
			
			<div class="clearfix"></div>
			
			<div class="dashboard-container mt-5">
				
				<?php self::initSectionSKRN($dir, $categories) ?>
				
				
				<!--<ul class="page-numbers">
					<li><a class="previous page-numbers" href="#!"><i class="fas fa-chevron-left"></i></a></li>
					<li><span class="page-numbers current">1</span></li>
					<li><a class="page-numbers" href="#!">2</a></li>
					<li><a class="page-numbers" href="#!">3</a></li>
					<li><a class="page-numbers" href="#!">4</a></li>
					<li><a class="next page-numbers" href="#!"><i class="fas fa-chevron-right"></i></a></li>
				</ul>-->
				
						
			</div><!-- close .dashboard-container -->
		</main>
		
		
		</div><!-- close #sidebar-bg-->
                <?php Script::initScript($dir) ?>
                <?php Script::customScript($dir, 'common.js') ?>
                <?php Script::customScript($dir, 'video-library.js') ?>
            <?php
        }

        private static function initSection($dir, $categories){
            foreach ($categories as $key => $value) {
            ?>
                <div id="row" class="col-12 mt-4 mb-5">
                    <div class="media">
                        <div class="media-body"><h4 class="text-secondary"><?php echo $value->title ?></h4></div>
                        <div class="media-right text-right"><a href="<?php Nav::echoURL($dir, App::$pageVideoPlaylist . "?id=$value->ID") ?>" class="text-primary">ดูทั้งหมด</a></div>
                    </div>
                    <div class="row">
                        <?php self::initCard($dir, $value->videos) ?>
                    </div>
                </div>
            <?php
            }
		}
		
		private static function initCardSKRN($dir,$videos){
			foreach ($videos as $key => $value) {
				?>
				<div class="col-12 col-md-6 col-lg-4 col-xl-3">
						<div class="item-listing-container-skrn">
							<a href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $value->ID) ?>">
							<img src="https://i1.ytimg.com/vi/<?php echo $value->youtube_id ?>/mqdefault.jpg" alt="Listing"></a>
							<div class="item-listing-text-skrn">
								<div class="item-listing-text-skrn-vertical-align"><h6><a href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $value->ID) ?>"><?php echo $value->title ?></a></h6>
							      	<div>
								  		<span style="color:#42b740;"><i class="far fa-eye mr-2"></i><?php echo $value->views ?></span>
									</div>
								</div><!-- close .item-listing-text-skrn-vertical-align -->
							</div><!-- close .item-listing-text-skrn -->
						</div><!-- close .item-listing-container-skrn -->
					</div><!-- close .col -->

				<?php
			}
		}


		private static function initSlide($dir, $latest){
			foreach ($latest as $key => $value) {
				?>
					<li class="progression_studios_animate_left">
						<div class="progression-studios-slider-dashboard-image-background" style="background-image:url(https://i1.ytimg.com/vi/<?php echo $value->youtube_id ?>/hqdefault.jpg);">
							<div class="progression-studios-slider-display-table">
								<div class="progression-studios-slider-vertical-align">
									<div class="container">
										<a class="progression-studios-slider-play-btn afterglow" href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $value->ID) ?>"><i class="fas fa-play mt-4"></i></a>
							        	<!--<video id="VideoLightbox-<?php echo $key ?>" data-youtube-id="<?php echo $value->youtube_id ?>"  poster="https://i1.ytimg.com/vi/<?php echo $value->youtube_id ?>/mqdefault.jpg" width="960" height="540"></video>
								    	<div
								    	  class="circle-rating-pro"
								    	  data-value="0.86"
								    	  data-animation-start-value="0.86"
								    	  data-size="70"
								    	  data-thickness="6"
								    	  data-fill="{
								    	    &quot;color&quot;: &quot;#42b740&quot;
								    	  }"
								    	  data-empty-fill="#def6de"
								    	  data-reverse="true"
								    	><span style="color:#42b740;">8.6</span></div>-->
										<div class="progression-studios-slider-dashboard-caption-width">
											<div class="progression-studios-slider-caption-align" style="background: rgb(255, 255, 255, 0.9);padding: 32px;">
												<h6>รายการที่แนะนำ</h6>
												<ul class="progression-studios-slider-rating">
													<li>PG-13</li><li>HD</li>
												</ul>
												<h2><a href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $value->ID) ?>"><?php echo $value->title ?></a></h2>
												<ul class="progression-studios-slider-meta">
													<li><?php self::printDate($value->date) ?></li>
													<!--<li>163 min.</li>
													<li>Documentary</li>-->
												</ul>
												<p class="progression-studios-slider-description"><?php echo $value->title ?></p>
												
												<a class="btn btn-green-pro btn-slider-pro btn-shadow-pro afterglow" href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $value->ID) ?>"><i class="fas fa-play"></i> เล่นวิดีโอ</a>
												
												
												<!--<div class="progression-studios-slider-more-options">
													<i class="fas fa-ellipsis-h"></i>
													<ul>
														<li><a href="#!">Add to Favorites</a></li>
														<li><a href="#!">Add to Watchlist</a></li>
														<li><a href="#!">Add to Playlist</a></li>
														<li><a href="#!">Share...</a></li>
														<li><a href="#!">Write A Review</a></li>
													</ul>
												</div>-->
												<div class="clearfix"></div>      
									
												<!--<h5>Starring</h5>
												<ul class="progression-studios-staring-slider">
													<li><a href="#!"><img src="<?php Asset::echoImage($dir, 'assets/images/skrn/demo/user-1.jpg') ?>" alt="Starring"></a></li>
													<li><a href="#!"><img src="<?php Asset::echoImage($dir, 'assets/images/skrn/demo/user-2.jpg') ?>" alt="Starring"></a></li>	
													<li><a href="#!"><img src="<?php Asset::echoImage($dir, 'assets/images/skrn/demo/user-3.jpg') ?>" alt="Starring"></a></li>	
													<li><a href="#!"><img src="<?php Asset::echoImage($dir, 'assets/images/skrn/demo/user-4.jpg') ?>" alt="Starring"></a></li>	
													<li><a href="#!"><img src="<?php Asset::echoImage($dir, 'assets/images/skrn/demo/user-5.jpg') ?>" alt="Starring"></a></li>	
													<li><a href="#!"><img src="<?php Asset::echoImage($dir, 'assets/images/skrn/demo/user-6.jpg') ?>" alt="Starring"></a></li>													
												</ul>-->
												
											</div><!-- close .progression-studios-slider-caption-align -->
										</div><!-- close .progression-studios-slider-caption-width -->
									
									</div><!-- close .container -->
								
								</div><!-- close .progression-studios-slider-vertical-align -->
							</div><!-- close .progression-studios-slider-display-table -->
						
							<div class="progression-studios-slider-mobile-background-cover-dark"></div>
						</div><!-- close .progression-studios-slider-image-background -->
					</li>	
				<?php
			}
		}

		private static function printDate($dstr){
			$d = CustomDate::getDate($dstr);
			echo $d->format('d F, Y');
		}

		private static function initSectionSKRN($dir,$categories){
			foreach ($categories as $key => $value) {
				?>
				<div class="media">
					<div class="media-body">
						<h4 class="heading-extra-margin-bottom"><?php echo $value->title  ?></h4>
					</div>
					<div class="media-right">
						<a href="<?php Nav::echoURL($dir, App::$pageVideoPlaylist . "?id=$value->ID") ?>" class="">ดูทั้งหมด</a>
					</div>
				</div>
				<div class="row">
					<?php
					self::initCardSKRN($dir,$value->videos)
					?>
				</div><!-- close .row -->

				<?php
			}
		}

		private static function initCategories($dir,$categories){
			foreach ($categories as $key => $value) {
				?>
				<li class="">
					
					<a href="<?php Nav::echoURL($dir, App::$pageVideoPlaylist . "?id=$value->ID") ?>" class="btn btn-green-pro afterglow"><?php echo $value->title ?></a>
					
								</li>
				<?php
			}
			
		}

        private static function initCard($dir, $videos){
            foreach ($videos as $key => $value) {
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card bg-dark text-white" style="border: 1px solid black;">
                            <a href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $value->ID) ?>">
                                <img src="https://i1.ytimg.com/vi/<?php echo $value->youtube_id ?>/mqdefault.jpg" class="card-img" alt="...">
                            </a>
                          <div class="card-body">
                            <h5 class="card-title text-muted"><?php echo $value->title ?></h5>
                            <a href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $value->ID) ?>" class="btn btn-primary"><i class="fas fa-play mr-2"></i>ดูวิดีโอ</a>

                            <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                          </div>
                        </div>
                    </div>
                <?php
            }
        }
    }

?>