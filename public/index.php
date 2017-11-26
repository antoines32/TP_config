<?php
	SESSION_START();
	$_SESSION['menu'] = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Can I Play It</title>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="https://andwecode.com/wp-content/uploads/2015/10/jquery.leanModal.min_.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="js/index.js"></script>

</head>
<body>	

	<?php
	 include './moduls/menu.php';
	?>

<!--Page principale-->	
	<content class="container">
		<!--Page Les modals de connnexion/Inscirption-->	
		<?php 
			include './moduls/modals.php';
		?>

 		<!--Description du site-->
		<div class="container hidecontent">
			<p>Qui ne s'est pas déjà cassé la tête à rechercher et comparer sur le net si sa configuration de PC correspondait ou non aux derniers jeux sorties ? </p>
			<p>Nous avons conçus se site pour pouvoir comparer votre configuration personnel avec la configuration requise les différents jeux auxquels vous aimeriez jouer.</p>
		<!--Bouton de test (c'est le même que le test dans le menu-->
			<button class="test btn btn-success">Commencer un test</button>
		</div>
		<div class="container hidetest hidecontent">
			<form id='pcuser'>
				<label id="cpuuser" name="cpuuser">CPU : </label>
				<label id="gpuuser" name="gpuuser">GPU : </label>
				<label id="ramuser" name="ramuser">RAM : </label>
				<label>Jeux à tester : </label>
				<input id="search" type="text" autocomplete="on" name="searchgame" />
				<div id="results"></div>
				<input type="submit" name="cipi" class="btn btn-success" value="Can I Play It ?" id="cipi">
			</form>
		</div>
		
	</content>
	
	<?php 
			include './moduls/footer.php';
	?>
</body>
</html>