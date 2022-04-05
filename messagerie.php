<?php include('header.php');
if ($_SESSION['statut'] == "Entreprise" || $_SESSION['email'] == null) {
	header('Location: /index.php');
}
?>
<html>

<body>
	<div class="section" style="margin-left: 5%; margin-right: 5%; margin-top: 1%">
		<div class="columns">
			<div class="column is-one-quarter">
				<nav class="panel">
					<p class="panel-heading">Salons de discussion</p>

					<?php

					try {
						$bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
					} catch (Exception $e) {
						die('Erreur : ' . $e->getMessage());
					}
					if ($_SESSION['statut'] == 'Admin') {
						$req = $bdd->prepare('SELECT nom_salon FROM salon ORDER BY nom_salon');
					} elseif ($_SESSION['statut'] == 'Etudiant') {
						$sousreq = $bdd->prepare('SELECT nom_promo FROM promo, compte WHERE promo.id_promo = compte.id_promo AND compte.mail = "' . $_SESSION['email'] . '"');
						$sousreq->execute();

						$req = $bdd->prepare('SELECT nom_salon FROM salon WHERE nom_salon LIKE "%' . $sousreq->fetch()[0] . '"  ORDER BY nom_salon');
						$sousreq->closeCursor();
					} elseif ($_SESSION['statut'] == 'Professeur') {
						$req = $bdd->prepare('SELECT nom_salon FROM salon WHERE nom_salon LIKE "%prof%" ORDER BY nom_salon');
					}
					$req->execute();

					if ($_SESSION['statut'] != 'Admin') {
						echo '<a class="panel-block" id="general">
					<span class="panel-icon">
					<i class="fas fa-envelope-open-text" aria-hidden="true"></i>
					</span>
					Salon general
					</a>';
					}

					if ($_SESSION['statut'] == 'Etudiant' and $_SESSION['statut'] != 'Admin') {
						echo '<a class="panel-block" id="etudiants">
					<span class="panel-icon">
					<i class="fas fa-envelope-open-text" aria-hidden="true"></i>
					</span>
					Salon étudiants
					</a>';
					}

					$i = 1;
					while ($ligne = $req->fetch()) {

						echo '<a class="panel-block" id="' . $i . '">
					<span class="panel-icon">
					<i class="fas fa-envelope-open-text" aria-hidden="true"></i>
					</span>
					' . $ligne[0] . '
					</a>';
						$i = $i + 1;
					}

					$req->closeCursor();
					?>

				</nav>
			</div>
			<div class="column" id="salon">
				<article class="message">
					<div class="message-header">
						<p>Salon</p>
					</div>
					<div class="message-body">
						<iframe width="100%" height="590" frameborder="0" scolling="auto" seamless src="/cadre.php" name="cadre"></iframe>
					</div>
				</article>
				<div class="columns is-mobile">
					<div class="column is-four-fifths">
						<p>
						<div class="control">
							<input class="input" id="message" type="text">
						</div>
						</p>
					</div>
					<div class="column">
						<input type="button" class="button is-primary is-rounded" disabled="true" id="envoi" value="Envoyer" style="width:150px" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/Script/scriptMessagerie.js"></script>
	<?php include('footer.php'); ?>

</body>

</html>