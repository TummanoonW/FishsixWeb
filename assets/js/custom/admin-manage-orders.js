var q = JSON.parse(document.querySelector('#search').innerHTML);
var urls = JSON.parse(document.querySelector('#urls').innerHTML);
var orders = JSON.parse(document.querySelector('#orders').innerHTML);

async function exportExcel(){
    await orders.forEach(element => {
        delete(element.owner);
        let old = element;
        
    });

    let csvString = await arrayToCSV(orders);

    await CSVToDownload(csvString);
}

function CSVToDownload(csvString){
    let date = new Date();
    let now = date.getFullYear() + "_" + date.getMonth() + "_" + date.getDate();
    var universalBOM = "\uFEFF";
    var a = window.document.createElement('a');
    a.setAttribute('href', 'data:text/csv; charset=utf-8,' + encodeURIComponent(universalBOM+csvString));
    a.setAttribute('download', 'bills_report_'+now+'.csv');
    window.document.body.appendChild(a);
    a.click();
}

function arrayToCSV(objArray) {
    const array = typeof objArray !== 'object' ? JSON.parse(objArray) : objArray;
    let str = `${Object.keys(array[0]).map(value => `"${value}"`).join(",")}` + '\r\n';

    return array.reduce((str, next) => {
        str += `${Object.values(next).map(value => `"${value}"`).join(",")}` + '\r\n';
        return str;
       }, str);
}

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

function searchQuery(){
    let element = document.querySelector('#query');
    q.query = element.value;
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