<?php session_start() ?>
<!DOCTYPE html>
<?php
//configuration de la connexion à la base de donnée
$_SESSION['userConnectéID'] = 1;
$_SESSION['ChatRoom'] = 0;
$bdd = new PDO('mysql:host=localhost;dbname=adminchatbox;charset=utf8', 'AdminChatBox', 'Passw0rd!');





$reqRecupPseudoCo = $bdd->query("SELECT * FROM utilisateur where id =" . $_SESSION['userConnectéID'] . "");
while ($donnéeRecupPseudo = $reqRecupPseudoCo->fetch()) {
    $_SESSION['userConnectéIdentifiant'] = $donnéeRecupPseudo['identifiant'];
    $_SESSION['userConnectéEmail'] = $donnéeRecupPseudo['email'];
    $_SESSION['userConnectéCivilité'] = $donnéeRecupPseudo['civilité'];
    $_SESSION['userConnectéNom'] = $donnéeRecupPseudo['nom'];
}
?>
<html>
    <head>
        <?php include 'rafraichissement.php'; ?>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Bellefair" rel="stylesheet">
        <link href="chat-css.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script>
            //je fais une fonction qui va chercher l'heure en ajax
            function getUtilisateur() {
                //appel en GET de la page php qui renvoie l'heure
                var x = document.getElementById("formAppelUtilisateurs").elements[0].value;

                $.get("ActionAfficherUtilisateur.php?nom=" + x + "", function (data) {
                    //dans data, il y a ce que le php a renvoyé (ici de l'html)
                    //je mets cet html dans le div
                    $(".appelUtilisateurs").html(data);
                });
            }

        </script>
    </head>
    <body>
        <header>

            <!-- Trigger the modal with a button -->
            <button type="button" class="btnAccueil btnGérer" data-toggle="modal" data-target="#myModal">Gérer les chatrooms</button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                            <div>Creér une chatroom
                                <form action="insertionChatRoom.php" method="POST" >
                                    <input type="text" required="" maxlength="25" placeholder="Nom de votre salon" name="nomChatRoom">
                                    <input type="text" required="" maxlength="200" placeholder="Petitre déscription" name="description" >
                                    <input type="submit" value="Créer" >
                                </form>
                            </div>
                            <form id="formAppelUtilisateurs" >
                                <p>Recherche d'utilisateurs</p>
                                <input type="text" onkeyup="getUtilisateur()" placeholder="Nom/Prénom/Identifiant">
                            </form>
                            <div style="background-color: #f5f5f5" class="appelUtilisateurs" >
                                <h1>Utilisateurs:</h1>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <a href="chatRoom.php"><button class="btnAccueil dirAccueil">Accueil</button></a>
        </header>
        <h1></h1>

        <div id="content" ">
            <div class="left" style="overflow-y: scroll;" >

                <ul class="ChatWindows">


                    <script>

                        function getChatBox() {

                            $.get("ActualisationChatBox.php", function (data) {

                                $(".ChatWindows").html(data);
                            });
                        }


                        $(document).ready(function () {

                            getChatBox();


                            window.setInterval("getChatBox()", 5000);
                        });
                    </script>

                </ul>

            </div>

            <div class="right">
                <div class="LogMessage" style="overflow: hidden;">



                    <h1 id ='msgBienv'>bienvenu <?php
                        echo $_SESSION['userConnectéCivilité'];
                        echo $_SESSION['userConnectéNom'];
                        ?> </h1> <br> 
                    <h2>Vos informations sont:</h2> 
                    <ul>
                        <li>
                            <a>email: <?php echo$_SESSION['userConnectéEmail'] ?> </a> 
                        </li>
                        <li>
                            <a>identifiant: <?php echo $_SESSION['userConnectéIdentifiant'] ?></a>
                        </li>
                    </ul>
                    

                </div>

            </div>
        </div>


    </body>
</html>

