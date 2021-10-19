<?php

class Compte {

    private int $id_compte;
    private string $type_Compte;
    private int $solde;
    private bool $aDecovert;
    private Client $client;
    private Agence $agence;

    public function __construct(int $id_compte,string $type_Compte,int $solde,bool $aDecovert,Client $client, Agence $agence){
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
}
?>


