<?php

$idClient=0;
$nomClient="";
$prénomClient="";
$dateNaissance="";
$email="";
$NumCompte="";
$typeCompte="";
$CodeAgence=0;
$NomAgence="";
$AdressAgence="";
$fichierAgence=".\bd\Agence.csv";
$fichierClient=".\bd\Client.csv";
$fichierCompte=".\bd\Compte.csv";
$agences=[];
$clients=[];
$comptes=[];

$choixmenu=0;

$data="";

function AjouterUneAgence($agences){
        
        $bdagence = [];
        
        $CodeAgence = readline("Code Agence ");
        $NomAgence = readline("Nom Agence ");
        $AdressAgence = readline("Adress Agence ");

        $bdagence[] = $CodeAgence;
        $bdagence[] = $NomAgence;
        $bdagence[] = $AdressAgence;


        $agences[] = $bdagence;

        return $agences;

}

function AjouterUnClient($agences,$clients){
        $client = [];
        while(1){
                $x=readline("Code Agence : ");
                foreach($agences as $val){
                        if($x==$val[0]){
                                break;
                        }
                }
                unset($val);
                echo("l'agence n'existe pas. veuillez reesayer. \n");
        }
        $client[]=$x;
        $y=-1;

        foreach($clients as $val){
                if($val==$x){
                        $y=$clients[$val][1];
                }
        }
        if($y==-1){
                $y=0;
        }
        unset($val);

        $client[]=$y+1;
        $client[]=readline("Nom du client : ");
        $client[]=readline("Prénom du client : ");
        $client[]=readline("Date de naissance du client : ");
        $client[]=readline("L'email du client : ");

        $clients[]=$client;
        return $clients;
}

function AjouterUnCompteClient($clients,$comptes){

                        foreach($agences as $agence){
                                $compte = [];
                                $compte=readline("Nom du client : ");
                                $compte=readline("Type de compte: ");
                
                                $compte[]=$client;
                                break;
                        }
                        return $clients;
                }

echo (  "Veuillez saisir :
                1 : Pour Ajouter une agence ;
                2 : Pour Ajouter un client ;
                3 : Pour Ajouter un compte ;
                8 : Pour ne rien faire ;
");



$choixmenu=readline("Que souhaitez-vous faire : ");

switch ($choixmenu) {
        case '8':
                echo("Vous n'avez rien fait");
                exit;
        case '1':
                $agences=AjouterUneAgence($agences);
                $fp=fopen($fichierAgence,"a+");
                foreach($agences as $agence){
                        fputcsv($fp,$agence,",");
                }
                unset($agence);
                fclose($fp);              
                break;
        case '2':
                $clients= AjouterUnClient($agences,$clients);

                $fp=fopen($fichierClient,"w+");
                foreach($clients as $cli){
                        fputcsv($fp,$cli,";");
                }
                fclose($fp);
                break;
        case '3':

                $clients= AjouterUnCompteClient($clients,$comptes);
                
                $fp=fopen($fichierCompte,"w+");
                foreach($comptes as $compte){
                        fputcsv($fp,$compte,";");
                }
                fclose($fp);
                break;
        default :
                echo("Erreur");
                break;
}

?>