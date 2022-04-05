<?php include('header.php');
if ($_SESSION['statut'] == "Etudiant" || $_SESSION['email'] == null) {
	header('Location: /offres.php');
}
?>
<html>

<body>
	<div class="section" style="margin-left: 15%; margin-right: 35%; margin-top: 1%">
		<form action="offresbdd.php" method="POST">

			<div class="select">
				<select name="type" id="type" required>
					<option value="stage">stage</option>
					<option value="emploi">emploi</option>
				</select>
			</div>
			<br /><br />

			<input class="input" type="text" name="titre" id="titre" placeholder="Titre" required>
			<br /><br />

			<textarea class="textarea" name="contenu" id="contenu" placeholder="Information de l'offre" required></textarea>
			<br />

			<div class="field">
				<p class="control">
					<input type="submit" class="button is-link" value="Valider"></input>
				</p>
			</div>

		</form>
	</div>
	<?php include('footer.php'); ?>
</body>

</html>