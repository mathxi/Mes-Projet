<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=adminchatbox;charset=utf8', 'AdminChatBox', 'Passw0rd!');
$req = $bdd->query("SELECT count(idMessage) FROM message where idMessage=".$_GET['idMessage']." AND idUtilisateur=".$_SESSION['userConnectéID']."");

$result=$req->fetch();
if($result['count(idMessage)'] == 1){
    echo "J'ai bien écrit le message";
    $req = $bdd->query("DELETE FROM message where idMessage=".$_GET['idMessage']." AND idUtilisateur=".$_SESSION['userConnectéID']."");
    header('Location: messageChatRoom.php');
    
}
