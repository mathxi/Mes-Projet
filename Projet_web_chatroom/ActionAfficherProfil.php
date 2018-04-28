<?php 
 session_start();
 include_once 'Config.php';
 $bdd = new PDO("mysql:host=".Config::SERVEUR."; port=". Config::PORT ." ; charset=utf8; dbname=".Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
 $idUtilisateur=$_GET["ID_Utilisateur"];
 
            $reqRecupPrenom = $bdd->prepare("SELECT prénom , nom , civilité, Description, email FROM utilisateur where id = :id ");
            $reqRecupPrenom ->bindParam(":id", $idUtilisateur);
            $reqRecupPrenom->execute();

             
            
            while ($donnéeRecupCivilite = $reqRecupPrenom->fetch()){
                $civiliteMessage = $donnéeRecupCivilite['civilité'];
                $prenomMessage = $donnéeRecupCivilite['prénom'];
                $NomMessage = $donnéeRecupCivilite['nom'];
                $DescriptionProfil = $donnéeRecupCivilite['Description'];
                $Emailprofil = $donnéeRecupCivilite['email'];
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