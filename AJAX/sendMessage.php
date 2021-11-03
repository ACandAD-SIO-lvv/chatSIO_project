<?php
/* page ajax pour envoyer un message */


$message = htmlspecialchars($_POST['message']);
$idc = $_POST['compte'];
$salon = $_POST['salon'];

  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
  $req = $bdd->prepare('INSERT INTO message(contenu_message,id_compte,id_salon) VALUES (:contenu, :idc, :ids)');
  $sous_req = $bdd->prepare('SELECT id_salon FROM salon WHERE nom_salon = "'.$salon.'"');
  $sous_req->execute(array());
  $ids = $sous_req->fetch();
  $req->execute(array('contenu' => $message, 'idc' => $idc, 'ids' => $ids[0]));
  $req->closeCursor();
  $sous_req->closeCursor();