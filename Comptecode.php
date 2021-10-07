<?php

function csvtoArray($compteclient) {
$compteclient=fopen(".\bd\Compte.csv", "r");

$Compte=[];

while (!feof($compteclient)) {
    $Compte = fgetcsv($compteclient,1024,",");
}

$code=readline("entrez votre n° de compte : ");

foreach ($Compte as $value) {
    $i=0;
    if($Compte[$i] && $value[0]==$code){
        print_r($value);
    }  
    else {
        echo("compte introuvable 
        ");
         }  
    $i++;
    
}

fclose($compteclient);
return;
}