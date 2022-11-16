function bestellen(){
    window.location ="bestellen";
}



console.log("passt");

let bread = "";
let sauce ="";
let meat="";
let vegetables= [];
let cheese="";
let hideCounter



document.getElementById("bread").addEventListener("submit", function(){
    var checkedValue = document.querySelector('.bread:checked').value;
    console.log(checkedValue);
})

function ChangeHiddenElement(){
   
    hideElement();
 hideCounter++;
}

function hideElement(){
    document.getElementById("bread").hidden = true;
    document.getElementById("sauce").hidden = true;
    document.getElementById("meat").hidden = true;
    document.getElementById("vegetables").hidden = true;

    switch (hideCounter) {
        case 0:
            document.getElementById("bread").hidden = false;
          break;
        case 1:
            document.getElementById("sauce").hidden = false;
            
    }
    }