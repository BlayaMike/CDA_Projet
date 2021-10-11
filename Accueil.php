<!DOCTYPE html>
<html lang="fr">

   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" media="all"/>
    <title>CDA Projet | Accueil</title>
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
    
<section class="hero">
  
 <form id="form" method=post>
         
   <div class="flex"> 
    <div id="colonne1">
    <div><button type="submit" formaction="recherchecompte.php">Rechercher un Compte</button><br></div> 
    <div><button type="submit" formaction="rechercheclient.php">Rechercher un Client</button><br></div> 
    <div><button type="submit" formaction="AjouterAgence.php">Ajouter une Agence</button><br></div> 

    </div> 
    <div id="colonne2">

    <div><button type="submit" formaction="Ajouterclient.php">Ajouter un Client</button><br></div> 
    <div><button type="submit" formaction="ajoutercompte.php">Ajouter un Compte</button><br></div> 
    <div><button type="submit" formaction="Afficherliste.php">Afficher listes des comptes</button><br></div> 

    </div> 
    
 </form>
     
    
<form>
   </div><div  id="3">
   <div><button type="submit" formaction="imprimer.php">Imprimer les infos clients</button><br></div>      
</form>

</section>     
</main> 
<script src="index.js">


</script>        

</html>     
    
     


    
    
    
    