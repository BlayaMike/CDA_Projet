<!DOCTYPE html>
<html lang="fr">

   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" media="all"/>
    <title>CDA Projet | Acceuil</title>
  </head>
<body>
<header class="main-head"> 
  
  <nav> 
    <label id="logo">| THE-BANK $ |</label>
    <ul id="nav_ul">
          <li>Accueil</li>
          <li>menu</li>
          <li>Contact</li>
    </ul>
  </nav>
</header> 
<form name="inscription" method="post" action=".php">
    Entrez votre Code_Agence : <input type="text" name="Code_Agence"/> <br/>
    Entrez votre Nom_Agence : <input type="text" name="Nom_Agence"/> <br/>
    Entrez votre Adress_Agence : <input type="text" name="Adress_Agence"/> <br/>
    <input type="submit" name="valider" value="OK"/>
</form>

<?php 

$CodeAgence=0;
$nomAgence="";
$adressAgence="";
$fichierAgence=".\bd\Agence.csv";

$Code_Agence = $_POST('Code_Agence');
$Nom_Agence = $_POST('Nom_Agence');
$Adress_Agence = $_POST('Adress_Agence');

$agences=[];

$agences=AjouterUneAgence($agences);

$fp=fopen($fichierAgence,"a+");
foreach($agences as $agence){
        fputcsv($fp,$agence,",");
}
unset($agence);
fclose($fp);

?>
</body>
