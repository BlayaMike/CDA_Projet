
/*
let Code_agence = document.getElementById("Code_Agence");
let Nom_agence = document.getElementById("Nom_Agence");
let Adress_agence = document.getElementById("Adress_Agence");
let button = document.getElementById("button");

const code=0;
const nom="";
const adress="";
*/
//button.addEventListener("click",test);

var txtFile = new XMLHttpRequest();
txtFile.open("GET", "file://d:/data.txt", true);
txtFile.onreadystatechange = function()
{
    allText = txtFile.responseText;
    allTextLines = allText.split(/\r\n|\n/);
}

/*
function test(){
    Code_agence.value;
    Nom_agence.value;
    Adress_agence.value;
}
*/