<?php
session_start();
include_once 'Config.php';
$bdd = new PDO("mysql:host=" . Config::SERVEUR . "; port=" . Config::PORT . " ; charset=utf8; dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
$UtilisateurDejaPresent = array();

$nom = $_POST['nom'];
$chat = $_POST['chat'];

$utDejaPresent = explode(",", $_POST['dejapresent']);

$req = $bdd->query("SELECT * FROM utilisateur where ucase(nom) LIKE ucase('$nom%') OR ucase(prénom) LIKE ucase('$nom%') OR ucase(identifiant) LIKE ucase('$nom%') LIMIT 21");



//Le prepare ne marchais pas avec l'experession réguliraire
$req2 = $bdd->query("SELECT COUNT(nom) FROM utilisateur where ucase(nom) LIKE ucase(':$nom%') OR ucase(prénom) LIKE ucase('$nom%') OR ucase(identifiant) LIKE ucase('$nom%')");




echo "<h1 style='color:black; font-size:150%;'>20 premiers utilisateurs:</h1>";
$utilisateur2 = $req2->fetch();


if ($utilisateur2['COUNT(nom)'] < 1) {
    echo"<p>Il n'y a pas d'utilisateur à ce nom </p>";
} else {
    ?>
    <table>
        <thead>
            <tr>
                <th>Civilité</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Identifiant</th>
                <th>Ajouter à la liste</th>
            </tr>
        </thead>
        <tbody>

            <?php
            while ($utilisateur = $req->fetch()) {
                $présent = 0;
                $req3 = $bdd->prepare("SELECT count(idUtilisateur) FROM invitation where idUtilisateur= :idUser AND idChatRoom= :idChat");
                $req3->bindParam("idUser", $utilisateur['id']);
                $req3->bindParam("idChat", $chat);
                $req3->execute();
                
                
                $cocher = $req3->fetch();
                if ($utilisateur['id'] != $_SESSION['userConnectéID']) {
                    ?> <tr> <?php
                        echo"<td> " . $utilisateur['civilité'] . "</td>";
                        echo "<td> " . $utilisateur['nom'] . "</td>";
                        echo "<td> " . $utilisateur['prénom'] . "</td> ";
                        echo "<td> " . $utilisateur['identifiant'] . "</td>";
                        ?>

                        <td>
                            <?php if ($cocher['count(idUtilisateur)'] == 0) { ?>
                                <label>
                                    <?php
                                    $présent = 0;
                                    for ($i = 0; $i < sizeof($utDejaPresent); $i++) {

                                            if ($utDejaPresent[$i] == $utilisateur['id']) {
                                                $présent = 1;
                                            }
                                        }


                                        if ($présent == 1) {
                                            echo" <input id='idcheckbox" . $utilisateur['id'] . "' type='checkbox' checked onchange='PutChips(" . $utilisateur['id'] . ")' />";
                                            $présent = 0;
                                        } else {
                                            ?>
                                            <input id="idcheckbox<?php echo $utilisateur['id']; ?>" type="checkbox" onchange="PutChips(<?php echo $utilisateur['id']; ?>)" />
                                    <?php } ?>
                                        <span>Ajouter à la liste</span>
                                    </label>
                                    <?php
                                } else {
                                    echo 'Utilisateur présent ou invité';
                                }
                                ?>
                            </td>







                            <?php
                        }
                    }
                }
                ?>

        </tbody>
    </table>
        <?php
 