<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=adminchatbox;charset=utf8', 'AdminChatBox', 'Passw0rd!');

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