<?php
session_start();
$Uri = "../index.php";
if(isset($_POST['URI']))
{
	$Uri = $_POST['URI'];
}

$Deconnexion = "";

session_destroy();
$Deconnexion = "Vous avez bien était déconnecter.";

header('Location: '.$Uri.'?Deconnexion='.$Deconnexion);