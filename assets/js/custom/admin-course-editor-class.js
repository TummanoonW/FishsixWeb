var inputs = {
    seats       : document.querySelector('#cSeats'),
    creditUse   : document.querySelector('#cCredit'),
    day         : document.querySelector('#cDay'),
    startTime   : document.querySelector('#cStartTime'),
    endTime     : document.querySelector('#cEndTime'),
    branch      : document.querySelector('#cBranches')
};

var data = JSON.parse(document.querySelector('#obj-data').innerHTML);
var urls = JSON.parse(document.querySelector('#obj-urls').innerHTML);

var db = Connect();

let name = {
    course      : 'course'
};

$('#loading').toggle(false);
initData();

var course = null;

async function initData(){
    course = await db.getObject(name.course);
    await initBranchItems(course.branches);
    if(!data.isNew){
        await course.classes.forEach((element, index) => {
            if(index == data.index){
                data.sClass = element;
            }
        });

        inputs.seats.value      = await data.sClass.seats;
        inputs.creditUse.value  = await data.sClass.creditUse;
        inputs.day.value        = await data.sClass.day;
        inputs.startTime.value  = await data.sClass.startTime;
        inputs.endTime.value    = await data.sClass.endTime;
        inputs.branch.value     = await data.sClass.courseBranchID;
    }
}

function initBranchItems(branches){
    inputs.branch.innerHTML = '<option value="">-</option>';
    branches.forEach(element => {
        try{
            let item =
            '<option value="'+element.ID+'">สาขา '+element.branch.title+'</option>';
            inputs.branch.innerHTML = inputs.branch.innerHTML + item;
        }catch(e){
            console.log(e);
        }
    });
}

async function save(){
    $('#loading').toggle(true);
    $('#page').toggle(false);

    if(data.isNew){
        let id = await db.genID();
        let newClass = {
            ID: id,
            seats:      inputs.seats.value,
            creditUse:  inputs.creditUse.value,
            day:        inputs.day.value,
            startTime:  inputs.startTime.value,
            endTime:    inputs.endTime.value,
            courseBranchID:   inputs.branch.value,
            i: 99,
            meta: 'add'
        };

        course.classes.push(newClass);
    }else{
        let sClass = data.sClass;
        
        course.classes.forEach(element => {
            if(element.ID == sClass.ID){
                element.seats       = inputs.seats.value,
                element.creaditUse  = inputs.creditUse.value,
                element.day         = inputs.day.value,
                element.startTime   = inputs.startTime.value,
                element.endTime     = inputs.endTime.value,
                element.courseBranchID    = inputs.branch.value,
                element.meta = 'edit';
            }
        });
    }

    await db.setObject(name.course, course);

    $('#loading').toggle(false);
    $('#page').toggle(true);

    //window.location.href = urls.back;
    window.history.back();
}