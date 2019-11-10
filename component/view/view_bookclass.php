<?php
    class BookingClass{
        public static function initView($dir, $paths, $ownership, $course, $classes, $branches, $schedules){
            $auth = Session::getAuth();
?>
            <body class=" layout-fluid">
                <!-- Vendor CSS -->
                <link rel="stylesheet" href="<?php Nav::echoURL($dir, 'assets/css/fullcalendar.css') ?>">
                
                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>
                
                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir, ''); ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths); ?>
                                
                                <div class="row">
                                    <div class="col-md-4">  
                                        <div class="media mb-headings align-items-center">
                                            <div class="media-body">
                                                <h1 class="h2">จองรอบเรียน <?php echo $course->title; ?></h1>
                                            </div>
                                        </div>
                                        <form action="<?php Nav::echoURL($dir, App::$routeBookClass . "?m=book"); ?>" method="POST">
                                            <table class="table table-nowrap mb-0 table--elevated">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="media-body">
                                                                    <strong>สาขา</strong>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="d-flex align-items-center">
                                                                <select id="branch-select" name="cBranchID" class="form-control" onchange="changeBranches(this)">
                                                                    <option value="" selected>เลือกสาขา</option>
                                                                    <?php self::initBranches($dir, $branches); ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="media-body">
                                                                    <strong>รอบเรียน</strong>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="d-flex align-items-center">
                                                                <select name="cClassID" class="form-control">
                                                                    <option value="" selected>เลือกรอบเรียน</option>
                                                                    <?php self::initClasses($dir, $classes) ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr style="visibility: collapse;">
                                                        <td></td>
                                                        <td class="text-center">
                                                            <div class="d-flex align-items-center">
                                                                <input type="text" name="ownershipID" value="<?php echo $ownership->ID ?>" readonly>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="margin-top: 20px;text-align:center">
                                                <button type="submit" onclick="return confirm('คุณต้องการจองรอบเรียนนี้ใช่ไหม?');" class="btn btn-success ml-auto">จองรอบเรียน</button>
                                            </div>
                                        </form>
                                        <div class="card mb-4 box-shadow">
                                            <div class="card-body">
                                            <h4>ตารางเวลา</h4>
                                            <table class="table mb-0">
                                                <thead class="bg-light text-center">
                                                    <tr>
                                                        <th>วันที่</th>
                                                        <th>เริ่ม</th>
                                                        <th>จบ</th>
                                                        <th>ที่นั่ง</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list bg-white text-center" id="Table">

                                                </tbody>
                                            </table>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                                <!-- Calendar -->
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                                <div class="py-3">
                                    <a id="thumbnailURL" href="./assets/images/thumbs/def.png" target="_blank">
                                        <img id="thumbnail" src="./assets/images/thumbs/def.png" style="height: 256px; width: 100%; object-fit: cover;">
                                    </a>
                                    <!-- Title -->
                                    <h1 class="h2">สาขา: <span id="title"></span></h1>
                                    <h4 class="mt-4">คำอธิบาย:</h4>
                                    <p class="mt-2 text-dark"><span id="description"></span><p>
                                </div>
                                <div class="media-left">
                                    <span class="col-12 col-md-6 text-muted">
                                        <i class="fas fa-place-of-worship mr-2"></i>
                                        จุดสังเกตุ: <span id="nearbyPlace"></span>
                                    </span>
                                    <span class="col-12 col-md-6 text-muted">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        <span id="address"></span>
                                    </span>
                                </div>
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir); ?>
                        </div>
                    </div>
                </div>
            <?php Script::initScript($dir); ?>
                
            </div>

            <!-- Required by Calendar (fullcalendar) -->
            <script src="<?php Nav::echoURL($dir, 'assets/vendor/moment.min.js') ?>"></script>

            <!-- Fullcalendar -->
            <script src="<?php Nav::echoURL($dir, 'assets/vendor/fullcalendar.min.js') ?>"></script>

            <!-- Init -->
            <!--<script src="<?php Nav::echoURL($dir, 'assets/js/fullcalendar.js') ?>"></script>-->

            <!-- Custom Script -->
            <script id="obj-classes"><?php echo json_encode($classes) ?></script>
            <script id="obj-branches"><?php echo json_encode($branches) ?></script>
            <script id="obj-schedules"><?php echo json_encode($schedules) ?></script>
            <script>
                var classes = JSON.parse(document.getElementById("obj-classes").innerHTML);
                var schedules = JSON.parse(document.getElementById("obj-schedules").innerHTML);
                var table = document.getElementById('Table');

                //initCalendar();

                async function initCalendar(){
                    let data = await genEvents(schedules);
                    await $('#calendar').fullCalendar(data)
                }

                async function genEvents(schedules){
                    var data = {events: []};
                    return data;
                }

                async function changeEventsWithBranches(schedules, classes, input){
                    let value = input.value;
                    
                    $('#calendar').fullCalendar('removeEventSources');

                    let date = '2019-11-15 ';
                    let time;
                    let seats;
                    let obj;
                    var data = {events: []};
                    schedules.forEach(async element => {
                        if(value == element.courseBranchID){
                            date = await element.startDate.split(" ")[0];
                            time = element.class.startTime.slice(0,element.class.startTime.length - 3);
                            seats = element.class.seats;
                        }
                        else
                            return data;

                        obj = {
                            eventID: element.class.ID + "@" + date,
                            title: time,
                            used: "",
                            full: seats,
                            start: date,
                            startTime: element.class.startTime,
                            endTime: element.class.endTime,
                        };
                        await data.events.push(obj);
                    });
                    console.log(data);
                    await $('#calendar').fullCalendar(data)
                    
                    var postID;
                    var seatLeft;
                    if (data.events.length > 0)
                    {
                        var obj1 = {};
                        for(var i = 0, len = data.events.length; i < len ; i ++){
                            if (postID == null)
                            {
                                postID = data.events[i].eventID;
                                seatLeft = data.events[i].used;
                            }
                            else if (postID != data.events[i].eventID)
                            {
                                seatLeft = data.events[i].used;
                            }
                            
                            if (postID = data.events[i].eventID)
                            {
                                seatLeft ++;
                            }  
                            
                            data.events[i].title = data.events[i].title + " " + seatLeft + "/" + data.events[i].full
                            data.events[i].used = seatLeft;
                            obj1[data.events[i]['eventID']] = data.events[i];
                        }
                        data.events = new Array();
                        for (var key in obj1)
                            data.events.push(obj1[key]);
                    }
                    table.innerHTML = "";
                    data.events.forEach(async element => {
                        var trTable = document.createElement("tr");
                        var cell1 = document.createElement("td");
                        var cell2 = document.createElement("td");
                        var cell3 = document.createElement("td");
                        var cell4 = document.createElement("td");
                        var cellText1 = document.createTextNode(parseInt(element.start.slice(-2), 10));
                        var cellText2 = document.createTextNode(element.startTime.replace(':00',''));
                        var cellText3 = document.createTextNode(element.endTime.replace(':00',''));
                        var cellText4 = document.createTextNode(element.used + "/" + element.full);
                        cell1.appendChild(cellText1);
                        cell2.appendChild(cellText2);
                        cell3.appendChild(cellText3);
                        cell4.appendChild(cellText4);
                        trTable.appendChild(cell1);
                        trTable.appendChild(cell2);
                        trTable.appendChild(cell3);
                        trTable.appendChild(cell4);
                        Table.appendChild(trTable);
                        var newTabale = " " + " " + " " ;
                        table.innerHTML = table.innerHTML + newTabale;
                    });
                    await $('#calendar').fullCalendar(data)
                    await $('#calendar').fullCalendar('addEventSource', data)
                    return data;
                }
            </script>

            <script>
                var title = document.querySelector('#title');
                var description = document.querySelector('#description');
                var nearbyPlace = document.querySelector('#nearbyPlace');
                var address = document.querySelector('#address');
                var thumbnail = document.querySelector('#thumbnail');

                let branches = JSON.parse(document.querySelector('#obj-branches').innerHTML);

                changeBranches(document.querySelector('#branch-select'));

                function changeBranches(input){
                    changeEventsWithBranches(schedules, classes, document.querySelector('#branch-select'));

                    let value = input.value;
                    console.log(value);

                    branches.forEach(element => {
                        if(value == element.ID){
                            title.innerHTML = element.branch.title;
                            description.innerHTML = element.branch.description;
                            nearbyPlace.innerHTML = element.branch.nearbyPlace;
                            address.innerHTML = element.branch.address;
                            if(element.branch.thumbnail != "")
                                document.getElementById('thumbnail').src=element.branch.thumbnail;
                            else
                                document.getElementById('thumbnail').src="./assets/images/thumbs/def.png";
                        }
                        else if(value == ""){
                            title.innerHTML = "";
                            description.innerHTML = "";
                            nearbyPlace.innerHTML = "";
                            address.innerHTML = "";
                            document.getElementById('thumbnail').src="./assets/images/thumbs/def.png";
                        }
                    });
                    
                }
            </script>

<?php
        }

        private static function initBranches($dir, $branches){
            foreach ($branches as $key => $b) {
                ?>
                    <option value="<?php echo $b->ID ?>">สาขา <?php echo $b->branch->title ?></option>
                <?php
            }
        }

        private static function initClasses($dir, $classes){
            foreach ($classes as $key => $c) {
                ?>
                    <option value="<?php echo $c->ID ?>">
                    <?php 
                    if ($c->day == "mon")
                        echo 'จ.';
                    else if ($c->day == "tue")
                        echo 'อ.';
                    else if ($c->day == "wed")
                        echo 'พ.';
                    else if ($c->day == "thu")
                        echo 'พฤ.';
                    else if ($c->day == "fri")
                        echo 'ศ.';
                    else if ($c->day == "sat")
                        echo 'ส.';
                    else if ($c->day == "sun")
                        echo 'อา.';
                    ?>
                    <?php echo date("H:i", strtotime($c->startTime))?> - <?php echo date("H:i", strtotime($c->endTime))?></option>
                <?php
            }
        }
    }
?>