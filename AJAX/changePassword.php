<?php
/* page ajax pour changer de mort de passe */


	$resultat = 0;

	//Requete pour verifier la correspondance de l'ancien mot de passe

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->prepare('SELECT mdp FROM compte WHERE mail = "'.$_POST['mail'].'"');
	$req->execute();
	$mdp = $req->fetch()[0];
	$req->closeCursor();
	if( $_POST['oldpass'] == $mdp ){
		$resultat = 'old';
		if( $_POST['newpass'] == $_POST['newpassconfirm'] ){

			$req = $bdd->prepare('UPDATE compte SET mdp = "'.$_POST['newpass'].'" WHERE mail = "'.$_POST['mail'].'"');
			$req->execute();
			$req->closeCursor();

			$req = $bdd->prepare('SELECT mdp FROM compte WHERE mail = "'.$_POST['mail'].'"');
			$req->execute();
			$resultat = 'new';
			if ( $req->fetch()[0] == $_POST['newpass'] ) {
				$resultat = 1;
			}
			$req->closeCursor();
		}
	}
	print $resultat;
?>