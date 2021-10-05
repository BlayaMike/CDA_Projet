<?php

$idClient=0;
$nomClient="";
$prénomClient="";
$dateNaissance="";
$email="";
$NumCompte="";
$typeCompte="";
$CodeAgence=0;
$nomAgence="";
$adressAgence="";
$fichierAgence=".\bd\Agence.csv";
$fichierClient=".\bd\Client.csv";
$fichierCompte=".\bd\Compte.csv";
$agences=[["CODE_AGENCE","NOM_AGENCE","ADRESSE_AGENCE"]];
$clients=[["CODE_AGENCE","ID_CLI","NOM_CLI","PRENOM_CLI","DATE_DE_NAISSANCE","NOM_AGENCE"]];
$comptes=[["ID_CLI","CODE_AGENCE","ID_COMPTE","TYPE","NOM_CLI","PRENOM_CLI","NOM_AGENCE"]];

function AjouterUneAgence($agences){

        $bdagence = [];

        $bdagence[]=readline("Code de l'agence : ");
        $bdagence[]=readline("Nom de l'agence : ");
        $bdagence[]=readline("Adresse de l'agence : ");

        $agences[]=$bdagence;

        return $agences;
}



$fp=fopen($fichierAgence,"a");
$agences=AjouterUneAgence($agences);
foreach($agences as $agence){
        fputcsv($fp,$agence,",");
}
unset($agence);
fclose($fp);
/*

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

$clients= AjouterUnClient($agences,$clients);

$fp2=fopen($fichierClient,"w+");
foreach($clients as $cli){
        fputcsv($fp2,$cli,";");
}
fclose($fp2);


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
$clients= AjouterUnCompteClient($clients,$comptes);

$fp3=fopen($fichierCompte,"w+");
foreach($comptes as $compte){
        fputcsv($fp3,$compte,";");
}
fclose($fp3);*/
?>