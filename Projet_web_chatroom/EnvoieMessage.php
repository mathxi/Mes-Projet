<?php

session_start();
if ($_SESSION['connecte'] == 1) {
    ?>


    <?php 
    include_once 'Config.php';
    $bdd = new PDO("mysql:host=".Config::SERVEUR."; port=". Config::PORT ." ; charset=utf8; dbname=".Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE); ?>
    <?php

    $message = $_POST['message'];
    $idChatRoom = $_POST['idChatRoom'];
    $idConnecté=$_SESSION['userConnectéID'];
    
    $req = $bdd->prepare('INSERT INTO message(contenu, idChatroom, idUtilisateur) '
            . 'VALUES(:contenu, :idChatroom, :idUtilisateur)');
    $req->execute(array(
        'contenu' => $message,
        'idChatroom' => $idChatRoom,
        'idUtilisateur' => $_SESSION['userConnectéID'],
    ));
    

    
    
    $req2 = $bdd->prepare('UPDATE invitation
    SET nouveauMessage = nouveauMessage + 1
    WHERE idChatRoom= :idChat AND idUtilisateur != :iduser ');
    $req2 -> bindParam("idChat", $idChatRoom);
    $req2 -> bindParam("iduser", $idConnecté);
    $req2 -> execute();
    var_dump($req2 -> execute());
    
    $req3 = $bdd->prepare('UPDATE chatroom
    SET derniereMAJ = NOW()
    WHERE idChatRoom=:idChat');
    $req3 -> bindParam("idChat",$idChatRoom);
    $req3 -> execute();
    var_dump($req2 -> execute());

  //  header('Location: messageChatRoom.php');
    exit();
    ?>


    <?php

} else {
    header('Location:index.php?connecter=false');
}