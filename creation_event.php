<?php include('header.php');
if ($_SESSION['statut'] !== "Professeur" and $_SESSION['statut'] !== "Admin") {
	header('Location: /event.php');
}
?>
<html>

<body>
	<div class="section" style="margin-left: 15%; margin-right: 35%; margin-top: 1%">
		<form action="eventbdd.php" method="POST">
			<input class="input" type="text" name="titre" placeholder="Titre" required>
			<br /><br />

			<textarea class="textarea" name="contenu" placeholder="Information de l'evennement" required></textarea>
			<br />
			<div class="field">
				<p>
					<label class="label">Date de fin de l'évenement :</label>
					<input class="input" type="date" name="dateFin" placeholder="Entrez la date de fin de l'évenement" required>
				</p>
			</div>
			<div class="field">
				<p class="control">
					<button class="button is-link">Valider</button>
				</p>
			</div>
		</form>
	</div>
	<?php include('footer.php'); ?>
</body>

</html>