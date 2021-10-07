<?php 
$codeclient=fopen('.\bd\Client.csv', 'r');

$client=[];

$code=readline("entrez votre identifiant : ");

foreach ($client as $value) {
    $i=0;
    if($client[$i] && $value[0]==$code){
        print_r($value);
        break;
        fgetcsv($codeclient);
    }  
    else {
        echo("client introuvable");
         }  
    $i++;
    
}
fclose($codeclient);