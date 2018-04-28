
<?php
session_start();
if ($_SESSION['connecte'] == 1) {

    echo "<h3 id = 'msgBienv'>Bienvenue sur Marcassin ";
    echo $_SESSION['userConnectéCivilité'];
    echo "\n";
    echo $_SESSION['userConnectéNom'];
    echo" </h3> <br><hr>";

    include_once 'Config.php';
    $bdd = new PDO("mysql:host=" . Config::SERVEUR . "; port=" . Config::PORT . " ; charset=utf8; dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);

    $new_messages = $bdd->prepare("SELECT SUM(nouveauMessage) FROM invitation where idUtilisateur= :idUtilisateur");
    $new_messages->bindParam("idUtilisateur", $_SESSION['userConnectéID'] );
    $new_messages->execute();
    $resultat_new_messages = $new_messages->fetch();

    echo "<h5 id = 'nouveaux messages'> Vous avez ";
    echo $resultat_new_messages['SUM(nouveauMessage)'];
    echo " messages non lus.</h5> <br>";
    
     $reqRecupDescription = $bdd->prepare("SELECT Description FROM utilisateur where id= :id");
     $reqRecupDescription->bindParam("id", $_SESSION['userConnectéID']);
     $reqRecupDescription->execute();
    
    while ($donnéeRecupDescription = $reqRecupDescription->fetch()){
        $DescriptionUtilisateur = $donnéeRecupDescription['Description'];
    }  
    $NewDescription=wordwrap($DescriptionUtilisateur, 80,"<br />\n", false);
}
?>
<h5>Votre description:</h5>
<?php
if ($DescriptionUtilisateur==""){
    echo "<font color='blue'> Pas de description à afficher </font>";
}
else{
    echo "<font color='silver'>", $NewDescription, "</font>";
}
?>
<br>
<br>
<button data-target='modal5' class='btn modal-trigger' onclick="ModifDescription(<?php echo $_SESSION['userConnectéID'] ?>)" >Modifier votre description</button>
<br>
<br>
<ul>
    <li>Informations du compte:</li>
    <li>
        <a>-Adresse mail: <?php echo$_SESSION['userConnectéEmail'] ?> </a> 
    </li>
    <li>
        <a>-Identifiant: <?php echo $_SESSION['userConnectéIdentifiant'] ?></a>
    </li>
</ul>

