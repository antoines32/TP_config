<?php
session_start();

if(isset($_POST['register'])){
	if(empty($_POST['nom'])) {
		echo "Le champ nom est vide.";
	} else {
		if(empty($_POST['prenom'])) {
			echo "Le champ prénom est vide.";
		} else {
			if(empty($_POST['mail'])) {
				echo "Le champ mail est vide.";
			} else {
				if(empty($_POST['mdp'])) {
					echo "Le champ mot de passe est vide.";
				} else {
					if($_POST['mdp_confirm'] != $_POST['mdp']) {
						echo "Les mots de passe ne correspondent pas.";
					} else {
						if (empty($_POST['pseudo'])) {
							echo "Le pseudo est vide.";
						} else {
							$Nom = htmlentities($_POST['nom'], ENT_QUOTES, "ISO-8859-1");
							$Prenom = htmlentities($_POST['prenom'], ENT_QUOTES, "ISO-8859-1");
							$Mail = htmlentities($_POST['mail'], ENT_QUOTES, "ISO-8859-1");
							$Mdp = htmlentities($_POST['mdp'], ENT_QUOTES, "ISO-8859-1");
							$Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "ISO-8859-1");
							$mysqli = mysqli_connect("db711052003.db.1and1.com", "dbo711052003", "TP_config27", "db711052003");
							if(!$mysqli){
								echo "Erreur de connexion à la base de données.";
							} else {
								$Requete = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '".$Mail."' OR pseudo = '".$Pseudo."'");
								if(mysqli_num_rows($Requete) == 1) {
									echo "Le pseudo ou le mail que vous avez utiliser et déjà utiliser.";
								} else {
									$Inscription = mysqli_query($mysqli,"INSERT INTO users (nom, prenom, email, mdp, pseudo, id_cpu, id_gpu, ram) VALUES ('".$Nom."','".$Prenom."','".$Mail."','".$Mdp."','".$Pseudo."',null,null,null)");
									echo "Vous vous êtes bien inscrit";
								}
							}
						}
					}
				}
			}
		}
	}
}