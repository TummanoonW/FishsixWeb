var inputs = {
    seats       : document.querySelector('#cSeats'),
    creditUse   : document.querySelector('#cCredit'),
    day         : document.querySelector('#cDay'),
    startTime   : document.querySelector('#cStartTime'),
    endTime     : document.querySelector('#cEndTime')
};

var data = JSON.parse(document.querySelector('#obj-data').innerHTML);
var urls = JSON.parse(document.querySelector('#obj-urls').innerHTML);

var db = Connect();

let name = {
    course      : 'course'
};

$('#loading').toggle(false);
initData();

async function initData(){
    let sClass = data.sClass;

    if(!data.isNew){
        inputs.seats.value      = sClass.seats;
        inputs.creditUse.value  = sClass.creditUse;
        inputs.day.value        = sClass.day;
        inputs.startTime        = sClass.startTime;
        inputs.endTime          = sClass.endTime;
    }
}

async function save(){
    $('#loading').toggle(true);
    $('#page').toggle(false);

    let course = await db.getObject(name.course);

    if(data.isNew){
        let id = await db.genID();
        let newClass = {
            ID: id,
            seats:      inputs.seats.value,
            creditUse:  inputs.creditUse.value,
            day:        inputs.day.value,
            startTime:  inputs.startTime.value,
            endTime:    inputs.endTime.value,
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