function confirmDelete(url){
    if(confirm('คุณต้องการลบ item นี้ใช่หรือไม่')){
        window.location = url;
    }
}

function confirmCancel(url){
    if(confirm('คุณต้องการยกเลิกการเปลี่ยนแปลงนี้ ใช่หรือไม่')){
        window.location = url;
    }
}

function uploadToBase64(input, width, height){
    return new Promise((resolve, reject) => {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {    
                var img = document.createElement("img");
                img.src = e.target.result;
                img.onload = function(){
                    var canvas = document.createElement("canvas");
                    canvas.width = width;
                    canvas.height = height;
                    var ctx = canvas.getContext("2d");
                    ctx.fillStyle = "#FFFFFF";
                    ctx.fillRect(0, 0, width, height);
                    ctx.drawImage(img, 0, 0, width, height);
                    var dataurl = canvas.toDataURL('image/jpeg', 0.8);
    
                    resolve(dataurl);
                }
            };
    
            reader.readAsDataURL(input.files[0]);
        }else{
            reject(null);
        }
    });
}

function uploadToPicture(input, width, height, img_id, input_id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {    
            var img = document.createElement("img");
            img.src = e.target.result;
            img.onload = function(){
                var canvas = document.createElement("canvas");
                canvas.width = width;
                canvas.height = height;
                var ctx = canvas.getContext("2d");
                ctx.fillStyle = "#FFFFFF";
                ctx.fillRect(0, 0, width, height);
                ctx.drawImage(img, 0, 0, width, height);
                var dataurl = canvas.toDataURL('image/jpeg', 0.8);

                $(img_id).attr('src', dataurl);    
                //$(input_id).val(dataurl);
                $(input_id).val('');
            }
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function uploadToPictureRaw(input, img_id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {    
            $(img_id).attr('src', e.target.result); 
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function youtube(id, title){
    let db = Connect();
    db.addToDB('vid_his', {id: id, title: title});
    let url = 'https://www.youtube.com/watch?v=' + id;
    window.open(url, '_blank');
}