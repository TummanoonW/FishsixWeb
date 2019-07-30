<?php
    class MySchedule{
        public static function initView($dir, $paths){
            $auth = Session::getAuth();
?>
            <body class=" layout-fluid">
                <!-- Pre Loader -->
                
                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir); ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div  class="container-fluid page__container ">

                                    <!-- Navigation Paths -->
                                    <?php NavPath::initNavPath($dir, $paths); ?>

                                    <div class="media mb-headings align-items-center">
                                        <div class="media-body">
                                            <h1 class="h2">My Schedule</h1>
                                        </div>
                                    </div>
                                    <div>
                                    
                                    </div>
                                   <table>
                                        <thead style=" border: 1px solid black;">
                                            <tr>
                                                <th><div style="padding:10px"></div></th>
                                                <th style="padding:10px"><div>Sunday</div></th>
                                                <th><div style="padding:10px">Monday</div></th>
                                                <th><div style="padding:10px">Tuesday</div></th>
                                                <th><div style="padding:10px">wednesday</div></th>
                                                <th><div style="padding:10px">thursday</div></th>
                                                <th><div style="padding:10px">friday</div></th>
                                                <th><div style="padding:10px">Saturday</div></th>
                                            </tr>
                                        </thead>
                                        <tbody style=" border: 1px solid black;text-align:center;">
                                            <tr>
                                                <td style="padding:10px">8:00</td>
                                                <td style="padding:10px"><div style="background-color:yellow;color:yellow;">test</div></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px">9:00</td>
                                                <td style="padding:10px"><div style="background-color:yellow;color:yellow;">test</div></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px">10:00</td>
                                                <td style="padding:10px"><div style="background-color:yellow;color:yellow;">test</div></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px">11:00</td>
                                                <td style="padding:10px"><div style="background-color:yellow;color:yellow;">test</div></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px">12:00</td>
                                                <td style="padding:10px"><div style="background-color:yellow;color:yellow;">test</div></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px">13:00</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px">14:00</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px">15:00</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px">16:00</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px">17:00</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px">18:00</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px">19:00</td>
                                                <td style="padding:10px"><div style="background-color:yellow;color:yellow;">test</div></td>
                                            </tr>
                                        </tbody>
                                    </table> 

                                    
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir); ?>
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php Script::initScript($dir); ?>
<?php
        }
    }
?>