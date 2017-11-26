<?php


$Uri = "../index.php";
if(isset($_POST['URI']))
{
	$Uri = $_POST['URI'];
}

$Jeu = "";

session_start();

