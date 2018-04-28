<?php

session_start();
if ($_SESSION['connecte'] == 1) {
    ?>


    <?php 
    include_once 'Config.php';
    $bdd = new PDO("mysql:host=".Config::SERVEUR."; port=". Config::PORT ." ; charset=utf8; dbname=".Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE); ?>
    <?php

    $message = $_POST['message'];
    
    $req = $bdd->prepare('INSERT INTO message(contenu, idChatroom, idUtilisateur) '
            . 'VALUES(:contenu, :idChatroom, :idUtilisateur)');
    $req->execute(array(
        'contenu' => $message,
        'idChatroom' => $_POST['idChatRoom'],
        'idUtilisateur' => $_SESSION['userConnectéID'],
    ));
    $req2 = $bdd->query('UPDATE invitation
    SET nouveauMessage = nouveauMessage + 1
    WHERE idChatRoom='.$_POST['idChatRoom'].' AND idUtilisateur !='.$_SESSION['userConnectéID'].'');
    $req3 = $bdd->query('UPDATE chatroom
    SET derniereMAJ = NOW()
    WHERE idChatRoom='.$_POST['idChatRoom'].'');
    

    header('Location: messageChatRoom.php');
    exit();
    ?>


    <?php

} else {
    header('Location:index.php?connecter=false');
}