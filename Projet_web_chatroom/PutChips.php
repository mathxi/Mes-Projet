<?php

session_start()
?>

<?php

include_once 'Config.php';
$bdd = new PDO("mysql:host=" . Config::SERVEUR . "; port=" . Config::PORT . " ; charset=utf8; dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
$req = $bdd->query("SELECT id,identifiant,civilité FROM utilisateur where id=" . $_GET['idUser'] . "");
$infoUser = $req->fetch();
$civiliteChips = $infoUser['civilité'];

echo "<div id='chip" . $_GET['idUser'] . "' class='chip'>";
if ($civiliteChips == 'M.') {
    echo "<img src='images/Avatar_H.png' alt='Contact Person'>";
}
if ($civiliteChips == 'Mme') {
    echo "<img src='images/Avatar_F.png' alt='Contact Person'>";
}
echo $infoUser['identifiant'] . "
  <i onclick='RemoveChips(" . $_GET['idUser'] . ")' class='close material-icons'>close</i></div>";
echo "<input hidden='' name='idUser' value='" . $infoUser['id'] . " '>";

