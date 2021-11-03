<?php include('header.php'); 
	if ($_SESSION['email'] == null) {
		header('Location: /index.php');
	}
?>
<html>
    <body style="height: 900px;">
      <div class="section" style="margin-left: 15%; margin-right: 15%; margin-top: 1%">
      <div class="control">
      <?php if ($_SESSION['statut'] == "Professeur" or $_SESSION['statut'] == "Admin") {
              echo '<a href="creation_event.php" class="button is-rounded is-info">Créer un événement</a>';
		        }
      ?>
      </div> 
      <br/>
      <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $req = $bdd->prepare('SELECT titre_prop, contenu_prop FROM proposition WHERE type_prop = "evenement"');
        $req->execute(array());

          while ($ligne = $req->fetch()) {
            $i = 0;
            echo '<article class="message">
                  <div class="message-header">
                  <p>'.$ligne[$i].' :</p>
                  </div>';
                  $i = $i + 1;
            echo '<div class="message-body">
                  <p>'.$ligne[$i].'</p>
                  </div>
                  </article>';
          }

      $req->closeCursor();
      ?>
    </div>
        <?php include('footer.php'); ?>
    </body>
</html>
