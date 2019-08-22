function update(id){
    let card = document.querySelector("#" + id);
    let title = card.querySelector("#title");
    let masterID = card.querySelector("#masterID");

    let obj = {
        ID: id,
        title: title,
        masterID: masterID
    };
}

