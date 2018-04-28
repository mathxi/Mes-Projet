<?php
session_start();
if ($_SESSION['connecte']==1){
    include_once 'Config.php';
    $bdd = new PDO("mysql:host=".Config::SERVEUR."; port=". Config::PORT ." ; charset=utf8; dbname=".Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);


    $idChatRoom=$_GET["idChatRoom"];

    if($_GET["creer"]=="oui"){
    $req=$bdd->query("select idChatRoom from chatroom WHERE idChatRoom='". $idChatRoom ."' AND idUtilisateur='".$_SESSION['userConnectéID']."' ");

    $reqIdChatRoom = $req->fetch();
            if($reqIdChatRoom['idChatRoom'] == $idChatRoom ){
               $req=$bdd->query("DELETE FROM chatroom WHERE idChatRoom='".$idChatRoom."'");
               $req=$bdd->query("DELETE FROM message WHERE idChatRoom='".$idChatRoom."'");
               $req=$bdd->query("DELETE FROM invitation WHERE idChatRoom='".$idChatRoom."'");
               header('Location: ChatRoom.php?supp=sucess');


            } else { header('Location: ChatRoom.php?supp=NULL');}

    }else if($_GET["creer"]=="non"){

            $req=$bdd->query("DELETE FROM invitation WHERE idChatRoom='".$idChatRoom."' AND idUtilisateur=".$_SESSION['userConnectéID']."");
            $req=$bdd->query("DELETE FROM message WHERE idChatRoom='".$idChatRoom."' AND idUtilisateur=".$_SESSION['userConnectéID']."");

            header('Location: ChatRoom.php?supp=success');
    }
} else {
    header('Location:index.php?connecter=false');
}

?>

