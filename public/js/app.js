function bestellen(){
    window.location ="bestellen";
}



console.log("passt");

let bread = "";
let sauce ="";
let meat="";
let vegetables= [];
let cheese="";



document.getElementById("bread").addEventListener("submit", function(){
    var checkedValue = document.querySelector('.bread:checked').value;
    console.log(checkedValue);
})

