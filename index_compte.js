let Num_Compte = document.getElementById("Numero_Compte");
let Code_Agence = document.getElementById("Code_Agence");
let id_Cli = document.getElementById("id_Cli");


let form1 = document.getElementById("form1");
let form2 = document.getElementById("form2");
let form3 = document.getElementById("form3");

let button1 = document.getElementById("button1");
let button2 = document.getElementById("button2");
let button3 = document.getElementById("button3");

button1.addEventListener("click",test,false);
button2.addEventListener("click",test2,false);
button3.addEventListener("click",test3,false);

/*
var txtFile = new XMLHttpRequest();

txtFile.open("GET", ".\bd\Compte.csv", true);
*/

function test(){
    form1.hidden = true;
    form2.hidden = false;
}


function test2(){
    form2.hidden = false;
    form3.hidden = true;
}


function test3(){
    form3.hidden = true;
}