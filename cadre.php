<?php session_start(); 
	if ($_SESSION['email'] == null || $_SESSION['statut'] == "Entreprise") {
		header('Location: /messagerie.php');
	}
?>
<html style="background-color: #f5f5f5">
	<head>
		<META HTTP-EQUIV="Refresh" CONTENT="10">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
		<link rel="stylesheet" href="/css/main.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/8cc7022a47.js" crossorigin="anonymous"></script>      
	</head>
	<body>
		<div>
			<?php

				if (isset($_SESSION['email'])) {

				}

				try {
					$bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
				} catch(Exception $e) {
					die('Erreur : '.$e->getMessage());
				}

				$req = $bdd->prepare( 'SELECT mail, prenom, nom, contenu_message, date_message FROM compte, message, salon WHERE compte.mail = message.id_compte AND message.id_salon = salon.id_salon AND nom_salon = :salon ORDER BY date_message');
				$req->execute(array('salon' => $_GET['salon']) );
				while ($ligne = $req->fetch()) {
					$i = 0;
					
					if ($_SESSION['email'] == $ligne[$i]) {
					$i = $i + 1;
					echo '<p style="text-align: right; clear: right">'.$ligne[$i].' ';
					$i = $i + 1;
					echo $ligne[$i].'</p><div class="notification is-info" style="width: 60%; float: right"><p style="text-align: right; overflow-wrap: break-word;">';
					$i = $i + 1;
					echo $ligne[$i].'</p></div>';

					} else {
					$i = $i + 1;
					echo '<p style="text-align: left; clear: right">'.$ligne[$i].' ';
					$i = $i + 1;
					echo $ligne[$i].'</p><div class="notification is-primary" style="width: 60%; clear : right"><p style="text-align: left; overflow-wrap: break-word">';
					$i = $i + 1;
					echo $ligne[$i].'</p></div>';
					}

				}
				$req->closeCursor();
			?>
		</div>
	</body>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</html>