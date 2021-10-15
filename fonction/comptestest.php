<?php

require("constants.php");

$fichierAgence = FILE_AGENCE;
$fichierClient = FILE_CLIENT;
$fichierCompte = FILE_COMPTE;

$comptes=[];

$fp=fopen($fichierCompte,"r");
    while(!feof($fp)){
        $comptes[]= fgetcsv($fp,1024,",");
    }        
fclose($fp);
        
foreach ($comptes as $val) {
    if($val!=null){
        if($_POST["Numero_Compte"]==$val[2]){
            require("Compte.php");
        }
    }
}


?>