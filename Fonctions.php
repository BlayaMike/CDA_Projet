<?php

require("constants.php");

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

$fichierAgence = FILE_AGENCE;
$fichierClient = FILE_CLIENT;
$fichierCompte = FILE_COMPTE;

$agences=[];
$clients=[];
$comptes=[];

$choixmenu=0;

$data="";

function AjouterUneAgence($agences){
        
        $bdagence = [];
        
        $CodeAgence = readline("Code Agence : ");
        $NomAgence = readline("Nom Agence : ");
        $AdressAgence = readline("Adress Agence : ");

        $bdagence[] = $CodeAgence;
        $bdagence[] = $NomAgence;
        $bdagence[] = $AdressAgence;


        $agences[] = $bdagence;

        return $agences;

}

function AjouterUnClient($agences,$clients){
        
        $fichierAgence = FILE_AGENCE;
        $fichierClient = FILE_CLIENT;

        $fp=fopen($fichierAgence,"r");
        $fp2=fopen($fichierClient,"r");

        while(!feof($fp)){
                $agences []= fgetcsv($fp,1024,",");
        }

        while(!feof($fp2)){
                $clients[]= fgetcsv($fp2,1024,",");
        }
        
        fclose($fp);
        fclose($fp2);
        $i=0;
        
        $countc=count($clients)-1;
        
        while(1){
                $x=readline("Code Agence : ");
                foreach($agences as $val){
                        if($val[0]!=null){
                                if($x==$val[0]){
                                        break 2;
                                }
                        }
                }
                unset($val);
                echo("l'agence n'existe pas. veuillez reesayer. \n");
        }
        $clients[$countc][$i]=$x;
        $y=-1;

        foreach($clients as $val){
                if($val[0]!=null){
                        if($val==$x){
                                $y=$clients[$val][1];
                        }
                }
        }
        if($y==-1){
                $y=0;
        }
        unset($val);

        $clients[$countc][++$i]=$y+1;
        $clients[$countc][++$i]=readline("Nom du client: ");
        $clients[$countc][++$i]=readline("Prénom du client: ");
        $clients[$countc][++$i]=readline("Date de naissance du client: ");
        $clients[$countc][++$i]=readline("L'email du client : ");

        return $clients;
}

function AjouterUnCompteClient($fichierAgence,$fichierClient,$fichierCompte){
        
        $fp=fopen($fichierAgence,"r");
        $fp2=fopen($fichierClient,"r");
        $fp3=fopen($fichierCompte,"r");

        while(!feof($fp)){
                $agences []= fgetcsv($fp,1024,",");
        }
        while(!feof($fp2)){
                $clients[]= fgetcsv($fp2,1024,",");
        }
        while(!feof($fp3)){
                $comptes[]= fgetcsv($fp3,1024,",");
        }
        
        fclose($fp3);
        fclose($fp2);
        fclose($fp);
        $i=0;
        
        $countc=count($comptes)-1;
        while(1){
                $x=readline("Code Agence : ");
                foreach($agences as $val){
                        if($val[0]!=null){
                                if($x==$val[0]){
                                        break 2;
                                }
                        }
                }
                unset($val);
                echo("l'agence n'existe pas. veuillez reesayer. \n");
        }
        while(1){
                $x=readline("Code Client : ");
                foreach($clients as $val){
                        if($val[0]!=null){
                                if($x==$val[0]){
                                        break 2;
                                }
                        }
                }
                unset($val);
                echo("Le client n'existe pas. veuillez reesayer. \n");
        }
        $comptes[$countc][$i]=$x;
        $y=-1;

        foreach($comptes as $val){
                if($val[0]!=null){
                        if($val==$x){
                                $y=$comptes[$val][1];
                        }
                }
        }
        if($y==-1){
                $y=0;
        }
        unset($val);

        $comptes[$countc][++$i]=$y+1;
        $comptes[$countc][++$i]=readline("Type de comte : ");
        $comptes[$countc][++$i]=readline("Solde : ");

        return $comptes;
        
}

$clients= AjouterUnClient($agences,$clients);

$fp=fopen($fichierClient,"w+");
foreach($clients as $cli){
        fputcsv($fp,$cli,",");
}
fclose($fp);


/*
$comptes = AjouterUnCompteClient($agences,$clients,$comptes);
                
$fp=fopen($fichierCompte,"w+");
foreach($comptes as $compte){
        fputcsv($fp,$compte,";");
}
fclose($fp);
*/

/*

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
                $comptes = AjouterUnCompteClient($agences,$client,$comptes);
                
                $fp=fopen($fichierCompte,"w+");
                foreach($comptes as $compte){
                        fputcsv($fp,$compte,";");
                }
fclose($fp);
        default :
                echo("Erreur");
                break;
}
*/
?>