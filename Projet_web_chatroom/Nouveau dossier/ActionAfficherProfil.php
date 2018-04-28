<?php 
 session_start();
 include_once 'Config.php';
 $bdd = new PDO("mysql:host=".Config::SERVEUR."; port=". Config::PORT ." ; charset=utf8; dbname=".Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
 $idUtilisateur=$_GET["ID_Utilisateur"];
 
            $reqRecupPrenom = $bdd->query("SELECT prénom FROM utilisateur where id =" . $idUtilisateur . "");
            $reqRecupNom = $bdd->query("SELECT nom FROM utilisateur where id =" . $idUtilisateur . "");
            // + civilité et mettre condition pour choisir l'image dans le message
            $reqRecupCivilite = $bdd->query("SELECT civilité FROM utilisateur where id =" . $idUtilisateur . "");
            $reqRecupDescription = $bdd->query("SELECT Description FROM utilisateur where id =" . $idUtilisateur . "");
            $reqRecupEmail = $bdd->query("SELECT email FROM utilisateur where id =" . $idUtilisateur . "");
             
            
            while ($donnéeRecupCivilite = $reqRecupCivilite->fetch()){
                $civiliteMessage = $donnéeRecupCivilite['civilité'];
            }   
            
            while ($donnéeRecupPrenom = $reqRecupPrenom->fetch()) {
                $prenomMessage = $donnéeRecupPrenom['prénom'];
                  
            }
            
            while ($donnéeRecupNom = $reqRecupNom->fetch()) {
                $NomMessage = $donnéeRecupNom['nom'];
                  
            } 
            
            while ($donnéeRecupDescription = $reqRecupDescription->fetch()) {
                $DescriptionProfil = $donnéeRecupDescription['Description'];
                  
            } 
             while ($donnéeRecupEmail = $reqRecupEmail->fetch()) {
                $Emailprofil = $donnéeRecupEmail['email'];
                  
            } 
            
            $NewDescription=wordwrap($DescriptionProfil, 80,"<br />\n", true);

?>

<div class="PersonneProfil">
    <?php  
    if ($civiliteMessage == 'M.'){
        echo "<img src='images/Avatar_H.png' height='10%' width='10%'>";
    }
    if ($civiliteMessage == 'Mme'){
        echo "<img src='images/Avatar_F.png' height='10%' width='10%'>";
    }
    
    
    echo "<h3>Profil de $prenomMessage $NomMessage</h3>
        Description: <br>";
    
        if($DescriptionProfil==NULL){
            echo "Pas de description à afficher <br>";
        }
        else{
            echo $NewDescription, "<br>";
        }
       
    ?>

    <br>Adresse Mail: <br>
    <?php  echo$Emailprofil; ?>
    
</div>