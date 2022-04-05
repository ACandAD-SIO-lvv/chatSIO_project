<?php include('header.php');
if ($_SESSION['email'] == null) {
	header('Location: /index.php');
}
?>
<html>

<body style="height: 900px;">
	<div class="section" style="margin-left: 15%; margin-right: 15%; margin-top: 1%">
		<div class="control">

			<?php if ($_SESSION['statut'] != "Etudiant") {
				echo '<a href="/creation_offre.php" class="button is-rounded is-info">';
				echo 'Créer une offre';
				echo '</a>';
			}
			?>

			<label class="checkbox" style="margin-left: 77%">
				<input type="checkbox" name="stage" id="stage" checked />
				<strong>Stage</strong>
			</label>

			<label class="checkbox">
				<input type="checkbox" name="emploi" id="emploi" checked />
				<strong>Emploi</strong>
			</label>
		</div>
		<br />
		<div id='messages'>
			<?php
			try {
				$bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
			} catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}

			$res = 'SELECT titre_prop, contenu_prop FROM proposition WHERE accepter_prop = "V" AND type_prop = "stage" OR accepter_prop = "V" AND type_prop = "emploi"';
			$req = $bdd->prepare($res);
			$req->execute();

			while ($ligne = $req->fetch()) {
				$i = 0;
				echo '<article class="message">
				<div class="message-header">
				<p>' . $ligne[$i] . ' :</p>
				</div>';
				$i = $i + 1;
				echo '<div class="message-body">
				<p>' . $ligne[$i] . '</p>
				</div>
				</article>';
			}

			$req->closeCursor();
			?>
		</div>
	</div>
	<script type="text/javascript" src="/Script/scriptOffres.js"></script>
	<?php include('footer.php'); ?>
</body>

</html>