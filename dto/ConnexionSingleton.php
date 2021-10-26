<?php
class ConnexionSingleton{
    public static ?PDO $connexion = null;

    
    public static function getConnexion() : PDO
    {
        if(static::$connexion == null){
            static::$connexion = static::getConnexionByDetails();
        }
        return static::$connexion;
    }
    public static function getConnexionByDetails(
        string $host = 'localhost',
        string $db = 'CDA',
        string $port = '5432',
        string $username = 'postgres',
        string $password = 'adapeco')
    {
            $connStr = "pgsql:host=$host;port=$port;dbname=$db;user=$username;password=$password";
            
            try {
                // crée une connexion postgresql
                $conn = new PDO($connStr);
            
                // Affiche un message si vous êtes connectées à postgresql
                if ($conn) {
                    //echo "Connected to the $db database successfully! \n";
                    return $conn; 
                }
            } catch (PDOException $e) {
                // Rapporte une errreur
                echo $e->getMessage();
                static::$connexion = null;
            }
            return null;
       
    }

}





