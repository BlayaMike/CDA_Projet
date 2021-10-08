<?php

require("constants.php");

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

function AjouterUnCompteClient($agences,$clients,$comptes){

        $fichierAgence = FILE_AGENCE;
        $fichierClient = FILE_CLIENT;
        $fichierCompte = FILE_COMPTE;
        
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
/*
function AfficherAgence(){

        $fichierAgence = FILE_AGENCE;

        $codeagence2=fopen($fichierAgence, "r");

        while(!feof($codeagence2)){
                $agences [] = fgetcsv($codeagence2,1024,",");
        }
        
        fclose($codeagence2);

        while(1){
                $x=readline("Code Agence : ");
                foreach($agences as $val){
                        if($val[0]!=null){
                                if($x==$val[0]){
                                        print_r($val);
                                        break 2;
                                }
                        }
                        else{     
                                echo("l'agence n'existe pas. veuillez reesayer. \n");
                        }
                }
                unset($val);
        }
}
*/

function AfficherCompte(){

        $fichierCompte= FILE_COMPTE;

        $fp=fopen($fichierCompte, "r");

        while(!feof($fp)){
                $comptes [] = fgetcsv($fp,1024,",");
        }
        
        fclose($fp);
        
        while(1){
                $x = readline("Numéro de compte rechercher ");
                foreach($comptes as $val){
                        foreach ($val as $val2) {
                                if($val2[2]==$x){
                                        print_r($val2);
                                        break 3;
                                }
                        }
                unset($val,$val2);
                }
        }
}

function AfficherUnClient($choix){
      
        $fichierClient = FILE_CLIENT;
        $fichierCompte = FILE_COMPTE;

        $fp=fopen($fichierClient,"r");
        $fp2=fopen($fichierCompte,"r");

        while(!feof($fp)){
                $clients[]= fgetcsv($fp,1024,",");
        }
        while(!feof($fp2)){
                $comptes[]= fgetcsv($fp2,1024,",");
        }
        
        fclose($fp2);
        fclose($fp);

        switch ($choix) {
                case '1':
                        $nom = readline("Quel est le nom du client rechercher : ");
                        foreach($clients as $cli){
                                if($cli!=null){
                                        if($cli[2]==$nom){
                                                print_r($cli);
                                        }
                                }
                        }
                        break;
                case '2':
                        $numerodecompte = readline("Quel est le numéro de compte du client rechercher : ");


                        foreach($clients as $cli){ 
                                foreach ($comptes as $val) {
                                        if($cli != null && $val != null){
                                                if($val[2]==$numerodecompte && $val[1]==$cli[1] && $val[0]==$cli[0]){
                                                        print_r($cli);
                                                }
                                        }
                                }
                        }
                        break;
                case '3':
                        $id = readline("Quel est l'Identifiant du client rechercher : ");
                        foreach($clients as $cli){
                                if($cli[1]==$id){
                                        print_r($cli);
                                }
                        }
                        break;
                default:
                        echo("Erreur");
                        break;
        }

}

<<<<<<< HEAD

/*
=======
function AfficherListeCompte($id_Agence,$id_Cli){

        $filename=fopen(FILE_COMPTE,"r");

        while(!feof($filename)){
                $comptes[]= fgetcsv($filename,1024,",");
        }

        fclose($filename);
        foreach($comptes as $val){
                if($val != null){
                        if($val[0]==$id_Agence && $val[1]==$id_Cli){
                                print_r($val);
                        }
                }
        }
}

>>>>>>> 0eff830c36e69704dd44529a4a9ee20d076cf864
echo (  "Veuillez saisir :
                1 : Pour Ajouter une agence :
                2 : Pour Ajouter un client :
                3 : Pour Ajouter un compte :
                4 : Rechercher un compte : 
                5 : Recherche d'un client :
                6 : Afficher la liste des comptes d'un client :
                7 : Imprimer les infos d'un client :
                8 : Quitter le programme : 
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
                        fputcsv($fp,$cli,",");
                }
                fclose($fp);
                break;
        case '3':
                $comptes = AjouterUnCompteClient($agences,$clients,$comptes);
                
                $fp=fopen($fichierCompte,"w+");
                foreach($comptes as $compte){
                        fputcsv($fp,$compte,",");
                }
                fclose($fp);
                break;

        case '4' :
                AfficherCompte();
                break;
        case '5' :
                $choix = readline("Comment souhaitez vous rechercher votre client : 
                        1 : Avec son Nom ;
                        2 : Avec son Numéro de compte ;
                        3 : Avec son Identifiant Client ;
                                                ");
                AfficherUnClient($choix);
                
                break;
        case '7' :

                $id_Agence = readline("id Agence : ");
                $id_Cli= readline("id cli : ");
                AfficherListeCompte($id_Agence,$id_Cli);

                break;


        case '6' :
                break;
        case '7' :
                break;

}
*/
?>