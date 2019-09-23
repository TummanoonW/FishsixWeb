var data = JSON.parse(document.querySelector('#obj-data').innerHTML);
var urls = JSON.parse(document.querySelector('#obj-urls').innerHTML);

var inputs = {
    price   : document.querySelector('#cPrice'),
    credit  : document.querySelector('#cCredit')
};

var db = Connect();

let name = {
    course      : 'course'
};

$('#loading').toggle(false);
initData();

async function initData(){
    let sPackage = data.sPackage;

    if(!data.isNew){
        inputs.price.value   = sPackage.price;
        inputs.credit.value   = sPackage.credit;
    }
}

async function save(){
    $('#loading').toggle(true);
    $('#page').toggle(false);

    var course = await db.getObject(name.course);
    let isNew = data.isNew;

    let price = inputs.price.value;
    let credit = inputs.credit.value

    if(price != '' && credit != ''){
        if(isNew){
            let id = await db.genID();
            let p = {
                ID: id,
                price: price,
                credit: credit,
                meta: 'add'
            };
            course.packages.push(p);
        }else{
            let sPackage = data.sPackage;
            course.packages.forEach(element => {
                if(element.ID == sPackage.ID){
                    element.price = price;
                    element.credit = credit;
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