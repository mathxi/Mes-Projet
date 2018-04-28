<?php include_once'config.php';
	
	$couleur = $_POST['couleur'];

	$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME
                , Config::USER, Config::PASSWORD);

		//Insertion de la couleur du nouveau polygone, un ID unique lui sera automatiquement attribué dans la base de données
		$req1=$db->prepare("INSERT INTO polygones(couleur) VALUES(:couleur)");
		$req1->bindParam(":couleur",$couleur);
		$req1->execute();

		//Notre base de données incrémente de 1 les ID de chaque polygone il suffit de venir récupérer l'ID le plus haut dans la table de données 
		//afin de connaitre l'id du dernier polygone ajouté.
		$id= $db->query("SELECT MAX(id) as ID FROM polygones")->fetch();

		//Boucle qui vient insérer pour chaque coordonnées x,y les valeurs transmissent via le formulaire et les lies au polygone précédement créer 
		$i = 1;
		while ($i <= 3) {
			$x = $_POST['x'.$i.''];
			$y = $_POST['y'.$i.''];
			$req3=$db->prepare("INSERT INTO points(x,y,idPolygone) VALUES (:x , :y, :idPoly)");
    	    $req3->bindParam(":x",$x);
    	    $req3->bindParam(":y",$y);
    	    $req3->bindParam(":idPoly",$id['ID']);
    	    $req3->execute();
			$i++;
		}
		$db = null;
  		echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

     
?>