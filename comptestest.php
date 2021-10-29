<?php

require 'dto/Compte.php';

$compte = new Compte();


$comptes = $compte->getAll();

foreach ($comptes as $compte) {
    echo($compte->gettype_compte());
}




?>