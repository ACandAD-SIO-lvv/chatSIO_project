<?php include('header.php');
	if ($_SESSION['statut'] != "Admin" and $_SESSION['statut'] != "Professeur") {
		header('Location: /index.php');
	}
?>
<html>
	<body>
		<div class="section" style="margin-left: 15%; margin-right: 15%; margin-top: 1%">
			<nav class="panel">
				<p class="panel-heading" style="text-align: center">Créer une nouvelle promo</p>
				<div class="panel-block" style="flex-wrap: wrap">
					<label for="anneedebut">Année de début :</label>
					<input class="input" style="margin-right: 20%" id="anneedebut" placeholder="exemple : 2021" name="anneedebut" type="text" maxlength="4" minlength="4" pattern="[0-9]{4}">

					<label for="anneefin" style="margin-top: 15px">Année de fin :</label>
					<input class="input" style="margin-right: 20%" id="anneefin" placeholder="exemple : 2023" name="anneefin" type="text" maxlength="4" minlength="4" pattern="[0-9]{4}">

					<input type="button" style="margin-top: 15px; width: 150px; margin-left: 68%" class="button is-info" disabled id="creationpromo" value="Créer" />
				</div>
				<br/>
				<p class="panel-heading" style="text-align: center">Demande de création d'offres de stage ou d'emploi</p>
				<div class="panel-block" style="flex-wrap: wrap">
					<?php
						try {
							$bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
						} catch(Exception $e) {
							die('Erreur : '.$e->getMessage());
						}

						$req = $bdd->prepare('SELECT id_prop, type_prop, titre_prop, contenu_prop, mail_compte FROM proposition WHERE accepter_prop = "F"');
						$req->execute();
						while ($ligne = $req->fetch()) {
							echo 	'<div class="card" id="'.$ligne[0].'" style="width: 1000px; margin-top: 15px; margin-left: 10%; margin-right: 10%">
										<header class="card-header">
											<p class="card-header-title">
												'.$ligne[1].':  '.$ligne[2].'
											</p>
										</header>
										<div class="card-content">
											<div class="content">
												'.$ligne[3].' </br></br></br>Demande depuis l\'adresse  '.$ligne[4].'
											</div>
										</div>
										<footer class="card-footer">
											<a class="card-footer-item accepter">Accepter</a>
											<a class="card-footer-item decliner">Décliner</a>
										</footer>
									</div>';
						}
						$req->closeCursor();
					?>
				</div>
			</nav>
		</div>
		<script type="text/javascript" src="/Script/scriptAdmin.js"></script>
		<?php include('footer.php'); ?>
	</body>
</html>