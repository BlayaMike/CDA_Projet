<?php

class Compte {

    public int $id_compte;
    public string $type_Compte;
    public int $solde;
    public bool $aDecovert;
    public Client $client;
    public Agence $agence;

    public function __construct(int $id_compte,string $type_Compte,int $solde,bool $aDecovert,Client $client, Agence $agence){
        $this->id               = $id_compte;
        $this->typecompte       = $type_Compte;
        $this->solde            = $solde;
        $this->aDecovert        = $aDecovert;
        $this->client           = $client;
        $this->agence           = $agence;
    }
}



?>