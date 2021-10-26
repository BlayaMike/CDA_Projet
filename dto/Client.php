<?php

require_once 'dto\ConnexionSingleton.php';

class Client {

    private int $id_Client;
    private string $nom_Cli;
    private string $prenom_Cli;
    private string $date_de_naissance;
    private string $mail;
    private int $id_agence;
    
    public function __construct(int $id_Client, string $nom_Cli,string $prenom_Cli,string $date_de_naissance,string $mail,int $id_agence?PDO $connexion = null){
        if ($this->connexion == null) {
            $this->connexion = ConnexionSingleton::getConnexion();
        } else {
            $this->connexion = $connexion;
        }
    
        $this->id       = $id_Client;
        $this->nom      = $nom_Cli;
        $this->prenom   = $prenom_Cli;
        $this->date     = $date_de_naissance;
        $this->mail     = $mail;
        $this->agence   = $id_agence;
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

    public function getid_Agence() {
        return $this-> agence;
        }
    
    public function getAll(): array
    {
        $sql =  "select * from agence as a";
        $resultset = $this->connexion->query($sql);
        $resultats = [];
        while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
            $AgenceEnCours = new Employe();
            $AgenceEnCours->setcodeAgence($row['code_agence']);
            $AgenceEnCours->setNom($row['nom']);
            $AgenceEnCours->setAdress($row['adress']);
            $resultats[] = $AgenceEnCours;
        }
        return $resultats;
    }
}

?>
