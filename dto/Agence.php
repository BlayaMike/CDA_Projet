<?php

require_once 'dto/ConnexionSingleton.php';


class Agence {

    private ?int $code_Agence;
    private string $nom_Agence;
    private string $adress_Agence;
    private ?PDO $connexion = null;
    
    public function __construct(?int $code_Agence=null, string $nom_Agence=null,string $adress_Agence=null,?PDO $connexion = null){
        $this->code_Agence  = $code_Agence;
        $this->nom          = $nom_Agence;
        $this->adress       = $adress_Agence;
        if ($this->connexion == null) {
            $this->connexion = ConnexionSingleton::getConnexion();
        } else {
            $this->connexion = $connexion;
        } 

        
    }
    public function getCode_Agence(){
        return $this->code_Agence;
    }
    public function setCode_Agence(int $code_Agence){
        return $this->code_Agence = $code_Agence;
    }
    public function getNom_Agence(){
        return $this->nom;
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
    public function getAll(): array
    {
        $sql =  "select * from agence as a";
        $resultset = $this->connexion->query($sql);
        $resultats = [];
        while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
            $AgenceEnCours = new Agence();
            $AgenceEnCours->setCode_Agence($row['code_agence']);
            $AgenceEnCours->setNom_Agence($row['nom']);
            $AgenceEnCours->setAdress($row['adresse']);
            $resultats[] = $AgenceEnCours;
        }
        return $resultats;
    }
    public function setAgence(?int $code_Agence, string $nom_Agence,string $adress_Agence)
    {
        $sql =  "insert into agence values (nextval('seq_agence'),'$code_Agence','$nom_Agence','$adress_Agence');";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->execute();
    }
    public function deleteAgence(?int $code_Agence)
    {
        $sql =  "delete from agence as a where a.code_agence=:code_Agence";
        $preparedQuery = $this->connexion->prepare($sql);
        $preparedQuery->bindParam(':code_Agence', $code_Agence);
        $preparedQuery->execute();
    }
    public function updateAgence(Agence $newAgence) : ?Agence
    {
        $sql = "UPDATE agence 
                set code_agence=:code_Agence,
                    nom=:nom_Agence, 
                    adresse=:adress_Agence 
                where code_agence = :code_Agence";
        $preparedQuery = $this->connexion->prepare($sql);
        $code_Agence = $newAgence->getCode_Agence();
        $nom = $newAgence->getNom_Agence();
        $adress = $newAgence->getAdress();
        $preparedQuery->bindParam(':code_Agence', $code_Agence);
        $preparedQuery->bindParam(':nom_Agence', $nom);
        $preparedQuery->bindParam(':adress_Agence', $adress);
        $preparedQuery->execute();

        return  $newAgence;
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
