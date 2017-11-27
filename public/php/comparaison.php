<?php


$Uri = "../index.php";
if(isset($_POST['URI']))
{
	$Uri = $_POST['URI'];
}

$Jeu = "";

session_start();

if(isset($_POST['cipi']))
{
	if($_POST['jeu'] == "null")
	{
		$Jeu = "Merci de ne pas laisser la valeur de base pour le jeu.";
	} else 
	{
		//Récuperation des spécificité de la machine de l'utilisateur
		$mysqli = mysqli_connect("db711052003.db.1and1.com", "dbo711052003", "TP_config27", "db711052003");
		$sql= mysqli_query($mysqli,"SELECT nb_threads,frequence from cpu WHERE id = '".$_SESSION['id_cpu']."'");
		$donnees = mysqli_fetch_assoc($sql);
		$_SESSION['user_cpu_thread'] = $donnees ['nb_threads'];
		$_SESSION['user_cpu_clock'] = $donnees ['frequence'];
		$sql = mysqli_query($mysqli,"SELECT memory,gpu_clock,memory_clock from gpu where id = '".$_SESSION['id_gpu']."'");
		$donnees = mysqli_fetch_assoc($sql);
		$_SESSION['user_gpu_memory'] = $donnees ['memory'];
		$_SESSION['user_gpu_clock'] = $donnees ['gpu_clock'];
		$_SESSION['user_gpu_memory_clock'] = $donnees ['memory_clock'];
		$sql = mysqli_query($mysqli,"SELECT ram from users where id = '".$_SESSION['id']."'");
		$donnees = mysqli_fetch_assoc($sql);
		$_SESSION['user_ram'] = $donnees ['ram'];
		$_SESSION['user_ratio_cpu'] = $_SESSION['user_cpu_thread'] * $_SESSION['user_cpu_clock'];
		
		//Récuperation de la config minimal et recommandé du jeu
		$sql = mysqli_query($mysqli,"SELECT * from games where id = '".$_POST['jeu']."'");
		$donnees = mysqli_fetch_assoc($sql);
		$game_min_cpu_clock = $donnees ['min_cpu_clock'];
		$game_min_cpu_core = $donnees ['min_cpu_core'];
		$game_min_ram = $donnees ['min_ram'];
		$game_min_gpu_ram = $donnees ['min_gpu_ram'];
		$game_min_gpu_clock = $donnees ['min_gpu_clock'];
		$game_min_gpu_ram_clock = $donnees ['game_min_gpu_ram_clock'];
		$game_min_space = $donnees ['min_space'];
		$game_min_ratio_cpu = $game_min_cpu_core * $game_min_cpu_clock;
		if($_SESSION['user_ratio_cpu'] >= $game_min_ratio_cpu)
		{
			$_SESSION['processeur_ok_min'] = "Votre processeur fera tourner le jeu en parametre minimal.";
		} else
		{
			$_SESSION['processeur_ok_min'] = "Votre processeur ne fera pas tourner le jeu en parametre minimal.";
		}
		if($_SESSION['user_gpu_clock'] >= $game_min_gpu_clock and $_SESSION['user_gpu_memory'] >= $game_min_gpu_ram and $_SESSION['user_gpu_memory_clock'] >= $game_min_gpu_ram_clock)
		{
			$_SESSION['carte_graphique_ok_min'] = "Votre carte graphique fera tourner le jeu en parametre minimal.";
		} else
		{
			$_SESSION['carte_graphique_ok_min'] = "Votre carte graphique ne fera pas tourner le jeu en parametre minimal.";
		}
		if($_SESSION['user_ram'] >= $game_min_ram)
		{
			$_SESSION['ram_ok_min'] = "Vous disposez de suffisament de ram pour faire tourner le jeu en parametre minimal.";
		} else
		{
			$_SESSION['ram_ok_min'] = "Vous ne disposez pas de suffisament de ram pour faire tourner le jeu en parametre minimal.";
		}
		if($donnees['recom'] = "True")
		{
			$_SESSION['recom'] = True;
			$game_recom_cpu_clock = $donnees ['recom_cpu_clock'];
			$game_recom_cpu_core = $donnees ['recom_cpu_core'];
			$game_recom_ram = $donnees ['recom_ram'];
			$game_recom_gpu_ram = $donnees ['recom_gpu_ram'];
			$game_recom_gpu_clock = $donnees ['recom_gpu_clock'];
			$game_recom_gpu_ram_clock = $donnees ['recom_gpu_ram_clock'];
			$game_recom_space = $donnees ['recom_space'];
			$game_recom_ratio_cpu = $donnees ['recom_cpu_clock'] * $donnees ['recom_cpu_core'];
			if($_SESSION['user_ratio_cpu'] >= $game_recom_ratio_cpu)
			{
				$_SESSION['processeur_ok_recom'] = "Votre processeur fera tourner le jeu en parametre recommandé.";
			} else
			{
				$_SESSION['processeur_ok_recom'] = "Votre processeur ne fera pas tourner le jeu en parametre recommandé.";
			}
			if($_SESSION['user_gpu_clock'] >= $game_recom_gpu_clock and $_SESSION['user_gpu_memory'] >= $game_recom_gpu_ram and $_SESSION['user_gpu_memory_clock'] >= $game_recom_gpu_ram_clock)
			{
				$_SESSION['carte_graphique_ok_recom'] = "Votre carte graphique fera tourner le jeu en parametre recommandé.";
			} else
			{
				$_SESSION['carte_graphique_ok_recom'] = "Votre carte graphique ne fera pas tourner le jeu en parametre recommandé.";
			}
			if($_SESSION['user_ram'] >= $game_recom_ram)
			{
				$_SESSION['ram_ok_recom'] = "Vous disposez de suffisament de ram pour faire tourner le jeu en parametre recommandé.";
			} else
			{
				$_SESSION['ram_ok_recom'] = "Vous ne disposez pas de suffisament de ram pour faire tourner le jeu en parametre recommandé.";
			}
		} else 
		{
			$_SESSION['recom'] = False;
		}
	}
}
$resultat = "resultat";
header('Location: '.$Uri.'?Jeu='.$resultat );
?>