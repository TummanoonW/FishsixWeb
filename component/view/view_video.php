<?php
    class VideoView{
        public static function initView($dir, $sess, $paths, $category, $video, $isAllowed, $videos){
            ?>
            	<body>
		<div id="sidebar-bg">	
            <?php Toolbar::initToolbarSKRN($dir, '', $sess) ?>
            <nav id="sidebar-nav"><!-- Add class="sticky-sidebar-js" for auto-height sidebar -->
            <ul id="vertical-sidebar-nav" class="sf-menu">
              <li class="normal-item-pro">
                <a href="dashboard-home.html">
						<span class="icon-Old-TV"></span>
                  TV Series
                </a>
              </li>
              <li class="normal-item-pro">
                <a href="dashboard-movies.html">
						<span class="icon-Reel"></span>
                  Movies
                </a>
              </li>
              <li class="normal-item-pro current-menu-item">
                <a href="dashboard-playlists.html">
						<span class="icon-Movie"></span>
                  Playlists
                </a>
              </li>
              <li class="normal-item-pro">
                <a href="dashboard-new-arrivals.html">
						<span class="icon-Movie-Ticket"></span>
                  New Arrivals
                </a>
              </li>
              <li class="normal-item-pro">
                <a href="dashboard-coming-soon.html">
						<span class="icon-Clock"></span>
                  Coming Soon
                </a>
              </li>

            </ul>
				<div class="clearfix"></div>
		</nav>
		    <main id="col-main">
			
			<div id="movie-detail-header-pro" style="background-image:url('https://i1.ytimg.com/vi/<?php echo $video->youtube_id ?>/mqdefault.jpg')">
				
				<div class="progression-studios-slider-more-options">
					<i class="fas fa-ellipsis-h"></i>
					<ul>
						<li><a href="#!">Add to Favorites</a></li>
						<li><a href="#!">Add to Watchlist</a></li>
						<li><a href="#!">Add to Playlist</a></li>
						<li><a href="#!">Share...</a></li>
						<li><a href="#!">Write A Review</a></li>
					</ul>
				</div>
				
				<a class="movie-detail-header-play-btn afterglow" href="#VideoLightbox-1"><i class="fas fa-play"></i></a>
				
	         <video id="VideoLightbox-1" data-youtube-id="<?php echo $video->youtube_id ?>"  poster="https://i1.ytimg.com/vi/<?php echo $video->youtube_id ?>/mqdefault.jpg" width="960" height="540"></video>
				
				<div id="movie-detail-header-media">
					<div class="dashboard-container">
						<h5>บทเรียนต่อไป</h5>						
						<div class="row">
							<?php self::initCardSKRN($dir, $videos) ?>
						</div><!-- close .row -->
					</div><!-- close .dashboard-container -->
				</div><!-- close #movie-detail-header-media -->
				
				<div id="movie-detail-gradient-pro"></div>
			</div><!-- close #movie-detail-header-pro -->
			
			
			<div id="movie-detail-rating">
				<div class="dashboard-container">
					<div class="row">
						<div class="col-sm">
							<h5>คะแนน <?php echo $video->title ?></h5>
							
							<div class="rating-pro">
   							  <label>
   							    <input type="radio" name="rating-pro" value="10" title="10 stars"> 10
   							  </label>
  							  <label>
  							    <input type="radio" name="rating-pro" value="9" title="9 stars"> 9
  							  </label>
  							  <label>
  							    <input type="radio" name="rating-pro" value="8" title="8 stars"> 8
  							  </label>
  							  <label>
  							    <input type="radio" name="rating-pro" value="7" title="7 stars"> 7
  							  </label>
 							  <label>
 							    <input type="radio" name="rating-pro" value="6" title="6 stars"> 6
 							  </label>
							  <label>
							    <input type="radio" name="rating-pro" value="5" title="5 stars"> 5
							  </label>
							  <label>
							    <input type="radio" name="rating-pro" value="4" title="4 stars"> 4
							  </label>
							  <label>
							    <input type="radio" name="rating-pro" value="3" title="3 stars"> 3
							  </label>
							  <label>
							    <input type="radio" name="rating-pro" value="2" title="2 stars"> 2
							  </label>
							  <label>
							    <input type="radio" name="rating-pro" value="1" title="1 star"> 1
							  </label>
							</div>
							
						</div>
						<div class="col-sm">
							<h6>User Rating</h6>
					      <div
					        class="circle-rating-pro"
					        data-value="0.86"
					        data-animation-start-value="0.86"
					        data-size="40"
					        data-thickness="3"
					        data-fill="{
					          &quot;color&quot;: &quot;#42b740&quot;
					        }"
					        data-empty-fill="#def6de"
					        data-reverse="true"
					      ><span style="color:#42b740;">8.6</span></div>
							<div class="clearfix"></div>
						</div>
					</div><!-- close .row -->
				</div><!-- close .dashboard-container -->
			</div><!-- close #movie-detail-rating -->
			
			    <div class="dashboard-container">
				
				
				    <div class="movie-details-section">
				    	<h2><?php echo $video->title ?></h2>
				    	<p><?php echo $video->content ?></p>
				    </div><!-- close .movie-details-section -->

				
				
			    </div><!-- close .dashboard-container -->
		    </main>
		
		
		</div>
        <?php Script::initScript($dir) ?>
                <?php Script::customScript($dir, 'common.js') ?>
        <?php
        }

        private static function initCardSKRN($dir, $videos){
            foreach ($videos as $key => $value) {
                if($key < 3){
            ?>
            <div class="col-6 col-md-4 col-lg-4">
				<a class="movie-detail-media-link afterglow">
					<div class="movie-detail-media-image">
						<img src="https://i1.ytimg.com/vi/<?php echo $value->youtube_id ?>/mqdefault.jpg">
						<span><i class="fas fa-play"></i></span>
						<h6><?php echo $value->title ?></h6>
					</div>
				</a>
			</div>
            <?php
                }
            }
        }

        
    }

?>