var his = document.querySelector('#history');


let db = Connect();
let his = db.getDB('vid_his').then(resolve => {
    if(resolve.length != 0){
        var items = "";

        var count = 0;
        resolve.forEach(d => {
            if(count <= 3){
            items += 
                '<li class="image">' +
                   '<a href="https://www.youtube.com/watch?v='+d.id+'">' +
                        '<img id="box1" src="https://i1.ytimg.com/vi/'+d.id+'/mqdefault.jpg" width="280" height="150" />' +
                        '<span class="text-content">' +
                            '<h4 class="text-light">' +
                              d.title
                            '</h4>' +
                            '<i class="far fa-play-circle" style="font-size: 48px"></i>' +
                            '<br><br>' +
                            '<i class="fas fa-chevron-down" onclick="openNav()" aria-hidden="true"></i>' +
                        '</span>' +
                   '</a>' +
                '</li>';
                count += 1;
            }
        });

        his.innerHTML = 
        '<h2 class="sectionTitle text-secondary">ที่คุณดูล่าสุด</h2>' +
        '<div class="examples">' +
           '<ul class="img-list">' +
             items +
           '</ul>' +
        '</div>'
    }else{

    }
});