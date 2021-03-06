var c = {
    selectDay       : document.querySelector('#selectDay'),
    selectBranch    : document.querySelector('#selectBranch'),
    title           : document.querySelector('#title'),
    totalRev        : document.querySelector('#totalRev'),
    totalCus        : document.querySelector('#totalCus'),
    transList       : document.querySelector('#transList'),
    courseList      : document.querySelector('#courseList'),
    totalCourse     : document.querySelector('#totalCourse'),
    totalPackage    : document.querySelector('#totalPackage'),
    studentBranches : document.querySelector('#studentBranches'),
    studentClasses : document.querySelector('#studentClasses'),
    classList       : document.querySelector('#classList'),
};

function DoPlotByTime(){
    let dayStr = c.selectDay.value;

    if(dayStr == '0') c.title.innerHTML = "สถิติในช่วงเวลาทั้งหมด";
    else c.title.innerHTML = "สถิติเมื่อ " + dayStr + " วันที่ผ่านมา";

    PlotByTime(dayStr).then(data => {
        let d = JSON.parse(data);
        console.log(d);

        initTotal(d.response);

        var plot;
        switch(dayStr){
            case '0':
                plot = ConvertDataAsAll(d.response);
                break;
            case '7':
                plot = ConvertDataAs28(d.response);
                break;
            case '14':
                plot = ConvertDataAs28(d.response);
                break;
            case '28':
                plot = ConvertDataAs28(d.response);
                break;
            case '365':
                plot = ConvertDataAs365(d.response);
                break;
            default:
                break;
        }

        var options = {
            scales: {
              yAxes: [{
                ticks: {
                  callback: function(a) {
                    if (!(a % 10))
                      return "฿" + a + "k"
                  }
                }
              }]
            },
            tooltips: {
              callbacks: {
                label: function(a, e) {
                  var t = e.datasets[a.datasetIndex].label || "",
                      o = a.yLabel,
                      r = "";
                  return 1 < e.datasets.length && (r += '<span class="popover-body-label mr-auto">' + t + "</span>"), r += '<span class="popover-body-value">฿' + o + "k</span>"
                }
              }
            }
        };

        Charts.create('#performanceChart', 'line', options, plot);
    });
}

function DoPlotByMonth(monthStr){
    title.innerHTML = "สถิติเดือน" + displayMonth(monthStr);
    PlotByMonth(monthStr).then(data => {
        let d = JSON.parse(data);
        console.log(d);

        initTotal(d.response);

        plot = ConvertDataAs28(d.response);

        var options = {
            scales: {
              yAxes: [{
                ticks: {
                  callback: function(a) {
                    if (!(a % 10))
                      return "฿" + a + "k"
                  }
                }
              }]
            },
            tooltips: {
              callbacks: {
                label: function(a, e) {
                  var t = e.datasets[a.datasetIndex].label || "",
                      o = a.yLabel,
                      r = "";
                  return 1 < e.datasets.length && (r += '<span class="popover-body-label mr-auto">' + t + "</span>"), r += '<span class="popover-body-value">฿' + o + "k</span>"
                }
              }
            }
        };

        Charts.create('#performanceChart', 'line', options, plot);
    });
}

function displayMonth(monthStr){
    switch(monthStr){
        case "01": return "มกราคม";
        case "02": return "กุมภาพันธ์";
        case "03": return "มีนาคม";
        case "04": return "เมษายน";
        case "05": return "พฤษภาคม";
        case "06": return "มิถุนายน";
        case "07": return "กรกฎาคม";
        case "08": return "สิงหาคม";
        case "09": return "กันยายน";
        case "10": return "ตุลาคม";
        case "11": return "พฤศจิกายน";
        case "12": return "ธันวาคม";
        default: return "";
    }
}

function displayMonthShort(monthStr){
    switch(monthStr){
        case "01": return "ม.ค.";
        case "02": return "ก.พ.";
        case "03": return "มี.ค.";
        case "04": return "เม.ย.";
        case "05": return "พ.ค.";
        case "06": return "มิ.ย.";
        case "07": return "ก.ค.";
        case "08": return "ส.ค.";
        case "09": return "ก.ย.";
        case "10": return "ต.ค.";
        case "11": return "พ.ย.";
        case "12": return "ธ.ค.";
        default: return "";
    }
}

function ConvertDataAs365(data){
    var labels = [];
    var months = [];
    var months2 = [];
    data.sales.forEach(element => {
        let y = element.date.split("-")[0];
        let m = element.date.split("-")[1];
        let mm = y + "-" + m;
        if(months[mm] == null || months[mm] == undefined){
            labels.push(displayMonthShort(m));
            months[mm] = Number(element.totalPrice);
        }else{
            months[mm] = months[mm] +  Number(element.totalPrice);
        }
    });
    for (var k in months){
        months2.push(Number((months[k]/1000).toFixed(2)));
    }

    calculateAndRenders(data);

    var plot = {
        labels: labels,
        datasets: [{
          label: "Performance",
          data: months2
        }]
      };
    return plot;
}

function calculateAndRenders(data){
    var branches = {};
    var classes = {};
    console.log("data.bookings", data.bookings);
    data.bookings.forEach(element => {
        let key = element.courseBranchID;
        let key2 = element.classID;
        if(branches[key] == null || branches[key] == undefined){
            branches[key] = {
                bookings: 1, 
                students: {}
            };
            branches[key].students[element.ownerID] = 1;
        }else{
            branches[key].bookings += 1;
            if(branches[key].students[element.ownerID] == null || branches[key].students[element.ownerID] == undefined){
                branches[key].students[element.ownerID] = 1;
            }else{
                branches[key].students[element.ownerID] += 1;
            }
        }
        if(classes[key2] == null || classes[key2] == undefined){
            classes[key2] = 1;
        }else{
            classes[key2] += 1;
        }
    });

    RenderBranches(branches);
    RenderClasses(classes);
}

function RenderBranches(branches){
    c.studentBranches.innerHTML = "";

    console.log("branches", branches);
    for (var k in branches){
        let data = branches[k];

        var students = 0;
        for (var k2 in data.students){ 
            students = students + 1;
        }

        getBranch(k).then(async result => {
            try {
                result = await JSON.parse(result);
                let branch = await result.response.branch;
    
                let item = await
                '<tr>' +
                    '<td class="branch">' + branch.title + '</td>' +
                    '<td class="booking">' + data.bookings + '</td>' +
                    '<td class="number">' + students + '</td>' +
                '</tr>';
    
                c.studentBranches.innerHTML += await item;   
            } catch (error) {
                console.log("err", error);
            }
        });
    }
}

function RenderClasses(classes){
    c.classList.innerHTML = "";
    console.log("classes", classes);
    for(var k in classes){
        let data = classes[k];
        getClass(k).then(async result => {
            try {
                result = await JSON.parse(result);
                let cl = await result.response;
                await console.log(cl);
                let item = 
                '<tr>' +
                    '<td class="class">' + displayClass(cl) + '</td>' +
                    '<td class="branch">' + cl.courseBranch.branch.title + '</td>' +
                    '<td class="total">' + data + '</td>' +
                '</tr>';
    
                c.classList.innerHTML += item;   
            } catch (error) {
                
            }
        });
    }
}

function displayClass(cl){
    let s = cl.startTime.split(":")[0];
    let e = cl.endTime.split(":")[0];
    let t = s + "น. - " + e + "น.";
    return cl.day + " " + t;
}

function ConvertDataAs28(response){
    var labels = [];
    var days = [];
    var days2 = [];
    response.sales.forEach(element => {
        let d = element.date.split(" ")[0].split("-")[2];
        if(days[d] == null || days[d] == undefined){
            labels.push(d);
            days[d] = Number(element.totalPrice);
        }else{
            days[d] = days[d] +  Number(element.totalPrice);
        }
    });
    for (var k in days){
        days2.push(Number((days[k]/1000).toFixed(2)));
    }

    calculateAndRenders(response);

    var plot = {
        labels: labels,
        datasets: [{
          label: "Performance",
          data: days2
        }]
      };
    return plot;
}

function ConvertDataAsAll(response){
    var labels = [];
    var years = [];
    var years2 = [];
    response.sales.forEach(element => {
        let y = element.date.split("-")[0];
        if(years[y] == null || years[y] == undefined){
            labels.push(y);
            years[y] = Number(element.totalPrice);
        }else{
            years[y] = years[y] +  Number(element.totalPrice);
        }
    });
    for (var k in years){
        years2.push(Number((years[k]/1000).toFixed(2)));
    }
    var plot = {
        labels: labels,
        datasets: [{
          label: "Performance",
          data: years2
        }]
      };
    return plot;
}

function initTotal(response){
    c.totalRev.innerHTML = "฿" + 0 + "k";
    c.totalCus.innerHTML = 0 + " ครั้ง";
    c.transList.innerHTML = "";
    c.totalCourse.innerHTML = "";

    var count = 0;
    var rev = 0;
    var cus = 0;
    var courses = [];
    var packages = [];
    response.sales.forEach(element => {
        rev += Number(element.totalPrice);
        cus += 1;

        let d = element.date.split(" ")[0];
        var a = "-"; if(element.method == "b_acc") a = "เลขบัญชี";
        let r = element.totalPrice;

        if(count <= 12){
            c.transList.innerHTML += 
            '<tr>' +
                '<td class="date">' + d + '</td>' +
                '<td>' + a + '</td>' +
                '<td>' + r + ' บาท</td>' +
            '</tr>';
        }

        element.items.forEach(element2 => {
            courses.push(element2.courseID);
            packages.push(element2.packageID);
        });

        count += 1;
    });

    console.log("courses", courses);
    console.log("packages", packages);

    let cID = mode(courses);
    getCourse(cID).then(data => {
        try{
            let d = JSON.parse(data);
            c.totalCourse.innerHTML = d.response.title;
        }catch(error){
            c.totalCourse.innerHTML = "ไม่มีข้อมูล";
        }
    });

    let pID = mode(packages);
    getPackage(pID).then(data => {
        try {
            let d = JSON.parse(data);
            c.totalPackage.innerHTML = d.response.title;   
        } catch (error) {
            c.totalPackage.innerHTML = "ไม่มีข้อมูล";
        }
    });
    
    let t = (rev/1000).toFixed(2);

    c.totalRev.innerHTML = "฿" + t + "k";
    c.totalCus.innerHTML = cus + " ครั้ง";
}

function mode(arr){
    return arr.sort((a,b) =>
          arr.filter(v => v===a).length
        - arr.filter(v => v===b).length
    ).pop();
}