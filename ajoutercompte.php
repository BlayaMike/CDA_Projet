<!DOCTYPE html>
<html lang="fr">

   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" media="all"/>
    <title>CDA Projet | Ajouter un compte bancaire</title>
  </head>
<body>
<header class="main-head"> 
  
<nav> 

<h1 id="logo"><a href = "Accueil.php">| THE-BANK $ |</a></h1>

<ul class="liste-items">
          
<li class="items">    
    <a href = "Accueil.php">Accueil</a>
</li>
          
<li class="items">
    Menu
<span>&#9660;</span>

<ul class="sub-menu">
   

<li class="items-sous-liste">
    <a href="recherchecompte.php">Recherche Compte</a> 
</li>
  

<li class="items-sous-liste">
    <a href="rechercheclient.php">Recherche Client</a> 
</li>
 

<li class="items-sous-liste">
<a href="AjouterAgence.php">Ajouter une Agence</a>  
</li>

<li class="items-sous-liste">
<a href="Ajouterclient.php">Ajouter un client</a>  
</li>


<li class="items-sous-liste">
<a href="Ajoutercompte.php">Ajouter un Compte</a>  
</li>

<li class="items-sous-liste">
<a href="Afficherliste.php">Afficher liste des comptes</a>  
</li>

<li class="items-sous-liste">
<a href="imprimer.php">imprimer les infos client</a>  
</li>

</ul>          


<li class="items">
    <a href="Contact.php">Contact</a>
</li>
    
</ul>    
  </nav>

</header>
<main>
    
  <section id="ajouter un compte bancaire" >
  <section class="hero">
  
    
    <h1>Ajouter un compte bancaire </h1>
    <input type="text" placeholder="Code agence..." id="Code_Agence"/>
    <input type="text" placeholder="Identifiant..." id="Identifiant_client" />
    <input type="text" placeholder="Identifiant Compte..." id="Identifiant_Compte" />
    <input type="text" placeholder="Type de compte..." id="Type_compte" />
    <input type="text" placeholder="Solde..." id="Solde_client" />
    <input type="button" id="button" value="Envoyer" /> 
  
</section>     
</main> 
<script src="index.js">


</script>          

</html>     
    
     
