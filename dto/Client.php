<?php

require_once 'dto\ConnexionSingleton.php';

class Client {

    private int $id_Client;
    private string $nom_Cli;
    private string $prenom_Cli;
    private string $date_de_naissance;
    private string $mail;
    private int $id_agence;
    private ?PDO $connexion= null;
    
    public function __construct(int $id_Client=null, string $nom_Cli=null,string $prenom_Cli=null,string $date_de_naissance=null,string $mail=null,int $id_agence=null,?PDO $connexion = null){
        
    
        $this->id       = $id_Client;
        $this->nom      = $nom_Cli;
        $this->prenom   = $prenom_Cli;
        $this->date     = $date_de_naissance;
        $this->mail     = $mail;
        $this->agence   = $id_agence;
        if ($this->connexion == null) {
            $this->connexion = ConnexionSingleton::getConnexion();
        } else {
            $this->connexion = $connexion;
        }
    }

    public function getid_Client() {
        return $this-> id;
    }
    public function setid_Client(int $id_Client) {
        return $this->id = $id_Client;
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
        $sql =  "select * from client as c";
        $resultset = $this->connexion->query($sql);
        $resultats = [];
        while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
            $ClientEnCours = new Client();
            $ClientEnCours->setid_Client($row['numero']);
            $ClientEnCours->setnom_Cli($row['nom']);
            $ClientEnCours->setprenom_Cli($row['prenom']);
            $ClientEnCours->setdate_de_naissance($row['date_de_naissance']);
            $ClientEnCours->setmail($row['email']);
            $resultats[] = $ClientEnCours;
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
