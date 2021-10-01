<?php
$idClient=0;
$nomClient="";
$prénomClient="";
$dateNaissance="";
$email="";
$NumCompte="";
$typeCompte="";
$CodeAgence=0;
$nomAgence="";
$fichier=".\bd\Client.txt";

$nomClient=readline("Veuillez entrer le nom du client : ");
$prénomClient=readline("Veuillez entrer le prénom du client : ");
$dateNaissance=readline("Veuillez entrer la date de naissance du client : ");
$email=readline("Veuillez entrer l'email du client : ");
$NumCompte=readline("Quel sera le num du compte pour ce client : ");
$typeCompte=readline("Quel sera le type de compte : ");
$CodeAgence=readline("Code de l'agence : ");
$nomAgence=readline("Nom de l'agence : ");

$client=[];
$leclient=[ 

        $nomClient,
        $prénomClient,
        $dateNaissance,
        $email,
        $NumCompte,
        $typeCompte,
        $CodeAgence,
        $nomAgence

];

for($i=0;$i<2;$i++){
    for($j=0;$j<2;$j++){
        $client[]=$leclient;
    }
}

$fp=fopen($fichier,"w");
fputcsv($fp,$client);

fclose($fichier);
?>