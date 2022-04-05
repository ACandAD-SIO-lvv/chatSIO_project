<?php
/* page ajax pour accepter ou supprimer les propositions */

try {
	$bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}

if ($_POST['choix'] == '1') {
	$req = $bdd->prepare('UPDATE proposition SET accepter_prop = "V" WHERE id_prop = ' . $_POST['id']);
	$req->execute();
	$req->closeCursor();
} elseif ($_POST['choix'] == '0') {
	$req = $bdd->prepare('DELETE FROM proposition WHERE id_prop = ' . $_POST['id']);
	$req->execute();
	$req->closeCursor();
} else {
	$i = 1 / 0;
}
