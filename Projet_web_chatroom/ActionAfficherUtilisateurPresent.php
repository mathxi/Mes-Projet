<?php
include_once 'Config.php';
$bdd = new PDO("mysql:host=".Config::SERVEUR."; port=". Config::PORT ." ; charset=utf8; dbname=".Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);

$idChat = $_GET["ChatRoom"];

$reqIdUtDansChat = $bdd->prepare("select idUtilisateur , 
                                                    
                                                    (select count(idUtilisateur) from invitation where idChatRoom= :idChat AND invité = 0 )as idUtilisateurpresent, 
                                                    (select count(idUtilisateur) from invitation where idChatRoom= :idChat AND invité = 1 )as idUtilisateurinvite,

                                                    
                                                    (select identifiant from utilisateur where id = idUtilisateur)as identifiant, 
                                                    (select nom from utilisateur where id = idUtilisateur)as nom, 
                                                    (select prénom from utilisateur where id = idUtilisateur)as prénom,
                                                    
                                                    (select COUNT(idUtilisateur) from chatroom c where i.idUtilisateur= c.idUtilisateur AND i.idChatRoom=c.idChatRoom)as propriétaire
                                                    
                                from invitation i where idChatRoom= :idChat");

$reqIdUtDansChat->bindParam("idChat", $idChat);
$reqIdUtDansChat->execute();


?>




<table>
    <thead>
        <tr>
            <th>Identifiant</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th></th>
        </tr>
    </thead>
    <?php
    while ($IdUtDansChat = $reqIdUtDansChat->fetch()) {
        ?>


        <tbody>
            <tr>
                <td><?php echo $IdUtDansChat['identifiant']; ?></td>
                <td><?php echo $IdUtDansChat['nom']; ?></td>
                <td><?php echo $IdUtDansChat['prénom']; ?></td>
                <td><?php  

                    $req = $bdd->prepare("select invité from invitation where idChatRoom= :idChat  AND idUtilisateur= :idUtilisateur");
                    $req->bindParam("idChat", $idChat);
                    $req->bindParam("idUtilisateur", $IdUtDansChat['idUtilisateur']);
                    $req->execute();
                    
                    $resReq=$req->fetch();


                    if ($resReq['invité'] == 1){
                        echo"<span class='new badge red' data-badge-caption='invité'></span>"; 
                    } else if ($resReq['invité'] == 0 && $IdUtDansChat['propriétaire'] != 1){
                        echo"<span class='new badge blue' data-badge-caption='Participant'></span>";
                    } else if ($IdUtDansChat['propriétaire'] == 1){
                        echo"<span class='new badge green' data-badge-caption='Propriétaire'></span>";
                    }

                    ?>
                </td>
            </tr>

        </tbody>
        <?php $IdUtDansChat = $reqIdUtDansChat->fetch(); //Je le met une fois juste pour rÃ©cupÃ©rer le nombre d'utilisateur invitÃ© et prÃ©sent ?>
        

        <?php
    }
    ?>
    <p>
        il y a <?php echo $IdUtDansChat['idUtilisateurpresent'] ?> utilisateur présent (dont vous) et <?php echo $IdUtDansChat['idUtilisateurinvite'] ?> utilisateur invité.
    </p>
</table>
