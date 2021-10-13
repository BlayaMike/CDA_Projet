/*
let Num_Compte = document.getElementById("Numero_Compte");
let Code_Agence = document.getElementById("Code_Agence");
let id_Cli = document.getElementById("id_Cli");


let form1 = document.getElementById("form1");
let form2 = document.getElementById("form2");
let form3 = document.getElementById("form3");

let button1 = document.getElementById("button1");
let button2 = document.getElementById("button2");
let button3 = document.getElementById("button3");

let num = 0;






function test(){
    if(form1.hidden == false ){
        
        if(Num_Compte.value==num){
            button1.addEventListener("click",test,false);
        }

        form1.hidden = true;
        form2.hidden = false;
    }
    else if(form2 == false){
        form2.hidden = true;
        form3.hidden = false;
        button1.addEventListener("click",test,false);
    }
    else {
        form3.hidden = true;
        button1.addEventListener("click",test,false);
    }
}

test();
*/

fetch(".\\bd\\Compte.json")
    .then(res => res.json())
    .then(data => console.log(data));


