var data = JSON.parse(document.querySelector('#obj-data').innerHTML);
var urls = JSON.parse(document.querySelector('#obj-urls').innerHTML);

var inputs = {
    title    : document.querySelector('#cTitle'),
    content  : document.querySelector('#cContent')
};

var db = Connect();

let name = {
    course      : 'course'
};

$('#loading').toggle(false);
initData();

async function initData(){
    let sLesson = data.sLesson;

    if(!data.isNew){
        inputs.title.value   = sLesson.title;
        inputs.content.value   = sLesson.content;
    }
}

async function save(){
    $('#loading').toggle(true);
    $('#page').toggle(false);

    var course = await db.getObject(name.course);
    let isNew = data.isNew;
    let sLesson = data.sLesson;

    let title = inputs.title.value;
    let content = inputs.content.value;

    if(title != ''){
        if(isNew){
            let id = await db.genID();
            let l = {
                ID: id,
                title: title,
                content: content,
                meta: 'add'
            };
            course.lessons.push(l);
        }else{
            course.lessons.forEach(element => {
                if(element.ID == sLesson.ID){
                    element.title = title;
                    element.content = content;
                    element.meta = 'edit';
                }
            });
        }
        await db.setObject(name.course, course);
    }

    $('#loading').toggle(false);
    $('#page').toggle(true);

    //window.location.href = urls.back;
    window.history.back();
}