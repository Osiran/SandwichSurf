function bestellen(){
    window.location ="bestellen";
}

console.log("JS läuft");

let breadName = "";
let sauceName ="";
let meatName="";
let vegetableNames= [];
let cheeseName="";
let hideCounter = 1;

let breadId = "";
let cheeseId = "";
let meatId = "";
let sauceId = "";
let vegetableIds = [];
let bestellung = document.getElementById("showOrder");

/* Start with showing only first slider */
for(let i = 1; i <= 6; i++){
    if(i == 1){
        document.getElementById("slide" + i).style.display="block";
    }else {
        document.getElementById("slide" + i).style.display="none";
    }
}

/* Change to new slider */
function goNext(index){
    console.log(index);
    document.getElementById("slide" + index).style.display="none";
    document.getElementById("slide" + (index + 1)).style.display="block";

    switch(index){
        case 1:
            breadName = document.querySelector('.bread:checked').value;
            breadId = document.querySelector('.bread:checked').id;
            console.log(breadName);
            console.log(breadId);
            break;
        case 2:
            cheeseName = document.querySelector('.cheese:checked').value;
            chesseId = document.querySelector('.cheese:checked').id;
            console.log(cheeseName);
            console.log(chesseId);
            break;
        case 3:
            meatName = document.querySelector('.meat:checked').value;
            meatId = document.querySelector('.meat:checked').id;
            console.log(meatName);
            console.log(meatId);
            break;
        case 4:
            sauceName = document.querySelector('.sauce:checked').value;
            sauceId = document.querySelector('.sauce:checked').id;
            console.log(sauceName);
            console.log(sauceId);
            break;
        case 5:
            document.querySelectorAll('.vegetables:checked').forEach((element)=>{ vegetableNames.push(element.value)});
            document.querySelectorAll('.vegetables:checked').forEach((element)=>{ vegetableIds.push(element.id)});
            console.log(vegetableNames);
            console.log(vegetableIds);

            /* Display names of ingredient in form */
            document.getElementById("breadName").value = breadName;
            document.getElementById("cheeseName").value = cheeseName;
            document.getElementById("meatName").value = meatName;
            document.getElementById("sauceName").value = sauceName;
            document.getElementById("vegetablesName").value = vegetableNames;

            /* Display id of ingredient in form */
            document.getElementById("breadId").value = breadId;
            document.getElementById("cheeseId").value = cheeseId;
            document.getElementById("meatId").value = meatId;
            document.getElementById("sauceId").value = sauceId;
            document.getElementById("vegetablesId").value = vegetableIds;
            break;
        default:
            console.log("Bitte wählen Sie etwas gültiges aus!");
    }
}
/* Go to last slider */
function goBack(index){
    document.getElementById("slide" + index).style.display="none";
    document.getElementById("slide" + (index - 1)).style.display="block";
}

/* Validation for the first button */
function checkValue(){
    if(document.querySelector('.bread:checked').value){
        document.querySelector('button').disabled = false;
    }else{
        document.querySelector('button').disabled = true;
    }
}

/* Get Row Data */
function checkValue(){
    if(document.querySelector('.bread:checked').value){
        document.querySelector('button').disabled = false;
    }else{
        document.querySelector('button').disabled = true;
    }
}