<?php
session_start();
include_once 'Config.php';
$bdd = new PDO("mysql:host=".Config::SERVEUR."; charset=utf8; dbname=".Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
$nom = $_GET['nom'];
$req = $bdd->query("SELECT * FROM utilisateur where ucase(nom) LIKE ucase('$nom%') OR ucase(prénom) LIKE ucase('$nom%') OR ucase(identifiant) LIKE ucase('$nom%') LIMIT 21");
$req2 = $bdd->query("SELECT COUNT(nom) FROM utilisateur where ucase(nom) LIKE ucase('$nom%') OR ucase(prénom) LIKE ucase('$nom%') OR ucase(identifiant) LIKE ucase('$nom%')");
$req3 = $bdd->prepare("SELECT idChatRoom FROM invitation where idUtilisateur=:idUtilisateur AND invité=0");

echo "<h1 style='color:black; font-size:150%;'>20 premiers utilisateurs:</h1>";
$utilisateur2 = $req2->fetch();

if ($utilisateur2['COUNT(nom)'] < 1) {
    echo"<p>Il n'y a pas d'utilisateur à ce nom </p>";
} else {

    while ($utilisateur = $req->fetch()) {
        if ($utilisateur['id'] != $_SESSION['userConnectéID']) {

            echo $utilisateur['civilité'];
            echo $utilisateur['nom'] . " ";
            echo $utilisateur['prénom'] . " - ";
            echo " Identifiant: " . $utilisateur['identifiant'];
            echo '<br>';
            ?> 

            <?php
            /*
              <div class="input-field col s12">
              <select>
              <optgroup label='Room Propriétaire'>
              <option value='$reqidchat['idChatRoom']'>$reqNom['nom']</option>
              </optgroup>
              <optgroup label="Room Participant(e)">
              <option value="3">Option 3</option>
              </optgroup>
              </select>
              <label>Optgroups</label>
              </div>
             */
            ?>
            <form action="insertionUtChatRoom.php" method="POST" id="insertUser">
                <div class="input-field col s12">
                    <select name="ChatRoom">
                        <?php
                        $req3->execute(array(
                            'idUtilisateur' => $_SESSION['userConnectéID']
                        ));
                        ?><optgroup label='Room Propriétaire'> <?php
                            while ($reqidchat = $req3->fetch()) {

                                $req4 = $bdd->query("SELECT * FROM chatroom where idUtilisateur=" . $_SESSION['userConnectéID'] . " AND idChatRoom=" . $reqidchat['idChatRoom'] . "");

                                while ($reqNom = $req4->fetch()) {
                                    ?> <option value="<?php echo $reqidchat['idChatRoom'] ?>"><?php echo $reqNom['nom'] ?></option>
                                    <?php
                                }
                            }
                            ?> </optgroup>
                        <optgroup label='Room Participant(e)'> <?php
                            $req3->execute(array(
                                'idUtilisateur' => $_SESSION['userConnectéID']
                            ));
                            while ($reqidchat = $req3->fetch()) {

                                $req4 = $bdd->query("SELECT * FROM chatroom where idUtilisateur != " . $_SESSION['userConnectéID'] . " AND idChatRoom=" . $reqidchat['idChatRoom'] . "");
                                while ($reqNom = $req4->fetch()) {
                                    ?> <option value="<?php echo $reqidchat['idChatRoom'] ?>"><?php echo $reqNom['nom'] ?></option><?php
                                }
                            }
                            echo "</optgroup>";
                            ?>
                    </select>
                    <label></label>
                </div>
                <input name="idUtilisateur" style="display: none;" type="text" value="<?php echo $utilisateur['id'] ?>" >
                <input type="submit" value="Ajouter" >
            </form>    
            <?php
            echo"<hr>";
        } else {
            
        }
    }
}
?>


