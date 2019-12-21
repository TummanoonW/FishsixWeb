var classes = JSON.parse(document.getElementById("obj-classes").innerHTML);
var schedules = JSON.parse(document.getElementById("obj-schedules").innerHTML);
var table = document.getElementById('Table');

//initCalendar();

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
    schedules.forEach(async element => {
        if (value == element.courseBranchID) {
            date = await element.startDate.split(" ")[0];
            time = element.class.startTime.slice(0, element.class.startTime.length - 3);
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
    await $('#calendar').fullCalendar(data)

    var postID;
    var seatLeft;
    if (data.events.length > 0) {
        var obj1 = {};
        for (var i = 0, len = data.events.length; i < len; i++) {
            if (postID == null) {
                postID = data.events[i].eventID;
                seatLeft = data.events[i].used;
            }
            else if (postID != data.events[i].eventID) {
                seatLeft = data.events[i].used;
            }

            if (postID = data.events[i].eventID) {
                seatLeft++;
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

changeBranches(document.querySelector('#branch-select'));

function changeBranches(input) {
    changeEventsWithBranches(schedules, classes, document.querySelector('#branch-select'));

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

    changeClasses(courseBranchID, classes);

}

function changeClasses(courseBranchID, classes){
    var arr = [];
    classes.forEach(element => {
        if(element.courseBranchID == courseBranchID) arr.push(element);
    });

    var cClassID = document.querySelector('#cClassID');
    cClassID.innerHTML = '<option value="" selected>เลือกรอบเรียน</option>';
    arr.forEach(element => {
        var d = "";
        switch(element.day){
            case 'mon':
                d = 'จ.';
                break;
            case 'tue':
                d = 'อ.';
                break;
            case 'wed':
                d = 'พ.';
                break;
            case 'thu':
                d = 'พฤ.';
                break;
            case 'fri':
                d = 'ศ.';
                break;
            case 'sat':
                d = 'ส.';
                break;
            case 'sun':
                d = 'อา.';
                break;
            default:
                break;
        }
        let item = '<option value="'+element.ID+'">' + d + ' ' + printTime(element.startTime) + '-' + printTime(element.endTime) + '</option>';
        cClassID.innerHTML = cClassID.innerHTML + item;
    });
}

function printTime(datetime){
    let x = datetime.split(":");
    return x[0] + ":" + x[1];
}