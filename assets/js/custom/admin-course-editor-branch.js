var data = JSON.parse(document.querySelector('#obj-data').innerHTML);
var urls = JSON.parse(document.querySelector('#obj-urls').innerHTML);

var inputs = {
    branches: document.querySelector('#cBranches')
};

var db = Connect();

let name = {
    course      : 'course'
};

$('#loading').toggle(false);
initData();

async function initData(){
    let sBranch = data.sBranch;

    if(!data.isNew){
        inputs.branches.value   = sBranch.branchID;
    }
}

async function save(){
    await $('#loading').toggle(true);
    await $('#page').toggle(false);

    var course = await db.getObject(name.course);

    if(inputs.branches.value == ''){
    }else{
        let branchID = inputs.branches.value;
        var branch = null;

        data.branches.forEach(element => {
            if(element.ID == branchID) branch = element;
        });

        if(data.isNew){
            let id = await db.genID();
            let newBranch = {
                ID: id,
                branchID: branchID,
                branch: branch,
                i: 99,
                meta: 'add'
            };
            course.branches.push(newBranch);
        }else{
            var sBranch = data.sBranch;
            course.branches.forEach(element => {
                if(element.ID == sBranch.ID){
                    element.branchID = branchID;
                    element.branch = branch;
                    element.meta = 'edit';
                }
            });
        }

        await db.setObject(name.course, course);
    }

    await $('#loading').toggle(false);
    await $('#page').toggle(true);

    //window.location.href = urls.back;
    window.history.back();
}