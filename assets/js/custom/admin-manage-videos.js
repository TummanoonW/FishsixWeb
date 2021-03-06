var q = JSON.parse(document.querySelector('#q').innerHTML);
var urls = JSON.parse(document.querySelector('#urls').innerHTML);

function search() {
    var params = "?";
    Object.keys(q).forEach(key => {
        params = params + key + "=" + q[key] + "&";
    });
    window.location = urls.pageAdminManageUser + params;
}

function searchCategory(element) {
    q.category = element.value;
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