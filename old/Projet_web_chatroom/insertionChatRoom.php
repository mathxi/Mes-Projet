<?php session_start() //INSERTION NOUVELLE CHATROOM  ?>
<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=adminchatbox;charset=utf8', 'AdminChatBox', 'Passw0rd!');
    echo 'connect success';
} catch (Exception $e) {
    echo 'ERROR:' . $e->getMessage();
}

$useAinsérer = $_SESSION['userConnectéID'];
var_dump($_POST['nomChatRoom']);
var_dump($_POST['description']);
$nomChatRoom = $_POST['nomChatRoom'];
$descritpion = $_POST['description'];
$invité=0;

$req=$bdd->prepare("select count(nom) from chatroom where ucase(nom)=ucase(:nom)");
$req->execute(array('nom' => $nomChatRoom ));
$result=$req->fetch(); 

if($result['count(nom)'] == 0 ){

$req = $bdd->prepare("INSERT INTO chatroom 
        (nom, description, idUtilisateur) 
            VALUES (?, ?, ?)");

$req->execute(array(
    $nomChatRoom,
    $descritpion,
    $useAinsérer));


$chatRoomInsérer = $bdd->lastInsertId();

$req2 = $bdd->prepare("INSERT INTO invitation 
        (idChatRoom,invité,idUtilisateur) 
            VALUES (?, ?, ?)"); // $useAinsérer    $_SESSION['userConnectéID']



$req2->execute(array(
    $chatRoomInsérer,
    $invité,
    $useAinsérer));
var_dump($result['count(nom)']);
var_dump($nomChatRoom);
header('Location: chatRoom.php?insertionChatRoom=sucess');

}else{
    header('Location: chatRoom.php?insertionChatRoom=existe');
    
}

?>