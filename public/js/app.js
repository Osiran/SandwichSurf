function bestellen(){
    window.location ="bestellen";
}

console.log("JS läuft");

let bread = "";
let sauce ="";
let meat="";
let vegetables= [];
let cheese="";
let hideCounter = 1;

for(let i = 1; i <= 5; i++){
    if(i == 1){
        document.getElementById("slide" + i).style.display="block";
    }else {
        document.getElementById("slide" + i).style.display="none";
    }
}

function goNext(index){
    document.getElementById("slide" + index).style.display="none";
    document.getElementById("slide" + (index + 1)).style.display="block";
}

function goBack(index){
    document.getElementById("slide" + index).style.display="none";
    document.getElementById("slide" + (index - 1)).style.display="block";
}

// document.getElementById("btn" + hideCounter).addEventListener("click", function(){
//     console.log("it works!");

//     // var checkedValue = document.querySelector('.bread:checked').value;
//     // console.log(checkedValue);

//     hideCounter++;
//     console.log(hideCounter);

//     ChangeHiddenElement();
// })