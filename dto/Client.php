<?php
class Client {

    public int $id_Client;
    public string $nom_Cli;
    public string $prenom_Cli;
    public string $date_de_naissance;
    public string $mail;
    public Agence $agence;
    
    public function __construct(int $id_Client, string $nom_Cli,string $prenom_Cli,string $date_de_naissance,string $mail,Agence $agence){
        $this->id       = $id_Client;
        $this->nom      = $nom_Cli;
        $this->prenom   = $prenom_Cli;
        $this->date     = $date_de_naissance;
        $this->mail     = $mail;
        $this->agence   = $agence;
    }
}



?>
