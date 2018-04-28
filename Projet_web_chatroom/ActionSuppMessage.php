<?php
session_start();
include_once 'Config.php';
$bdd = new PDO("mysql:host=".Config::SERVEUR."; port=". Config::PORT ." ; charset=utf8; dbname=".Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
$req=$bdd->prepare("SELECT count(idMessage),idUtilisateur,idChatRoom,     
                            (SELECT idUtilisateur FROM chatroom c WHERE c.idChatRoom=m.idChatroom) as idUtilisateurChatRoom 
                  FROM message m where idMessage= :idMessage ");
$req->bindParam(":idMessage", $_GET['idMessage']);
$req->execute();

$result=$req->fetch();
if($result['count(idMessage)'] == 1 || $result['idUtilisateurChatRoom']== $_SESSION['userConnectéID'] ){
    echo "J'ai bien écrit le message";
$req = $bdd->prepare("DELETE FROM message where idMessage= :idMessage AND idUtilisateur= :idUtilisateur ");
$req->bindParam("idMessage", $_GET['idMessage']);
$req->bindParam("idUtilisateur", $result['idUtilisateur']);
$req->execute();
    header('Location: messageChatRoom.php?ChatRoom='.$_GET['idChatRoom'].'');
    
}else{
    header('Location: ChatRoom.php?error=Message-Non-Supprimer');
    var_dump($result['idUtilisateurChatRoom']);
    var_dump($_SESSION['userConnectéID']);
    var_dump($result);
    
}
