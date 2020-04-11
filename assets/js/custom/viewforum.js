var data = JSON.parse(document.querySelector('#data').innerHTML);

var upvote = document.querySelector('#upvote');
var downvote = document.querySelector('#downvote');
var upvoteIcon = document.querySelector('#upvote-icon');
var downvoteIcon = document.querySelector('#downvote-icon');

var voteID = "";

init();

function init(){
    const myVote = data.myVote;
    if(myVote.length > 0){
        const vote = myVote[1];
        if(vote.isUpVote == 1){
            upvoteIcon.classList.add('text-sucess');
            downvoteIcon.classList.remove('text-warning');
        }else{
            upvoteIcon.classList.remove('text-sucess');
            downvoteIcon.classList.add('text-warning');
        }
        voteID = myVote.ID;
    }else{
        voteID = "null";
    }

    upvote.innerHTML = data.forum.upvote;
    downvote.innerHTML = data.forum.downvote;
}

function postComment(id){
    var input = document.querySelector(id);
    let comment = input.innerHTML;

    let post = {
        forumID: data.forum.ID,
        authorID: data.auth.ID,
        content: comment,
        isSpam: 0
    };

    $.post("../route/forum.php?m=postComment&voteID=" + voteID, post).done( 
    function(data){
        window.location.href = location.href + "#comment";
    });
}

function upvoteForum(){
    const vote = {
        authorID: data.auth.ID,
        forumID : data.forum.ID,
        isUpVote: 1
    }

    $.post("../route/forum.php?m=upvotedownvote&voteID=" + voteID, vote).done(
        function(){
            if(data.myVote.length > 0){
                data.forum.upvote = Number(data.forum.upvote) - 1;
                data.forum.downvote = Number(data.forum.downvote) - 1;
                if(data.myVote[1].isUpVote == 1){
                    data.forum.upvote = Number(data.forum.upvote) + 1;
                }else{
                    data.forum.downvote = Number(data.forum.downvote) + 1;
                }
            }else{
                data.forum.upvote = Number(data.forum.upvote) + 1;
            }
            data.myVote[1] = vote;
            init();
        }
    );
}

function downvoteForum(){
    const vote = {
        authorID: data.auth.ID,
        forumID : data.forum.ID,
        isUpVote: 0
    }

    $.post("../route/forum.php?m=upvotedownvote", vote).done(
        function(){
            if(data.myVote.length > 0){
                data.forum.upvote = Number(data.forum.upvote) - 1;
                data.forum.downvote = Number(data.forum.downvote) - 1;
                if(data.myVote[1].isUpVote == 1){
                    data.forum.upvote = Number(data.forum.upvote) + 1;
                }else{
                    data.forum.downvote = Number(data.forum.downvote) + 1;
                }
            }else{
                data.forum.downvote = Number(data.forum.downvote) + 1;
            }
            data.myVote[1] = vote;
            init();
        }
    );
}