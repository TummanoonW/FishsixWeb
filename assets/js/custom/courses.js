let urls = JSON.parse(document.querySelector('#obj-urls').innerHTML);
var query = JSON.parse(document.querySelector('#obj-query').innerHTML);

var input = document.querySelector('#search');
input.addEventListener("keyup", function(event) {
    // Number 13 is the "Enter" key on the keyboard
    if (event.keyCode === 13) {
      // Cancel the default action, if needed
      event.preventDefault();
      // Trigger the button element with a click
      searchQuery();
    }
});

function search(){
    window.location.href = urls.pageCourses + "?q=" + JSON.stringify(query);
}

async function searchQuery(){
    let value = input.value;
    query.search = value;
    await search();
}

async function searchCategory(input){
    let ID = input.value;
    query.category = ID;
    await search();
}

async function searchChar(bool){
    query.desc = bool;
    query.sort = 'char';
    await search();
}

async function searchPopular(bool){
    query.desc = bool;
    query.sort = 'popular';
    await search();
}

