var q = JSON.parse(document.querySelector('#search').innerHTML);
var urls = JSON.parse(document.querySelector('#urls').innerHTML);

function search() {
    var params = "?";
    Object.keys(q).forEach(key => {
        params = params + key + "=" + q[key] + "&";
    });
    window.location = urls.pageAdminManageOrders + params;
}

function searchStatus(element) {
    q.status = element.value;
    search();
}

function searchDate() {
    let element = document.querySelector('#date');
    q.since = element.value;
    search();
}

function searchDesc(isDesc) {
    q.desc = isDesc;
    search();
}