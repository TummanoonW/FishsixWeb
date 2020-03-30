var data = JSON.parse(document.querySelector('#obj-data').innerHTML);
var urls = JSON.parse(document.querySelector('#obj-urls').innerHTML);

var inputs = {
    title   : document.querySelector('#cTitle'),
    price   : document.querySelector('#cPrice'),
    credit  : document.querySelector('#cCredit'),
    expiration   : document.querySelector('#cExpiration'),
};

var db = Connect();
var course = {};

let name = {
    course      : 'course'
};

$('#loading').toggle(false);
initData();

async function initData(){
    if(!data.isNew){
        course = await db.getObject(name.course);
        await course.packages.forEach((element, index) => {
            if(index == data.index){
                data.sPackage = element;
            }
        });

        inputs.title.value   = await data.sPackage.title;
        inputs.price.value   = await data.sPackage.price;
        inputs.credit.value   = await data.sPackage.credit;
        inputs.expiration.value   = await data.sPackage.expiration;
    }
}

async function save(){
    $('#loading').toggle(true);
    $('#page').toggle(false);

    let isNew = data.isNew;

    let title = inputs.title.value;
    let price = inputs.price.value;
    let credit = inputs.credit.value;
    let expiration = inputs.expiration.value;

    if(price != '' && credit != ''){
        if(isNew){
            let id = await db.genID();
            let p = {
                ID: id,
                title: title,
                price: price,
                credit: credit,
                expiration, expiration,
                meta: 'add'
            };
            course.packages.push(p);
        }else{
            let sPackage = data.sPackage;
            course.packages.forEach((element, index) => {
                if(index == data.index){
                    element.title = title;
                    element.price = price;
                    element.credit = credit;
                    element.expiration = expiration;
                    if(element.ID != null)element.meta = 'edit';
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