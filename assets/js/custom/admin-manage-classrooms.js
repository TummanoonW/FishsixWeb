var data = JSON.parse(document.querySelector('#data').innerHTML);
var urls = JSON.parse(document.querySelector('#urls').innerHTML);

function search() {
    let param = JSON.stringify(data.filter);
    window.location = urls.pageAdminManageClassrooms + "?q=" + param;
}

function searchCourse(element) {
    data.filter.courseID = element.value;
    data.filter.courseBranchID = "";
    data.filter.classID = "";
    search();
}

function searchBranch(element) {
    data.filter.courseBranchID = element.value;
    search();
}

function searchClass(element) {
    data.filter.classID = element.value;
    search();
}

function searchDate() {
    let element = document.querySelector('#date');
    data.filter.since = element.value;
    search();
}

var input = document.querySelector('#date');
input.addEventListener("keyup", function (event) {
    // Number 13 is the "Enter" key on the keyboard
    if (event.keyCode === 13) {
        // Cancel the default action, if needed
        event.preventDefault();
        // Trigger the button element with a click
        searchDate();
    }
});