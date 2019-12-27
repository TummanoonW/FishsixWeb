var thumb = document.querySelector('#thumb');
var thumb_link = document.querySelector('#thumb_link');

function updateYoutube(input){
    let value = input.value;
    thumb_link.href = "https://www.youtube.com/watch?v=" + value;
    thumb.src = "https://i1.ytimg.com/vi/" + value + "/mqdefault.jpg";
}