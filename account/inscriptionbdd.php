<?php

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $req = $bdd->prepare('SELECT mail FROM compte WHERE mail = :mail');
    $req->execute(array('mail' => $_POST['mail']));

    if ($req->fetch() != null) {
        $req->closeCursor();
        header('Location: inscription.php');
    }
    else {
		$req->closeCursor();
        $req2 = $bdd->prepare('INSERT INTO compte(mail, mdp, type_utilisateur, nom, prenom, tel, date_naissance, id_promo) VALUES (:mail, :mdp, :typeUser, :nom, :prenom, :tel, :dateNaiss, :promo)');
        $req2->execute(array('mail' => $_POST['mail'], 'mdp' => $_POST['mdp'],'typeUser' => $_POST['role'], 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'tel' => $_POST['telephone'],
							 'dateNaiss' => $_POST['datenaiss'], 'promo' => $_POST['promo']));
		$req2->closeCursor();
        header('Location: /index.php');
    }
?>