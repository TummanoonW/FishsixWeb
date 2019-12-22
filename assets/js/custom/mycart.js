var data = JSON.parse(document.querySelector('#obj-data').innerHTML);
let urls = JSON.parse(document.querySelector('#obj-urls').innerHTML);

var cart_list = document.querySelector('#cart-list');
var total = document.querySelector('#total');

initCartList();

function initCartList(){
    cart_list.innerHTML = "";
    total.innerHTML = "";
    var t = 0;
    data.carts.forEach((cart, index) => {
        t = t + Number(cart.package.price);
        var thumbnail = '';
        if(cart.course.thumbnail == '') thumbnail = urls.thumb_def;
        else thumbnail = cart.course.thumbnail;

        let item = '<tr>' +
                    '<td>' +
                        '<div class="d-flex align-items-center">' +
                            '<a href="'+ urls.pageCourseView + '?id=' + cart.course.ID + '" class="avatar avatar-4by3 avatar-sm mr-3">' +
                                '<img src="' + thumbnail + '" alt="' + cart.course.title + '" class="avatar-img rounded">' +
                            '</a>' +
                            '<div class="media-body">' +
                                '<a href="' + urls.pageCourseView + '?id=' + cart.course.ID + '" class="text-body"><strong>' + cart.course.title + '</strong></a>' +
                            '</div>' +
                        '</div>' +
                    '</td>' +
                    '<td class="text-center">' +
                        '<div class="d-flex align-items-center">' +
                            '<label>' + cart.package.credit + '</label>' +
                        '</div>' +
                    '</td>' +
                    '<td class="text-right">' +
                        '<p class="mb-0">&#3647;' + cart.package.price + ' บาท</p>' +
                    '</td>' +
                    '<td class="text-center">' +
                        '<button onclick="deleteItem(' + index + ',false)" class="btn btn-clear text-muted"><i class="material-icons font-size-24pt">close</i></button>' +
                    '</td>' +
                '</tr>';
        cart_list.innerHTML = cart_list.innerHTML + item;
    });
    data.cartsS.forEach((cart, index) => {
        t = t + Number(cart.package.price);
        var thumbnail = '';
        if(cart.course.thumbnail == '') thumbnail = urls.thumb_def;
        else thumbnail = cart.course.thumbnail;

        let item = '<tr>' +
                    '<td>' +
                        '<div class="d-flex align-items-center">' +
                            '<a href="'+ urls.pageCourseView + '?q={"id":' + cart.course.ID + '}" class="avatar avatar-4by3 avatar-sm mr-3">' +
                                '<img src="' + thumbnail + '" alt="' + cart.course.title + '" class="avatar-img rounded">' +
                            '</a>' +
                            '<div class="media-body">' +
                                '<a href="' + urls.pageCourseView + '?q={"index":' + cart.course.ID + '}" class="text-body"><strong>' + cart.course.title + '</strong></a>' +
                            '</div>' +
                        '</div>' +
                    '</td>' +
                    '<td class="text-center">' +
                        '<div class="d-flex align-items-center">' +
                            '<label>' + cart.package.credit + '</label>' +
                        '</div>' +
                    '</td>' +
                    '<td class="text-right">' +
                        '<p class="mb-0">&#3647;' + cart.package.price + ' บาท</p>' +
                    '</td>' +
                    '<td class="text-center">' +
                        '<button onclick="deleteItem(' + index + ',true)" class="btn btn-clear text-muted"><i class="material-icons font-size-24pt">close</i></button>' +
                    '</td>' +
                '</tr>';
        cart_list.innerHTML = cart_list.innerHTML + item;
    });
    total.innerHTML = "&#3647;" + t + " บาท";
}

async function deleteItem(index, isS){
    if(confirm('คุณต้องการลบ item นี้ใช่หรือไม่')){
        var c = null;
        if(isS) c = await data.cartsS.splice(index, 1);
        else c = await data.carts.splice(index, 1);
        
        await initCartList();

        if(c.ID != null){
            $.get(urls.routeMyCart + '?m=delete&id={"id":' + c.ID + '}', function( data ) {});
        }else{
            $.get(urls.routeMyCart + '?m=deleteS&index=' + index, function( data ) {});
        }
    }
}

async function checkOut(){
    if(data.isLoggedIn){
        window.location.href = await urls.pageCheckOut;
    }else{
        $('#registerModal').modal();
    }
}
