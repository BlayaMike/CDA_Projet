<?php
$codeagence2=fopen("Agence.csv", "r");

$agences=[
    ["62","AGENCE D_ARRAS","10 rue Pasteur"],
    ["80","AGENCE D'AMIENS","3 rue des Lilas"],
    ["59","AGENCE DE LILLE","18 boulevard Vauban"]
    ];

$code=readline("entrez votre code d'agence : ");

foreach ($agences as $value) {
    $i=0;
    if($agences[$i] && $value[0]==$code){
        print_r($value);
        break;
        fgetcsv($codeagence2);
    
    }  
    else {
        echo("agence introuvable");
         }  
    $i++;
    
}
fclose($codeagence2);
?>
