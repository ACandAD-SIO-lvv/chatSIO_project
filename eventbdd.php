<?php
session_start();
try {
	$bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}
if (isset($_POST['type']) && isset($_POST['titre']) && isset($_POST['contenu']) && isset($_SESSION['email']) && isset($_POST['dateFin'])) {
	$req = $bdd->prepare('INSERT INTO proposition(type_prop, titre_prop, contenu_prop, datefin_prop, mail_compte) VALUES (:event, :titre, :contenu, :datefin, :mail)');
	$req->execute(array('event' => 'evenement', 'titre' => $_POST['titre'], 'contenu' => $_POST['contenu'], 'datefin' => $_POST['dateFin'], 'mail' => $_SESSION['email']));
	$req->closeCursor();
	header('Location: ./event.php');
} else {
	exit;
}
