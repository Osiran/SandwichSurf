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
            bread = document.querySelector('.bread:checked').value;
            console.log(bread);
            break;
        case 2:
            cheese = document.querySelector('.cheese:checked').value;
            console.log(cheese);
            break;
        case 3:
            meat = document.querySelector('.meat:checked').value;
            console.log(meat);
            break;
        case 4:
            sauce = document.querySelector('.sauce:checked').value;
            console.log(sauce);
            break;
        case 5:
            vegetables = document.querySelector('.vegetables:checked').value;
            console.log(vegetables);

            /* Display order */
            bestellung.innerHTML =
            "Bread: " + bread + "<br>" +
            "Cheese: " + cheese + "<br>" +
            "Meat: " + meat + "<br>" +
            "Sauce: " + sauce + "<br>" +
            "Vegetables: " + vegetables + "<br>";
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