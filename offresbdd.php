<?php
  session_start();
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    if ( isset($_POST['type']) && isset($_POST['titre']) && isset($_POST['contenu']) && isset($_SESSION['email'])) {
      $req = $bdd->prepare('INSERT INTO proposition (type_prop, titre_prop, accepter_prop, contenu_prop, mail_compte) VALUES (:type, :titre, :accepter, :contenu, :mail)');
      $req->execute(array('type' => $_POST['type'], 'titre' => $_POST['titre'], 'accepter' => "F", 'contenu' => $_POST['contenu'], 'mail' => $_SESSION['email']));
      $req->closeCursor();
      header('Location: ./offres.php');
    }else {
      exit;
    }
