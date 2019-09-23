var price = document.querySelector('#price');

let packages = JSON.parse(document.querySelector('#obj-packages').innerHTML);
let urls = JSON.parse(document.querySelector('#obj-urls').innerHTML);

var selectedPackage = null;

changeCost(document.querySelector('#custom-select'));

function changeCost(input){
    let value = input.value;

    packages.forEach(element => {
        if(value == element.ID){
            price.innerHTML = element.price;
            selectedPackage = element;
        }
    });
}

function buy(){
    window.location.href = urls.pageMyCart + "?m=add" + "&q=" + JSON.stringify(selectedPackage);
}