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
	if($_POST['jeu'] == null)
	{
		$Jeu = "Merci de ne pas laisser la valeur de base pour le jeu."
	} else 
	{
		$mysqli = mysqli_connect("db711052003.db.1and1.com", "dbo711052003", "TP_config27", "db711052003");
		$sql= mysqli_query($mysqli,"SELECT * from cpu WHERE id = '".$_SESSION['id_cpu']."'");
		$donnees = mysqli_fetch_assoc($sql);
		$_SESSION['user_cpu_thread'] = $donnees ['nb_threads'];
		$_SESSION['user_cpu_clock'] = $donnees ['frequence'];
		
	}
}
