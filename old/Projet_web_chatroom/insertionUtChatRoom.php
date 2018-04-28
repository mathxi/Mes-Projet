<?php session_start() //INSERTION NOUVELLE CHATROOM   ?>
<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=adminchatbox;charset=utf8', 'AdminChatBox', 'Passw0rd!');
    echo 'connect success';
} catch (Exception $e) {
    echo 'ERROR:' . $e->getMessage();
}

$idChatRoom = $_POST['ChatRoom'];
$idUtilisateurAentrer = $_POST['idUtilisateur'];

$req = $bdd->query("select COUNT(invité) from invitation where idChatRoom =$idChatRoom and idUtilisateur=$idUtilisateurAentrer");

$result = $req->fetch();
if ($result['COUNT(invité)'] > 0) {
    header('Location: chatRoom.php?error=DejaDedans');
} else {
    $req2 = $bdd->query("INSERT INTO invitation 
        (idChatRoom,invité,idUtilisateur) 
            VALUES ('$idChatRoom','1','" . $idUtilisateurAentrer . "')");
    header('Location: chatRoom.php?success=oui');
}
?>