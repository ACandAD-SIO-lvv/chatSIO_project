<?php session_start(); ?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<title>Réseau Inter-SIO</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/8cc7022a47.js" crossorigin="anonymous"></script>
</head>

<body>
	<header class="header">
		<nav class="navbar">
			<div class="navbar-start" style="margin-left: 50px">

				<div class="navbar-menu">

					<p class="navbar-item has-text-centered">
						<a href="/index.php" class="title">Réseau Inter-SIO</a>
					</p>
					<?php if (isset($_SESSION['email'])) {
						if ($_SESSION['statut'] != "Entreprise") {
							echo '<p class="navbar-item has-text-centered">';
							echo '<a href="/messagerie.php" class="subtitle">Messagerie</a>';
							echo '</p>';
						}
						echo '<p class="navbar-item has-text-centered">';
						echo '<a href="/offres.php" class="subtitle">Offre</a>';
						echo '</p>';

						echo '<p class="navbar-item has-text-centered">';
						echo '<a href="/event.php" class="subtitle">Evenement</a>';
						echo '</p>';
						if ($_SESSION['statut'] == "Admin" or $_SESSION['statut'] == "Professeur") {
							echo '<p class="navbar-item has-text-centered">';
							echo '<a href="/admin.php" class="subtitle">Administration</a>';
							echo '</p>';
						}
					} ?>
				</div>

			</div>

			<div class="navbar-end" style="margin-right: 2%">
				<table>
					<tr>
						<?php
						if (isset($_SESSION['email'])) {
							echo '<div class="field has-addons " style="margin-top: 4%;">
							<div class="control">
								<button id="profil" class="button is-rounded is-primary is-small" onclick="window.location = \'/account/profil.php\'">
									' . $_SESSION['email'] . '
								</button>
							</div>
							<div class="control">
								<button class="button is-rounded is-primary is-small" onclick="window.location = \'/account/deconnexion.php\'">
									Déconnexion
								</button>
							</div>
						</div>';
						} else {
							echo '<td>
                          <form action="/account/connexionbdd.php"  method="POST">
                            <div class="field has-addons " style="margin-top: 2%">
                              <div class="control">
                                <input class="input is-rounded is-small" name="email" type="email" placeholder="Adresse mail">
                              </div>

                              <div class="control">
                                <input class="input is-small" name="mdp" type="password" placeholder="Mot de passe">
                              </div>

                              <div class="control">
                                <button class="button is-rounded is-primary is-small">
                                  Connexion
                                </button>
                              </div>
                            </div>
                          </form>
                        </td>
                        <td>
                          <div class="navbar-menu">
                            <p class="navbar-item has-text-centered">
                              <a href="account/inscription.php" class="subtitle">Inscription</a>
                            </p>
                          </div>
                        </td>';
						}
						?>
					</tr>
				</table>
			</div>
		</nav>
	</header>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</body>

</html>