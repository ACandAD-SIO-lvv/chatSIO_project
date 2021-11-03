<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Réseau Inter-SIO</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
        <link rel="stylesheet" href="/css/main.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/8cc7022a47.js" crossorigin="anonymous"></script>
        <script src="/Script/scriptInscription.js"></script>
    </head>
    <body>

        <header class="header">
			<nav class="navbar">
				<div class="navbar-start" style="margin-left: 50px">
					<div class="navbar-menu">
						<p class="navbar-item has-text-centered">
							<a href="/index.php" class="title">Réseau Inter-SIO</a>
						</p>
					</div>
				</div>
			</nav>
        </header>

        <div class="title">
          	<h1>Inscription</h1>
        </div>

        <div class="section" style="margin-left: 50px; margin-right: 50%">
            <form action="inscriptionbdd.php" method="POST">
                <div class="field">
                    <p>
                        <label class="label">Nom :</label>
                        <input class="input" type="text" name="nom" placeholder="Entrez votre nom" required>
                    </p>
                </div>
                <div class="field">
                    <p>
                        <label class="label">Prenom :</label>
                        <input class="input" type="text" name="prenom" placeholder="Entrez votre prenom" required>
                    </p>
                </div>
                <div class="field">
                    <p>
                        <label class="label">Date de naissance :</label>
                        <input class="input" type="date" name="datenaiss" id="datenaiss" placeholder="Entrez votre date de naissance" required>
                    </p>
                </div>
                <div class="field">
                    <p>
                        <label class="label">Numero de telephone :</label>
                        <input class="input" type="tel" name="telephone" required placeholder="Entrez votre numero de telephone (xx xx xx xx xx)" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}">
                    </p>
                </div>
                <div class="field">

					<div class="columns is-mobile">
						<div class="column">
							<div class="control">
								<div class="select" >
								<select name="role" id="role" onchange='cacher();'>
									<option value='Etudiant' selected>Etudiant</option>
									<option value='Professeur'>Professeur</option>
									<option value='Entreprise'>Entreprise</option>
								</select>
								</div>
							</div>
						</div>
						<div class="column is-1" id="promo1">
							<div class="field">
								<p>
									<label class="label">Promo:</label>
								</p>
							</div>
						</div>
						<div class="column is-two-thirds" id="promo2">
							<div class="control">
								<div class="select" >
									<select name="promo" id="promo">
									<?php 
									try
									{
										$bdd = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
									}
									catch(Exception $e)
									{
										die('Erreur : '.$e->getMessage());
									}
									
									$req = $bdd->prepare('SELECT id_promo, nom_promo FROM promo ORDER BY nom_promo');
									$req->execute();
									while ($ligne = $req->fetch()) {
										$i = 0;
										echo '<option value="'.$ligne[$i];
										$i = $i + 1;
										echo '" selected>'.$ligne[$i].'</option>';
									}    

									$req->closeCursor();
									?>
									</select>
								</div>
							</div>
						</div>
					</div>
                </div>
                <div class="field">
                    <p>
                        <label class="label">Adresse mail :</label>
                        <input class="input" type="email" name="mail" placeholder="Entrez votre email" required>
                    </p>
                </div>

                <div class="field">
                    <p>
                        <label class="label">Mot de passe :</label>
                        <input class="input" type="password" name="mdp" placeholder="Entrez votre mot de passe" required>
                    </p>
                </div>

                <div class="field">
                    <p>
                		<label class="label">Mot de passe(Confirmation) :</label>
                        <input class="input" type="password" name="mdpc" placeholder="Entrez votre mot de passe" required>
                    </p>
                </div>
                <input type="checkbox" id='check' name="check" required onclick="coche()" />
                	J'accepte les <a href="/terms&conditions.php">termes et conditions</a> d'utilisation
                </br>

                <div class="field">
                  	<input type="submit" id='bouton' name="bouton" class="button is-primary" style="margin-top: 10px" disabled value="M'inscrire" />
                </div>
            </form>
        </div>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<?php include('../footer.php'); ?>
    </body>
</html>
