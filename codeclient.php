<?php 
$codeclient=fopen('.\bd\Client.csv', 'r');

$client=[];
$nom=["CODE_AGENCE,ID_CLI,NOM_CLI,PRENOM_CLI,DATE_DE_NAISSANCE,EMAIL
10,1,10,10,10,10
1,1,Blaya,Mike,20/10/1995,blaya@gmail.com"];
$identifiant=[];

$code=readline("entrez votre identifiant : ");

foreach ($client as $value) {
    $i=0;
    if($client[$i] && $value[0]==$code){
        print_r($value);
        break;
        fgetcsv($codeclient, ',');
    }  
    elseif ($nom[$i] && $value[0]==$code){
        print_r($value);
        break;
        fgetcsv($codeclient, ',');
    }
    elseif($identifiant[$i] && $value[0]==$code){
        print_r($value);
        break;
        fgetcsv($codeclient, ',');
    }
    else {
        echo("client introuvable");
         }  
    $i++;
    }
fclose($codeclient);
