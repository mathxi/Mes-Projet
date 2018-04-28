<?php
session_start();
if ($_SESSION['connecte']==1){
    include_once 'Config.php';
    $bdd = new PDO("mysql:host=".Config::SERVEUR."; port=". Config::PORT ." ; charset=utf8; dbname=".Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);

    $_GET['idChatRoom'];

    if($_GET['reponse'] == "oui"){

        $req=$bdd->query("UPDATE invitation SET invité = '0' WHERE idUtilisateur = ". $_SESSION['userConnectéID'] ." AND idChatRoom= ". $_GET['idChatRoom'] ." AND invité=1");


        header('Location: ChatRoom.php?Acceptation=sucess');
    }else if($_GET['reponse'] == "non"){

        $req=$bdd->query("DELETE FROM invitation WHERE idUtilisateur = ". $_SESSION['userConnectéID'] ." AND idChatRoom= ". $_GET['idChatRoom'] ." AND invité=1");

        header('Location: ChatRoom.php?Declinaison=sucess');
    }else{

        header('Location: ChatRoom.php?Action=problème');
    }
} else {
    header('Location:index.php?connecter=false');
}

?>