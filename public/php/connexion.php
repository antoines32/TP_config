<?php
/*
Page: connexion.php
*/


//------------------------------------------
$Uri = "../index.php";
if(isset($_POST['URI']))
{
	$Uri = $_POST['URI'];
}

$Connexion = "";

//------------------------------------------
	

session_start(); // à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION
if(isset($_POST['connexion']))
{ // si le bouton "Connexion" est appuyé
    // on vérifie que le champ "Pseudo" n'est pas vide
    // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
    if(empty($_POST['pseudo']))
	{
        echo "Le champ Pseudo est vide.";
    } else
	{
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
        if(empty($_POST['mot_de_passe']))
		{
            $Connexion = "Le champ Mot de passe est vide.";
        } else
		{
            // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
            $Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
            $MotDePasse = htmlentities($_POST['mot_de_passe'], ENT_QUOTES, "ISO-8859-1");
			//------------------------------------------
			// Pour evister les insertion tu peu faire ça aussi qui est un peu plus sur que de posté des mdp en clair
			$MotDePasse2 = hash('sha256', $MotDePasse );
			//insert et le mot de passe encrypter dans la base (il ferra bien sur 256 caractère de long)
			//------------------------------------------
			
            //on se connecte à la base de données:
            $mysqli = mysqli_connect("db711052003.db.1and1.com", "dbo711052003", "TP_config27", "db711052003");
            //on vérifie que la connexion s'effectue correctement:
            if(!$mysqli)
			{
                $Connexion = "Erreur de connexion à la base de données.";
            } else
			{
                // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
                $Requete = mysqli_query($mysqli,"SELECT * FROM users WHERE pseudo = '".$Pseudo."' AND mdp = '".$MotDePasse."'");
				//--------------------------------------------------------------
				
				// NOP attention au Multi résultat si problème de BDD
				//le résultat doit être:
				//	égal a 1
				// égal a 0 
				// superieur a 1 vraiement pas bon
				
				//--------------------------------------------------------------
				
                // si il y a un résultat, mysqli_num_rows() nous donnera alors 1
                // si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
				
                if(mysqli_num_rows($Requete) != 1) // <= j'ai corriger ICI si plus de 1 résultat tu connect qui ? ------------------------------------------------------------
				{
                    $Connexion = "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                } else
				{
                    // on ouvre la session avec $_SESSION:
                    $_SESSION['pseudo'] = $Pseudo; // la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
                    $Connexion = "Vous êtes à présent connecté !";
                }
            }
        }
    }
}

//------------------------------------------
// A FAIRE $Connexion ne devrai contenir que des param de type int a traiter et non du texte a afficher directement
header('Location: '.$Uri.'?Connexion='.$Connexion);
//------------------------------------------

?>