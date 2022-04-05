<?php
session_start();

$email = addslashes($_POST['email']);
$mdp = addslashes($_POST['mdp']);

try {
	$bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT mail, type_utilisateur FROM compte WHERE mail="' . $email . '"');
$req->execute();
$resmail = $req->fetch();
$req->closeCursor();

$req = $bdd->prepare('SELECT mdp FROM compte WHERE mail = "' . $email . '"');
$req->execute();
$resmdp = $req->fetch();
$req->closeCursor();

if ($email == $resmail[0] and $mdp == $resmdp[0]) {
	$_SESSION["email"] = $resmail[0];
	$_SESSION["statut"] = $resmail[1];
	header('Location: /index.php');
} else {
	header('Location: /index.php');
	echo '<div style="margin-top: 10px;margin-right: 37%;margin-left: 37%;"><div class="notification is-danger" >
			<p style="align-center">Mot de passe incorrect !</p>
			</div></div>';
}
