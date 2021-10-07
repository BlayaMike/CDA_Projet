<?php
while(1){

    $agences=[["CODE_AGENCE","NOM_AGENCE","ADRESSE_AGENCE"]];
$code=readline("entrez votre code d'agence : ");
if ($code==62000) {
    echo("Agence d'Arras
10 rue pasteur \n");
break;
}
elseif($code==62400) {
    echo("Agence de Béthune 
3 rue des lilas \n");
break;
}
elseif($code==59000) {
    echo("Agence de Lille
18 boulevard Vauban \n");
break;
}
else { 
    echo("agence non attribuée \n");

} 
}
while(1){
$clients=[["CODE_AGENCE","ID_CLI","NOM_CLI","PRENOM_CLI","DATE_DE_NAISSANCE","NOM_AGENCE"]];

$ID;
$ID=readline("entrez votre identifiant \n");
if ($ID==0001) {
    echo( "62000 
Compte : 01234
Type : débiteur 
Martin Jacques 
17/10/1970
Agence d'Arras");
break;
}
elseif($ID==0002) {
    echo( "62400 
    Compte : 12345
    Type : créancier 
    Jean Dupont 
    15/06/1960
    Agence de Béthune");
    break;
}
elseif($ID==0003) {
    echo( "62400 
    Compte : 56789
    Type : créanciere
    Martine Delporte 
    05/02/1980
    Agence de Lille");  
    break;
}
else {
    echo("entrez un ID valide");
}
}
while(3){
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
break;
}
elseif($compt==12345) {
    echo( "62400 
    Compte : 12345
    Type : créancier 
    Jean Dupont 
    15/06/1960
    Agence de Béthune");
    break;
}
elseif($compt==56789) {
    echo( "62400 
    Compte : 56789
    Type : créanciere
    Martine Delporte 
    05/02/1980
    Agence de Lille");  
    break;
}
else {
    echo("entrez un compte valide");
}
}
?>