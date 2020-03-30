var q = JSON.parse(document.querySelector('#q').innerHTML);
var urls = JSON.parse(document.querySelector('#urls').innerHTML);
var data = JSON.parse(document.querySelector('#data').innerHTML);

async function search() {
    var params = "?";
    await Object.keys(q).forEach(key => {
        var value = "";

        if(key == 'page'){ 
            value = "0";
            params = params + key + "=" + value + "&";
        }
        else if(key == 'limit'){
            value = "24";
            params = params + key + "=" + value + "&";
        }
        else if(key == 'offset'){
            value = "0";
            params = params + key + "=" + value + "&";
        }
        else if(key == 'desc'){ 
            value = q[key];
            params = params + key + "=" + value + "&";
        }
        else {
            value = q[key];
            if(value != "") params = params + key + "=" + value + "&";
        }

    });
    window.location = await urls.pageAdminManageUser + params;
}

function searchType(element) {
    q.type = element.value;
    search();
}

function searchQuery() {
    let element = document.querySelector('#query'); 
    q.query = element.value;
    search();
}

function searchDesc(isDesc) {
    q.desc = isDesc;
    search();
}

var input = document.querySelector('#query');
input.addEventListener("keyup", function (event) {
    // Number 13 is the "Enter" key on the keyboard
    if (event.keyCode === 13) {
        // Cancel the default action, if needed
        event.preventDefault();
        // Trigger the button element with a click
        searchQuery();
    }
});

async function exportExcel(){
    let auths = await data.auths;
    await exportToCSV(auths);
}

var objectToCSVRow = function(array) {
    console.log(array);
    var str = '';

    str += 'ID, username, profile_pic, first_name, last_name, birth_date, gender, address, phone, Line id, Facebook, guardian_name, guardian phone, school,' + '\r\n';

    for (var i = 0; i < array.length; i++) {
        var line = '';

        line += array[i]["ID"] + ',';
        line += array[i]["username"] + ',';
        line += array[i]["profile_pic"] + ',';
        line += array[i]["user"]["fname"] + ',';
        line += array[i]["user"]["lname"] + ',';
        line += array[i]["user"]["bdate"] + ',';
        line += array[i]["user"]["gender"] + ',';
        line += array[i]["user"]["address"] + ',';
        line += array[i]["user"]["phone"] + ',';
        line += array[i]["user"]["Line id"] + ',';
        line += array[i]["user"]["facebook"] + ',';
        line += array[i]["user"]["guardian"] + ',';
        line += array[i]["user"]["guardian phone"] + ',';
        line += array[i]["user"]["school"] + ',';

        str += line + '\r\n';
    }

    return str;
}

var exportToCSV = function(array) {

    var csvContent = "data:text/csv;charset=utf-8,";

    // headers
    csvContent += objectToCSVRow(array);

    var encodedUri = encodeURI(csvContent);
    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "users.csv");
    document.body.appendChild(link); // Required for FF
    link.click();
    document.body.removeChild(link); 
}