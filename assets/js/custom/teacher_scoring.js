var comment = document.querySelector('#comment');
var suggestion = document.querySelector('#suggestion');

function updateComment(this){
    let text    = this.innerText;
    let lenght  = text.lenght;
    comment.innerHTML = lenght + "";
}

function updateSuggestion(this){
    let text    = this.innerText;
    let lenght  = text.lenght;
    suggestion.innerHTML = lenght + "";
}