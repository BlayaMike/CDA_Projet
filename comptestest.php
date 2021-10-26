<?php

require 'dto/Agence.php';

$Agence = new Agence();
$agences = $Agence->getAll();


foreach ($agences as $agence) {
    if($agence->getCode_Agence()==1){
        var_dump($agences);
    }
}

require "../Fiche_Compte.php";



?>