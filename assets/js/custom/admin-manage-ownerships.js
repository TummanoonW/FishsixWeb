var q = JSON.parse(document.querySelector('#filter').innerHTML);
var urls = JSON.parse(document.querySelector('#urls').innerHTML);
var ownerships = JSON.parse(document.querySelector('#ownerships').innerHTML)

function search() {
    var params = "?";
    Object.keys(q).forEach(key => {
        if(q[key] != "") params = params + key + "=" + q[key] + "&";
    });
    window.location = urls.pageAdminManageOwnerships + params;
}

function searchIsExpired(element) {
    q.isExpired = element.value;
    search();
}

function searchCourseID(element) {
    q.courseID = element.value;
    search();
}

function searchOwnerID() {
    var element = document.querySelector('#ownerID');
    q.ownerID = element.value;
    search();
}

function searchDesc(isDesc) {
    q.desc = isDesc;
    search();
}