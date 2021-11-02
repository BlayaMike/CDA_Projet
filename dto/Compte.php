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
    public function setCompte(?int $id_compte,string $type_Compte,?int $solde,bool $aDecovert,int $idagencebdd,int $idclientbdd)
    {
        $sql =  "insert into compte values (nextval('seq_compte'),$id_compte,'$type_Compte',$solde,$aDecovert, $idagencebdd,$idclientbdd);";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
    }
    
    
    public function deleteCompte(?int $id_compte)
    {
        $sql =  "delete from compte as c where c.numero=:id_compte";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':id_compte', $id_compte);
        $preparedQuery->execute();
    }
    
    public function updateCompte(Compte $newCompte) : ?Compte
    {
        $sql = "UPDATE compte 
                set numero=:id_compte,
                    type_compte=:typeCompte, 
                    solde=:solde,
                    decouvert=:decouvert,
                    id_agence=:id_agence,
                    id_cli=:id_client
                where numero = :id_compte";
        $preparedQuery = $this->connexion->prepare($sql);
        $numero = $newCompte->getid_Compte();
        $type_Compte = $newCompte->gettype_compte();
        $solde = $newCompte->getsolde();
        $decouvert = $newCompte->getaDecovert();
        $id_agence = $newCompte->getagence()->getCode_Agence();
        $id_client = $newCompte->getclient()->getid_Client();
        $preparedQuery->bindParam(':id_compte', $numero);
        $preparedQuery->bindParam(':typeCompte', $type_Compte);
        $preparedQuery->bindParam(':solde', $solde);
        $preparedQuery->bindParam(':decouvert', $decouvert);
        $preparedQuery->bindParam(':id_agence', $id_agence);
        $preparedQuery->bindParam(':id_client', $id_client);
        $preparedQuery->execute();

        return  $newCompte;
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


