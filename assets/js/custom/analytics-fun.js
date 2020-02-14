function PlotByTime(dayStr){
    let urls = JSON.parse(document.querySelector('#urls').innerHTML);
    let api = urls.dir + "api/analytics.php";
    return new Promise((resolve, reject) => {
        let day = Number(dayStr);
        $.get(api + '?m=byTime&q={"time":' + day + '}', (data) => {
            resolve(data);
        }).fail(() => {
            reject(false);
        });
    });
}

function PlotByMonth(monthStr){
    let urls = JSON.parse(document.querySelector('#urls').innerHTML);
    let api = urls.dir + "api/analytics.php";
    return new Promise((resolve, reject) => {
        $.get(api + '?m=byMonth&q={"month":"' + monthStr + '"}', (data) => {
            resolve(data);
        }).fail(() => {
            reject(false);
        });
    });
}

function getCourse(id){
    let urls = JSON.parse(document.querySelector('#urls').innerHTML);
    let api = urls.dir + "api/apiCourse.php";
    return new Promise((resolve, reject) => {
        $.get(api + '?m=single&q={"id":"' + id + '"}', (data) => {
            resolve(data);
        }).fail(() => {
            reject(false);
        });
    });
}

function getPackage(id){
    let urls = JSON.parse(document.querySelector('#urls').innerHTML);
    let api = urls.dir + "api/apiCourse.php";
    return new Promise((resolve, reject) => {
        $.get(api + '?m=package&id=' + id, (data) => {
            resolve(data);
        }).fail(() => {
            reject(false);
        });
    });
}

function getClass(id){
    let urls = JSON.parse(document.querySelector('#urls').innerHTML);
    let api = urls.dir + "api/apiCourse.php";
    return new Promise((resolve, reject) => {
        $.get(api + '?m=classFull&id=' + id, (data) => {
            resolve(data);
        }).fail(() => {
            reject(false);
        });
    });
}

function getBranch(id){
    let urls = JSON.parse(document.querySelector('#urls').innerHTML);
    let api = urls.dir + "api/apiCourse.php";
    return new Promise((resolve, reject) => {
        $.get(api + '?m=branchFull&id=' + id, (data) => {
            resolve(data);
        }).fail(() => {
            reject(false);
        });
    });
}
