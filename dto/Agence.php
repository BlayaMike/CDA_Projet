<?php
class Agence {

    public int $code_Agence;
    public string $nom_Agence;
    public string $adress_Agence;
    
    public function __construct(int $code_Agence, string $nom_Agence,string $adress_Agence){
        $this->id       = $code_Agence;
        $this->nom      = $nom_Agence;
        $this->adress   = $adress_Agence;
    }
}



?>
