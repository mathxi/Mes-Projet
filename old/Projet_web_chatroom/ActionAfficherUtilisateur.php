<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=adminchatbox;charset=utf8', 'AdminChatBox', 'Passw0rd!');
$nom = $_GET['nom'];
$req = $bdd->query("SELECT * FROM utilisateur where ucase(nom) LIKE ucase('$nom%') OR ucase(prénom) LIKE ucase('$nom%') OR ucase(identifiant) LIKE ucase('$nom%')");
$req2 = $bdd->query("SELECT COUNT(nom) FROM utilisateur where ucase(nom) LIKE ucase('$nom%') OR ucase(prénom) LIKE ucase('$nom%') OR ucase(identifiant) LIKE ucase('$nom%')");
$req3 = $bdd->prepare("SELECT idChatRoom FROM invitation where idUtilisateur=:idUtilisateur AND invité=0");

echo '<h1>Utilisateurs:</h1>';
$utilisateur2 = $req2->fetch();

if ($utilisateur2['COUNT(nom)'] < 1) {
    echo"<p>Il n'y a pas d'utilisateur à ce nom </p>";
} else {
    while ($utilisateur = $req->fetch()) {
        if($utilisateur['id'] != $_SESSION['userConnectéID'] ){
        echo $utilisateur['civilité'] ;
        echo $utilisateur['nom']." ";
        echo $utilisateur['prénom']." - " ;
        echo " Identifiant: ". $utilisateur['identifiant'] ;
        echo '<br>';
        ?> 
        
            <form action="insertionUtChatRoom.php" method="POST">
                <select name="ChatRoom">
                    <?php
                    $req3->execute(array(
                        'idUtilisateur' => $_SESSION['userConnectéID']
                    ));
                    while ($reqidchat = $req3->fetch()) {

                        $req4 = $bdd->query("SELECT * FROM chatroom where idChatRoom=" . $reqidchat['idChatRoom'] . "");
                        while ($reqNom = $req4->fetch()) {
                            echo $reqNom['nom'];
                            echo "<option value='".$reqidchat['idChatRoom']."'>" . $reqNom['nom'] . "</option>";
                        }
                    }
                    
                    ?>
                </select>
                <input name="idUtilisateur" style="display: none;" type="text" value="<?php echo $utilisateur['id'] ?>" >
                <input type="submit" value="Ajouter" >
            </form>    
            <?php
            echo '<hr>';
            echo '<br>';
        }else{}
        }
    }

