<?php
        
        try {
            $bdd = new PDO('mysql:host=labepsiovgworks.mysql.db;dbname=labepsiovgworks;charset=utf8', 'labepsiovgworks', 'Skillearn2018');
            echo '<h1>connexion réussi</h1>';
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $reqRecupInfoCo = $bdd->prepare("INSERT INTO Utilisateur"
                . " (mail,motDePasse,nom,prénom,civilité,statut,ville,description) "
               . "VALUES ('jackie.marmoudo@epsi.fr','warzazate','marmoud','jaquie','Mr.','B1','','')");
        $reqRecupInfoCo->execute();
        header('Location: index.php');
        ?>
