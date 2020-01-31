var data = JSON.parse(document.querySelector('#data'));

function postComment(id){
    var input = document.querySelector(id);
    let comment = input.innerHTML;

    let post = {
        forumID: data.forum.ID,
        authorID: data.auth.ID,
        content: comment,
        isSpam: 0
    };

    $.post("http://64483892-20161210152018.webstarterz.com/fishsix.online/api/forum.php?m=postComment", post).done( 
    function(data){
        location.reload();
    });
}