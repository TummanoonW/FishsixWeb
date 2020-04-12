<?php
    class Toolbar{ ////common toolbar HTML elements loader
        public static function initToolbar($dir, $search, $sess){  
            $auth = $sess->getAuth();
?>
            <!-- Header -->
            <div id="header" data-fixed class="mdk-header js-mdk-header mb-0">
                <div class="mdk-header__content">
                    <!-- Navbar -->
                    <nav id="default-navbar" class="navbar navbar-expand navbar-dark bg-primary m-0">
                        <div class="container-fluid">
                            <!-- Toggle sidebar -->
                            <!--<button id="btn-menu" class="navbar-toggler d-block" data-toggle="sidebar" type="button">
                                <span class="material-icons">menu</span>
                            </button>-->
                            <!-- Brand -->
                            <a href="<?php Nav::echoHome($dir) ?>" class="navbar-brand">
                                <img src="<?php Asset::embedIcon($dir, Asset::$iconURL2) ?>" class="mr-2" alt="<?php echo App::$name ?>" />
                                <span class="d-none d-xs-md-block" style="font-size: 20px;"><?php echo App::$name ?></span>
                            </a>
                            <!-- Search -->
                            <!--<form class="search-form d-none d-md-flex" action="<?php Nav::echoURL($dir, App::$pageCourses)?>" method="GET">
                                <input name="search" type="text" class="form-control" placeholder="คำค้นหา" value="<?php echo $search ?>">
                                <button type="submit" class="btn"><i class="material-icons font-size-24pt">search</i></button>
                            </form>-->
                            <!-- // END Search -->
                           <div class="flex"></div>
                            <!-- Menu -->
                            <!--<ul class="nav navbar-nav flex-nowrap d-none d-lg-flex">
                                <li class="nav-item">
                                    <a class="nav-link" href="student-forum.html">บทความ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="student-help-center.html">ขอความช่วยเหลือ</a>
                                </li>
                            </ul>-->
                            <!-- Menu -->
                            <?php Menu::initMenu($dir, $sess) ?>
                            <!-- // END Menu -->
                        </div>
                    </nav>
                    <!-- // END Navbar -->
                </div>
            </div>
<?php   
        }   
        
        public static function initToolbarSKRN($dir, $search, $sess){
?>
<header id="videohead-pro" class="sticky-header">
			<div id="video-logo-background"><a href="dashboard-home.html"><img src="<?php Nav::echoURL($dir, 'assets/images/skrn/logo-video-layout.png') ?>" alt="Logo"></a></div>
			
			<div id="mobile-bars-icon-pro" class="noselect"><i class="fas fa-bars"></i></div>
			
			<div id="header-user-profile">
				<div id="header-user-profile-click" class="noselect">
					<img src="<?php Nav::echoURL($dir, 'assets/images/skrn/demo/user-profile.jpg') ?>" alt="Suzie">
					<div id="header-username">Suzie Smith</div><i class="fas fa-angle-down"></i>
				</div><!-- close #header-user-profile-click -->
				<div id="header-user-profile-menu">
					<ul>
						<li><a href="dashboard-profile.html"><span class="icon-User"></span>My Profile</a></li>
						<li><a href="dashboard-favorites.html"><span class="icon-Favorite-Window"></span>My Favorites</a></li>
						<li><a href="dashboard-account.html"><span class="icon-Gears"></span>Account Details</a></li>
						<li><a href="#!"><span class="icon-Life-Safer"></span>Help/Support</a></li>
						<li><a href="index.html"><span class="icon-Power-3"></span>Log Out</a></li>
					</ul>
				</div><!-- close #header-user-profile-menu -->
			</div><!-- close #header-user-profile -->
			
			<div id="header-user-notification">
				<div id="header-user-notification-click" class="noselect">
					<i class="far fa-bell"></i>
					<span class="user-notification-count">3</span>
				</div><!-- close #header-user-profile-click -->
				<div id="header-user-notification-menu">
					<h3>Notifications</h3>
					<div id="header-notification-menu-padding">
							<ul id="header-user-notification-list">
								<li><a href="#!"><img src="<?php Nav::echoURL($dir, 'assets/images/skrn/demo/user-profile-2.jpg') ?>" alt="Profile">Lorem ipsum dolor sit amet, consec tetur adipiscing elit. <div class="header-user-notify-time">21 hours ago</div></a></li>
								<li><a href="#!"><img src="<?php Nav::echoURL($dir, 'assets/images/skrn/demo/user-profile-3.jpg') ?>" alt="Profile">Donec vitae lacus id arcu molestie mollis. <div class="header-user-notify-time">3 days ago</div></a></li>
								<li><a href="#!"><img src="<?php Nav::echoURL($dir, 'assets/images/skrn/demo/user-profile-4.jpg') ?>" alt="Profile">Aenean vitae lectus non purus facilisis imperdiet. <div class="header-user-notify-time">5 days ago</div></a></li>
							</ul>
							<div class="clearfix"></div>
						</div><!-- close #header-user-profile-menu -->
					</div>
			</div><!-- close #header-user-notification -->
			
			
			
			<div class="clearfix"></div>
			
			<nav id="mobile-navigation-pro">
			
				<ul id="mobile-menu-pro">
	            <li>
	              <a href="dashboard-home.html">
						<span class="icon-Old-TV"></span>
	                TV Series
	              </a>
	            <li>
	            <li>
	              <a href="dashboard-movies.html">
						<span class="icon-Reel"></span>
	                Movies
	              </a>
	            </li>
	            <li class="current-menu-item">
	              <a href="dashboard-playlists.html">
						<span class="icon-Movie"></span>
	                Playlists
	              </a>
	            </li>
	            <li>
	              <a href="dashboard-new-arrivals.html">
						<span class="icon-Movie-Ticket"></span>
	                New Arrivals
	              </a>
	            </li>
	            <li>
	              <a href="dashboard-coming-soon.html">
						<span class="icon-Clock"></span>
	                Coming Soon
	              </a>
	            </li>
	            <li>
	              <a href="#!">
						<i class="far fa-bell"></i>
						<span class="user-notification-count">3</span>
	                Notifications
	              </a>
	            </li>
				</ul>
				<div class="clearfix"></div>
				
				<div id="search-mobile-nav-pro">
					<input type="text" placeholder="Search for Movies or TV Series" aria-label="Search">
				</div>
				
			</nav>
			
      </header>
<?php
        }
    }
?>