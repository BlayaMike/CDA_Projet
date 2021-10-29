<?php

require_once 'dto/ConnexionSingleton.php';
require_once 'dto/Client.php';
require_once 'dto/Compte.php';


class Compte {

    private ?int $id_compte;
    private string $type_Compte;
    private ?int $solde;
    private bool $aDecovert;
    //private ?Client $client;
    private ?Agence $agence;
    private ?PDO $connexion= null;

    public function __construct(?int $id_compte=null,string $type_Compte=null,?int $solde=null,bool $aDecovert=false,?Agence $agence=null,?PDO $connexion = null){
        
        $this->id               = $id_compte;
        $this->typeCompte       = $type_Compte;
        $this->solde            = $solde;
        $this->aDecovert        = $aDecovert;
        //$this->client           = $client;
        $this->agence           = $agence;
        if ($this->connexion == null) {
            $this->connexion = ConnexionSingleton::getConnexion();
        } else {
            $this->connexion = $connexion;
        }
    }

    public function getid_Compte() {
        return $this-> id;
    }
    
    public function setid_Compte(int $id_compte) {
        return $this-> id = $id_compte;
    }

    public function gettype_compte() {
        return $this->typeCompte;
    }
    
    public function settype_compte(string $type_Compte){
        return $this->typeCompte = $type_Compte;
    }

    public function getsolde() {
        return $this->solde;
    }
    
    public function setsolde(int $solde){
        return $this->solde = $solde;
    }

    public function getaDecovert() {
        return $this-> aDecovert;
        }
    
    public function setaDecovert(bool $aDecovert){
        return $this->aDecovert = $aDecovert;
    }

   /* public function getclient() {
        return $this-> client;
        }*/

    public function getagence() {
        return $this-> agence  ;
    }
    public function getAll(): array
    {
        $sql =  "select * from compte as c";
        $resultset = $this->connexion->query($sql);
        $resultats = [];
        while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
            $CompteEnCours = new Compte();
            $CompteEnCours->setid_Compte($row['numero']);
            $CompteEnCours->settype_compte($row['type_compte']);
            $CompteEnCours->setsolde($row['solde']);
            $CompteEnCours->setaDecovert($row['decouvert']);
            $resultats[] = $CompteEnCours;
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


