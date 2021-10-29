<!DOCTYPE html>
<html lang="fr">

   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" media="all"/>
    <title>CDA Projet | Recherche Comptes</title>
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
    
  <section id="recherche agence" >
  <section class="hero">
  <div id="form1" >
    <form action="comptestest.php" method="POST">
      <h1>Rechercher un Compte </h1>
      <input type="text" name="Numero_Compte" >
      <input type="submit" value="Valider">
    </form>    
  </div>  
  <div id="A">

  </div>
  <div id="form2" hidden>
    <form >
      <h1>Rechercher un Compte </h1>
      <input type="text" placeholder="Code de l'agence..." id="Code Agence">
      <button type="submit" id="button2" value="Envoyer" /> 
    </form>
  </div>
  <div id="form3" hidden>
    <form>
      <h1>Rechercher un Compte </h1>
      <input type="text" placeholder="ID du client..." id="id_Cli">
      <input type="submit" id="button3" value="Envoyer" /> 
    </form>
  </div>
</section>     
</main>
<script src="index_compte.js">


</script>

</html>     
