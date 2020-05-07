var classes = JSON.parse(document.getElementById("obj-classes").innerHTML);
var schedules = JSON.parse(document.getElementById("obj-schedules").innerHTML);

console.log(classes);
console.log(schedules);

var table = document.getElementById('Table');
var cClassID = document.getElementById('cClassID');
var cDate = document.getElementById('cDate');
var cBranchID = document.getElementById('cBranchID');
var submitBtn = document.getElementById('submitBtn');

var s_classes = [];

$('#cClass').toggle(false);
$('#cLesson').toggle(false);
$('#hidden-thing').toggle(false);

$('#submitBtn').prop('disabled', true);
$('#submitBtn').removeClass("btn-success");
$('#submitBtn').addClass("btn-muted");


//initCalendar();

async function enableSubmitButton(){
    var cClassID = document.getElementById('cClassID');
    var cDate = document.getElementById('cDate');
    var cBranchID = document.getElementById('cBranchID');

    if(cClassID.value != "" && cDate.value != "" && cBranchID.value != ""){
        $('#submitBtn').prop('disabled', false);
        $('#submitBtn').addClass("btn-success");
        $('#submitBtn').removeClass("btn-muted");
    }else{
        $('#submitBtn').prop('disabled', true);
        $('#submitBtn').removeClass("btn-success");
        $('#submitBtn').addClass("btn-muted");
    }
}

async function reRender(input){
    let date = new Date(Date.parse(input.value));
    let now = new Date();
    if(now.getHours() <= 15){ //before 16.00
        now.setHours(0);
        now.setMinutes(0);
        now.setSeconds(0);
        now.setMilliseconds(1);
    }else{ //after 16.00
        now.setHours(16);
        now.setMinutes(0);
        now.setSeconds(0);
    }
    var one_day = 1000 * 60 * 60 * 24;
    var result = Math.round(date.getTime() - now.getTime()) / (one_day);

    if(result >= 1){
        let a_days = ['sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat'];
        let day = a_days[date.getDay()];
    
        var s_classes2 = [];
        s_classes.forEach(element => {
            if(day == element.day){
                s_classes2.push(element);
            }
        });
    
        cClassID.innerHTML = '<option value="" selected>เลือกรอบเรียน</option>';
        cClassID.value = "";
    
        if(s_classes2.length > 0){
            $('#cClass').toggle(true);
            $('#cLesson').toggle(true);
    
            s_classes2.forEach(element => {
                let item = '<option value="'+element.ID+'">' + printTime(element.startTime) + '-' + printTime(element.endTime) + '</option>';
                cClassID.innerHTML = cClassID.innerHTML + item;
            });
        }else{
            $('#cClass').toggle(false);
            $('#cLesson').toggle(false);
        }
    }else{
        $('#cClass').toggle(false);
        $('#cLesson').toggle(false);
        /*var defdate = new Date();
        let days = 3;
        defdate.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var m = defdate.getMonth();
        if(m < 10) m = "0" + m;
        var d = defdate.getDate();
        if(d < 10) d = "0" + d;
        input.value = defdate.getFullYear() + "-" + m + "-" + d;*/
        //reRender(input);
    }

    enableSubmitButton();
}

async function initCalendar() {
    let data = await genEvents(schedules);
    await $('#calendar').fullCalendar(data)
}

async function genEvents(schedules) {
    var data = { events: [] };
    return data;
}

async function changeEventsWithBranches(schedules, classes, input) {
    let value = input.value;

    $('#calendar').fullCalendar('removeEventSources');

    let date = '2019-11-15 ';
    let time;
    let seats;
    let obj;
    var data = { events: [] };
    await schedules.forEach(async element => {
        if (value == element.courseBranchID) {
            date = await element.startDate.split(" ")[0];
            time = element.class.startTime.slice(0, element.class.startTime.length - 3);
            seats = element.class.seats;
        }
        else return data;

        obj = {
            eventID: element.class.ID + "@" + date,
            title: time,
            used: 0,
            full: seats,
            start: date,
            startTime: element.class.startTime,
            endTime: element.class.endTime,
        };
        await data.events.push(obj);
    });

    await $('#calendar').fullCalendar(data)

    if (data.events.length > 0) {
        var obj1 = {};
        for (var i = 0, len = data.events.length; i < len; i++) {
            /*await schedules.forEach(async element => {
                date = await element.startDate.split(" ")[0];
                let eventID = element.class.ID + "@" + date;
                if(data.events[i].eventID == eventID){
                    data.events[i].used += 1;
                    data.events[i].title + " " + data.events[i].used + "/" + data.events[i].full;
                }
            });*/

            obj1[data.events[i]['eventID']] = data.events[i];
            
            /*if (postID == null) {
                postID = data.events[i].eventID;
                seatLeft = data.events[i].used;
            }else{
                if (postID == data.events[i].eventID) {
                    obj1[data.events[i]['eventID']] = data.events[i];
                }else{
                    seatLeft = data.events[i].used;
                }
            }

            data.events[i].title = data.events[i].title + " " + seatLeft + "/" + data.events[i].full
            data.events[i].used = seatLeft;
            obj1[data.events[i]['eventID']] = data.events[i];*/
        }

        await schedules.forEach(async element => {
            date = await element.startDate.split(" ")[0];
            let eventID = element.class.ID + "@" + date;
            if(obj1[eventID] != null){
                obj1[eventID].used += 1;
                obj1[eventID].title = obj1[eventID].startTime.replace(':00:00', '') + "-" + obj1[eventID].endTime.replace(':00:00', '') + " " + obj1[eventID].used + "/" + obj1[eventID].full;
            }
        });

        data.events = new Array();
        for (var key in obj1) data.events.push(obj1[key]);
    }
    table.innerHTML = "";
    data.events.forEach(async element => {
        var trTable = document.createElement("tr");
        var cell1 = document.createElement("td");
        var cell2 = document.createElement("td");
        var cell3 = document.createElement("td");
        var cell4 = document.createElement("td");
        var cellText1 = document.createTextNode(parseInt(element.start.slice(-2), 10));
        var cellText2 = document.createTextNode(element.startTime.replace(':00', ''));
        var cellText3 = document.createTextNode(element.endTime.replace(':00', ''));
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
        var newTabale = " " + " " + " ";
        table.innerHTML = table.innerHTML + newTabale;
    });
    await $('#calendar').fullCalendar(data)
    await $('#calendar').fullCalendar('addEventSource', data)
    return data;
}

var title = document.querySelector('#title');
var description = document.querySelector('#description');
var nearbyPlace = document.querySelector('#nearbyPlace');
var address = document.querySelector('#address');
var thumbnail = document.querySelector('#thumbnail');

let branches = JSON.parse(document.querySelector('#obj-branches').innerHTML);

changeBranches(document.querySelector('#cBranchID'));

function changeBranches(input) {
    changeEventsWithBranches(schedules, classes, document.querySelector('#cBranchID'));

    let value = input.value;

    branches.forEach(element => {
        if (value == element.ID) {
            title.innerHTML = element.branch.title;
            description.innerHTML = element.branch.description;
            nearbyPlace.innerHTML = element.branch.nearbyPlace;
            address.innerHTML = element.branch.address;
            if (element.branch.thumbnail != "")
                document.getElementById('thumbnail').src = element.branch.thumbnail;
            else
                document.getElementById('thumbnail').src = "./assets/images/thumbs/def.png";
        }
        else if (value == "") {
            title.innerHTML = "";
            description.innerHTML = "";
            nearbyPlace.innerHTML = "";
            address.innerHTML = "";
            document.getElementById('thumbnail').src = "./assets/images/thumbs/def.png";
        }
    });

    changeClasses(value, classes);

    enableSubmitButton()
}

function changeClasses(courseBranchID, classes){
    s_classes = [];
    classes.forEach(element => {
        if(element.courseBranchID == courseBranchID) s_classes.push(element);
    });


    reRender(cDate);
}

function printTime(datetime){
    let x = datetime.split(":");
    return x[0] + ":" + x[1];
}