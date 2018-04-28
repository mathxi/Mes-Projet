<!DOCTYPE html>
<?php
//configuration de la connexion à la base de donnée
$bdd = new PDO('mysql:host=localhost;dbname=AdminChatBox;charset=utf8', 'AdminChatBox', 'Passw0rd!'); 
set_time_limit(100000);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <h1>Insertion du fichier test dans la base de donnée en cour...</h1>
        <div class="insertion">
        <?php
        //Réinitialisation des tables 
        $reqReini = $bdd->prepare('DELETE FROM utilisateur');
        $reqReini->execute();
        //////////////////////////////////////////
        
        $data = file_get_contents("./utilisateurs.csv"); //read the file
        
        
        $lignes = explode("\n", $data);
        
        //initialisation du pourcentage et détermination du nombre de ligne pour éviter de les recompter a chaques boucles 
        $Avancement = 0; 
        $NbLignes=sizeof($lignes);
        
        
        for ($i = 1; $i <$NbLignes - 1; $i++) {
            //Calcul du pourcentage de l'avancement
            
          //  $Avancement++;
          //  $pourcentage = $Avancement * 100 /$NbLignes;
          //  $pourcentage = round($pourcentage, 1);
          //  echo "<p>||".$pourcentage . "%...|| </p>";
            
            //séparation des lignes en colonnes 
            $colonnes = explode(";", $lignes[$i]);
            
            //for ($b = 0; $b < 7; $b++) {
                //interface pour voir un aperçu de se qu'il est envoyé a la base de donnée (je l'ai enlevé car elle ralentissait l'upload)
                //echo "insertion de ||$colonnes[$b]|| dans la base </br>"; 
                var_dump($colonnes[5]);
                
                //Cacher le mot de passe avec un hashage 
                $colonnes[5] = hash( 'sha256' ,$colonnes[5] );
                
            //}
            
            
            //envoie des Valeurs dans la base de données 
            $req = $bdd->prepare('INSERT INTO utilisateur(civilité, '
                    . 'nom, prénom, email, identifiant, motDePasse, '
                    . 'actif ) VALUES(?, ?, ?, ?, ?, ?, ?)');
            $req->execute($colonnes);
        }
        ?>
            <a href="index.php" >Retour à la page d'acceuil</a>
        </div>
    </body>
</html>
