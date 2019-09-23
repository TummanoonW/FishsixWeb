var data = JSON.parse(document.querySelector('#obj-data').innerHTML);
var urls = JSON.parse(document.querySelector('#obj-urls').innerHTML);

var db = Connect();

let name = {
    course      : 'course'
};

$('#loading').toggle(false);

var sID = null;
var sAuth = null;

function onChangeTeacher(input){
    sID = input.value;
    data.teachers.forEach(element => {
        if(element.ID == sID) sAuth = element;
    });
}

async function save(){
    $('#loading').toggle(true);
    $('#page').toggle(false);

    var course = await db.getObject(name.course);

    let isNew = data.isNew;
    if(isNew && sID != '' && sID != null){
        let id = await db.genID();
        let t = {
            ID: id,
            teacherID: sID,
            teacher: sAuth,
            meta: 'add'
        };

        course.teachers.push(t);
        await db.setObject(name.course, course);
        window.location.href = urls.back;

    }else if(!isNew && sID != '' && sID != null){
        var sTeacher = data.sTeacher;
        sTeacher.teacherID = sID;
        sTeacher.teacher = sAuth;
        sTeacher.meta = 'edit';

        course.teachers.forEach(element => {
            if(element.teacherID == sTeacher.teacherID) element = sTeacher;
        });
        await db.setObject(name.course, course);
    }
    $('#loading').toggle(false);
    $('#page').toggle(true);

    //window.location.href = urls.back;
    window.history.back();
}