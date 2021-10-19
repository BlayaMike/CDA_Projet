<?php 
require "dto\Compte.php";

if(!isset($_GET["id_compte"])){
   echo "<div> Erreur </div>";
}else{

$idClient = intval($_GET["id_client"]); 
$compte1 = new Compte();
$client = $clientDao->getById($id_compte);
?>
<div>
    <h2>Liste Clients : </h2>
    <ul>
        <li> id : <?php echo $client->getId();?></li>
        <li> Nom : <?php echo  $client->getNom();?></li>
        <li> Prenom : <?php echo  $client->getPrenom();?></li>
        <li> Date de naissance : <?php echo  $client->getDateNaissance()->format("d-m-Y");?></li>
        <li> Telephone : <?php echo  $client->getTelephone();?></li>
        <li> Email : <?php echo $client->getEmail();?></li>
        <li> Adresse : <?php echo $client->getAdresse();?></li>
    </ul>
</div>
<?php }?>