<?php

require_once 'dto/ConnexionSingleton.php';


class Agence {

    private ?int $code_Agence;
    private string $nom_Agence;
    private string $adress_Agence;
    private ?PDO $connexion = null;
    
    public function __construct(?int $code_Agence=null, string $nom_Agence=null,string $adress_Agence=null,?PDO $connexion = null){
        $this->code_Agence  = $code_Agence;
        $this->nom          = $nom_Agence;
        $this->adress       = $adress_Agence;
        if ($this->connexion == null) {
            $this->connexion = ConnexionSingleton::getConnexion();
        } else {
            $this->connexion = $connexion;
        } 

        
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

    /**
     * Get the value of connexion
     */ 
    public function getConnexion()
    {
        return $this->connexion;
    }

    /**
     * Set the value of connexion
     *
     * @return  self
     */ 
    public function setConnexion($connexion)
    {
        $this->connexion = $connexion;

        return $this;
    }
}



?>
