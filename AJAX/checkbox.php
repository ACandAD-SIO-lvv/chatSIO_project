<?php
/* page ajax pour la selection de checkbox sur la page offres */

$resultat = array();

if ($_POST["coche"] !== "") {

	$coche = $_POST["coche"];
	if ($coche == 'es') {
		$prep = 'SELECT titre_prop, contenu_prop FROM proposition WHERE accepter_prop = "V" AND type_prop = "stage" OR accepter_prop = "V" AND type_prop = "emploi"';
	} elseif ($coche == 'e') {
		$prep = 'SELECT titre_prop, contenu_prop FROM proposition WHERE accepter_prop = "V" AND type_prop = "emploi"';
	} elseif ($coche == 's') {
		$prep = 'SELECT titre_prop, contenu_prop FROM proposition WHERE accepter_prop = "V" AND type_prop = "stage"';
	} else {
		exit;
	}
} else {
	exit;
}

try {
	$bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}
$req = $bdd->prepare($prep);
$req->execute();
$t = 0;
while ($ligne = $req->fetch()) {
	$i = 0;
	$resultat[$t] = array(
		"titre" => $ligne[$i],
		"message" => $ligne[$i + 1],
	);
	$t = $t + 1;
}

print json_encode($resultat);
$req->closeCursor();
