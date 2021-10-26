<?php

require 'dto/ConnexionSingleton.php';


class Agence {

    private int $code_Agence;
    private string $nom_Agence;
    private string $adress_Agence;
    
    public function __construct(int $code_Agence=null, string $nom_Agence=null,string $adress_Agence=null,?PDO $connexion = null){
        if ($this->connexion == null) {
            $this->connexion = ConnexionSingleton::getConnexion();
        } else {
            $this->connexion = $connexion;
        }
        $this->nom      = $nom_Agence;
        $this->adress   = $adress_Agence;
    }
    public function getCode_Agence(){
        return $this->code;
    }
    public function setCode_Agence(int $code_Agence){
        return $this->code = $code_Agence;
    }
    public function getNom_Agence(){
        return $this->code;
    }        
    public function setNom_Agence(string $nom_Agence){
        return $this->nom = $nom_Agence;
    }
    public function getAdress(){
        return $this->adress;
    }        
    public function setAdress(string $adress){
        return $this->adress = $adress;
    }
    public function getAll(): array
    {
        $sql =  "select * from agence as a";
        $resultset = $this->connexion->query($sql);
        $resultats = [];
        while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
            $AgenceEnCours = new Agence();
            $AgenceEnCours->setCode_Agence($row['code_agence']);
            $AgenceEnCours->setNom_Agence($row['nom']);
            $AgenceEnCours->setAdress($row['adresse']);
            $resultats[] = $AgenceEnCours;
        }
        return $resultats;
    }
}



?>
