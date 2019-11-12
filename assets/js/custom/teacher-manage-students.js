var q = JSON.parse(document.querySelector('#q').innerHTML);
var urls = JSON.parse(document.querySelector('#urls').innerHTML);

function search() {
    let param = JSON.stringify(q);
    window.location = urls.pageTeacherManageStudent + "&q=" + param;
}

function searchBranch(element) {
    q.courseBranchID = element.value;
    search();
}

function searchClass(element) {
    q.classID = element.value;
    search();
}

function searchDate() {
    let element = document.querySelector('#date');
    q.startDate = element.value;
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