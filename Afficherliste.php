<!DOCTYPE html>
<html lang="fr">

   <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css" media="all"/>
    <title>CDA Projet | Afficher liste des comptes </title>
    </head>
<body>
<header class="main-head"> 
  
  <nav> 

  <h1 id="logo"><a href = "index.php">| THE-BANK $ |</a></h1>

<ul class="liste-items">
          
<li class="items">    
    <a href = "index.php">Accueil</a>
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
    
  <section id="Afficher liste" >
  <section class="hero">
  
     
    <h1>Afficher la liste des comptes d'un client </h1>
    <form action="ListeCompte.php" method="POST">
      <input type="text" placeholder="ID..." id="_" />
      <input type="submit" id="btn-envoi" value="Envoyer" /> 
    </form>

</section>     
</main> 
<script src="test.js">


</script>          

</html>     
    
     

