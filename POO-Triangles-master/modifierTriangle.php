<?php include_once'config.php';
	
	$id = $_GET['id'];

	$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME
                , Config::USER, Config::PASSWORD);

		//On vient récupérer les données correspondant au polygone que l'on veux modifier 
		$req1=$db->prepare("SELECT x from points where idPolygone=:id");
		$req1->bindParam(":id",$id);
		$req1->execute();
		$resultx=$req1->fetchAll();

		$req2=$db->prepare("SELECT y from points where idPolygone=:id");
		$req2->bindParam(":id",$id);
		$req2->execute();
		$resulty=$req2->fetchAll();

		$req3=$db->prepare("SELECT couleur from polygones where id=:id");
		$req3->bindParam(":id",$id);
		$req3->execute();
		$resultcouleur=$req3->fetchAll();

		$db= NULL;

     
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modifier Triangle</title>
        <?php include_once 'bootsrap.php'; ?>
    </head>
    <body>
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;;"> <div="">
                <div class="navbar-header">
                    <a href="index.php" class="navbar-brand">PHP POO - Geometrie</a>
                </div>
        <div class="container">
            
        </nav>
        <div class="container">

<!-- Dans les champs value des balises input on vient insérer les données existantes, afin que l'utilisateur n'est pas à retenir ces données. Elles seront aussi envoyées
lors de l'envoie du formulaire.   -->

<h1>Modifier Triangles</h1>
<hr>
<form action="modifierTriangle_action.php" method="post" class="form-horizontal">
            <h3>Point 1</h2>
            <div class="form-group">
                <label for="x1" class="control-label col-sm-2">X</label>
                <div class="col-sm-3">
                    <input value="<?php echo $resultx[0][0];?>" required type="number" min="0" max="1000" step="1" name="x1" id="x1"
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="y1" class="control-label col-sm-2">Y</label>
                <div class="col-sm-3">
                    <input value="<?php echo $resulty[0][0];?>" required type="number" min="0" max="1000" step="1" name="y1" id="y1"
                           class="form-control">
                </div>
            </div>
                <h3>Point 2</h2>
            <div class="form-group">
                <label for="x2" class="control-label col-sm-2">X</label>
                <div class="col-sm-3">
                    <input value="<?php echo $resultx[1][0];?>" required type="number" min="0" max="1000" step="1" name="x2" id="x2"
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="y2" class="control-label col-sm-2">Y</label>
                <div class="col-sm-3">
                    <input value="<?php echo $resulty[1][0];?>" required type="number" min="0" max="1000" step="1" name="y2" id="y2"
                           class="form-control">
                </div>
            </div>
                <h3>Point 3</h2>
            <div class="form-group">
                <label for="x3" class="control-label col-sm-2">X</label>
                <div class="col-sm-3">
                    <input value="<?php echo $resultx[2][0];?>" required type="number" min="0" max="1000" step="1" name="x3" id="x3"
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="y3" class="control-label col-sm-2">Y</label>
                <div class="col-sm-3">
                    <input value="<?php echo $resulty[2][0];?>" required type="number" min="0" max="1000" step="1" name="y3" id="y3"
                           class="form-control">
                </div>
            </div>
                <h3>Couleur</h3>
        <div class="form-group">
            <label for="couleur" class="control-label col-sm-2"></label>
            <div class="col-sm-3">
                <input value="<?php echo $resultcouleur[0][0];?>" type="color" class="form-control" id="couleur" name="couleur">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-3">
                <a href="index.php" class="btn btn-default">annuler</a>
                    
                <input type="submit" class="btn btn-primary" value="enregistrer">
            </div>
        </div>
        <!-- Permet de transmettre l'id du polygone à modifié via le forumlaire sans que celui-ci soit visible sur la page -->
        <input type="hidden" value="<?php echo $id;?>" name="id">
</form>

        </div>
        <hr>
        <div class="container">&copy; PRIOU Dylan CORFA Sylouan MALARD Davy PARRA Adrien 2017</div>
    </body>
</html>