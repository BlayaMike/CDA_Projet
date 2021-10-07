<?php 
$codeclient=fopen('Client.csv', 'w+');

$client=[
    [001,"Client 01 : débiteur, Martin Jacques, 17/10/1970,Agence d'Arras"],
    [002,"Client 02 : 12345 Type : créancier, Jean Dupont  15/06/1960, Agence de Béthune"],
    [003,"Client 03 : 56789 Type : créanciere, Martine Delporte, 05/02/1980, Agence de Lille"]
    ];

$code=readline("entrez votre identifiant : ");

foreach ($client as $value) {
    $i=0;
    if($client[$i] && $value[0]==$code){
        print_r($value);
        break;
        fputcsv($codeclient, $value);
    }  
    else {
        echo("client introuvable");
         }  
    $i++;
    
}
fclose($codeclient);