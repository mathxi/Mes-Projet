<?php include_once'config.php';
	$id = $_GET['id'];

	$db = new PDO("mysql:host=".Config::SERVERNAME.";dbname=".Config::DBNAME
                , Config::USER, Config::PASSWORD);

// suppression des points liés au polygone, le faire avant la suppression du polygone car le polygone est clé étrangère dans la table 'points' 
// et la suppression sera impossible si on essaie de supprimer le polygone avant les points lui appartenant		
		$req2=$db->prepare("DELETE FROM points where idPolygone=:idP");
    	$req2->bindParam(":idP",$id);
    	$req2->execute();

// Suppression du polygone
		$req=$db->prepare("DELETE FROM polygones WHERE id=:idP");
		$req->bindParam(":idP",$id);
		$req->execute();

		//On met $db a null pour des raisons de sécurité
		$db = null;
		
		//Redirection automatique vers la page index.php
 		echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
