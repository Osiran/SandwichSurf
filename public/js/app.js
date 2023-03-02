function bestellen(){
    window.location ="bestellen";
}

let bestellung = document.getElementById("showOrder");

/* Start with showing only first slider */
document.getElementById("slide1").style.display="block";
for(let i = 2; i <= 6; i++){
        document.getElementById("slide" + i).style.display="none";
}

/* Change to new slider */
function goNext(index, ingredient){
    document.getElementById("slide" + index).style.display="none";
    document.getElementById("slide" + (index + 1)).style.display="block";

    console.log("Hallo")
    if(index == 5){
        let vegNames =[];
        document.querySelectorAll('input[name="vegetables[]"]:checked').forEach((element)=>{
            vegNames.push(element.id);
        });
        document.getElementById("vegetablesName").value = vegNames;

    }else{
        
        document.getElementById(ingredient + "Name").value  = document.querySelector('input[name="'+ingredient+'"]:checked').value;
        document.getElementById(ingredient + "Id").value = document.querySelector('input[name="'+ingredient+'"]:checked').id;

    }   
    
      
}
/* Go to last slider */
function goBack(index){
    document.getElementById("slide" + index).style.display="none";
    document.getElementById("slide" + (index - 1)).style.display="block";
}
