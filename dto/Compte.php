<?php

require 'dto/ConnexionSingleton.php';

class Compte {

    private int $id_compte;
    private string $type_Compte;
    private int $solde;
    private bool $aDecovert;
    private Client $client;
    private Agence $agence;

    public function __construct(int $id_compte,string $type_Compte,int $solde,bool $aDecovert,Client $client, Agence $agence,?PDO $connexion = null){
        if ($this->connexion == null) {
            $this->connexion = ConnexionSingleton::getConnexion();
        } else {
            $this->connexion = $connexion;
        }
        $this->id               = $id_compte;
        $this->typecompte       = $type_Compte;
        $this->solde            = $solde;
        $this->aDecovert        = $aDecovert;
        $this->client           = $client;
        $this->agence           = $agence;
        
    }

    public function getid_Compte() {
        return $this-> id;
    }
    
    public function setid_Compte(int $id_compte) {
        return $this-> id = $id_compte;
    }

    public function gettype_compte() {
        return $this-> typeCompte;
    }
    
    public function settype_compte(string $type_Compte){
        return $this->typeCompte = $type_Compte;
    }

    public function getsolde() {
        return $this-> solde;
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

    public function getclient() {
        return $this-> client;
        }

    public function getagence() {
        return $this-> agence  ;
    }
    public function getAll(): array
    {
        $sql =  "select * from agence as a";
        $resultset = $this->connexion->query($sql);
        $resultats = [];
        while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
            $CompteEnCours = new Compte();
            $CompteEnCours->setid_Compte($row['numero']);
            $CompteEnCours->settype_compte($row['type_compte']);
            $CompteEnCours->setsolde($row['Solde']);
            $CompteEnCours->setaDecovert($row['decouvert']);
            $resultats[] = $CompteEnCours;
        }
        return $resultats;
    }
}
?>


