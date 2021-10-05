<?php

$agences=[["CODE_AGENCE","NOM_AGENCE","ADRESSE_AGENCE"]];
$code=readline("entrez votre code d'agence : ");
if ($code==62000) {
    echo("Agence d'Arras
10 rue pasteur");
}
elseif($code==62400) {
    echo("Agence de Béthune 
3 rue des lilas");
}
elseif($code==59000) {
    echo("Agence de Lille
18 boulevard Vauban");
}
else { 
    echo("agence non attribuée");

} 
$clients=[["CODE_AGENCE","ID_CLI","NOM_CLI","PRENOM_CLI","DATE_DE_NAISSANCE","NOM_AGENCE"]];

$ID;
$ID=readline("

entrez votre identifiant");
if ($ID==0001) {
    echo( "62000 
Compte : 01234
Type : débiteur 
Martin Jacques 
17/10/1970
Agence d'Arras");
}
elseif($ID==0002) {
    echo( "62400 
    Compte : 12345
    Type : créancier 
    Jean Dupont 
    15/06/1960
    Agence de Béthune");
}
elseif($ID==0003) {
    echo( "62400 
    Compte : 56789
    Type : créanciere
    Martine Delporte 
    05/02/1980
    Agence de Lille");  
}
else {
    echo("entrez un ID valide");
    return $ID;
}
$comptes=[["ID_CLI","CODE_AGENCE","ID_COMPTE","TYPE","NOM_CLI","PRENOM_CLI","NOM_AGENCE"]];
$compt=readline("

entrez votre n° de compte");
if ($compt==01234) {
    echo( "62000 
Compte : 01234
Type : débiteur 
Martin Jacques 
17/10/1970
Agence d'Arras");
}
elseif($compt==12345) {
    echo( "62400 
    Compte : 12345
    Type : créancier 
    Jean Dupont 
    15/06/1960
    Agence de Béthune");
}
elseif($compt==56789) {
    echo( "62400 
    Compte : 56789
    Type : créanciere
    Martine Delporte 
    05/02/1980
    Agence de Lille");  
}
else {
    echo("entrez un compte valide");
    return $compte;
}
?>