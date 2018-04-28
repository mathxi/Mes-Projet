<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=adminchatbox;charset=utf8', 'AdminChatBox', 'Passw0rd!');


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


?>

