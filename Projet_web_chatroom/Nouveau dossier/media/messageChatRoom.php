<?php session_start();

//configuration de la connexion à la base de donnée
//$_SESSION['ChatRoom'] = 0;


$bdd = new PDO('mysql:host=localhost;dbname=adminchatbox;charset=utf8', 'AdminChatBox', 'Passw0rd!');

$reqRecupPseudoCo = $bdd->query("SELECT identifiant FROM utilisateur where id =".$_SESSION['userConnectéID']."");
            while ($donnéeRecupPseudo = $reqRecupPseudoCo->fetch() ) { $_SESSION['userConnectéIdentifiant'] = $donnéeRecupPseudo['identifiant']; }

            ?>
<!DOCTYPE html>

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
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            
            <a href="chatRoom.php"><button class="btnAccueil dirAccueil">Accueil</button></a>
            
            <div class="btn Accueil">   
                <div class="Profil">
                    <img src="images/Avatar" class="img_profil">
                    <ul class="pseudo">Pseudo</ul>
                    <img src="images/Fleche" class="fleche">
                    <ul class="deroulant">
                        <li><a href="ActionDeconnexion.php">Déconnexion</a></li>
                        <li><a href="chatRoom.php">Profil</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <h1></h1>

        <div id="content">
            <div class="left" >

                <ul class="ChatWindows">



                    <script>
                //je fais une fonction qui va chercher l'heure en ajax
                function getChatBox() {
                    //appel en GET de la page php qui renvoie l'heure
                    $.get("ActualisationChatBox.php", function (data) {
                        //dans data, il y a ce que le php a renvoyé (ici de l'html)
                        //je mets cet html dans le div
                        $(".ChatWindows").html(data);
                    });
                }

                //quand la page est prête
                $(document).ready(function () {
                    //j'appelle cette fonction une première fois
                    getChatBox();

                    //je programme un timer pour l'appeler toutes les 10 secondes (10000 millisecondes)
                    window.setInterval("getChatBox()", 1000000);
                });
            </script>

                </ul>

            </div>
                    <?php ?>
            <div class="right">
                <div class="LogMessage">


                        <?php if($_SESSION['ChatRoom']!= 0){


           ?> <script>
                //je fais une fonction qui va chercher l'heure en ajax
                function getMessage() {
                    //appel en GET de la page php qui renvoie l'heure
                    $.get("actualisationMessage.php", function (data) {
                        //dans data, il y a ce que le php a renvoyé (ici de l'html)
                        //je mets cet html dans le div
                        $(".LogMessage").html(data);
                    });
                }

                //quand la page est prête
                $(document).ready(function () {
                    //j'appelle cette fonction une première fois
                    getMessage();

                    //je programme un timer pour l'appeler toutes les 10 secondes (10000 millisecondes)
                    window.setInterval("getMessage()", 500000);
                });
            </script>
            <?php                




                        }else{echo "<h1 id ='msgBienv'>bienvenu ".$_SESSION['userConnectéIdentifiant']."</h1>" ;
                        echo $_SESSION['ChatRoom'];
                        } ?>

                </div>
               <?php if($_SESSION['ChatRoom']!= 0){ ?>
                <form action="EnvoieMessage.php" method="post" class="EnvoieMessage">
                    <input required=""  name="message" placeholder="Ecrivez ici ce que vous voulez envoyer" type="text" class="EnvoieMessageTexte" > 
                    <button class="boutonEnvoie">Envoyer</button>
                </form>
               <?php } ?> 
            </div>
        </div>



    </body>
</html>

