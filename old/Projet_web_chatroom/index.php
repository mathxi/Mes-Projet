<!DOCTYPE html>
<?php ?>

<html>
    <head>
        <title>Chat Marcassin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <link href="css_accueil.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
        <div class="box">

            

            <div class="input-field">
                <input id="first_name" type="text" class="validate" name="identifiant" required="required">
                <label id="label-id" for="first_name">Identifiant</label>
            </div>

            <div class="input-field">
                <input name="mdp" id="password" type="password" class="validate" required="required">
                <label id="label-pass" for="password">Mot de passe</label>
            </div>

        </div>
        
        <form method="POST" action="connexion.php">

            

            <?php if(isset($_GET['infos']) && $_GET['infos'] == "false"){?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Erreur ! </strong> Vos identifiants sont incorrects.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div><?php
            }
            ?>
            
            <button type="submit" class="button_c"><span>Connexion </span></button>        
            <div id="text_co"><b>Connexion à Marcassin :</b></div>

        </form>

        <ul class="blurslide">
            <li>
                <span></span>
                <div>
                    <h3>Marcassin</h3>
                </div>
            </li>
            <li>
                <span></span>
                <div>
                    <h3>Marcassin</h3>
                </div>
            </li>
            <li>
                <span></span>
                <div>
                    <h3>Marcassin</h3>
                </div>
            </li>
            <li>
                <span></span>
                <div>
                    <h3>Marcassin</h3>
                </div>
            </li>
            <li>
                <span></span>
                <div>
                    <h3>Marcassin</h3>
                </div>
            </li>
        </ul>
     
    </body>
</html>
