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

function AjouterUneAgence(){ //1

        $fichierAgence = FILE_AGENCE;
        
        $fp=fopen($fichierAgence,"r");

        while(!feof($fp)){
                $agences []= fgetcsv($fp,1024,",");
        }
        
        fclose($fp);
        
        $bdagence = [];
        $y=-1;

        foreach($agences as $val){
                if($val!=null){
                        if($val!=$agences[0]){
                                $y=$val[0];
                        }
                }
        }
        
        unset($val);
        
        if($y==-1){
                $y=0;
        }

        $bdagence[] = ++$y;
        $NomAgence = readline("Nom Agence : ");
        $AdressAgence = readline("Adress Agence : ");

        $bdagence[] = $NomAgence;
        $bdagence[] = $AdressAgence;

        unset($agences[count($agences)-1]);

        $agences[] = $bdagence;


        return $agences;

}

function AjouterUnClient(){ //2
        
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
        
        $i=0;
        
        $countc=count($clients)-1;
        
        $y=-1;

        print_r($clients);

        foreach($clients as $val){
                if($val!=null){
                        if($val[0]==$x){
                                $y=$val[1];
                        }
                }
        }
        if($y==-1){
                $y=0;
        }
        unset($val);

        $clients[$countc][$i]=$x; //code agence
        $clients[$countc][++$i]=$y+1; //code client
        $clients[$countc][++$i]=readline("Nom du client: ");
        $clients[$countc][++$i]=readline("Prénom du client: ");
        $clients[$countc][++$i]=readline("Date de naissance du client: ");
        $clients[$countc][++$i]=readline("L'email du client : ");

        return $clients;
}

function AjouterUnCompteClient(){ //3

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

        $backup=$comptes;

        $i=0;
        
        $countc=count($comptes)-1;
        while(1){
                $x=readline("Code Agence : ");
                foreach($agences as $val){
                        if($val!=null){
                                if($x==$val[0]){
                                        break 2;
                                }
                        }
                }
                unset($val);
                echo("l'agence n'existe pas. veuillez reesayer. \n");
        }
        while(1){
                $y=readline("Code Client : ");
                foreach($clients as $val){
                        if($val!=null){
                                if($y==$val[0] && $x==$val[1]){
                                        break 2;
                                }
                        }
                }
                unset($val);
                echo("Le client n'existe pas. veuillez reesayer. \n");
        }
        $z=-1;

        $j=0;
        foreach($comptes as $val){ // verifie si le nombre de comptes est inferieur a 3
                if($val!=null){
                        if($val[0]==$x && $val[1]==$y){
                                $j++;
                                if($j>2){
                                        echo("Ce client a deja 3 comptes...");
                                        unset($backup[count($backup)-1]);
                                        return $backup;
                                }
                                $z=$val[1];
                        }
                }
        }

        if($z==-1){
                $z=0;
        }

        unset($val);

        $comptes[$countc][$i]=$x; //code agence
        $comptes[$countc][++$i]=$y; //code client
        $comptes[$countc][++$i]=$z+1; //code compte
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

function AfficherCompte(){ //4

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
        $x = readline("Numéro de l'agence recherchée ");
        $y = readline("Numéro du client possedant le compte recherché ");
        $z = readline("Numéro de compte recherché ");
        foreach($comptes as $val){
                if($val[0]==$x && $val[1]==$y && $val[2]==$z){
                        print_r($val);
                        break;
                }
        unset($val);
        }
}

function AfficherUnClient($choix){ //5
      
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
                $agences=AjouterUneAgence();
                $fp=fopen($fichierAgence,"w+");
                foreach($agences as $agence){
                        fputcsv($fp,$agence,",");
                }
                unset($agence);
                fclose($fp);              
                break;
        case '2':
                $clients= AjouterUnClient();

                $fp=fopen($fichierClient,"w+");
                foreach($clients as $cli){
                        fputcsv($fp,$cli,",");
                }
                fclose($fp);
                break;
        case '3':
                $comptes = AjouterUnCompteClient();
                
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
?>