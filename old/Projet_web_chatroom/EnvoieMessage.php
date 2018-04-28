<?php session_start() ?>

<!DOCTYPE html>
<?php $bdd = new PDO('mysql:host=localhost;dbname=adminchatbox;charset=utf8', 'AdminChatBox', 'Passw0rd!'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        
        
        
        $message =$_POST['message'];
        $dateMessage = date("Y-m-d H:i:s");
        $req = $bdd->prepare('INSERT INTO message(contenu, idChatroom, dateMessage, idUtilisateur) ' 
                        . 'VALUES(:contenu, :idChatroom, :dateMessage, :idUtilisateur)');                                                           
        $req->execute(array(
                'contenu' => $message,
                'idChatroom' => $_SESSION['ChatRoom'],
                'dateMessage' => $dateMessage,
                'idUtilisateur' => $_SESSION['userConnectéID'],
                ));
                
                header('Location: messageChatRoom.php');
                exit();
        
        ?>
    </body>
</html>
