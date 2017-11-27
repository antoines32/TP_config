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
			<?php
				if(isset($_SESSION['id']))
					{
						echo "<button class='test btn btn-success'>Commencer un test</button>";
					}
					else 
					{
						echo "<button class='test btn btn-success show_login'>Commencer un test</button>";
						echo "<p>Merci de vous connecter ou de vous inscrire sur le site afin d'utiliser cette fonctionnalité</p>";
					}
			?>
		</div>
		<div class="container hidetest hidecontent">
			<form id='pcuser' method="post" action="php/comparaison.php">
				<label id="cpuuser" name="cpuuser_label">CPU : 
				<input type="text" name="cpuuser" value='<?php
				session_start();
				$conn = mysqli_connect("db711052003.db.1and1.com", "dbo711052003", "TP_config27", "db711052003");
				$sql= mysqli_query($conn,"SELECT * FROM `cpu` where id = '".$_SESSION['id_cpu']."'");
				$donnees = mysqli_fetch_assoc($sql);
				echo $donnees['marque']." ".$donnees['famille']." ".$donnees['modele'];
				?>' disabled>
				</label>
				<label id="gpuuser" name="gpuuser_label">GPU : 
					<input type="text" name="gpuuser" value='<?php
					session_start();
					$conn = mysqli_connect("db711052003.db.1and1.com", "dbo711052003", "TP_config27", "db711052003");
					$sql= mysqli_query($conn,"SELECT * FROM `gpu` where id = '".$_SESSION['id_gpu']."'");
					$donnees = mysqli_fetch_assoc($sql);
					echo $donnees['nom'];
					?>' disabled>
				</label>
				<label id="ramuser" name="ramuser_label">RAM : 
					<input type="text" name="ramuser" value='<?php
					session_start();
					echo $_SESSION['ram'];
					?>' disabled>
				</label>
				<br>
				<label>Jeu à tester : </label>
    			<select name="jeu">
    				<option value="null">------Jeu------</option>
    				<?php
 
					$conn = mysqli_connect("db711052003.db.1and1.com", "dbo711052003", "TP_config27", "db711052003");
					$sql= mysqli_query($conn,"SELECT * FROM `games`");
 
					while($donnees=mysqli_fetch_assoc($sql)) {
					?>
					<option value="<?php echo $donnees ['id'];?>"><?php echo $donnees ['nom'];?></option>
					<?php
					}
					?>
    			</select>
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