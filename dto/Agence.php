<?php
class Agence {

    private int $code_Agence;
    private string $nom_Agence;
    private string $adress_Agence;
    
    public function __construct(int $code_Agence, string $nom_Agence,string $adress_Agence){
        $this->code       = $code_Agence;
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
}



?>
