<?php
session_start();


//------------------------------------------
$Uri = "../index.php";
if(isset($_POST['URI']))
{
	$Uri = $_POST['URI'];
}

$Connexion = "";

//------------------------------------------


//tous ces test aurrez aussi due être fait en JS
if(isset($_POST['register']))
{
	if(empty($_POST['nom']))
	{
		$Connexion = "Le champ nom est vide.";
	} else
	{
		if(empty($_POST['prenom']))
		{
			$Connexion = "Le champ prénom est vide.";
		} else
		{
			if(empty($_POST['mail']))
			{
				$Connexion = "Le champ mail est vide.";
			} else
			{
				if(empty($_POST['mdp']))
				{
					$Connexion = "Le champ mot de passe est vide.";
				} else
				{
					if($_POST['mdp_confirm'] != $_POST['mdp'])
					{
						$Connexion = "Les mots de passe ne correspondent pas.";
					} else
					{
						if (empty($_POST['pseudo']))
						{
							$Connexion = "Le pseudo est vide.";
						} else
						{
							if ($_POST['cpu'] == "null")
							{
								$Connexion = "Le CPU ne peut pas être la valeur par defaut.";
							} else
							{
								if ($_POST['gpu'] == "null")
								{
									$Connexion = "Le GPU ne peut pas être la valeur par defaut.";
								} else
								{
									if ($_POST['ram'] == "null")
									{
										$Connexion = "La RAM ne peut pas être la valeur par defaut.";
									}
									}
								}
							}
						{
							$Nom = htmlentities($_POST['nom'], ENT_QUOTES, "ISO-8859-1");
							$Prenom = htmlentities($_POST['prenom'], ENT_QUOTES, "ISO-8859-1");
							$Mail = htmlentities($_POST['mail'], ENT_QUOTES, "ISO-8859-1");
							$Mdp = htmlentities($_POST['mdp'], ENT_QUOTES, "ISO-8859-1");
							$Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "ISO-8859-1");
							$CPU = htmlentities($_POST['cpu'], ENT_QUOTES, "ISO-8859-1");
							$GPU = htmlentities($_POST['gpu'], ENT_QUOTES, "ISO-8859-1");
							$RAM = htmlentities($_POST['ram'], ENT_QUOTES, "ISO-8859-1");
							$mysqli = mysqli_connect("db711052003.db.1and1.com", "dbo711052003", "TP_config27", "db711052003");
							if(!$mysqli)
							{
								$Connexion = "Erreur de connexion à la base de données.";
							} else
							{
								$Requete = mysqli_query($mysqli,"SELECT * FROM users WHERE mail = '".$Mail."' OR pseudo = '".$Pseudo."'");
								// Tu peu avoir plusieur résultat ex: cli1 a mon mail et cli 2 a mon pseudo ------------------------------------------------------------------------------------------------
								if(mysqli_num_rows($Requete) >= 1)// <= j'ai corriger par superieur ou égal
								{
									$Connexion = "Le pseudo ou le mail que vous avez utiliser et déjà utiliser.";
								} else 
								{
									//------------------------------------------
									// Tout est bon on enregistre le nouvel utilisateur
									//------------------------------------------
									$Inscription = mysqli_query($mysqli,"INSERT INTO `users` (`nom`, `prenom`, `email`, `mdp`, `pseudo`, `id_cpu`, `id_gpu`, `ram`) VALUES ('".$Nom."','".$Prenom."','".$Mail."','".$Mdp."','".$Pseudo."','".$CPU."','".$GPU."','".$RAM."');");
									$Connexion = "Vous vous êtes bien inscrit";
									$_SESSION['pseudo'] = $Pseudo;
									// On récupére l'ID du nouvel utilisateur pour le connecter automatiquement
									$sql= mysqli_query($mysqli,"SELECT * from users WHERE pseudo = '".$Pseudo."'");
									$donnees = mysqli_fetch_assoc($sql);
									$_SESSION['id'] = $donnees ['id'];
									$_SESSION['id_cpu'] = $donnees ['id_cpu'];
									$_SESSION['id_gpu'] = $donnees ['id_gpu'];
									$_SESSION['ram'] = $donnees ['ram'];
								}
							}
						}
					}
				}
			}
		}
	}
}

//------------------------------------------
// A FAIRE $Connexion ne devrai contenir que des param de type int a traiter et non du texte a afficher directement
header('Location: '.$Uri.'?Connexion='.$Connexion);
//------------------------------------------