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
    public function setClient(int $id_Client, string $nom_Cli,string $prenom_Cli,string $date_de_naissance,string $mail,int $id_agence)
    {
        $sql =  "insert into client values (nextval('seq_client'),'$id_Client','$nom_Cli','$prenom_Cli',to_date('$date_de_naissance','dd/MM/yy'),'$mail',$id_agence);";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
    }
    public function deleteClient(?int $id_Client)
    {
        $sql =  "delete from client as c where c.numero=:id_client";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':id_client', $id_Client);
        $preparedQuery->execute();
    }
    public function updateClient(Client $newClient) : ?Client
    {
        $sql = "UPDATE client 
                set numero=:id_client,
                    nom=:nom_client, 
                    date_de_naissance=:date_de_naissance,
                    email=:email,
                    id_agence=:id_agence
                where numero = :id_client";
        $preparedQuery = $this->connexion->prepare($sql);
        $numero = $newClient->getid_Client();
        $nom_Client = $newClient->getnom_Cli();
        $date_de_naissance = $newClient->getdate_de_naissance();
        $email = $newClient->getmail();
        $id_agence = $newClient->getid_Agence();
        $preparedQuery->bindParam(':code_Agence', $numero);
        $preparedQuery->bindParam(':nom_Agence', $nom_Client);
        $preparedQuery->bindParam(':date_de_naissance', $date_de_naissance);
        $preparedQuery->bindParam(':email', $email);
        $preparedQuery->bindParam(':id_agence', $id_agence);
        $preparedQuery->execute();

        return  $newClient;
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
