<?php
class Client {

    private int $id_Client;
    private string $nom_Cli;
    private string $prenom_Cli;
    private string $date_de_naissance;
    private string $mail;
    private Agence $agence;
    
    public function __construct(int $id_Client, string $nom_Cli,string $prenom_Cli,string $date_de_naissance,string $mail,Agence $agence){
        $this->id       = $id_Client;
        $this->nom      = $nom_Cli;
        $this->prenom   = $prenom_Cli;
        $this->date     = $date_de_naissance;
        $this->mail     = $mail;
        $this->agence   = $agence;
    }

    public function getid_Client() {
    return $this-> id;
    }
    
    public function getnom_Cli() {
        return $this-> nom;
        }
    
    public function setnom_Cli(string $nom_Cli){
        return $this->nom = $nom_Cli;
    }

    public function getprenom_Cli() {
        return $this-> prenom;
        }
    
    public function setprenom_Cli(string $prenom_Cli){
        return $this->prenom = $prenom_Cli;
    }

    public function getdate_de_naissance() {
        return $this-> date;
        }
    
    public function setdate_de_naissance(string $date_de_naissance){
        return $this->date = $date_de_naissance;
    }

    public function getmail() {
        return $this-> mail;
        }
    
    public function setmail(string $mail){
        return $this->mail = $mail;
    }

    public function getAgence() {
        return $this-> agence;
        }
    


}

?>
