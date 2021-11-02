<?php

require_once 'dto/ConnexionSingleton.php';
require_once 'dto/Client.php';
require_once 'dto/Compte.php';


class Compte {

    private ?int $id_compte;
    private string $type_Compte;
    private ?int $solde;
    private bool $aDecovert;
    private ?Client $client;
    private ?Agence $agence;
    private ?PDO $connexion= null;

    public function __construct(?int $id_compte=null,string $type_Compte=null,?int $solde=null,bool $aDecovert=false,?Agence $agence=null,?Client $client=null,?PDO $connexion = null){
        
        $this->id               = $id_compte;
        $this->typeCompte       = $type_Compte;
        $this->solde            = $solde;
        $this->aDecovert        = $aDecovert;
        $this->client           = $client;
        $this->agence           = $agence;
        if ($this->connexion == null) {
            $this->connexion = ConnexionSingleton::getConnexion();
        } else {
            $this->connexion = $connexion;
        }
    }

    public function getid_Compte() {
        return $this-> id;
    }
    
    public function setid_Compte(int $id_compte) {
        return $this-> id = $id_compte;
    }

    public function gettype_compte() {
        return $this->typeCompte;
    }
    
    public function settype_compte(string $type_Compte){
        return $this->typeCompte = $type_Compte;
    }

    public function getsolde() {
        return $this->solde;
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
        $sql =  "select * from compte as c";
        $resultset = $this->connexion->query($sql);
        $resultats = [];
        while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
            $CompteEnCours = new Compte();
            $CompteEnCours->setid_Compte($row['numero']);
            $CompteEnCours->settype_compte($row['type_compte']);
            $CompteEnCours->setsolde($row['solde']);
            $CompteEnCours->setaDecovert($row['decouvert']);
            $resultats[] = $CompteEnCours;
        }
        return $resultats;
    }
    /*public function setCompte(?int $id_compte,string $type_Compte,?int $solde,bool $aDecovert,?Agence $agence,?Client $client)
    {
        $sql =  "insert into client values (nextval('seq_client'),'$id_Client','$nom_Cli','$prenom_Cli',to_date('$date_de_naissance','dd/MM/yy'),'$mail',$id_agence);";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
    }
    public function deleteCompte(?int $id_Client)
    {
        $sql =  "delete from client as c where c.numero=:id_client";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':id_client', $id_Client);
        $preparedQuery->execute();
    }
    public function updateCompte(Client $newClient) : ?Client
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
        $preparedQuery->bindParam(':adress_Agence', $date_de_naissance);
        $preparedQuery->bindParam(':adress_Agence', $email);
        $preparedQuery->bindParam(':adress_Agence', $id_agence);
        $preparedQuery->execute();

        return  $newClient;
    }
    */

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


