<?php include('../header.php');
if ($_SESSION['email'] == null) {
	header('Location: /index.php');
}
?>
<html>

<body>
	<div class="box" style="margin-top: 90px; margin-left: 5%; width: 65%">
		<h1 class="title is-4">Informations et modification du profil</h1>
		<?php
		$email = $_SESSION['email'];
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}

		if ($_SESSION['statut'] !== "Etudiant") {
			$req = $bdd->prepare('SELECT prenom, nom, date_naissance, tel FROM compte WHERE mail = "'. $email .'"');
			$req->execute();
			$ligne = $req->fetch();
			$req->closeCursor();
		} else {
			$req = $bdd->prepare('SELECT prenom, nom, date_naissance, tel, nom_promo FROM compte, promo WHERE compte.id_promo = promo.id_promo AND mail = "' . $email . '"');
			$req->execute();
			$ligne = $req->fetch();
			$req->closeCursor();
		}


		$i = 0;
		echo '<label class="label">Prenom : '. $ligne[$i] .'</label>';
		$i++;
		echo '<label class="label">Nom : '. $ligne[$i] .'</label>';
		$i++;
		echo '<label class="label">Date de naissance : '. $ligne[$i] .'</label>';
		$i++;
		echo '<label class="label">Telephone : '. $ligne[$i] .'</label>';
		echo '<label class="label">Adresse mail : <span id="mail"></span>'. $email .'</span></label>';
		echo '<label class="label">Statut : '. $_SESSION['statut'] .'</label>';
		$i++;
		if ($_SESSION['statut'] === "Etudiant") {
			echo '<label class="label">Promotion : '. $ligne[$i] .'</label>';
		}
		?>
		<br />
		<div class="field">
			<label class="label">Ancien mot de passe</label>
			<div class="control">
				<input class="input" id="oldPass" type="text">
			</div>
		</div>
		<div class="field">
			<label class="label">Nouveau mot de passe</label>
			<div class="control">
				<input class="input" id="newPass" type="text">
			</div>
		</div>
		<div class="field">
			<label class="label">Confirmation du nouveau mot de passe</label>
			<div class="control">
				<input class="input" id="newPassConfirm" type="text">
			</div>
		</div>
		<button class="button is-info" id="changePassword">Modifier</button>
	</div>
	<script type="text/javascript" src="/Script/scriptProfil.js"></script>
	<?php include('../footer.php'); ?>
</body>

</html>