<?php
/* page ajax pour ajouter une promo et ces salons */

	try {
		$bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

		$req = $bdd->prepare('SELECT id_promo FROM promo WHERE nom_promo = "'.$_POST['nomPromo'].'"');
		$req->execute();
		$id = $req->fetch()[0];
		$req->closeCursor();

	if (strlen($_POST['nomPromo']) == 9 && $id == null) {

		$req = $bdd->prepare('INSERT INTO promo(nom_promo) VALUES ("'.$_POST['nomPromo'].'")');
		$req->execute();
		$req->closeCursor();

		$req = $bdd->prepare('SELECT id_promo FROM promo WHERE nom_promo = "'.$_POST['nomPromo'].'"');
		$req->execute();
		$id = $req->fetch()[0];
		$req->closeCursor();

		$req = $bdd->prepare('INSERT INTO salon (nom_salon, id_promo) VALUES ("Promo '.$_POST['nomPromo'].'", '.$id.'),("prof_Promo '.$_POST['nomPromo'].'", null)');
		$req->execute();
		$req->closeCursor();

	} else {
		$i = 1/0;
	}
?>
